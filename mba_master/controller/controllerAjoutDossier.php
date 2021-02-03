<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");
if(isset($_POST['type']) and isset($_POST['elementConstitutif'])) {

    extract($_POST);
    switch ($type) {
        case '2':
            $dossier=new Dossier();
            $dossier->setType($type);
            $dossier->setContenu_fr($type);
            $dossier->setContenu_mg($type);
            $dossier($type);
            break;
            case '3':
                echo 'audio';
                break;
        
        default:
            echo 'pdf';
            break;
    }
}


?>



<?php ?>