<?php
session_start();
function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}
$db = new Connexion();
    $matiere = new  Formation();
    $moyenne = new Resultat();
    if(isset($_POST['semestre'])){
        extract($_POST);
        $repecher=new Repecher();
        $res=$repecher->readEtudById($_SESSION['id'],$semestre);
        foreach ($res as $resRepechage) {
            $table .="<tr><td>".$resRepechage['INTITULE']."</td><td>".$resRepechage['MONTANT']."Ariary</td></tr>";
        }
        $repecher=new Repecher();
        $res=$repecher->readTotal($_SESSION['id'],$semestre);
        foreach ($res as $resRepechage) {
            $table .=  "<tr><td><b>TOTAL<b></td><td><b>".$resRepechage['MONTANT']."Ariary</b></td></tr>";
        }
        echo $table;

        }
        
?>