<?php

ob_start();

session_start();



if (!isset($_SESSION['matriculeadmin'])) {

    header("location: Succes");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vue/css/admin.css" type="text/css" />
    <link rel="stylesheet" href="../vue/css/animate.css" type="text/css" />
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img src="../vue/image/logo E-media.png" height="40" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php">Inscription<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminEtudiant.php">Etudiant</a>
                    </li>
                    <li class="nav-item active">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" style="cursor :pointer;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cours</a>
                            <div class="dropdown-menu" aria-labelldby="dropdownMenuLink">
                                <a class="dropdown-item" href="adminMatiere.php">Ajout EC</a>
                                <a class="dropdown-item" href="adminEnseigner.php">Ajout EC par Mention</a>
                                <a class="dropdown-item" href="adminDossier.php">Ajout des Formations</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" style="cursor :pointer;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Examen</a>
                            <div class="dropdown-menu" aria-labelldby="dropdownMenuLink">
                            <a class="nav-link" href="adminExam.php">Ajout Examen</a>
                               
                                
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminMessage.php">Message</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="btn btn-danger" href="../vue/logoutadmin.php">Se deconnecter</a>-->
                        <a href="logoutadmin.php">
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
    <div class="modal fade"  id="modsearch" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



    

    
    </div>

    <script src="../vue/js/jquery.min.js"></script>
    <script src="../vue/js/popper.js"></script>
    <script src="../vue/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
            url: "ajoutLogin.php",
            type: "POST",
            data: {
                search: search
            },
            success: function(data) {
                $("#tabet").html(data);
            }
        });


    }

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
                url: "contrStatus.php",
                method:"POST",
                data: {update_last_activity: update_last_activity},
                success: function (data) {
                    
                }
            });
        };


    function readNotifl() {
        let readNotifl = "readNotifl";
        $.ajax({
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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
            url: "ajoutLogin.php",
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