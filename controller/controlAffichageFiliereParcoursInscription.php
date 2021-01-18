<?php 


function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();

$fildb = new Filiere();


//filiere
if(isset($_POST['obtenir'])){

    extract($_POST);

    $table = '<option selected disabled>Choisissez ici</option>';

    $fildb->setDiplome($obtenir);

    $res = $fildb->read();

    foreach($res as $resultat){
        $table .='<option value="'.$resultat['FILIERE'].'">'.$resultat['NOMFILIERE'].'</option>';
    }
     
    echo $table;
}


//parcours
if(isset($_POST['filiere'])){

    extract($_POST);

    $table = '<option selected disabled>Choisissez ici</option>';

    $fildb->setFiliere($filiere);

    $res = $fildb->readP();

    foreach($res as $resultat){
        $table .='<option value="'.$resultat['PARCOURS'].'">'.$resultat['NOMPARCOURS'].'</option>';
    }
     
    echo $table;
}

?> 
