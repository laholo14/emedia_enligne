<?php
 
function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");
$dossier=new Dossier();
if(isset($_POST['type']) and isset($_POST['elementConstitutif']) and isset($_POST['categorie'])) {

    extract($_POST);
    switch ($type) {
        case '2':
            if (isset($_POST['lienVideoMg']) and isset($_POST['lienVideoFr'])){
                extract($_POST);
                $dossier->setType($type);
                $dossier->setMatiere($elementConstitutif);
                $dossier->setCategorie($categorie);
                $dossier->setContenu_fr($lienVideoFr);
                $dossier->setContenu_mg($lienVideoMg);
                $dossier->create();
                echo "Success";
            }
            break;
        default:
            $mat=new Matiere();
            $mat->setId_matiere($elementConstitutif);
            $res  =$mat->readById();
            $nomat="tay";
            foreach ($res as $resultat) {
                $nomat = $resultat['INTITULE'];
            }
            $dossier->setMatiere($elementConstitutif);
            $dossier->setType($type);
            $dossier->setCategorie($categorie);
            $c1=$dossier->getCategorie();
            $chemin="../../Cours/";
            $countMG = count($_FILES['contenu_mg']['name']);
            $countFR = count($_FILES['contenu_fr']['name']);
    
            $Cmg = '';
            for ($i = 0; $i < $countMG; $i++){
                $part = $i + 1;
                $infos1[$i] = pathinfo($_FILES["contenu_mg"]["name"][$i]);
                $extension1[$i] = $infos1[$i]["extension"];
                move_uploaded_file($_FILES["contenu_mg"]["tmp_name"][$i],$chemin . $nomat . '_' . $c1 . '_MG_Part_' . $part . '.' . $extension1[$i]);
    
                $Cmg .= $nomat . '_' . $c1 . '_MG_Part_' . $part . '.' . $extension1[$i] . ',';
            }
    
            $Cfr = '';
            for ($j = 0; $j < $countFR; $j++) {
                $part = $j + 1;
                $infos2[$j] = pathinfo($_FILES["contenu_fr"]["name"][$j]);
                $extension2[$j] = $infos2[$j]["extension"];
                move_uploaded_file($_FILES["contenu_fr"]["tmp_name"][$j], $chemin . $nomat . '_' . $c1 . '_FR_Part_' . $part . '.' . $extension2[$j]);
    
                $Cfr .= $nomat . '_' . $c1 . '_FR_Part_' . $part . '.' . $extension2[$j] . ',';
            }
    
    
            $dossier->setContenu_mg($Cmg);
            $dossier->setContenu_fr($Cfr);
            $dossier->create();
            echo 'success';
        break;
}
}


?>



<?php ?>