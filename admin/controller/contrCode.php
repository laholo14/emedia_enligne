<?php

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();


/*
if(isset($_POST['tabdate'])){
    $code = new Code($db->getCx());
    $table ='<div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Vague</th>
                <th>Date d\'entrée</th>
                <th>Modifier</th>
                
            </tr>
        </thead>';

    $res = $code->listVague();
    
    foreach($res as $resultat){
        if($resultat['DATEDENTER'] == ''){
            $date = 'NULL';
        }else{
           $date = $resultat['DATEDENTER'];
        }
        $table .='<tbody>
            <tr>
                <td class="col-2 text-center">'.$resultat['CODE'].'</td>
                <input type="hidden" id="code" value="'.$resultat['CODE'].'"/>
                <td class="col-8">'.$date.'</td>
                <td class="col-2" text-center><button data-toggle="modal" data-target="#UpdataDate" onclick="GetUser(\''.$resultat['CODE'].'\')" ><img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
                      
                </tr>
                
         </tbody>';
        }
        $table .= '</table></div>';
        echo $table;
    

}*/

if (isset($_POST['vagueup']) and isset($_POST['dateup'])) {

    extract($_POST);
    $code = new Code($db->getCx());
    $code->setDatedentrer($dateup);
    $code->setCode($vagueup);
    $code->update();
}

if (isset($_POST['vague'])) {

    extract($_POST);

    $code = new Code($db->getCx());
    $code->setCode($vague);
    $code->create();
}

if (isset($_POST['search'])) {
    extract($_POST);
    $code = new Code($db->getCx());
    $table = '<div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Vague</th>
                <th>Date d\'entrée</th>
                <th>Modifier</th>
                
            </tr>
        </thead>';

    $res = $code->search($search . "%");

    foreach ($res as $resultat) {
        if ($resultat['DATEDENTER'] == '') {
            $date = 'NULL';
        } else {
            $date = $resultat['DATEDENTER'];
        }
        $table .= '<tbody>
            <tr>
                <td class="col-2 text-center">' . $resultat['CODE'] . '</td>
                <input type="hidden" id="code" value="' . $resultat['CODE'] . '"/>
                <td class="col-8">' . $date . '</td>
                <td class="col-2" text-center><button data-toggle="modal" data-target="#UpdataDate" onclick="GetUser(\'' . $resultat['CODE'] . '\',\'' . $resultat['DATEDENTER'] . '\')" ><img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
                      
                </tr>
                
         </tbody>';
    }
    $table .= '</table></div>';
    echo $table;
}

?>

<?php

ob_end_flush();

?>