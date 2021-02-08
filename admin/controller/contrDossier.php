<?php 

ob_start();

session_start();

function loadclass($class){
  
    require "../../model/".$class.'.class.php';
  }

  spl_autoload_register("loadclass");

$db = new Connexion();
$dossier = new Dossier();
$mat = new Matiere();


if (isset($_POST['matiere']) and isset($_POST['categorie']) and isset($_POST['type']) and isset($_POST['youtube_mg']) and isset($_POST['youtube_fr'])) {

    extract($_POST);

    $mat->setId_matiere($matiere);
    $res  = $mat->listMatiere_id();
    foreach ($res as $resultat) {
        $nomat = $resultat['INTITULE'];
    }
    $dossier->setMatiere($matiere);
    $dossier->setCategorie($categorie);
    $dossier->setType($type);



    if (!empty($youtube_mg) and !empty($youtube_fr)) {

        $dossier->setContenu_mg($youtube_mg);
        $dossier->setContenu_fr($youtube_fr);
    } else {

        if ($categorie == 1) {
            $c1 = 'Cours';
        } else if ($categorie == 2) {
            $c1 = 'Exercice';
        } else if ($categorie == 3) {
            $c1 = 'Corrige';
        } else {
            $c1 = '';
        }

        $countMG = count($_FILES['contenu_mg']['name']);
        $countFR = count($_FILES['contenu_fr']['name']);

        $Cmg = '';
        for ($i = 0; $i < $countMG; $i++) {
            $part = $i + 1;
            // $filenameMg = $_FILES['contenu_mg']['name'][$i];
            $infos1[$i] = pathinfo($_FILES["contenu_mg"]["name"][$i]);
            $extension1[$i] = $infos1[$i]["extension"];
            move_uploaded_file($_FILES["contenu_mg"]["tmp_name"][$i], "../../Cours/" . $nomat . '_' . $c1 . '_MG_Part_' . $part . '.' . $extension1[$i]);

            $Cmg .= $nomat . '_' . $c1 . '_MG_Part_' . $part . '.' . $extension1[$i] . ',';
        }

        $Cfr = '';
        for ($j = 0; $j < $countFR; $j++) {
            $part = $j + 1;
            $infos2[$j] = pathinfo($_FILES["contenu_fr"]["name"][$j]);
            $extension2[$j] = $infos2[$j]["extension"];
            move_uploaded_file($_FILES["contenu_fr"]["tmp_name"][$j], "../../Cours/" . $nomat . '_' . $c1 . '_FR_Part_' . $part . '.' . $extension2[$j]);

            $Cfr .= $nomat . '_' . $c1 . '_FR_Part_' . $part . '.' . $extension2[$j] . ',';
        }


        $dossier->setContenu_mg($Cmg);
        $dossier->setContenu_fr($Cfr);
    }


    $dossier->create();

    echo 'success';
}

/*else 
{
echo "tsy ao";
}*/


if (isset($_POST['tabdoc'])) {
    $table =
    ' <div class="table-responsive mt-3">
        <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th class="text-center">Intitulé</th>
                <th class="text-center">Categorie</th>
                <th class="text-center">Type</th>
                <th class="text-center">Contenue MG</th>
                <th class="text-center">Contenue FR</th>
                <th class="text-center">Modifier</th>
                

        </thead>';

    $res = $dossier->listDossier();

    foreach ($res as $resultat) {
        $table .= '<tbody>
            <tr>
                <td class="text-center">' . $resultat['INTITULE'] . '</td>
                <td class="text-center">' . $resultat['CATEGORIE'] . '</td>
                <td class="text-center">' . $resultat['TYPE'] . '</td>
                <td class="text-center">' . $resultat['CONTENU_MG'] . '</td>
                <td class="text-center">' . $resultat['CONTENU_FR'] . '</td>
                <td class="text-cente"> <button class="edit" data-toggle="modal" data-target="#Updata" onclick="GetUser(' . $resultat['IDMATIERE'] .','.$resultat['IDCATEGORIE'].','.$resultat['IDTYPE']. ')"><img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
            </tr>
         </tbody>';
    }
    $table .= '</table>';
    echo $table;
}



