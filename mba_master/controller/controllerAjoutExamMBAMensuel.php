<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");




?>



<?php ?>