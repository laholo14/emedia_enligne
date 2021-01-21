<?php


ob_start();


session_start();

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();
$datefr = new DateFr();
$message=new Message();


/**Ajouter Message */
if (isset($_POST['message']) && isset($_POST['id'])) {
    $message->setMESSAGE($_POST['message']);
    $message->setIDETUDIANT($_POST['id']);
    $message->setDIPLOME($_POST['diplomeEtudiant']);
    $message->setFILIERE($_POST['filiereEtudiant']);
    $message->setVAGUE($_POST['vagueEtudiant']);
    $message->setREPONSE('');
    $message->Insert();
}



/**Affiche message etudiant */
if (isset($_POST['idetudiant']) && isset($_POST['readMessage'])) {
    $idEtudiant = $_POST['idetudiant'];
    $rows = $message->AfficheMessage($idEtudiant);
    foreach ($rows as $resultat) {
        $message = '
        <div class="col-sm-12 col-md-12 col-lg-12 mb-1 mt-2">
         <div class="message_envoyer">
         <div class="col-sm-12 col-md-12">
        <span class="text">' . $resultat['MESSAGE'] . '</span>
        </div>
        </div>
        </div>
      ';
        if ($resultat['MESSAGE'] != "" && $resultat['REPONSE'] != "") {
            $message .= '
          <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
          <div class="reponse">
          <img src="vue/image/logoE-media.png" width="50px" class="docteur" height="30px"/>
          <span class="text-dark">' . $resultat['REPONSE'] . '</span>
          </div>
          </div>
          ';
        } else {
            $message .= '<p class="text-center ">....</p>';
        }
        echo $message;
    }
}

/**Affiche message admin */

if (isset($_POST['messTous'])) {
    $table = '<table class="table table-border-danger table-striped">
    <thead class="header">
     <tr>
     <th>Date</th>
     <th>Niveau</th>
     <th>Filiere</th>
     <th>Vague</th>
     <th>Message</th>
     <th>Reponse</th>
     <th>Repondre</th>
     </tr> 
     </thead>
  ';
    $res = $message->Affiche();
    foreach ($res as $resultat) {
        if ($resultat['REPONSE'] == "") {
            $table .= '
          <tr class="">
          <td>' . $datefr->dateToFrench($resultat['DATY'],"l j F Y à H:i") . '</td>
          <td>' . $resultat['DIPLOME'] . '</td>
          <td>' . $resultat['FILIERE'] . '</td>
          <td>' . $resultat['VAGUE'] . '</td>
          <td>' . $resultat['MESSAGE'] . '</td>
          <td>' . $resultat['REPONSE'] . '</td>
          <td> <button class="btn  btn-success btn-sm" data-toggle="modal" data-target="#Updata" onclick="GetUser(' . $resultat['IDMESSAGE'] . ','.$resultat['IDETUDIANT'].')">Repondre</button> </td>
          </tr>
         ';
        }
    }
    $table .= '</table>';
    echo $table;
}


/**Affiche id message */
if (isset($_POST['Upid']) && isset($_POST['Upid']) != "") {
    $upID = $_POST['Upid'];
    $res = $message->AfficheIdOne($upID);
    $row = array();
    foreach ($res as $resultat) {
        $row = $resultat;
    }
    echo json_encode($row);
}
  

/**Reponse message */
if (isset($_POST['idM']) && isset($_POST['reponse'])) {
    $idM = $_POST['idM'];
    $reponse = $_POST['reponse'];
    $message->update($reponse, $idM);
    echo "Reponse avec succes";
}
   

if(isset($_POST['messTousEtudiant']) && isset($_POST['id'])!=""){
    $idEtudiant = $_POST['id'];
    $rows = $message->AfficheMessage($idEtudiant);
    foreach ($rows as $resultat) {
        $message = '
        <div class="col-sm-12 col-md-12 col-lg-12 mb-1 mt-2">
         <div class="message_envoyer">
         <div class="col-sm-12 col-md-12">
        <span class="text-dark">' . $resultat['MESSAGE'] . '</span>
        </div>
        </div>
        </div>
      ';
        if ($resultat['MESSAGE'] != "" && $resultat['REPONSE'] != "") {
            $message .= '
          <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
          <div class="reponse_align">
          <div class="reponse">
          <span class="text-white">' . $resultat['REPONSE'] . '</span>
          </div>
          <img src="../vue/image/logoE-media.png" width="50px" class="docteur" height="30px"/>
          </div>
          </div>
          ';
        } else {
            $message .= '<p class="text-center ">....</p>';
        }
        echo $message;
    }
}
?>
