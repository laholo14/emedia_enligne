<?php
ob_start();

session_start();

require_once("../model/Connexion.class.php");
require_once("../../dompdf/autoload.inc.php");
require_once("../model/Resultat.class.php");

$db = new Connexion();

use Dompdf\Dompdf;



if (isset($_POST['down_word'])) {
  if (isset($_POST['id_et']) and isset($_POST['id_session']) and isset($_POST['id_matiere'])) {
    extract($_POST);
    $copie = new Resultat($db->getCx());
    $copie->setEtudiant($id_et);
    $copie->setMatiere($id_matiere);
    $copie->setSessiondexam($id_session);
    $res = $copie->Afficherlescopie();
    foreach ($res as $resultat) {
      $nomat = $resultat['INTITULE'];
      $contenuTab = explode(";&+#$;", $resultat['REPONSE']);
      $contenuTabSize = sizeof($contenuTab);
      $table = '';
      for ($i = 0; $i < $contenuTabSize - 1; $i++) {
        $reponse = $contenuTab[$i];
        $question = $i + 1;
        $table .= $question . ')-' . $reponse . '<br><br><br>';
      }
    }
    $pdf = $table;


    $nomatTab = explode(' ', $nomat);
    $count = count($nomatTab);
    $titre_matiere = '';
    for ($i = 0; $i < $count; $i++) {
      $content_nomatTab = $nomatTab[$i];
      $titre_matiere .=  $content_nomatTab . '_';
    }

    $matriculetab = explode('/', $matricule);
    $countmat = count($matriculetab);
    $titre_matricule = '';

    for ($i = 0; $i <$countmat ; $i++) {
      $content_matricule = $matriculetab[$i];
      $titre_matricule .= $content_matricule . '_';
    }

    if($id_session == 1){
      $session = 'Mensuel';
    }else{
      $session = 'Semestriel';
    }

    $dompdf = new Dompdf();
    $dompdf->loadHtml($pdf);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($titre_matricule.'_'.$titre_matiere.'_'.$session);

    file_put_contents("hh",$dompdf->output());

    
  }
}




?>

<?php

ob_end_flush();

?>