<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();



if (isset($_POST['type_exam_reponse'],$_POST['id_matiere_reponse'], $_POST['session_exam_reponse'])){
    extract($_POST);
     $mat = new Matiere();
    $mat->setId_matiere($id_matiere_reponse);
    $res  = $mat->listMatiere_id();
    foreach ($res as $resultat) {
        $nomat = $resultat['INTITULE'];
    }
    $exam = new Exam();
    $exam->setSessiondexam($session_exam_reponse);
    $exam->setMatiere($id_matiere_reponse);
    $exam->setTypedexam($type_exam_reponse);
    $res = $exam->listexam_format();
    foreach ($res as $resultat) {
        $sujet = explode('/;', $resultat['SUJET']);
        $sujetSize = sizeof($sujet);
    }
    $reponse = new Resultat();
    $reponse->setEtudiant($id_etudiants);
    $reponse->setSessiondexam($session_exam_reponse);
    $reponse->setMatiere($id_matiere_reponse);

    $contenuReponse = '';
    for ($i = 0; $i < $sujetSize; $i++) {
        $index = $i + 1;
        $reponsetab = $_POST['reponse' . $index];
        $contenuReponse .= $index . ('-') . $reponsetab  . ';&+#$;';
    }
    
    $reponse->setReponse($contenuReponse);
    $reponse->InsertReponse();
    


     // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $expediteur = 'servicetechnique@e-media.mg';
            //$copie = 'adresse@fai.com';
            //$copie_cachee = 'adresse@fai.com';
            $objet = 'Envoi réussi'; // Objet du message
            $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
            $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
            $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
            $headers .= 'From: "E-media"<' . $expediteur . '>' . "\n"; // Expediteur
            $headers .= 'Delivered-to: ' . $mail_etudiants . "\n"; // Destinataire
            //$headers .= 'Cc: '.$copie."\n"; // Copie Cc
            //$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
            $message = '<div style="width: 100%; text-align: center; font-weight: bold">Bonjour...<br>Vos réponses ont été bien reçu</div> <br> <br>
             <div>
             <form action="e-media.mg/universite/" method="posts">
              <div>
              <table>
              <tr>  
              <td><b>Matière: </b> ' . $nomat . '</td>
              </tr>
             
              <tr>
              <td><b>Envoie: </b> Réussi</td>
              </tr>
              <td><b>Veuillez vérifier en cliquant sur la vérification dans le plateforme</b></td>
              <br>
              </table>
              </div></form></div> ';
            if (mail($mail_etudiants, $objet, $message, $headers)) // Envoi du message
            {
                echo 'Votre message a bien été envoyé ';
            } else // Non envoy
            {
                echo "Votre message n'a pas pu être envoyé";
            }
    header("location:../Examen");

    //verifymarinaqcm
/*
    $verify = new Exam();
    $verify->setSessiondexam($session_exam_reponse);
    $verify->setMatiere($id_matiere_reponse);
    $verify->setTypedexam($type_exam_reponse);
    $res = $verify->list
     */

    $res2 = $exam->listexam_format();
    foreach($res2 as $resulat){
        
    }

} else{
        // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $expediteur = 'servicetechnique@e-media.mg';
            //$copie = 'adresse@fai.com';
            //$copie_cachee = 'adresse@fai.com';
            $objet = 'Envoi échoué'; // Objet du message
            $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
            $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
            $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
            $headers .= 'From: "E-media"<' . $expediteur . '>' . "\n"; // Expediteur
            $headers .= 'Delivered-to: ' . $mail_etudiants . "\n"; // Destinataire
            //$headers .= 'Cc: '.$copie."\n"; // Copie Cc
            //$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
            $message = '<div style="width: 100%; text-align: center; font-weight: bold">Bonjour...<br>Vos réponses n\'ont pas été bien envoyé</div> <br> <br>
             <div>
             <form action="e-media.mg/universite/" method="posts">
              <div>
              <table>
              <tr>
              <td><b>Envoi: </b> Echec</td>
              </tr>
              <tr>  
              <td><b>Veuillez vérifier en cliquant sur la vérification dans le plateforme</b></td>
              </tr>
              <br>
              </table>
              </div></form></div> ';
            if (mail($mail_etudiants, $objet, $message, $headers)) // Envoi du message
            {
                echo 'Votre message a bien été envoyé ';
            } else // Non envoy
            {
                echo "Votre message n'a pas pu être envoyé";
            }
            header("location:../Examen");
    
    
}




?>

<?php

ob_end_flush();

?>