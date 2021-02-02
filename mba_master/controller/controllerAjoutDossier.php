<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['select_ec'])) {

    extract($_POST);
}


?>



<?php ?>