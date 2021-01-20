<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['vague'])) {

    $vague = new Vague();
    $res = $vague->CountVague();
    $table = '<option selected disabled>...</option>';
    foreach ($res as $resultat) {
        $table .= '<option value="' . $resultat['CODE'] . '">' . $resultat['CODE'] . '</option>';
    }
    echo $table;
}


?>



<?php ?>