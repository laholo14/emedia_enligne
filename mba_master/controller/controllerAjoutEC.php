<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['text_ec'])) {

    extract($_POST);
    $ec = new Matiere();
    $ec->setId_matiere($select_ue);
    $ec->setIntitule($text_ec);
    $ec->create();
    $enseigner = new Enseigner();
    $enseigner->setMois($mois);
    $enseigner->setSemestre($semestre);
    foreach ($ec->readByIntitule() as $resultat) {
        $enseigner->setMatiere($resultat['IDMATIERE']);
    }
    echo $enseigner->create();
}


?>



<?php ?>