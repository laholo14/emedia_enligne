<?php
session_start();
if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

extract($_POST);


?>