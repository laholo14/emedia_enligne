<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");




if (isset($_FILES["reponse_file"])) {
    if (!empty($_POST['nom_file'])) {

        extract($_POST);

        //echo $id_et_upload.'<br>'.$mail_et_upload.'<br>';


        $reponse = new Resultat();
        $reponse->setEtudiant($id_et_upload);
        $reponse->setSessiondexam($id_session_exam_upload);
        $reponse->setMatiere($id_matiere_upload);
        $mat = new Matiere();
        $mat->setId_matiere($id_matiere_upload);
        $res  = $mat->listMatiere_id();
        foreach ($res as $resultat) {
            $nomat = $resultat['INTITULE'];
        }

        if ($id_session_exam_upload == 1) {
            $session = 'Mensuel';
        } else {
            $session = 'Semestriel';
        }
        $matriculetab = explode('/', $matricule);
        $countmat = count($matriculetab);
        $titre_matricule = '';

        for ($i = 0; $i < $countmat; $i++) {
            $content_matricule = $matriculetab[$i];
            $titre_matricule .= $content_matricule . '_';
        }

        $infos = pathinfo($_FILES["reponse_file"]["name"]);
        $extension = $infos["extension"];
        move_uploaded_file($_FILES["reponse_file"]["tmp_name"], "../Resultat/" . $titre_matricule . '_' . $nomat . '_' . $session . '_' . '.' . $extension);
        $reponse->setReponse($titre_matricule . '_' . $nomat . '_' . $session . '_' . '.' . $extension);


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
        $headers .= 'Delivered-to: ' . $mail_et_upload . "\n"; // Destinataire
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
        if (mail($mail_et_upload, $objet, $message, $headers)) // Envoi du message
        {
            echo 'Votre message a bien été envoyé ';
        } else // Non envoy
        {
            echo "Votre message n'a pas pu être envoyé";
        }
        $_SESSION['envoie'] =  '<div class="alert alert-success  alert-dismissible fade show" style="position:relative;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Envoie Succes!</strong>
    </div>';
        unset($_SESSION['interdit']);
        unset($_SESSION['echec']);

        header("location:../Examen");
    } else {
        extract($_POST);

        //echo $id_et_upload.'<br>'.$mail_et_upload.'<br>';


        $reponse = new Resultat();
        $reponse->setEtudiant($id_et_upload);
        $reponse->setSessiondexam($id_session_exam_upload);
        $reponse->setMatiere($id_matiere_upload);

        $reponse->setReponse(NULL);


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
        $headers .= 'Delivered-to: ' . $mail_et_upload . "\n"; // Destinataire
        //$headers .= 'Cc: '.$copie."\n"; // Copie Cc
        //$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
        $message = '<div style="width: 100%; text-align: center; font-weight: bold">Bonjour...<br>reponse vide</div> <br> <br>
     <div>
     <form action="e-media.mg/universite/" method="posts">
      <div>
      <table>
      <tr>  
      <td><b>Matière: </b> ' . $nomat . '</td>
      </tr>
     
      <tr>
      <td><b>Envoie: </b> Echec</td>
      </tr>
      
      <br>
      </table>
      </div></form></div> ';
        if (mail($mail_et_upload, $objet, $message, $headers)) // Envoi du message
        {
            echo 'Votre message a bien été envoyé ';
        } else // Non envoy
        {
            echo "Votre message n'a pas pu être envoyé";
        }
        $_SESSION['echec'] =  '<div class="alert alert-danger  alert-dismissible fade show" style="position:relative;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Réponse vide!</strong>
    </div>';
        unset($_SESSION['interdit']);
        unset($_SESSION['envoie']);

        header("location:../Examen");
    }
}

?>

<?php

ob_end_flush();

?>