<?php

session_start();
function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['idmatiere'])) {

    extract($_POST);
    $cours = new Formation();
    $cours->setSemetre($_SESSION['semestre']);
    $cours->setFiliere($_SESSION['filiere']);
    $cours->setMois($_SESSION['mois']);
    $cours->setCategorie(1);
    $cours->setType(2);
    if ($_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S6' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
        $tabvague = explode("V", $_SESSION['vague']);

        for ($i = 0; $i < count($tabvague); $i++) {
            $numvague = $tabvague[$i];
        }

        if ($numvague < 7) {
            $res = $cours->formationL1L2M1();
        } else {
            $res = $cours->formationMBAV7();
        }
    } else {
        //L3 M2 
        $res = $cours->formationL3M2();
    }
    foreach ($res as $resultat) {
            
      $lien = $resultat['CONTENU_MG'];

    }
    echo $lien;
}


?>



<?php ?>