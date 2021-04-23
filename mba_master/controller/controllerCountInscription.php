<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['countInscri'])) {

    $mba = new Suivre();
    $count = count($mba->NouveauxInscriMba());
    echo $count;
}


?>



<?php ?>