<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");


$connexion = new Connexion();
$base=Connexion::getCx();


if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminEnseigner.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <title>Document</title>
</head>

<body>

    <?php include("navadmin.php"); ?>

    <h1 class="m-3">EC par Mention</h1>
    <div>

        <!--Ajouter-->
        <div class="text-center">
            <button class="btn ajoutinsert" data-toggle="modal" data-target="#insert">Inserer</button>
        </div>

        <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center ">
                        <h5 class="modal-title text-capitalize h5" id="exampleModalLabel">Insertion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="start" class="titre">EC:</label><br>
                                <select class="select1" name="matiere" id="matiere">

                                    <?php
                                    $requete = $base->query("select * from MATIERE");

                                    while ($donnees = $requete->fetch()) {
                                    ?>
                                        <option value="<?php echo $donnees['IDMATIERE']; ?>"><?php echo $donnees['INTITULE']; ?></option>
                                    <?php }
                                    $requete->closeCursor();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start" class="titre">Parcours:</label><br>
                                <select class="select" name="parcours" id="parcours">

                                    <?php
                                    $requete = $base->query("select * from FILIERE NATURAL JOIN PARCOURS ORDER BY DIPLOME , FILIERE");

                                    while ($donnees = $requete->fetch()) {
                                    ?>
                                        <option value="<?php echo $donnees['PARCOURS']; ?>"><?php echo $donnees['NOMPARCOURS']; ?></option>
                                    <?php }
                                    $requete->closeCursor();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start" class="titre">Semestre:</label><br>
                                <select class="select" name="semestre" id="semestre">
                                <option selected disabled>....</option>
                                <option class="semestreLicence" value="S1">S1</option>
                                <option class="semestreLicence" value="S2">S2</option>
                                <option class="semestreLicence" value="S3">S3</option>
                                <option class="semestreLicence" value="S4">S4</option>
                                <option class="semestreLicence" value="S5">S5</option>
                                <option class="semestreLicence" value="S6">S6</option>
                                <option class="semestreMaster" value="S7">S7</option>
                                <option class="semestreMaster" value="S8">S8</option>
                                <option class="semestreMaster" value="S9">S9</option>
                                <option class="semestreMaster" value="S10">S10</option>
                                <option class="semestreMaster" value="S11">S11</option>
                                <option class="semestreMaster" value="S12">S12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start" class="titre">Prof:</label><br>
                                <select class="select" name="prof" id="prof">

                                    <?php
                                    $requete = $base->query("select * from PROF");

                                    while ($donnees = $requete->fetch()) {
                                    ?>
                                        <option value="<?php echo $donnees['IDPROF']; ?>"><?php echo $donnees['NOM']; ?></option>
                                    <?php }
                                    $requete->closeCursor();
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="start" class="titre">Mois:</label><br>
                                <select class="select" name="mois" id="mois">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>


                            <div class="modal-footer d-flex justify-content-center">

                                <input type="submit" id="ajouter" class="btn btn-primary" value="Ajouter" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="admin" value="<?php echo $_SESSION['admin'] ?>" />
    <div class="row mt-2">
        <div class="col-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active text-center mt-3" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-licence" role="tab" aria-controls="v-pills-home" aria-selected="true" id="licence">LICENCE<span class="badge badge-danger ml-2" id="notifl"></span></a>
                <a class="nav-link text-center mt-2 master" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-profile" aria-selected="false" id="master">MASTER<span class="badge badge-danger ml-2" id="notifm"></span></a>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-licence" role="tabpanel" aria-labelledby="v-pills-home-tab">



                    <ul class="nav nav-tabs1 nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link licence active" id="home-tab" data-toggle="tab" href="#TIC" role="tab" aria-controls="home" aria-selected="true">TIC<span class="badge badge-danger ml-2" id="notiftic"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  licence" id="profile-tab" data-toggle="tab" href="#CAN" role="tab" aria-controls="profile" aria-selected="false">CAN<span class="badge badge-danger ml-2" id="notifcan"></a>
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
                        <form class="search m-3" method='POST'>
                            <input class="p-1" class="form-control" type='search' id="search" placeholder='recherche' />
                        </form>
                        <div class="tab-pane fade show active" id="TIC" role="tabpanel" aria-labelledby="home-tab">



                        </div>



                        <div class="tab-pane fade" id="CAN" role="tabpanel" aria-labelledby="profile-tab">




                        </div>



                        <div class="tab-pane fade" id="MPJ" role="tabpanel" aria-labelledby="contact-tab">


                        </div>



                        <div class="tab-pane fade" id="MGT" role="tabpanel" aria-labelledby="contact-tab">



                        </div>


                        <div class="tab-pane fade" id="DRT" role="tabpanel" aria-labelledby="contact-tab">



                        </div>

                    </div>



                </div>
                <div class="tab-pane fade" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-profile-tab">





                    <ul class="nav nav-tabs2 nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#TICM" role="tab" aria-controls="home" aria-selected="true">TICM<span class="badge badge-danger ml-2" id="notifticm"></a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#AC" role="tab" aria-controls="profile" aria-selected="false">AC<span class="badge badge-danger ml-2" id="notifac"></a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#MPJM" role="tab" aria-controls="contact" aria-selected="false">MPJM<span class="badge badge-danger ml-2" id="notifmpjm"></a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#MBA" role="tab" aria-controls="contact" aria-selected="false">MBA<span class="badge badge-danger ml-2" id="notifmba"></a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#DRTM" role="tab" aria-controls="contact" aria-selected="false">DRTM<span class="badge badge-danger ml-2" id="notifdrtm"></a></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <form class="search m-3" method='POST'>
                            <input class="p-1" class="form-control" type='search' id="searchm" placeholder='recherche m' />
                        </form>
                        <div class="tab-pane fade show active" id="TICM" role="tabpanel" aria-labelledby="home-tab">


                        </div>


                        <div class="tab-pane fade" id="AC" role="tabpanel" aria-labelledby="profile-tab">


                        </div>


                        <div class="tab-pane fade" id="MPJM" role="tabpanel" aria-labelledby="contact-tab">


                        </div>
                        <div class="tab-pane fade" id="MBA" role="tabpanel" aria-labelledby="contact-tab">


                        </div>


                        <div class="tab-pane fade" id="DRTM" role="tabpanel" aria-labelledby="contact-tab">


                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Updata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">Modifier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="start" class="titre">EC:</label><br>
                            <input type="text" class="form-control" id="matiereup" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">Parcours:</label><br>
                            <input type="text" class="form-control" id="parcoursup" readonly/>
                            <label for="start" class="titre">Parcours:</label><br>
                           
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">Semestre:</label><br>
                            <select name="semestre" id="semestreup">
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="S4">S4</option>
                                <option value="S5">S5</option>
                                <option value="S6">S6</option>
                                <option value="S7">S7</option>
                                <option value="S8">S8</option>
                                <option value="S9">S9</option>
                                <option value="S10">S10</option>
                                <option value="S11">S11</option>
                                <option value="S12">S12</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">Prof:</label><br>
                            <select name="prof" id="profup">

                                <?php
                                $requete = $base->query("select * from PROF");

                                while ($donnees = $requete->fetch()) {
                                ?>
                                    <option value="<?php echo $donnees['IDPROF']; ?>"><?php echo $donnees['NOM']; ?></option>
                                <?php }
                                $requete->closeCursor();
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="start" class="titre">Mois:</label><br>
                            <select name="mois" id="moisup">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="update_fname" class="col-form-label">ID</label>
                            <input type="text" class="form-control" id="hidden" readonly>
                            <input type="text" class="form-control" id="hiddenpar" readonly>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">

                            <input type="submit" id="modifier" class="btn btn-primary" value="Modifier" />
                        </div>
                    </form>
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
        // readData();
        readLTIC();
        readLCAN();
        readLMPJ();
        readLMGT();
        readLDRT();
        readMTICM();
        readMAC();
        readMMPJM();
        readMMBA();
        readMDRTM();
        /* setInterval(readLTIC, 800);
         setInterval(readLCAN, 800);
         setInterval(readLMPJ, 800);
         setInterval(readLMGT, 800);
         setInterval(readLDRT, 800);
         setInterval(readMTICM, 800);
         setInterval(readMAC, 800);
         setInterval(readMMPJM, 800);
         setInterval(readMMBA, 800);
         setInterval(readMDRTM, 800);*/

         //manao click master
        if ($("#admin").val() == 'master') {
            $("#v-pills-home-tab").hide();
            $("#v-pills-profile-tab").click();
            $(".semestreLicence").hide();
        } else if ($("#admin").val() == 'licence') {
            $("#v-pills-profile-tab").hide();
            $("#v-pills-home-tab").click();
            $(".semestreMaster").hide();
        }else{
            $("#v-pills-home-tab").hide();
            $("#v-pills-profile-tab").hide();
            $("#v-pills-licence").hide();
            $("#v-pills-master").hide();
        }


    });


    $(document).on("click", "#ajouter", function(e) {

        e.preventDefault(); //mamono submit
        let parcours = $('#parcours').val();
        let semestre = $('#semestre').val();
        let matiere = $('#matiere').val();
        let prof = $('#prof').val();
        let mois = $('#mois').val();
        //alert(semestre+parcours+matiere+prof);

        $.ajax({
            url: "../controller/contrEnseigner.php", //controller
            method: "POST",
            data: {
                parcours: parcours,
                semestre: semestre,
                matiere: matiere,
                prof: prof,
                mois: mois
            }, //valeur alefa
            success: function(data) {
                if (data == 'efa ao io') {
                    alert('Ajout echec satria efa ao');
                } else {

                    alert('Ajout reussi');
                    readLTIC();
                    readLCAN();
                    readLMPJ();
                    readLMGT();
                    readLDRT();
                    readMTICM();
                    readMAC();
                    readMMPJM();
                    readMMBA();
                    readMDRTM();
                }
            }
        });
    });

    function GetUser(idMatiere,parcours) {
        //$('#hidden').val(inti);   
        $('#hidden').val(idMatiere);
        $('#hiddenpar').val(parcours);
    };


    /*
    $(document).on("click", ".delete", function(e) {
        let idm = $('#idm').val();
        let idp = $('#idp').val();
        let ids = $('#ids').val();
        let action = 'update';
        $.ajax({

            url: "../controller/contrEnseigner.php", //controller
            method: "POST",
            data: {
                idm: idm,
                idp: idp,
                ids: ids,
                action: action
            }, //valeur alefa
            dataType: "json",
            success: function(data) {

                $('#idmup').val(data.matiere);
                $('#idpup').val(data.parcours);
                $('#idsup').val(data.semestre);

            }
        });


    });*/


    $(document).on("click", ".edit", function(e) {
        let id = $('#hidden').val();
        let parcourspar = $('#hiddenpar').val();
        let action = 'update';
        $.ajax({

            url: "../controller/contrEnseigner.php", //controller
            method: "POST",
            data: {
                id: id,
                action: action,
                parcourspar: parcourspar
            }, //valeur alefa
            dataType: "json",
            success: function(data) {

                $('#matiereup').val(data.matiere);
                $('#parcoursup').val(data.parcours);
                $('#semestreup').val(data.semestre);
                $('#profup').val(data.prof);
                $('#moisup').val(data.mois);

            }
        });


    });


    $(document).on("click", "#modifier", function(e) {

        e.preventDefault(); //mamono submit
        let parcoursup = $('#hiddenpar').val();
        let semestreup = $('#semestreup').val();
        let matiereup = $('#hidden').val();
        let profup = $('#profup').val();
        let moisup = $('#moisup').val();

        $.ajax({
            url: "../controller/contrEnseigner.php", //controller
            method: "POST",
            data: {
                parcoursup: parcoursup,
                semestreup: semestreup,
                matiereup: matiereup,
                profup: profup,
                moisup: moisup
            }, //valeur alefa
            success: function(data) {
   
             
                readLTIC();
                readLCAN();
                readLMPJ();
                readLMGT();
                readLDRT();
                readMTICM();
                readMAC();
                readMMPJM();
                readMMBA();
                readMDRTM();

                alert('Modification reussi');
           
        }
        });
    });



    $(document).on("keyup", "#search,#searchm", function() {

        readLTIC();
        readLCAN();
        readLMPJ();
        readLMGT();
        readLDRT();
        readMTICM();
        readMAC();
        readMMPJM();
        readMMBA();
        readMDRTM();
    });


    readLTIC();

    function readLTIC() {
        let LICENCE = "LICENCE";
        let TIC = "TIC";
        let search = $('#search').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                TIC: TIC,
                search: search
            },
            success: function(data) {
                $("#TIC").html(data);
            }
        });
    };


    readLCAN();

    function readLCAN() {
        let LICENCE = "LICENCE";
        let CAN = "CAN";
        let search = $('#search').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                CAN: CAN,
                search: search
            },
            success: function(data) {
                $("#CAN").html(data);
            }
        });
    };

    readLMPJ();

    function readLMPJ() {
        let LICENCE = "LICENCE";
        let MPJ = "MPJ";
        let search = $('#search').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                MPJ: MPJ,
                search: search
            },
            success: function(data) {
                $("#MPJ").html(data);
            }
        });
    };


    readLMGT();

    function readLMGT() {
        let LICENCE = "LICENCE";
        let MGT = "MGT";
        let search = $('#search').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                MGT: MGT,
                search: search
            },
            success: function(data) {
                $("#MGT").html(data);
            }
        });
    };

    readLDRT();

    function readLDRT() {
        let LICENCE = "LICENCE";
        let DRT = "DRT";
        let search = $('#search').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                DRT: DRT,
                search: search
            },
            success: function(data) {
                $("#DRT").html(data);
            }
        });
    };


    readMTICM();

    function readMTICM() {
        let MASTER = "MASTER";
        let TICM = "TICM";
        let search = $('#searchm').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                TICM: TICM,
                search: search
            },
            success: function(data) {
                $("#TICM").html(data);
            }
        });
    };



    readMAC();

    function readMAC() {
        let MASTER = "MASTER";
        let AC = "AC";
        let search = $('#searchm').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                AC: AC,
                search: search
            },
            success: function(data) {
                $("#AC").html(data);
            }
        });
    };


    readMMPJM();

    function readMMPJM() {
        let MASTER = "MASTER";
        let MPJM = "MPJM";
        let search = $('#searchm').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                MPJM: MPJM,
                search: search
            },
            success: function(data) {
                $("#MPJM").html(data);
            }
        });
    };



    readMMBA();

    function readMMBA() {
        let MASTER = "MASTER";
        let MBA = "MBA";
        let search = $('#searchm').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                MBA: MBA,
                search: search
            },
            success: function(data) {
                $("#MBA").html(data);
            }
        });
    };

    readMDRTM();

    function readMDRTM() {
        let MASTER = "MASTER";
        let DRTM = "DRTM";
        let search = $('#searchm').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                DRTM: DRTM,
                search: search
            },
            success: function(data) {
                $("#DRTM").html(data);
            }
        });
    };

    // recherche();
    /*
    function recherche() {

        let search = $('#search').val();
        $.ajax({
            url: "../controller/contrEnseigner.php",
            type: "POST",
            data: {
                search: search
            },
            success: function(data) {
                $("#TIC").html(data);
            }
        });


    }*/
</script>

<?php

ob_end_flush();

?>