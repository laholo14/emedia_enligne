<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST["vague"])) {
    extract($_POST);
    $code = new Code();
    $code->setCode($vague);
    $code->create();    

    $datyfidiranaLicence = new Datyfidirana();  
    $datyfidiranaMaster = new Datyfidirana();

    $datyfidiranaLicence->setDiplome("LICENCE");
    $datyfidiranaLicence->setCode($vague);

    $datyfidiranaMaster->setDiplome("MASTER");
    $datyfidiranaMaster->setCode($vague);   

    $datyfidiranaLicence->create();
    $datyfidiranaMaster->create();
        
    echo "Tafiditra";
}

?>



<?php ?>