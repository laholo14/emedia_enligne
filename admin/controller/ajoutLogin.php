<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

//require_once("../model/Binary.class.php");

$db = new Connexion();

$suivre = new Suivre();

$datefr = new DateFr();
    $et = new Etudiant();

if (isset($_POST['search'])) {

    extract($_POST);


    $table =
        ' <div class="table-responsive mt-3">
        <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
                <th>Filière</th>
                <th>Matricule</th>
                <th>Etat</th>
                

        </thead>';

    $res = $et->search($search . "%");

    foreach ($res as $resultat) {
        if ($resultat['CODE'] == "CODE0") {
            $etat = "<b style='color:red;'>Non validé</b>";
        } else {
            $etat = "<b style='color:#0fcc19;'>Validé</b>";
        }
        $table .= '<tbody>
            <tr>
                <td>' . $resultat['NOM'] . '</td>
                <td>' . $resultat['PRENOM'] . '</td>
                <td>' . $resultat['MAIL'] . '</td>
                <td>' . $resultat['FILIERE'] . '</td>
                <td>' . $resultat['MATRICULE'] . '</td>
                <td>' . $etat . '</td>
                
            </tr>
         </tbody>';
    }
    $table .= '</table>';
    echo $table;
}

if (isset($_POST['readNotifl'])) {

    $notifl = '';

    $res = $suivre->NbrInsLicence();

    foreach ($res as $resultat) {

        $notifl = $resultat["COUNT(*)"];
    }

    echo $notifl;
}


if (isset($_POST['readNotifm'])) {

    $notifm = '';

    $res = $suivre->NbrInsMaster();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}


if (isset($_POST['readNotiftic'])) {

    $notifm = '';

    $res = $suivre->NbrInsLicenceTic();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}


if (isset($_POST['readNotifcan'])) {

    $notifm = '';

    $res = $suivre->NbrInsLicenceCan();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}

if (isset($_POST['readNotifmpj'])) {

    $notifm = '';

    $res = $suivre->NbrInsLicenceMpj();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}

if (isset($_POST['readNotifmgt'])) {

    $notifm = '';

    $res = $suivre->NbrInsLicenceMgt();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}

if (isset($_POST['readNotifdrt'])) {

    $notifm = '';

    $res = $suivre->NbrInsLicenceDrt();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}


if (isset($_POST['readNotifticm'])) {

    $notifm = '';

    $res = $suivre->NbrInsMasterTicm();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}

if (isset($_POST['readNotifac'])) {

    $notifm = '';

    $res = $suivre->NbrInsMasterAc();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}


if (isset($_POST['readNotifmpjm'])) {

    $notifm = '';

    $res = $suivre->NbrInsMasterMpjm();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}


if (isset($_POST['readNotifmba'])) {

    $notifm = '';

    $res = $suivre->NbrInsMasterMba();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}

if (isset($_POST['readNotifdrtm'])) {

    $notifm = '';

    $res = $suivre->NbrInsMasterDrtm();

    foreach ($res as $resultat) {

        $notifm = $resultat["COUNT(*)"];
    }

    echo $notifm;
}

