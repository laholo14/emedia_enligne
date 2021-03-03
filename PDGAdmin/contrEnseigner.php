<?php
ob_start();

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}
  
spl_autoload_register("loadclass");

extract($_POST);



$enseigner = new Enseigner();

if (isset($_POST['parcours']) and isset($_POST['semestre']) and isset($_POST['matiere']) and isset($_POST['prof']) and isset($_POST['mois'])) {

    extract($_POST);

    $insert = new Enseigner();
  //  $verify = new Enseigner();

   // $verify->setMatiere($matiere);
   // $res = $verify->verify();
    //foreach ($res as $resultat) {
      //  $count = $resultat['COUNT(*)'];
    //}

    //if ($count == 0) {
        $insert->setParcours($parcours);
        $insert->setSemestre($semestre);
        $insert->setMatiere($matiere);
        $insert->setProf($prof);
        $insert->setMois($mois);

        $insert->create();
        echo "success";
    //} else {
      //  echo "efa ao io";
    //}
}



if (isset($_POST['LICENCE']) and isset($_POST['TIC']) and isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($TIC);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}

if (isset($_POST['LICENCE']) and isset($_POST['CAN']) and isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($CAN);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}

if (isset($_POST['LICENCE']) and isset($_POST['MPJ']) and isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($MPJ);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}

if (isset($_POST['LICENCE']) and isset($_POST['DRT']) and isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($DRT);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['LICENCE']) and isset($_POST['MGT']) and isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($MGT);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['MASTER']) and isset($_POST['TICM']) and isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($TICM);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}

if (isset($_POST['MASTER']) and isset($_POST['AC']) and isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($AC);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['MASTER']) and isset($_POST['MPJM']) and isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($MPJM);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['MASTER']) and isset($_POST['MBA']) and isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($MBA);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}



if (isset($_POST['MASTER']) and isset($_POST['DRTM'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Mention</th>
                <th>Parcours</th>
                <th>Semestre</th>
                <th>Mois</th>
                <th>EC</th>
                <th>Prof</th>
                
                
            </tr>
        </thead>';

    // $enseigner->setDip($LICENCE);
    $enseigner->setParcours($DRTM);
    $res1 = $enseigner->listEnseigner($search . '%');

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['SEMESTRE'] . '</td>
        <td>' . $resultat['MOIS'] . '</td>
        <td>' . $resultat['INTITULE'] . '</td>
        <td>' . $resultat['NOM'] . '</td>
       
        
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}

if (isset($_POST['action'])) {
    if ($_POST["action"] == "update") {
        $requete = $base->prepare("select * FROM ENSEIGNER NATURAL JOIN PARCOURS NATURAL JOIN MATIERE NATURAL JOIN PROF   where IDMATIERE = '" . $_POST["id"] . "' AND PARCOURS = '".$_POST["parcourspar"]."' ");
        $requete->execute();
        $res = $requete->fetchAll();

        foreach ($res as $row) {
            $output['matiere'] = $row['INTITULE'];
            $output['parcours'] = $row['NOMPARCOURS'];
            $output['semestre'] = $row['SEMESTRE'];
            $output['prof'] = $row['IDPROF'];
            $output['mois'] = $row['MOIS'];
        }

        echo json_encode($output);
    }
}

if (isset($_POST['parcoursup']) and isset($_POST['semestreup']) and isset($_POST['matiereup']) and isset($_POST['profup']) and isset($_POST['moisup'])) {

    extract($_POST);
    $enseignerup = new Enseigner();
    $enseignerup->setParcours($parcoursup);
    $enseignerup->setSemestre($semestreup);
    $enseignerup->setProf($profup);
    $enseignerup->setMatiere($matiereup);
    $enseignerup->setMois($moisup);
    $enseignerup->update();

    echo "success";
}

/*
if(isset($_POST['idmsup']) and isset($_POST['idpsup']) and isset($_POST['idssup'])){

    extract($_POST);

    $sup = new Enseigner();

    $sup->setMatiere($idmsup);
    $sup->setParcours($idpsup);
    $sup->setSemestre($idsup);
    $sup->delete();
}
*/



?>

<?php

ob_end_flush();

?>