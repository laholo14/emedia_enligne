<?php

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");
$matiere=new Matiere();
    
if (isset($_POST['intitule'])) {

    extract($_POST);
   $verify = new Matiere();
    $verify->setIntitule($intitule);
    $res = $verify->verify();
    foreach ($res as $resultat) {
       $count = $resultat['COUNT(*)'];
   }
    if ($count == 0) {

        $matiere->setIntitule($intitule);
        $matiere->create();
        echo "success";
    } else {
        echo "efa ao io";
    }
}

?>

<?php



?>