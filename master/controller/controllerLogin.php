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
        $_SESSION['matriculemaster'] = $resultat['MATRICULE'];
        $_SESSION['mdpmaster'] = $resultat['MDP'];
    }

    if (isset($_SESSION['matriculemaster'],$_SESSION['mdpmaster']) and $_SESSION['matriculemaster'] === $matricule) {
        header("location: ../../Accueil_master");
    } else {
        $_SESSION['erreuradminmaster'] = "Matricule ou mot de passe incorrect";
        header("location: ../../gourde");
    }
} else {
    header("location: ../../gourde");
}

?>

<?php

  
?>