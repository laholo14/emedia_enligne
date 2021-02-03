<?php

ob_start();


session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();


if (isset($_POST["matricule"]) and isset($_POST["password"])) {

    extract($_POST);

    $log = new Suivre();   
    $log->setMatricule($matricule);
    $crypt = new Cryptage();
    $mdp = $crypt->crpt14($password);
    $log->setMdp($mdp);
    $res = $log->login();
    foreach ($res as $resultat) {

        $_SESSION['id'] = $resultat['IDETUDIANTS'];

        $_SESSION['diplome'] = $resultat['DIPLOME'];

        $_SESSION['filiere'] = $resultat['FILIERE'];

        $_SESSION['nomfiliere'] = $resultat['NOMFILIERE'];

        $_SESSION['parcours'] = $resultat['PARCOURS'];

        $_SESSION['nomparcours'] = $resultat['NOMPARCOURS'];

        $_SESSION['semestre'] = $resultat['SEMESTRE'];

        $_SESSION['vague'] = $resultat['CODE'];

        $req1 = "SELECT DATYFIDIRANA FROM DATYFIDIRANA WHERE CODE = :code AND DIPLOME = :diplome";
        $st1 = $db->getCx()->prepare($req1);
        $st1->execute(array(
            "code" =>  $_SESSION['vague'],
            "diplome" =>  $_SESSION['diplome']

        ));

        while ($d1 = $st1->fetch()) {
            $datedenter = $d1['DATYFIDIRANA'];
        }

        $_SESSION['datedenter'] = $datedenter;

        $_SESSION['matricule'] = $resultat['MATRICULE'];

        $_SESSION['mdp'] = $resultat['MDP'];

        $_SESSION['datedins'] = $resultat['DATEDINSCRIPTION'];

        $_SESSION['nom'] = $resultat['NOM'];

        $_SESSION['prenom'] = $resultat['PRENOM'];

        $_SESSION['datenais'] = $resultat['DATENAIS'];

        $_SESSION['lieunaiss'] = $resultat['LIEUNAISS'];

        $_SESSION['sexe'] = $resultat['SEXE'];

        $_SESSION['nationalite'] = $resultat['NATIONALITE'];

        $req = "SELECT nom_fr_fr FROM PAYS WHERE ALPHA2 = :al";
        $st = $db->getCx()->prepare($req);
        $st->execute(array(
            "al" =>  $resultat['NATIONALITE']

        ));

        while ($d = $st->fetch()) {
            $pays = $d['nom_fr_fr'];
        }

        $_SESSION['pays'] = $pays;

        $_SESSION['adresse'] = $resultat['ADRESSE'];

        $_SESSION['mail'] = $resultat['MAIL'];

        $_SESSION['photo'] = $resultat['PHOTO'];

        $_SESSION['inscription'] = $resultat['INSCRIPTION'];

        $_SESSION['ecolage'] = $resultat['ECOLAGE'];

        $_SESSION['examen'] = $resultat['EXAMEN'];

        $_SESSION['soutenance'] = $resultat['SOUTENANCE'];

        $_SESSION['certificat'] = $resultat['CERTIFICAT'];

    }




        if (isset($_SESSION['matricule']) and $matricule === $_SESSION['matricule'] and $mdp === $_SESSION['mdp']){
            if($_SESSION['diplome'] == 'LICENCE'){
                 header('Location: ../Accueil'); 
            }else{
                header('Location: ../Home'); 
            } 
        } else {
    
            $_SESSION['erreur'] = "Matricule ou mot de passe incorrect";
    
            header('Location: ../Connecter');
        }
    } else {
        echo 'diso';
    }
ob_end_flush();
?>