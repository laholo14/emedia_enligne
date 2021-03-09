<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");


if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}
$suivre = new Suivre();

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vue/css/adminEtudiant.css" type="text/css" />
    <link rel="stylesheet" href="../vue/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <?php include("navadmin.php"); ?>

    

    <!--Ajout date-->

    <div>
        <h1 class="m-5">etudiants</h1>
    </div>
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtLicence($resultat['CODE'], 'TIC');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtLicence($resultat['CODE'], 'CAN');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtLicence($resultat['CODE'], 'MPJ');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtLicence($resultat['CODE'], 'MGT');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtLicence($resultat['CODE'], 'DRT');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtMaster($resultat['CODE'], 'TICM');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtMaster($resultat['CODE'], 'AC');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtMaster($resultat['CODE'], 'MPJM');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtMaster($resultat['CODE'], 'MBA');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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
                                                                                        echo $v; ?><span class="badge badge-danger ml-2" id=""><?php $res = $suivre->NbrEtMaster($resultat['CODE'], 'DRTM');
                                                                                                                                                foreach ($res as $resultat) {
                                                                                                                                                    echo $resultat["COUNT(*)"];
                                                                                                                                                } ?></span></h5>
                                                    <form method="POST" action="listEtudiants.php">
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


    <script src="../vue/js/jquery.min.js"></script>
    <script src="../vue/js/popper.js"></script>
    <script src="../vue/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>


   
<?php

ob_end_flush();

?>