 <?php

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");
$unite =new UE();
    
if (isset($_POST['intitule'])) {

    extract($_POST); 
    $unite->verify($intitule);
    $res = $unite->verify();
    foreach ($res as $resultat) {
       $count = $resultat['COUNT(*)'];
   }
    if ($count == 0) {
        $unite->setIntituleue($intitule);
        $unite->create();
        echo "success";
    } else {
        echo "efa ao io";
    }
}else{
    echo 'tay';
}

?>

<?php



?>