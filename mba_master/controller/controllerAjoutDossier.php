<?php
 
function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");
$dossier=new Dossier();
$mat=new Matiere();
if(isset($_POST['type']) and isset($_POST['elementConstitutif']) and isset($_POST['categorie']) and isset($_POST['lienVideoMg']) and isset($_POST['lienVideoFr']) and isset($_POST['lienAudioMg']) and isset($_POST['lienAudioFr'])) {

    extract($_POST);
    switch ($type) {
        case '2':
            $dossier->setType($type);
            $dossier->setMatiere($elementConstitutif);
            $dossier->setCategorie($categorie);
            $dossier->setContenu_fr($lienVideoFr);
            $dossier->setContenu_mg($lienVideoMg);
            echo $dossier->getType().$dossier->getMatiere().$dossier->getCategorie().$dossier->getContenu_fr().$dossier->getContenu_mg();
            break;
            case '3':
                $dossier->setType($type);
                $dossier->setMatiere($elementConstitutif);
                $dossier->setCategorie($categorie);
                $dossier->setContenu_fr($lienAudioFr);
                $dossier->setContenu_mg($lienAudioMg);
                echo $dossier->getType().$dossier->getMatiere().$dossier->getCategorie().$dossier->getContenu_fr().$dossier->getContenu_mg();
                break;
        
        default:
        $mat->setId_matiere($matiere);
        $res  = $mat->listMatiere_id();
        foreach ($res as $resultat) {
            $nomat = $resultat['INTITULE'];
        }
        $dossier->setType($type);
        $dossier->setMatiere($elementConstitutif);
        $dossier->setCategorie($categorie);

        echo $dossier->getType().$dossier->getMatiere().$dossier->getCategorie().$dossier->getContenu_fr().$dossier->getContenu_mg();
            break;
    }
}


?>



<?php ?>