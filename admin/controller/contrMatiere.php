<?php

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();

$matiere = new Matiere();
$ue=new UE();
/*if(isset($_POST['tabmat'])){

    $table =' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th class="col-2 text-center" style="display:none;">Nuéro</th>
                <th class="col-8 text-center">Intitulé</th>
                <th class="col-2 text-center">Modifier</th>
                
            </tr>
        </thead>';

    $res = $matiere->listMatiere();
    
    foreach($res as $resultat){
        $table .='<tbody>
            <tr>
                <td class="col-2 text-center">'.$resultat['IDMATIERE'].'</td>
                <td class="col-8">'.$resultat['INTITULE'].'</td>
                <td class="col-2" text-center> <button class="" data-toggle="modal" data-target="#Updata" onclick="GetUser('.$resultat['IDMATIERE'].')"><img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
            </tr>
         </tbody>';
        }
        $table .= '</table>';
        echo $table;
}*/

if (isset($_POST['search'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr class="col-md-12">
                <th>Numéro</th>
                <th class="col-4">Intitulé</th>
                <th class="col-4">Unité d\'enseignement</th>
                <th>Modifier</th>
                
            </tr>
        </thead>';

    $res = $matiere->search($search . '%');

    foreach ($res as $resultat) {
        $ue->setIdue($resultat['IDUE']);
        $res1=$ue->readById();
        foreach($res1 as $resultat1){
            $table .= '<tbody>
                <tr class="col-md-12">
                    <td>' . $resultat['IDMATIERE'] . '</td>
                    <td>' . $resultat['INTITULE'] . '</td>
                    <td>' . $resultat1['INTITULEUE'] . '</td>
                    <td> <button class="btn btn-outline-primary edit" data-toggle="modal" data-target="#Updata" onclick="GetUser(' . $resultat['IDMATIERE'] . ')"><img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
                </tr>
            </tbody>';
        }
    }
    $table .= '</table></div>';
    echo $table;
}


//update
if (isset($_POST['action']) and isset($_POST['id'])) {

    extract($_POST);

    if ($_POST["action"] == "update") {

        $matiere->setId_matiere($id);

        $res = $matiere->listMatiere_id();

        foreach ($res as $row) {
            $output['ue']=$row['IDUE'];
            $output['matiere'] = $row['INTITULE'];
        }

        echo json_encode($output);
    }
}


if (isset($_POST['intituleup']) and isset($_POST['idup']) and isset($_POST['upidue'])) {

    extract($_POST);

    $matiere->setIntitule($intituleup);
    $matiere->setId_matiere($idup);
    $matiere->setIdUe($upidue);
    $matiere->update();
}
?>

<?php



?>