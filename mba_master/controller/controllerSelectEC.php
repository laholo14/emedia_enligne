<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['select_ec'])) {

    extract($_POST);
    $ec = new Matiere();
    $table ='<option selected disabled>...</option>';
    foreach($ec->readAll() as $resultat){
        $table .= '
                    <option value='.$resultat['IDMATIERE'].'>'.$resultat['INTITULE'].'</option>';
    }
    echo $table;
}


?>



<?php ?>