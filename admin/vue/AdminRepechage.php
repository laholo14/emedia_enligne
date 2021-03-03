<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion;

$suivre = new Suivre();
$repecher = new Repecher();
$etudiant = new Etudiant();

if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <link rel="stylesheet" href="css/adminEtudiant.css" type="text/css" />
    <title>Document</title>
</head>

<body>
    <?php include("navadmin.php"); ?>

    <div>
        <h1 class="m-4">etudiants</h1>
    </div>

    <!--Ajout date-->
    
    <div class="modal fade" id="UpdataDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">Ajouter/Modifier Date d'entré</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="update_fname" class="col-form-label">Vague:</label>
                            <input type="text" class="form-control" id="hidden" readonly>
                        </div>

                        <div class="form-group">
                            <label for="update_fname" class="col-form-label">Date d'entré:</label><br>
                            <input type="date" class="form-control" id="dateup" />

                        </div>


                        <div class="modal-footer d-flex justify-content-center">

                            <input type="submit" id="modifier" class="btn btn-primary" value="Modifier" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    <div>
        <h1 class="m-4">Liste répechage</h1>
    </div>
    <div class="response"></div>

    <input type="hidden" id="admin" value="<?php echo $_SESSION['admin'] ?>"/>
    <div class="row mt-2">
        <div class="col-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link licence active text-center mt-3" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-licence" role="tab" aria-controls="v-pills-home" aria-selected="true">LICENCE</a>
                <a class="nav-link master text-center mt-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-profile" aria-selected="false">MASTER</a>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-licence" role="tabpanel" aria-labelledby="v-pills-home-tab">

                    <div class="text-center">
                        <span class="btn btn-primary btn-lg btn-block">LICENCE</span>
                    </div>

                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active licence" id="home-tab" data-toggle="tab" href="#TIC" role="tab" aria-controls="home" aria-selected="true">TIC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link licence" id="profile-tab" data-toggle="tab" href="#CAN" role="tab" aria-controls="profile" aria-selected="false">CAN<span class="badge badge-danger ml-2" id="notifcan"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link licence" id="contact-tab" data-toggle="tab" href="#MPJ" role="tab" aria-controls="contact" aria-selected="false">MPJ<span class="badge badge-danger ml-2" id="notifmpj"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link licence" id="contact-tab" data-toggle="tab" href="#MGT" role="tab" aria-controls="contact" aria-selected="false">MGT<span class="badge badge-danger ml-2" id="notifmgt"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link licence" id="contact-tab" data-toggle="tab" href="#DRT" role="tab" aria-controls="contact" aria-selected="false">DRT<span class="badge badge-danger ml-2" id="notifdrt"></a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="TIC" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container">
                                <div class="row mt-5 tic">
                                    <?php
                                    $res1 = $suivre->Vague();
                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-second text-center">
                                                    <h4>TIC</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""> 
                                                                                        <?php 
                                                                                            $matricule ='TIC-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                                </span>
                                                                                            </h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="LICENCE" />
                                                        <input type="hidden" name="fil" value="TIC" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>

                        </div>



                        <div class="tab-pane fade" id="CAN" role="tabpanel" aria-labelledby="profile-tab">


                            <div class="container">
                                <div class="row mt-5">

                                    <?php
                                    $res1 = $suivre->Vague();

                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-second text-center">
                                                    <h4>CAN</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id="">
                                                                                            <?php 
                                                                                            $matricule ='CAN-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?></span></h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="LICENCE" />
                                                        <input type="hidden" name="fil" value="CAN" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>

                        </div>



                        <div class="tab-pane fade" id="MPJ" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container">
                                <div class="row mt-5">

                                    <?php
                                    $res1 = $suivre->Vague();

                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-second text-center">
                                                    <h4>MPJ</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id="">
                                                                                            <?php 
                                                                                            $matricule ='MPJ-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?></span></h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="LICENCE" />
                                                        <input type="hidden" name="fil" value="MPJ" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="MGT" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="container">
                                <div class="row mt-5">
                                    <?php
                                    $res1 = $suivre->Vague();

                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-second text-center">
                                                    <h4>MGT</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id="">
                                                                                            <?php 
                                                                                            $matricule ='MGT-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?></span></h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="LICENCE" />
                                                        <input type="hidden" name="fil" value="MGT" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>

                        </div>




                        <div class="tab-pane fade" id="DRT" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="container">
                                <div class="row mt-5">
                                    <?php
                                    $res1 = $suivre->Vague();

                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-second text-center">
                                                    <h4>DRT</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id="">
                                                                                            <?php 
                                                                                            $matricule ='DRT-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?></span></h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="LICENCE" />
                                                        <input type="hidden" name="fil" value="DRT" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                    <div class="text-center">
                        <span class="btn btn-danger btn-lg btn-block" id="master">MASTER</span>
                    </div>



                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active master" id="home-tab" data-toggle="tab" href="#TICM" role="tab" aria-controls="home" aria-selected="true">TICM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link master" id="profile-tab" data-toggle="tab" href="#AC" role="tab" aria-controls="profile" aria-selected="false">AC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link master" id="contact-tab" data-toggle="tab" href="#MPJM" role="tab" aria-controls="contact" aria-selected="false">MPJM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link master" id="contact-tab" data-toggle="tab" href="#MBA" role="tab" aria-controls="contact" aria-selected="false">MBA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link master" id="contact-tab" data-toggle="tab" href="#DRTM" role="tab" aria-controls="contact" aria-selected="false">DRTM</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="TICM" role="tabpanel" aria-labelledby="home-tab">

                            <div class="container">
                                <div class="row mt-5">
                                    <?php
                                    $res1 = $suivre->Vague();

                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-3 text-center">
                                                    <h4>TICM</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id="">
                                                                                            <?php 
                                                                                            $matricule ='TICM-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?></span></h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="MASTER" />
                                                        <input type="hidden" name="fil" value="TICM" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn master btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>


                        </div>


                        <div class="tab-pane fade" id="AC" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="container">
                                <div class="row mt-5">
                                    <?php
                                    $res1 = $suivre->Vague();

                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-3 text-center">
                                                    <h4>AC</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id="">
                                                                                            <?php 
                                                                                            $matricule ='AC-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?></span></h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="MASTER" />
                                                        <input type="hidden" name="fil" value="AC" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn master btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>

                        </div>


                        <div class="tab-pane fade" id="MPJM" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container">
                                <div class="row mt-5">
                                    <?php
                                    $res1 = $suivre->Vague();

                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-3 text-center">
                                                    <h4>MPJM</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id="">
                                                                                            <?php 
                                                                                            $matricule ='MPJM-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?></span></h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="MASTER" />
                                                        <input type="hidden" name="fil" value="MPJM" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn master btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="MBA" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container">
                                <div class="row mt-5">
                                    <?php
                                    $res1 = $suivre->Vague();

                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-3 text-center">
                                                    <h4>MBA</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id="">
                                                                                            <?php 
                                                                                            $matricule ='MBA-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?></span></h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="MASTER" />
                                                        <input type="hidden" name="fil" value="MBA" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn master btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="DRTM" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="container">
                                <div class="row mt-5">
                                    <?php
                                    $res1 = $suivre->Vague();

                                    foreach ($res1 as $resultat) {



                                    ?>
                                        <div class="col-md-3">
                                            <div class="card mt-5">
                                                <div class="card-header-3 text-center">
                                                    <h4>DRTM</h4>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center"><?php $v = $resultat['CODE'];
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id="">
                                                                                            <?php 
                                                                                            $matricule ='DRTM-'.$v;
                                                                                            $res=$suivre->readAllEtudiants($matricule,$v);
                                                                                            $idRepecher="";
                                                                                            foreach ($res as $resultat1) {
                                                                                                $idEtudiant = $resultat1['IDETUDIANTS'];
                                                                                                $res1=$repecher->readEtudById($idEtudiant);
                                                                                                foreach ($res1 as $resultat1) {
                                                                                                    $idRepecher=$resultat1['IDETUDIANTS'];
                                                                                                }
                                                                                            }
                                                                                            $resNbr=$repecher->readNbrEtudById($idRepecher);
                                                                                            foreach ($resNbr as $resultatNombre) {
                                                                                                $nbr=$resultatNombre['nombreEtudiant'];
                                                                                                if ($nbr==0) {
                                                                                                    echo "Vide";
                                                                                                }else{
                                                                                                    echo "*";
                                                                                                }
                                                                                            }
                                                                                            ?></span></h5>
                                                    <form method="POST" action="listRepechage.php">
                                                        <input type="hidden" name="dip" value="MASTER" />
                                                        <input type="hidden" name="fil" value="DRTM" />
                                                        <input type="hidden" name="vague" value="<?php echo $v; ?>" />
                                                        <input type="submit" class="btn master btn-primary" name="sub" value="Lister" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        recherche();
        readDate();
        // setInterval(recherche, 1000);

        //manao click master
        if ($("#admin").val() == 'master') {
            $("#v-pills-home-tab").hide();
            $("#v-pills-profile-tab").click();
        } else if ($("#admin").val() == 'licence') {
            $("#v-pills-profile-tab").hide();
            $("#v-pills-home-tab").click();
        }else{
            $("#v-pills-home-tab").hide();
            $("#v-pills-profile-tab").hide();
            $("#v-pills-licence").hide();
            $("#v-pills-master").hide();
        }
    });

    $(document).on("keyup", "#search", function() {
        recherche();
    });

    $(document).on("click", "#dropdownMenuLink", function() {
        recherche();
    });

    function GetUser(idmat, chaine) {
        $('#hidden').val(idmat);
        $('#dateup').val(chaine);
    };

    readDate();

    function readDate() {
        let tabdate = '';

        $.ajax({
            url: "../controller/contrCode.php",
            type: "POST",
            data: {
                tabdate: tabdate
            },
            success: function(data) {
                $("#tabdate").html(data);
            }
        });
    }  


    $(document).on("click", "#ajoutvague", function(e) {
        e.preventDefault();
        let vague = $('#vague').val();
        // alert(vague);

        if (vague != '') {

            $.ajax({
                url: "../controller/contrCode.php", //controller
                method: "POST",
                data: {
                    vague: vague
                }, //valeur alefa
                success: function(data) {
                    alert("Ajout avec succces!!!");
                    $('#vague').val('');
                    readDate();
                    recherche();
                }
            });
            $('#vague').val('');
        } else {
            alert("Vague  obligatoire");
        }
    });



    $(document).on("click", "#modifier", function(e) {
        e.preventDefault();
        let vagueup = $('#hidden').val();
        let dateup = $('#dateup').val();
     
        
        if (dateup != '') {
            $.ajax({
                url: "../controller/contrCode.php", //controller
                method: "POST",
                data: {
                    vagueup: vagueup,
                    dateup: dateup
                }, //valeur alefa
                success: function(data) {
                    alert("Modification avec succces!!!");
                    recherche();
                    readDate();
                }
            });

        } else {
            alert("Date obligatoire");
        }

        
    });
    recherche();

    function recherche() {

        let search = $('#search').val();
        $.ajax({
            url: "../controller/contrCode.php",
            type: "POST",
            data: {
                search: search
            },
            success: function(data) {
                $("#tabdate").html(data);
            }
        });


    }
</script>

<?php

ob_end_flush();

?>