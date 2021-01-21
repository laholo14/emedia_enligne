<?php 
function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$connexion = new Connexion();

$base =Connexion::getCx();

if(isset($_POST['idEtudiant'])){
    extract($_POST);

    $object = new Resultat($base);
    $object->setEtudiant($idEtudiant);
    $object->setSessiondexam($idSession);
    $object->setMatiere($idmatiere);
    $object->setReponse('Examen specifique');
    $object->insertResultatUpload();
    header("location:../vue/examenSpecifique.php");
}

?>