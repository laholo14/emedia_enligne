<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['select_ue'])) {

    extract($_POST);
    $ue = new UE();
    $table ='<option selected disabled>...</option>';
    foreach($ue->readAll() as $resultat){
        $table .= '
                    <option value='.$resultat['IDUE'].'>'.$resultat['INTITULEUE'].'</option>';
    }
    echo $table;
}


?>



<?php ?>