<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['text_ue'])) {

    extract($_POST);
    $ue = new UE();
    $ue->setIntituleue($text_ue);
    echo  $ue->create();
}


?>



<?php ?>