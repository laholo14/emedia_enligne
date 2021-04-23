<?php

ob_start();

session_start();



if (!isset($_SESSION['matriculeadmin'])) {

    header("location: Succes");
}

function loadclass($class)
{

    require "../../model/" . $class . '.class.php'; 
}

spl_autoload_register("loadclass");


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="admin/vue/css/admin.css" type="text/css" />
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img src="admin/vue/image/logo E-media.png" height="40" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto"> 

                    <li class="nav-item active">
                        <a class="nav-link" href="Bureau">Inscription<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/vue/adminEtudiant.php">Etudiant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/vue/admission.php">Admission</a>
                    </li>
                    <li class="nav-item active">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" style="cursor :pointer;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cours</a>
                            <div class="dropdown-menu" aria-labelldby="dropdownMenuLink">
                            <a class="dropdown-item" href="admin/vue/adminUE.php">Ajout UE</a>
                                <a class="dropdown-item" href="admin/vue/adminMatiere.php">Ajout EC</a>
                                <a class="dropdown-item" href="admin/vue/adminEnseigner.php">Ajout EC par Mention</a>
                                <a class="dropdown-item" href="admin/vue/adminDossier.php">Ajout des Formations</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" style="cursor :pointer;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Examen</a>
                            <div class="dropdown-menu" aria-labelldby="dropdownMenuLink">
                                <a class="nav-link" href="admin/vue/adminExam.php">Ajout Examen</a>
                                <a class="nav-link" href="admin/vue/adminNote.php">Resultat & Note</a>
                                <a class="nav-link" href="admin/vue/AdminRepechage.php">Liste repéchage</a>
                                <a class="nav-link" href="admin/vue/examenSpecifique.php">Insértion Examen Spécifique</a>
                                <a class="nav-link" id='rlv' href="admin/vue/adminReleve.php">Relevés de notes</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/vue/statusEtudiants.php">Statuts des Etudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/vue/adminMessage.php">Message</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="btn btn-danger" href="admin/vue/logoutadmin.php">Se deconnecter</a>-->
                        <a href="admin/vue/logoutadmin.php">
                            <button type="button" class="btn btn-danger">Se deconnecter</button>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div>
        <form class="search m-3" method='POST'>
            <input class="btn btn-primary" data-toggle="modal" data-target="#modsearch" class="form-control" type='button' id='search' placeholder='recherche' value="Rechercher" />
        </form>
    </div>
    <div class="modal fade" id="modsearch" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">Rechercher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">

                    <form class="searchmod" method='POST'>
                        <input class="p-1" class="form-control" type='search' id='searchmod' placeholder='recherche nom ou prenom' />
                        <div id="tabet">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h1 class="m-4">nouveaux Inscrits</h1>

    </div>

    <input type="hidden" id="admin" value="<?php echo $_SESSION['admin'] ?>" />
    <div class="row mt-2">
        <div class="col-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link lic active text-center mt-3 list" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-licence" role="tab" aria-controls="v-pills-home" aria-selected="true">LICENCE<span class="badge badge-danger ml-2" id="notifl"></span></a>
                <a class="nav-link mas text-center mt-2 list" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-profile" aria-selected="false">MASTER<span class="badge badge-danger ml-2" id="notifm"></span></a>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-licence" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="text-center">
                        <span class="btn btn-primary btn-lg btn-block">LICENCE</span>
                    </div>

                    <ul class="nav nav-tabs nav-justified licence" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active list" id="home-tab" data-toggle="tab" href="#TIC" role="tab" aria-controls="home" aria-selected="true">TIC<span class="badge badge-danger ml-2" id="notiftic"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link list" id="profile-tab" data-toggle="tab" href="#CAN" role="tab" aria-controls="profile" aria-selected="false">CAN<span class="badge badge-danger ml-2" id="notifcan"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link list" id="contact-tab" data-toggle="tab" href="#MPJ" role="tab" aria-controls="contact" aria-selected="false">MPJ<span class="badge badge-danger ml-2" id="notifmpj"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link list" id="contact-tab" data-toggle="tab" href="#MGT" role="tab" aria-controls="contact" aria-selected="false">MGT<span class="badge badge-danger ml-2" id="notifmgt"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link list" id="contact-tab" data-toggle="tab" href="#DRT" role="tab" aria-controls="contact" aria-selected="false">DRT<span class="badge badge-danger ml-2" id="notifdrt"></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
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


                    <div class="text-center">
                        <span class="btn btn-danger btn-lg btn-block" id="master">MASTER</span>
                    </div>


                    <ul class="nav nav-tabs nav-justified master" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active list" id="home-tab" data-toggle="tab" href="#TICM" role="tab" aria-controls="home" aria-selected="true">TICM<span class="badge badge-danger ml-2" id="notifticm"></a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link list" id="profile-tab" data-toggle="tab" href="#AC" role="tab" aria-controls="profile" aria-selected="false">AC<span class="badge badge-danger ml-2" id="notifac"></a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link list" id="contact-tab" data-toggle="tab" href="#MPJM" role="tab" aria-controls="contact" aria-selected="false">MPJM<span class="badge badge-danger ml-2" id="notifmpjm"></a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link list" id="contact-tab" data-toggle="tab" href="#MBA" role="tab" aria-controls="contact" aria-selected="false">MBA<span class="badge badge-danger ml-2" id="notifmba"></a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link list" id="contact-tab" data-toggle="tab" href="#DRTM" role="tab" aria-controls="contact" aria-selected="false">DRTM<span class="badge badge-danger ml-2" id="notifdrtm"></a></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
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
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">Ajouter inscritpion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="update_fname" class="col-form-label">Semestre</label><br>
                            <select name="semestre" id="semestre">
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
                            <label for="update_fname" class="col-form-label">Vague</label><br>
                            <select name="vague" id="vague">
                                <?php
                                $requete = Connexion::getCx()->query("SELECT COUNT(*) AS ISA FROM CODECLASSE");
                                $res = $requete->fetchAll();
                                foreach ($res as $co) {
                                    $count = $co["ISA"];
                                }
                                //$count =2;
                                for ($i = 1; $i <= $count; $i++) {
                                ?>
                                    <option value="<?php echo 'V' . $i; ?>"><?php echo 'V' . $i; ?></option>
                                <?php }
                                $requete->closeCursor();
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="update_fname" class="col-form-label">Numero</label>
                            <input type="text" class="form-control" id="numero" required>
                        </div>

                        <div class="form-group">
                            <label for="update_fname" class="col-form-label">ID</label>

                            <input type="text" class="form-control" id="hidden" readonly>
                            <label for="update_fname" class="col-form-label">Message d erreur</label>
                            <input type="text" class="form-control" id="alert" readonly>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">

                            <input type="submit" id="ajouter" class="btn btn-primary" value="Valider" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">Effacer un Inscription </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group purple-border">
                            <label for="message" class="col-form-label">Message:</label><br>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="hiddensup" class="col-form-label">ID</label>
                            <input type="text" class="form-control" id="hiddensup" readonly>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">

                            <input type="submit" id="delete" class="btn btn-primary" value="Supprimer" />
                        </div>
                    </form>
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
        // readData();
        readNotifl();
        readNotifm();
        readNotiftic();
        readNotifcan();
        readNotifmpj();
        readNotifmgt();
        readNotifdrt();
        readNotifticm();
        readNotifac();
        readNotifmpjm();
        readNotifmba();
        readNotifdrtm();
        readLTIC();
        readLCAN();
        readLMPJ();
        readLMGT();
        readLDRT();
        readMTICM();
        readMAC();
        readMMPJM()
        readMMBA();
        readMDRTM();
        recherche();

        update_last_activity();
        // setInterval(readData,1000);
        setInterval(readNotifl, 1000);
        setInterval(readNotifm, 1000);
        setInterval(readNotiftic, 1000);
        setInterval(readNotifcan, 1000);
        setInterval(readNotifmpj, 1000);
        setInterval(readNotifmgt, 1000);
        setInterval(readNotifdrt, 1000);
        setInterval(readNotifticm, 1000);
        setInterval(readNotifac, 1000);
        setInterval(readNotifmpjm, 1000);
        setInterval(readNotifmba, 1000);
        setInterval(readNotifdrtm, 1000);
        setInterval(update_last_activity, 1000);

        //manao click master
        if ($("#admin").val() == 'master') {
            $("#rlv").hide();
            $("#v-pills-home-tab").hide();
            $("#v-pills-profile-tab").click();
            $(".semestreLicence").hide();
        } else if ($("#admin").val() == 'licence') {
            $("#v-pills-profile-tab").hide();
            $("#v-pills-home-tab").click();
            $(".semestreMaster").hide();
        } else {
            $("#v-pills-home-tab").hide();
            $("#v-pills-profile-tab").hide();
            $("#v-pills-licence").hide();
            $("#v-pills-master").hide();
        }


    });






    $(document).on("keyup", "#searchmod", function() {
        recherche();
    });

    $(document).on("click", "#exampleModalLabel", function() {
        recherche();
    });


    recherche();

    function recherche() {

        let search = $('#searchmod').val();
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                search: search
            },
            success: function(data) {
                $("#tabet").html(data);
            }
        });


    }

    function GetUser(idEtudiants) {
        $('#hiddensup').val(idEtudiants);
    };

    function GetUserLtic(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };

    function GetUserLcan(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };

    function GetUserLmpj(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };

    function GetUserLmgt(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };

    function GetUserLdrt(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };

    function GetUserMticm(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };

    function GetUserMac(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };

    function GetUserMmpjm(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };

    function GetUserMmbm(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };

    function GetUserMdrtm(idEtudiants) {
        $('#hidden').val(idEtudiants);
    };



    $(document).on("click", ".list", function() {
        readLTIC();
        readLCAN();
        readLMPJ();
        readLMGT();
        readLDRT();
        readMTICM();
        readMAC();
        readMMPJM()
        readMMBA();
        readMDRTM();
    });


    $(document).on("click", "#ajouter", function(e) {

        e.preventDefault(); //mamono submit

        let vague = $('#vague').val();
        let semestre = $('#semestre').val();
        let numero = $('#numero').val();
        let hidden = $('#hidden').val();

        if (numero != '') {

            $.ajax({
                url: "admin/controller/ajoutLogin.php", //controller
                method: "POST",
                data: {
                    vague: vague,
                    semestre: semestre,
                    numero: numero,
                    ide: hidden
                }, //valeur alefa
                dataType: "json",
                success: function(data) {
                    $('#alert').val(data.alert);
                    readLTIC();
                    readLCAN();
                    readLMPJ();
                    readLMGT();
                    readLDRT();
                    readMTICM();
                    readMAC();
                    readMMPJM()
                    readMMBA();
                    readMDRTM();
                }
            });
        } else {
            alert("Numero obligatoire");
        }
    });



    $(document).on("click", "#delete", function(e) {

        e.preventDefault(); //mamono submit

        let message = $('#message').val();
        let hiddensup = $('#hiddensup').val();

        let conf = confirm("Vous êtes sur de le supprimer?");
        if (conf == true) {
            if (message != '') {
                $.ajax({
                    url: "admin/controller/ajoutLogin.php", //controller
                    method: "POST",
                    data: {
                        message: message,
                        hiddensup: hiddensup
                    }, //valeur alefa
                    success: function(data) {
                        alert("Supression avec succces!!!");
                        readLTIC();
                        readLCAN();
                        readLMPJ();
                        readLMGT();
                        readLDRT();
                        readMTICM();
                        readMAC();
                        readMMPJM()
                        readMMBA();
                        readMDRTM();
                    }
                });
            } else {
                alert("Message obligatoire");
            }
        }
    });


    readNotifl();
    readNotiftic();
    readNotifm();
    readNotifcan();
    readNotifmpj();
    readNotifmgt();
    readNotifdrt();
    readNotifticm();
    readNotifac();
    readNotifmba();
    readNotifdrtm();

    //update last activity
    update_last_activity();

    function update_last_activity() {
        var update_last_activity = "update_last_activity";
        $.ajax({
            url: "admin/controller/contrStatus.php",
            method: "POST",
            data: {
                update_last_activity: update_last_activity
            },
            success: function(data) {

            }
        });
    };


    function readNotifl() {
        let readNotifl = "readNotifl";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifl: readNotifl
            },
            success: function(data) {
                $('#notifl').html(data);
            }
        });
    };


    function readNotifm() {
        let readNotifm = "readNotifm";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifm: readNotifm
            },
            success: function(data) {
                $('#notifm').html(data);
            }
        });
    };
 
    function readNotiftic() {
        let readNotiftic = "readNotiftic";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotiftic: readNotiftic
            },
            success: function(data) {
                $('#notiftic').html(data);
            }
        });
    };


    function readNotifcan() {
        let readNotifcan = "readNotifcan";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifcan: readNotifcan
            },
            success: function(data) {
                $('#notifcan').html(data);
            }
        });
    };

    function readNotifmpj() {
        let readNotifmpj = "readNotifmpj";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifmpj: readNotifmpj
            },
            success: function(data) {
                $('#notifmpj').html(data);
            }
        });
    };

    function readNotifmgt() {
        let readNotifmgt = "readNotifmgt";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifmgt: readNotifmgt
            },
            success: function(data) {
                $('#notifmgt').html(data);
            }
        });
    };


    function readNotifdrt() {
        let readNotifdrt = "readNotifdrt";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifdrt: readNotifdrt
            },
            success: function(data) {
                $('#notifdrt').html(data);
            }
        });
    };


    function readNotifticm() {
        let readNotifticm = "readNotifticm";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifticm: readNotifticm
            },
            success: function(data) {
                $('#notifticm').html(data);
            }
        });
    };

    function readNotifac() {
        let readNotifac = "readNotifac";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifac: readNotifac
            },
            success: function(data) {
                $('#notifac').html(data);
            }
        });
    };

    function readNotifmpjm() {
        let readNotifmpjm = "readNotifmpjm";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifmpjm: readNotifmpjm
            },
            success: function(data) {
                $('#notifmpjm').html(data);
            }
        });
    };


    function readNotifmba() {
        let readNotifmba = "readNotifmba";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifmba: readNotifmba
            },
            success: function(data) {
                $('#notifmba').html(data);
            }
        });
    };


    function readNotifdrtm() {
        let readNotifdrtm = "readNotifdrtm";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            method: "POST",
            data: {
                readNotifdrtm: readNotifdrtm
            },
            success: function(data) {
                $('#notifdrtm').html(data);
            }
        });
    };



    readLTIC();

    function readLTIC() {
        let LICENCE = "LICENCE";
        let TIC = "TIC";
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                TIC: TIC
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
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                CAN: CAN
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
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                MPJ: MPJ
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
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                MGT: MGT
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
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                LICENCE: LICENCE,
                DRT: DRT
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
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                TICM: TICM
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
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                AC: AC
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
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                MPJM: MPJM
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
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                MBA: MBA
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
        $.ajax({
            url: "admin/controller/ajoutLogin.php",
            type: "POST",
            data: {
                MASTER: MASTER,
                DRTM: DRTM
            },
            success: function(data) {
                $("#DRTM").html(data);
            }
        });
    };

</script>
<?php

ob_end_flush();

?>