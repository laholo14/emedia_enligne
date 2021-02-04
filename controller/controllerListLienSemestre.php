<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['iddaty'], $_POST['datyvalue'])) {
    extract($_POST);

}

?>



<?php ?>