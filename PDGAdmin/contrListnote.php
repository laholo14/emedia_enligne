<?php

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

if (isset($_POST['sub'])) {
    if (isset($_POST['dip']) and isset($_POST['fil']) and isset($_POST['vague'])) {
        extract($_POST);
        $suivre = new Suivre();
        $suivre->setDip($dip);
        $suivre->setFiliere($fil);
        $suivre->setCode($vague);
        $res_Title = $suivre->ListEtudiant();
        $res = $suivre->ListEtudiant();
        foreach ($res_Title as $resultat) {
            $semestre = $resultat['SEMESTRE'];
        }
        $enseigner = new Enseigner();
        $enseigner->setParcours($fil);
        $enseigner->setSemestre($semestre);
        $res_matiere = $enseigner->listMatiere_enseigner();

    }
}

?>