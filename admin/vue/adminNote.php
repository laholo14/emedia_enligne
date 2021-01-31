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

if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminEtudiant.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <title>Document</title>
</head>

<body>
    <?php include("navadmin.php"); ?>

       <div class="mt-5"></div>
       <div class="col-12 col-md-12 col-lg-12">
        <h1 style="margin-top:80px; margin-bottom:20px; font-weight:700;">Resultat Etudiants</h1>
       </div>



    <div class="response"></div>

    <input type="hidden" id="admin" value="<?php echo $_SESSION['admin'] ?>" />
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
                                                    <form method="POST" action="listNote.php">
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
                                                    <form method="POST" action="listNote.php">
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
                                                    <form method="POST" action="listNote.php">
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
                                                    <form method="POST" action="listNote.php">
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
                                                    <form method="POST" action="listNote.php">
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
                                                    <form method="POST" action="listNote.php">
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
                                                    <form method="POST" action="listNote.php">
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
                                                    <form method="POST" action="listNote.php">
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
                                                    <form method="POST" action="listNote.php">
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
                                                    <form method="POST" action="listNote.php">
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
    $(document).ready(function(){
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
</script>

<?php

ob_end_flush();

?>