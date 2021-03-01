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

include("../controller/contrIEM.php");

if ($_SESSION['testInclude']  == 1) {
    include("rentrer.php");
} else if ($_SESSION['testInclude']  == 0) {
    include("plateforme.php");
}
?>

<?php ?>
