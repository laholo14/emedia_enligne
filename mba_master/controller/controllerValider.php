<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");
require_once("../../model/Binary.class.php");
require_once("../../model/Cryptage.class.php");

if (isset($_POST['semestre'], $_POST['vague'], $_POST['numero'], $_POST['idetudiant'])) {
    extract($_POST);

    $suivre = new Suivre();
    $res = $suivre->readAllById($idetudiant);

    foreach ($res as $resultat) {
        $nationalite = $resultat['NATIONALITE'];
        $filiere = $resultat['FILIERE'];
        $contact = $resultat['NUMERO'];
        $mail = $resultat['MAIL'];
        $diplome = $resultat['DIPLOME'];
        $nom = $resultat['NOM'];
        $prenom = $resultat['PRENOM'];
    }

    $cryptage = new Cryptage();
    $mdp = $cryptage->crpt14($contact);

    $matricule = $filiere . '-' . $vague . '/' . $numero . '/' . $nationalite;
    $suivre->setMatricule($matricule);
    $count = count($suivre->verifymatricule());
    if ($count == 1) {
        echo "Efa ao io matricule";
    } else {
        $suivre->setMatricule($matricule);
        $suivre->setMdp($mdp);
        $suivre->setSemestre($semestre);
        $suivre->setCode($vague);
        $suivre->setEtudiant($idetudiant);
        $suivre->Valider();

        echo "Étudiant valider";
        $destinataire = $mail;
        $expediteur = 'emediaenligne2020@gmail.com';
        //$copie = 'adresse@fai.com';
        //$copie_cachee = 'adresse@fai.com';
        $objet = 'Matricule et Mot de Passe'; // Objet du message
        $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
        $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
        $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
        $headers .= 'From: "E-media"<' . $expediteur . '>' . "\n"; // Expediteur
        $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
        //$headers .= 'Cc: '.$copie."\n"; // Copie Cc
        //$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
        $message = '<div style="width: 100%; text-align: center; font-weight: bold">Bonjour...<br>Voici votre Matricule et Mot de passe pour acceder a vos cours</div> <br> <br>
             <div>
             <form action="e-media.mg/universite/" method="posts">
              <div>
              <table>
              <tr>  
              <td><b>Matricule: </b> ' . $matricule . '</td>
              </tr>          
              <tr>
              <td><b>Mot de passe: </b> ' . $contact . '</td>
              </tr>
              <br>
              <br>
              <br>
              Merci de nous contacter en cas de problème selon ses différents services:
                <tr>
                <br>
                <td>Service Technique: emedia.servicetechnique@gmail.com , 261345077707</td>
                </tr>
                <br>
                <tr>
                <td>Service Finance: servicefinance.emedia@gmail.com , 261344013064</td>
                </tr>
                <br>
                <tr>
                <td>Service Pedagogie LICENCE: emediaenligne2020@gmail.com , 261349920407</td>
                </tr>
                <br>
                <tr>
                <td>Service Pedagogie MASTER: emediaenligne2020@gmail.com , 261344356977</td>
                </tr>
                <br>
                <tr>
                <td>Scolarité LICENCE: 261341799960</td>
                </tr>
                <br>
                <tr>
                <td>Scolarité MASTER: 261341177737</td>
                </tr>
                <br>
              <i>Vous beneficier de 50% de reduction pour vos frais d\'inscriptions pour l\'un de vos filière</i>
              </table>
              <input type="submit" value="se connecter" style="background-color:blue; color:white;border:none;border-radius:8px;font-size:12px;padding:8px;cursor:pointer;"></div></form></div> ';
        if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
        {
        } else // Non envoy
        {
        }
    }
}


?>



<?php ?>