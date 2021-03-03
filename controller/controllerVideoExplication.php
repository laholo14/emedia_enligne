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
    $cours->setIdmatiere($idmatiere);
    if ($_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S6' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
        $tabvague = explode("V", $_SESSION['vague']);
        for ($i = 0; $i < count($tabvague); $i++) {
            $numvague = $tabvague[$i];
        }

        if ($numvague >= 7 and $_SESSION['diplome'] === 'MASTER') {
            $tableaucours = $cours->formationMBAV7Video();
        } else if ($numvague <= 7) {
            $tableaucours = $cours->formationL1L2M1Video();
        }
    } else {

        $tableaucours = $cours->formationL3M2();
    }

    foreach ($tableaucours as $resultat) {

        $lien = $resultat['CONTENU_FR'];
    }
    echo $lien;
}


?>



<?php ?>