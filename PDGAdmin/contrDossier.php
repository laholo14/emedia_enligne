<?php

ob_start();

session_start();

function loadclass($class){
  
    require "../model/".$class.'.class.php';
  }

  spl_autoload_register("loadclass");



if (isset($_POST['tabdoc'])) {
    $dossier = new Dossier();
    $table =
    ' <div class="table-responsive mt-3">
        <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th class="">Intitulé</th>
                <th class="">Categorie</th>
                <th class="">Type</th>
                <th class="">Contenue MG</th>
                <th class="">Contenue FR</th>
               
                

        </thead>';

    $res = $dossier->listDossier();

    foreach ($res as $resultat) {
        $table .= '<tbody>
            <tr>
                <td class="">' . $resultat['INTITULE'] . '</td>
                <td class="">' . $resultat['CATEGORIE'] . '</td>
                <td class="">' . $resultat['TYPE'] . '</td>
                <td class="">' . $resultat['CONTENU_MG'] . '</td>
                <td class="">' . $resultat['CONTENU_FR'] . '</td>
               
            </tr>
         </tbody>';
    }
    $table .= '</table>';
    echo $table;
}



if (isset($_POST['search'])) {

    extract($_POST);

    $dossier = new Dossier();

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
    $doc = new Dossier();
    if ($_POST["action"] == "update") {

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

    $dossierup = new Dossier();
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
            move_uploaded_file($_FILES["contenu_mgup"]["tmp_name"][$i], "../Cours/" . $nomat . '_' . $c . '_MG_Part_' . $part . '.' . $extension1[$i]);

            $Cmg .= $nomat . '_' . $c . '_MG_Part_' . $part . '.' . $extension1[$i] . ',';
        }

        $Cfr = '';
        for ($j = 0; $j < $countFR; $j++) {
            $part = $j + 1;
            $infos2[$j] = pathinfo($_FILES["contenu_frup"]["name"][$j]);
            $extension2[$j] = $infos2[$j]["extension"];
            move_uploaded_file($_FILES["contenu_frup"]["tmp_name"][$j], "../Cours/" . $nomat . '_' . $c . '_FR_Part_' . $part . '.' . $extension2[$j]);

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