if (isset($_POST['search'])) {

    extract($_POST);


    $table =
        ' <div class="table-responsive mt-3">
        <table class="table table-border-danger table-striped">
        <thead>
            <tr>
               <th>EC</th>
                <th class="">Categorie</th>
                <th class="">Type</th>
                <th class="">Contenue MG</th>
                <th class="">Contenue FR</th>
                <th class="">Modifier</th>
                

        </thead>';

    $res = $dossier->search($search . "%");

    foreach ($res as $resultat) {
        $table .= '<tbody>
            <tr>
                <td class="">' . $resultat['INTITULE'] . '</td>
                <td class="">' . $resultat['CATEGORIE'] . '</td>
                <td class="">' . $resultat['TYPE'] . '</td>
                <td class="" style="width:20px !important;">' . $resultat['CONTENU_MG'] . '</td>
                <td class="">' . $resultat['CONTENU_FR'] . '</td>
                <td class=""> <button class="edit" data-toggle="modal" data-target="#Updata" onclick="GetUser(' . $resultat['IDMATIERE'] . ',' . $resultat['IDCATEGORIE'] . ',' . $resultat['IDTYPE'] . ')"><img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
            </tr>
         </tbody>';
    }
    $table .= '</table>';
    echo $table;
}

if (isset($_POST['action']) and isset($_POST['idm']) and isset($_POST['idc']) and isset($_POST['idt'])) {

    extract($_POST);
    if ($_POST["action"] == "update") {
        $doc = new Dossier();
        $res = $doc->listDossier_ID($idm, $idc, $idt);

        foreach ($res as $row) {
            $output['matiere'] = $row['INTITULE'];
            $output['categorie'] = $row['CATEGORIE'];
            $output['type'] = $row['TYPE'];
            $output['contenu_mg'] = $row['CONTENU_MG'];
            $output['contenu_fr'] = $row['CONTENU_FR'];
        }

        echo json_encode($output);
    }
}


if (isset($_POST['matiereup']) and isset($_POST['categorieup']) and isset($_POST['typeup'])) {

    extract($_POST);
    $matup = new Matiere();
    $matup->setId_matiere($matiereup);
    $res  = $matup->listMatiere_id();
    foreach ($res as $resultat) {
        $nomat = $resultat['INTITULE'];
    }

    $dossierup->setMatiere($matiereup);
    $dossierup->setCategorie($categorieup);
    $dossierup->setType($typeup);



    if (!empty($youtube_mgup) and !empty($youtube_frup)) {

        $dossierup->setContenu_mg($youtube_mgup);
        $dossierup->setContenu_fr($youtube_frup);
    } else {

        if ($categorieup == 1) {
            $c = 'Cours';
        } else if ($categorieup == 2) {
            $c = 'Exercice';
        } else if ($categorieup == 3) {
            $c = 'Corrige';
        } else {
            $c = '';
        }

        $countMG = count($_FILES['contenu_mgup']['name']);
        $countFR = count($_FILES['contenu_frup']['name']);

        $Cmg = '';
        for ($i = 0; $i < $countMG; $i++) {
            $part = $i + 1;
            // $filenameMg = $_FILES['contenu_mg']['name'][$i];
            $infos1[$i] = pathinfo($_FILES["contenu_mgup"]["name"][$i]);
            $extension1[$i] = $infos1[$i]["extension"];
            move_uploaded_file($_FILES["contenu_mgup"]["tmp_name"][$i], "../../Cours/" . $nomat . '_' . $c . '_MG_Part_' . $part . '.' . $extension1[$i]);

            $Cmg .= $nomat . '_' . $c . '_MG_Part_' . $part . '.' . $extension1[$i] . ',';
        }

        $Cfr = '';
        for ($j = 0; $j < $countFR; $j++) {
            $part = $j + 1;
            $infos2[$j] = pathinfo($_FILES["contenu_frup"]["name"][$j]);
            $extension2[$j] = $infos2[$j]["extension"];
            move_uploaded_file($_FILES["contenu_frup"]["tmp_name"][$j], "../../Cours/" . $nomat . '_' . $c . '_FR_Part_' . $part . '.' . $extension2[$j]);

            $Cfr .= $nomat . '_' . $c . '_FR_Part_' . $part . '.' . $extension2[$j] . ',';
        }


        $dossierup->setContenu_mg($Cmg);
        $dossierup->setContenu_fr($Cfr);
    }


    $dossierup->update();

    echo 'success';
}



ob_end_flush();
?>