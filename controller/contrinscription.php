<?php

ob_start();

session_start();


function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");


$db = new Connexion();

if (isset($_POST['name']) and isset($_POST['firstname']) and isset($_POST['born']) and isset($_POST['niveau']) and isset($_POST['lieu']) and isset($_POST['sexe']) and isset($_POST['obtenir']) and isset($_POST['filiere']) and isset($_POST['parcours']) and isset($_POST['pays']) and isset($_POST['ville']) and isset($_POST['adresse']) and isset($_POST['numero1']) and isset($_POST['mail']) and isset($_FILES["cin"]) and  isset($_FILES["cv"]) and  isset($_FILES["residence"]) and  isset($_FILES["bnais"]) and isset($_FILES["lettre"]) and isset($_FILES["photo"])) {


    extract($_POST);

    if ($obtenir != 'LICENCE' and $obtenir != 'MASTER') {
        $_SESSION['reesayer'] = '<div class="alert alert-danger  alert-dismissible fade show" style="position:absolute;">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
           <strong>Echec de l\'Inscription!</strong><br>Réessayer s\'il vous plait.<br> Si le problème persiste veuillez nous contacter.
           </div>';
        header("location:../Register");
    } else if ($filiere != "TIC" and $filiere != "CAN" and $filiere != "MPJ" and $filiere != "MGT" and $filiere != "DRT" and $filiere != "TICM" and $filiere != "AC" and $filiere != "MPJM" and $filiere != "MBA" and $filiere != "DRTM") {
        $_SESSION['reesayer'] = '<div class="alert alert-danger  alert-dismissible fade show" style="position:absolute;">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
           <strong>Echec de l\'Inscription!</strong><br>Réessayer s\'il vous plait.<br> Si le problème persiste veuillez nous contacter.
           </div>';
        header('location:../Register');
    } else if ($name == 'ABDOULKADER' and $firstname == 'Ahmed BAKAH') {

        header('location:../Register');
    } else if ($obtenir == 'LICENCE' and $filiere != "TIC" and $filiere != "CAN" and $filiere != "MPJ" and $filiere != "MGT" and $filiere != "DRT") {
        $_SESSION['reesayer'] = '<div class="alert alert-danger  alert-dismissible fade show" style="position:absolute;">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
           <strong>Echec de l\'Inscription!</strong><br>Réessayer s\'il vous plait.<br> Si le problème persiste veuillez nous contacter.
           </div>';
        header('location:../Register');
    } else if ($obtenir == 'MASTER' and $filiere != "TICM" and $filiere != "AC" and $filiere != "MPJM" and $filiere != "MBA" and $filiere != "DRTM") {
        $_SESSION['reesayer'] = '<div class="alert alert-danger  alert-dismissible fade show" style="position:absolute;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Echec de l\'Inscription!</strong><br>Réessayer s\'il vous plait.<br> Si le problème persiste veuillez nous contacter.
        </div>';
        header('location:../Register');
    } else {
        $verify = new Etudiant();

        $v = $verify->readInscri($name, $firstname, $filiere);

        foreach ($v as $res) {
            $i = $res['IDETUDIANTS'];
        }

        if (empty($i)) {
            // Count total files


            // Looping all files




            if ($_FILES["cin"]["size"] <= 10000000 and $_FILES["cv"]["size"] <= 10000000 and $_FILES["residence"]["size"] <= 10000000 and $_FILES["lettre"]["size"] <= 10000000 and $_FILES["photo"]["size"] <= 10000000) {

                $infos1 = pathinfo($_FILES["cv"]["name"]);

                $infos2 = pathinfo($_FILES["note"]["name"][0]);

                $infos22 = pathinfo($_FILES["note"]["name"][1]);

                $infos3 = pathinfo($_FILES["residence"]["name"]);

                $infos4 = pathinfo($_FILES["bnais"]["name"]);

                $infos5 = pathinfo($_FILES["lettre"]["name"]);

                $infos6 = pathinfo($_FILES["photo"]["name"]);

                $infos7 = pathinfo($_FILES["cin"]["name"]);

                $extension1 = $infos1["extension"];

                $extension2 = $infos2["extension"];

                $extension22 = $infos22["extension"];

                $extension3 = $infos3["extension"];

                $extension4 = $infos4["extension"];

                $extension5 = $infos5["extension"];

                $extension6 = $infos6["extension"];

                $extension7 = $infos7["extension"];

                $autorise = array("jpg", "jpeg", "png", "txt", "pdf", "docx", "doc", "JPG", "JPEG", "PDF", "PNG", "TXT", "DOCX", "DOC");
                $autorisesary = array("jpg", "jpeg", "png", "JPG", "JPEG", "PNG");

                if (in_array($extension1, $autorise) and in_array($extension2, $autorise) and in_array($extension3, $autorise) and in_array($extension4, $autorise) and in_array($extension5, $autorise) and in_array($extension6, $autorisesary) and in_array($extension7, $autorise)) {

                    move_uploaded_file($_FILES["cv"]["tmp_name"], "../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'CV' . '.' . $extension1);
                    move_uploaded_file($_FILES["note"]["tmp_name"][0], "../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'NOTE' . '.' . $extension2);
                    move_uploaded_file($_FILES["note"]["tmp_name"][1], "../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'DIPLOME' . '.' . $extension22);
                    move_uploaded_file($_FILES["residence"]["tmp_name"], "../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'RESIDENCE' . '.' . $extension3);
                    move_uploaded_file($_FILES["bnais"]["tmp_name"], "../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'BNAIS' . '.' . $extension4);
                    move_uploaded_file($_FILES["lettre"]["tmp_name"], "../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'LETTRE' . '.' . $extension5);
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "../DossierDesEtudiants/photo/" . $mail . 'PHOTO' . '.' . $extension6);
                    move_uploaded_file($_FILES["cin"]["tmp_name"], "../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'CIN' . '.' . $extension7);



                    $zip = new ZipArchive();

                    if ($zip->open("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . '.zip', ZipArchive::CREATE) === true) {

                        echo '&quot;Zip.zip&quot; ouvert<br/>';
                        echo $obtenir . ' ' . $filiere;
                        // Ajout d’un fichier.
                        $zip->addFile("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'CV' . '.' . $extension1);

                        $zip->addFile("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'NOTE' . '.' . $extension2);

                        if (isset($_FILES["note"]["name"][1])) {

                            $zip->addFile("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'DIPLOME' . '.' . $extension22);
                        }

                        $zip->addFile("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'RESIDENCE' . '.' . $extension3);

                        $zip->addFile("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'BNAIS' . '.' . $extension4);

                        $zip->addFile("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'LETTRE' . '.' . $extension5);

                        $zip->addFile("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'CIN' . '.' . $extension7);

                        $zip->close();


                        @unlink("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'CV' . '.' . $extension1);
                        @unlink("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'NOTE' . '.' . $extension2);
                        @unlink("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'DIPLOME' . '.' . $extension22);
                        @unlink("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'RESIDENCE' . '.' . $extension3);
                        @unlink("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'BNAIS' . '.' . $extension4);
                        @unlink("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'LETTRE' . '.' . $extension5);
                        @unlink("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . 'CIN' . '.' . $extension7);
                    } else {
                        echo 'Impossible d&#039;ouvrir &quot;Zip.zip<br/>';
                        // Traitement des erreurs avec un switch(), par exemple.
                    }



                    $insert = new Etudiant();

                    $insert->setNom($name);

                    $insert->setPrenom($firstname);

                    $insert->setSexe($sexe);

                    $insert->setDatenais($born);

                    $insert->setLieunais($lieu);

                    $insert->setAdresse($pays . ' ' . $ville . ' ' . $adresse);

                    $insert->setNationalite($pays);

                    $insert->setNumero($numero1);

                    $insert->setParent($pere . ' et de ' . $mere . ' Tuteur: ' . $tuteur);

                    $insert->setNumparent($numero2 . " " . $cpere . ' ' . $cmere . ' ' . $ctuteur);

                    $insert->setMail($mail);

                    $insert->setParcourse($parcours . ' ' . $parcours2);

                    $insert->setDossier("../DossierDesEtudiants/$obtenir/$filiere/" . $mail . '.zip');

                    $insert->setPhoto("https://e-media-madagascar.com/universite/DossierDesEtudiants/photo/" . $mail . 'PHOTO' . '.' . $extension6);

                    $insert->create();

                    $res = $insert->readId();

                    foreach ($res as $resultat) {

                        $insert2 = new Suivre();

                        $insert2->setEtudiant($resultat['IDETUDIANTS']);

                        $insert2->setDip($obtenir);

                        $insert2->setFiliere($filiere);
                        $insert2->setSemestre($niveau);
                        $insert2->setParcours($parcours);

                       

                        $insert2->createSuivre();
                    }
                } else {
                    $_SESSION['extensioner'] = '<div class="alert alert-danger  alert-dismissible fade show" style="position:absolute;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Inscription Failed!</strong><br>L\'une des extension des fichiers n\'est pas valide
                    </div>';
                    header("location:../Register");
                }
            } else {

                $_SESSION['taille'] = '<div class="alert alert-danger  alert-dismissible fade show" style="position:absolute;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Inscription Failed!</strong><br>Une de vos fichiers est trop lourd<br>
                <b>Taille d\'une fichier: </b> inférieur ou égal à 10Mo
                    </div>';
                header("location:../Register");
            }
        } else {
            $_SESSION['anarana'] =  '<div class="alert alert-warning  alert-dismissible fade show" style="position:absolute;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong> Votre dossier a déja été inséré avec succès.</strong>
     </div>';
            header("location:../Register");
        }

        $_SESSION['connect'] =  '<div class="alert alert-success  alert-dismissible fade show" style="position:absolute;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Inscription Succes!</strong><br> Merci pour votre inscription, votre demande sera examiné, nous vous repondrons sous 72 heures (jours ouvrable) au maximum par mail. Misaotra amin \' ny fisoratana anarana, 
      hojerena anatin \' ny 72 ora izany ary miverina milaza ny valiny aminao izahay. Misaotra Tompoko.
     </div>';

        header("location:../Register");
    }
} else {

    $_SESSION['echec'] =  '<div class="alert alert-danger alert-dismissible fade show mt-5" style="position:absolute;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>Inscription Failed!</strong><br> Réessayer s\'il vous plait.<br> Si le problème persiste veuillez nous contacter.
  </div>';

    header("location:../Register");
}





?>

<?php

ob_end_flush();

?>