if (isset($_POST['LICENCE']) and isset($_POST['TIC'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($LICENCE);
    $suivre->setFiliere($TIC);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="admin/vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
         <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserLtic(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td><button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button></td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['LICENCE']) and isset($_POST['CAN'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($LICENCE);
    $suivre->setFiliere($CAN);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserLcan(' . $resultat['IDETUDIANTS'] . ')"><img src="vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td><button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="vue/image/edit.png" width="30px" height="30px" alt=""></button></td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['LICENCE']) and isset($_POST['MPJ'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($LICENCE);
    $suivre->setFiliere($MPJ);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="admin/vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserLmpj(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['LICENCE']) and isset($_POST['MGT'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($LICENCE);
    $suivre->setFiliere($MGT);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="admin/vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserLmgt(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['LICENCE']) and isset($_POST['DRT'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($LICENCE);
    $suivre->setFiliere($DRT);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="admin/vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserLdrt(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['MASTER']) and isset($_POST['TICM'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($MASTER);
    $suivre->setFiliere($TICM);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="admin/vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserMticm(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}

if (isset($_POST['MASTER']) and isset($_POST['AC'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($MASTER);
    $suivre->setFiliere($AC);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="admin/vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserMac(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}



if (isset($_POST['MASTER']) and isset($_POST['MPJM'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($MASTER);
    $suivre->setFiliere($MPJM);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="admin/vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserMmpjm(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}

if (isset($_POST['MASTER']) and isset($_POST['MBA'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($MASTER);
    $suivre->setFiliere($MBA);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="admin/vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserMmbm(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}


if (isset($_POST['MASTER']) and isset($_POST['DRTM'])) {

    extract($_POST);

    $table = ' <div class="table-responsive mt-3">
    <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Diplome En</th>
                <th>Filière</th>
                <th>Parcours</th>
                <th>Contact</th>
                <th>Nationalité</th>
                <th>Date D\'inscriptions</th>
                <th>Email</th>
                <th>Dossier</th>
                <th>Valider</th>
                <th>Effacer</th>
            </tr>
        </thead>';

    $suivre->setDip($MASTER);
    $suivre->setFiliere($DRTM);
    $res1 = $suivre->InsriLicence();

    foreach ($res1 as $resultat) {
        $table .= '<tbody>
    <tr class="">
        <td>' . $resultat['NOM'] . '</td>
        <td>' . $resultat['PRENOM'] . '</td>
        <td>' . $resultat['DIPLOME'] . '</td>
        <td>' . $resultat['FILIERE'] . '</td>
        <td>' . $resultat['PARCOURS'] . '</td>
        <td>' . $resultat['NUMERO'] . '</td>
        <td>' . $resultat['NATIONALITE'] . '</td>
        <td>' . $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i") . '</td>
        <td>' . $resultat['MAIL'] . '</td>
        <td><a href="DossierDesEtudiants/' . $resultat['DOSSIER'] . '" class="btn btn-outline-primary" download><img src="admin/vue/image/download.png" width="30px" height="30px" alt=""></a> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Updata" onclick="GetUserMdrtm(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
        <td> <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Delete" onclick="GetUser(' . $resultat['IDETUDIANTS'] . ')"><img src="admin/vue/image/edit.png" width="30px" height="30px" alt=""></button> </td>
    </tr>
 </tbody>';
    }
    $table .= '</table>';
    echo $table;
}



if (isset($_POST['vague']) and isset($_POST['semestre']) and isset($_POST['numero'])) {

    extract($_POST);


    $res = $suivre->readAllById($ide);

    foreach ($res as $resultat) {
        $nat = $resultat['NATIONALITE'];
        $fil = $resultat['FILIERE'];
        $pass = $resultat['NUMERO'];
        $mail = $resultat['MAIL'];
        $obtenir = $resultat['DIPLOME'];
        $nom_1 = $resultat['NOM'];
        $pnom_1 = $resultat['PRENOM'];
    }

    $cryptage = new Cryptage();
   
    //$cryptage->setBinaire($pass);
    $mdp = $cryptage->crpt14($pass);
   // $mdp = md5($pass);

    $suivre->setSemestre($semestre);

    $suivre->setCode($vague); //vague

    $mat = $fil . '-' . $vague . '/' . $numero . '/' . $nat;

    $suivreV = new  Suivre();
    $suivreV->setMatricule($mat);
    $vf = $suivreV->verifymatricule();
    foreach ($vf as $row) {
        $countmat = $row['COUNT(*)'];
    }

    if ($countmat == 1) {
        $table['alert'] = 'Efa ao io';
    } else {



        $suivre->setMatricule($mat);
        $suivre->setMdp($mdp);
        $suivre->setEtudiant($ide);
        $suivre->ajoutLogin();

        $et->setNom($nom_1);
        $et->setPrenom($pnom_1);
        $et->setNumero($pass);
        $res = $et->verify();
        foreach ($res as $resultat) {
            $count = $resultat["COUNT(*)"];
        }

        $destinataire = $mail;

        if ($count == 1) {

            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            //$expediteur = 'servicetechnique@e-media.mg';
            $expediteur = 'emedia.servicetechnique@gmail.com';
            //$copie = 'adresse@fai.com';
            //$copie_cachee = 'adresse@fai.com';
            $objet = 'Matricule et Mot de Passe'; // Objet du message
            $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
            $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
            $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
            $headers .= 'From: "E-media"<' . $expediteur . '>' . "\n"; // Expediteur
            $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
            //$headers .= 'Cc: '.$copie."\n"; // Copie Cc
            //$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
            $message = '<div style="width: 100%; text-align: center; font-weight: bold">Bonjour...<br>Voici votre Matricule et Mot de passe pour acceder a vos cours</div> <br> <br>
             <div>
             <form action="e-media.mg/universite/" method="posts">
              <div>
              <table>
              <tr>  
              <td><b>Matricule: </b> ' . $mat . '</td>
              </tr>
             
              <tr>
              <td><b>Mot de passe: </b> ' . $pass . '</td>
              </tr>
              <br>
              <br>
              <br>
              Merci de nous contacter en cas de problème selon ses différents services:
              <tr>
              <br>
              <td>Service Technique: emedia.servicetechnique@gmail.com , 261342805835</td>
              </tr>
              <br>
              <tr>
              <td>Service Finance: servicefinance.emedia@gmail.com , 261344013064</td>
              </tr>
              <br>
              <tr>
              <td>Service Pedagogie LICENCE: emediaenligne2020@gmail.com , 261349920407</td>
              </tr>
              <br>
              <tr>
              <td>Service Pedagogie MASTER: emediaenligne2020@gmail.com , 261344356977</td>
              </tr>
              <br>
              <tr>
              <td>Scolarité LICENCE: 261341799960</td>
              </tr>
              <br>
              <tr>
              <td>Scolarité MASTER: 261341177737</td>
              </tr>
              <br>
              </table>
              <input type="submit" value="se connecter" style="background-color:blue; color:white;border:none;border-radius:8px;font-size:12px;padding:8px;cursor:pointer;"></div></form></div> ';
            if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
            {
                echo 'Votre message a bien été envoyé ';
            } else // Non envoy
            {
                echo "Votre message n'a pas pu être envoyé";
            }
        } else {
            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            //$expediteur = 'servicetechnique@e-media.mg';
            $expediteur = 'emedia.servicetechnique@gmail.com';
            //$copie = 'adresse@fai.com';
            //$copie_cachee = 'adresse@fai.com';
            $objet = 'Matricule et Mot de Passe'; // Objet du message
            $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
            $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
            $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
            $headers .= 'From: "E-media"<' . $expediteur . '>' . "\n"; // Expediteur
            $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
            //$headers .= 'Cc: '.$copie."\n"; // Copie Cc
            //$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
            $message = '<div style="width: 100%; text-align: center; font-weight: bold">Bonjour...<br>Voici votre Matricule et Mot de passe pour acceder a vos cours</div> <br> <br>
             <div>
             <form action="e-media.mg/universite/" method="posts">
              <div>
              <table>
              <tr>  
              <td><b>Matricule: </b> ' . $mat . '</td>
              </tr>          
              <tr>
              <td><b>Mot de passe: </b> ' . $pass . '</td>
              </tr>
              <br>
              <br>
              <br>
              Merci de nous contacter en cas de problème selon ses différents services:
                <tr>
                <br>
                <td>Service Technique: emedia.servicetechnique@gmail.com , 261342805835</td>
                </tr>
                <br>
                <tr>
                <td>Service Finance: servicefinance.emedia@gmail.com , 261344013064</td>
                </tr>
                <br>
                <tr>
                <td>Service Pedagogie LICENCE: emediaenligne2020@gmail.com , 261349920407</td>
                </tr>
                <br>
                <tr>
                <td>Service Pedagogie MASTER: emediaenligne2020@gmail.com , 261344356977</td>
                </tr>
                <br>
                <tr>
                <td>Scolarité LICENCE: 261341799960</td>
                </tr>
                <br>
                <tr>
                <td>Scolarité MASTER: 261341177737</td>
                </tr>
                <br>
              <i>Vous beneficier de 50% de reduction pour vos frais d\'inscriptions pour l\'un de vos filière</i>
              </table>
              <input type="submit" value="se connecter" style="background-color:blue; color:white;border:none;border-radius:8px;font-size:12px;padding:8px;cursor:pointer;"></div></form></div> ';
            if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
            {
                echo 'Votre message a bien été envoyé ';
            } else // Non envoy
            {
                echo "Votre message n'a pas pu être envoyé";
            }
        }
        //@unlink("../DossierDesEtudiants/$obtenir/$fil/".$mail.'.zip');
        $table['alert'] = 'Ajout succces';
    }
    echo json_encode($table);
} else if (isset($_POST['message']) and isset($_POST['hiddensup'])) {

    extract($_POST);

    $res = $suivre->readAllById($hiddensup);

    foreach ($res as $resultat) {
        $nom = $resultat['NOM'];
        $prenom = $resultat['PRENOM'];
        $mail = $resultat['MAIL'];
    }

    $destinataire = $mail;

    // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
    $expediteur = 'emediaenligne2020@gmail.com';
    //$copie = 'adresse@fai.com';
    //$copie_cachee = 'adresse@fai.com';
    $objet = 'Dossier non validé'; // Objet du message
    $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
    $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
    $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
    $headers .= 'From: "E-media"<' . $expediteur . '>' . "\n"; // Expediteur
    $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
    //$headers .= 'Cc: '.$copie."\n"; // Copie Cc
    //$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
    $messageEnv = '<div style="width: 100%;text-align: center; font-weight: bold; font-size:20px">Bonjour ' . $nom . ' ' . $prenom . '
    <br>' . $message . '</div>';

    if (mail($destinataire, $objet, $messageEnv, $headers)) // Envoi du message
    {
        echo 'Votre message a bien été envoyé ';
    } else // Non envoy
    {
        echo "Votre message n'a pas pu être envoyé";
    }


    $et->set_Id($hiddensup);
    $et->delete();

    $suivre->setEtudiant($hiddensup);
    $suivre->delete();
}


?>

<?php

ob_end_flush();


?>