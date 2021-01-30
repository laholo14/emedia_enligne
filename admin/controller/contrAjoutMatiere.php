<?php

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");
$matiere=new Matiere();

$unite =new Ue();
    
if (isset($_POST['intitule']) && isset($_POST['idue'])) {

    extract($_POST); 
    $verify = new Matiere();
    $verify->setIntitule($intitule);
    $res = $verify->verify();
    foreach ($res as $resultat) {
       $count = $resultat['COUNT(*)'];
   }
    if ($count == 0) {
        $matiere->setIdUe($idue);
        $matiere->setIntitule($intitule);
        $matiere->create();
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