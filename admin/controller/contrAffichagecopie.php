<?php

function loadclass($class)

{

  require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();

if (isset($_POST['matiere'], $_POST['session'], $_POST['etudiants']) ) {

  extract($_POST);
  $copie = new Resultat();
  $copie->setEtudiant($etudiants);
  $copie->setMatiere($matiere);
  $copie->setSessiondexam($session);
  $res = $copie->Afficherlescopie();
  $table = '';
  foreach ($res as $resultat) {
    $contenuTab = explode(";&+#$;", $resultat['REPONSE']);
    $contenuTabSize = sizeof($contenuTab); 
    $upload = $resultat['REPONSE'];
      for ($i = 0; $i < $contenuTabSize - 1; $i++) {
        $reponse = $contenuTab[$i];
        $question = $i + 1;
        $table .= '<div class="form-group">
     <textarea class="form-control" id="" readonly>' . $question . ')- ' . $reponse . '</textarea>
     </div>'; 
    }
  }
  if ($upload == '') {
    $table = 'reponse encore vide';
  }else{
    $table = $upload;
  }
  echo $table;
}


if(isset($_POST['diplome_ajax'],$_POST['filiere_ajax'],$_POST['vague_ajax'],$_POST['session_ajax'],$_POST['matiere_ajax'])){

  extract($_POST);
  extract($_POST);
  $suivre = new Suivre();
  $suivre->setDip($diplome_ajax);
  $suivre->setFiliere($filiere_ajax);
  $suivre->setCode($vague_ajax);
  $res = $suivre->ListEtudiantExam($matiere_ajax,$session_ajax);
  $table = '<table class="table table-border-danger table-striped">
  <thead>
    <tr>
      
      <th>Matricule</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Mail</th>
      <th>Copie</th>
      <th>Note</th>
      <th>ID</th>
  </thead>
  <tbody>';
  foreach($res as $resultat_res){
    if($resultat_res['NOTE'] == NULL){
      $note = '__';
    }else{ 
      $note = $resultat_res['NOTE'];
    }
    ?>
    <?php
    $table .= '<tr>

    
    <td>'.$resultat_res['MATRICULE'].'</td>
    <td>'.$resultat_res['NOM'].'</td>
    <td>'.$resultat_res['PRENOM'].'</td>
    <td>'.$resultat_res['MAIL'].'</td>

    <td><button type="button" class="btn btn-outline-dark affiche" data-toggle="modal" data-target="#modal_copie" onclick="GetAfficher('.$resultat_res['IDETUDIANTS'].',\''.$resultat_res['MATRICULE'].'\')">Afficher</button></td>
    <td class=""><button type="button" class="btn btn-outline-dark noter" onclick="GetNote('.$resultat_res['IDETUDIANTS'].',\''.$resultat_res['MATRICULE'].'\','.$resultat_res['NOTE'].')" data-toggle="modal" data-target="#modal_note">'.$note.'/20 <img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
    <td>'.$resultat_res['IDETUDIANTS'].'</td>

  </tr>';
  }
  $table .= '</tbody>
  </table>';
  echo $table;
  
}


if(isset($_POST['note'],$_POST['matiere_note'], $_POST['session_note'], $_POST['etudiants_note'])){
 extract($_POST);
  $noter = new Resultat();
  $noter->setNote($valeur_note);
  $noter->setEtudiant($etudiants_note);
  $noter->setSessiondexam($session_note);
  $noter->setMatiere($matiere_note);
  $noter->Noter();

  echo "ok";

}
?>