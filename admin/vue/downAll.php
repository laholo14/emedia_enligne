<?php
ob_start();

session_start();

require_once("../../model/Connexion.class.php");
require_once("../dompdf/autoload.inc.php");
require_once("../../model/Resultat.class.php");

$db = new Connexion();

use Dompdf\Dompdf;



if (isset($_POST['down_all'])) {
    if (isset($_POST['filiere_exam']) and isset($_POST['vague_exam']) and isset($_POST['session']) and isset($_POST['matiere'])) {
        extract($_POST);
        $copieAll = new Resultat();
        $resAll = $copieAll->Download($filiere_exam, $vague_exam, $session, $matiere);
        $count = count($resAll);
        if ($session == 1) {
            $titre_session = 'Mensuel';
        } else {
            $titre_session = 'Semestriel';
        }
        foreach ($resAll as $resultatAll) {
            $nomatTab = explode(' ', $resultatAll['INTITULE']);
            $count = count($nomatTab);
            $titre_matiere = '';
            for ($i = 0; $i < $count; $i++) {
                $content_nomatTab = $nomatTab[$i];
                $titre_matiere .=  $content_nomatTab . '_';
            }
            $verifyTab = explode(";&+#$;", $resultatAll['REPONSE']);
            if (count($verifyTab) != 1) {
                $copie = new Resultat();
                $copie->setEtudiant($resultatAll['IDETUDIANTS']);
                $copie->setMatiere($resultatAll['IDMATIERE']);
                $copie->setSessiondexam($resultatAll['IDSESSIONDEXAM']);
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




                $matriculetab = explode('/', $resultatAll['MATRICULE']);
                $countmat = count($matriculetab);
                $titre_matricule = '';

                for ($i = 0; $i < $countmat; $i++) {
                    $content_matricule = $matriculetab[$i];
                    $titre_matricule .= $content_matricule . '_';
                }


                $dompdf = new Dompdf();
                $dompdf->loadHtml($pdf);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                //$dompdf->stream($titre_matricule . '_' . $titre_matiere . '_' . $session);

                file_put_contents("pdfexam/" . $titre_matricule . '_' . $titre_matiere . '_' . $titre_session . ".pdf", $dompdf->output());

                $zip = new ZipArchive();

                if ($zip->open("pdfexam/" . $filiere_exam . '_' . $vague_exam . '_' . $titre_matiere . '_' . $titre_session . '.zip', ZipArchive::CREATE) === true) {

                    $zip->addFile("pdfexam/" . $titre_matricule . '_' . $titre_matiere . '_' . $titre_session . ".pdf");
                    $zip->close();
                    
                    
                }
                $file = "pdfexam/" . $filiere_exam . '_' . $vague_exam . '_' . $titre_matiere . '_' . $titre_session . '.zip';
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Content-Type: application/zip");
                header("Content-Type: application/force-download");
                header("Content-Type: application/octet-stream");
                header("Content-Type: application/download");
                header("Content-Disposition: attachment; filename=" . basename($file) . ";");
                header("Content-Transfer-Encoding: binary");
               // header("Content-Length: " . filesize($file));
               
                readfile($file);

              @unlink("pdfexam/" . $titre_matricule . '_' . $titre_matiere . '_' . $titre_session . ".pdf");
              
            } else {
                $zip = new ZipArchive();

                if ($zip->open("pdfexam/" . $filiere_exam . '_' . $vague_exam . '_' . $titre_matiere . '_' . $titre_session . '.zip', ZipArchive::CREATE) === true) {

                    // Ajout d’un fichier.
                    $copie = new Resultat();
                    $copie->setEtudiant($resultatAll['IDETUDIANTS']);
                    $copie->setMatiere($resultatAll['IDMATIERE']);
                    $copie->setSessiondexam($resultatAll['IDSESSIONDEXAM']);
                    $res = $copie->Afficherlescopie();
                    foreach ($res as $resultat) {
                        $zip->addFile("../Resultat/".$resultat['REPONSE']);
                    }

                    $zip->close();
                }
                $file = "pdfexam/" . $filiere_exam . '_' . $vague_exam . '_' . $titre_matiere . '_' . $titre_session . '.zip';
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Content-Type: application/zip");
                header("Content-Type: application/force-download");
                header("Content-Type: application/octet-stream");
                header("Content-Type: application/download");
                header("Content-Disposition: attachment; filename=" . basename($file) . ";");
                header("Content-Transfer-Encoding: binary");
               // header("Content-Length: " . filesize($file));
               
                readfile($file);
                
            }
        }@unlink($file);
    }
}

?>

<?php

ob_end_flush();

?>