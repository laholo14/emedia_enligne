<?php


session_start();

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

require_once("../../model/Binary.class.php");
require_once("../../model/Cryptage.class.php");

if (isset($_POST['matricule'], $_POST['pass'])) {
    extract($_POST);
    $admin = new AdminMba();
    $admin->setMatricule($matricule);
    $crypt = new Cryptage();
    $mdp = $crypt->crpt14($pass);
    $admin->setMdp($mdp);
    $res = $admin->login();

    foreach ($res as $resultat) {
        $_SESSION['matriculemba'] = $resultat['MATRICULE'];
        $_SESSION['mdpmba'] = $resultat['MDP'];
    }

    if (isset($_SESSION['matriculemba'],$_SESSION['mdpmba']) and $_SESSION['matriculemba'] === $matricule) {
        header("location: ../../Accueil_mba");
    } else {
        $_SESSION['erreuradmin'] = "Matricule ou mot de passe incorrect";
        header("location: ../../Abm");
    }
} else {
    header("location: ../../Abm");
}

?>

<?php

  
?>