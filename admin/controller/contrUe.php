<?php

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();
$ue=new UE();

if (isset($_POST['search'])) {

extract($_POST);

$table = ' <div class="table-responsive mt-3">
<table class="table table-border-danger table-striped">
    <thead>
        <tr class="col-md-12">
            <th>Numéro</th>
            <th class="col-8">Intitulé</th>
            <th>Modifier</th>
            
        </tr>
    </thead>';

$res = $ue->search($search . '%');

foreach ($res as $resultat) {
    $table .= '<tbody>
        <tr class="col-md-12">
            <td>' . $resultat['IDUE'] . '</td>
            <td>' . $resultat['INTITULEUE'] . '</td>
            <td> <button class="btn btn-outline-primary edit" data-toggle="modal" data-target="#Updata" onclick="GetUser(' . $resultat['IDUE'] . ')"><img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
        </tr>
     </tbody>';
}
$table .= '</table>';
echo $table;
}
//update
if (isset($_POST['action']) and isset($_POST['id'])) {

    extract($_POST);

    if ($_POST["action"] == "update") {

        $ue->setIdue($id);

        $res = $ue->listUe_id();

        foreach ($res as $row) {
            $output['ue'] = $row['INTITULEUE'];
        }

        echo json_encode($output);
    }
}
if (isset($_POST['intituleup'])) {

    extract($_POST);
    $ue->setIdue($idue);
    $ue->setIntituleue($intituleup);
    $ue->update();
}
?>

<?php



?>