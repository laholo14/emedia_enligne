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

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vue/css/adminEnseigner.css" type="text/css" />
    <link rel="stylesheet" href="../vue/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
    <title>Document</title>
</head>

<body>

    <?php include("navadmin.php"); ?>

    <h1 class="m-5">EC par Mention</h1>

    </div>

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

    


    <script src="../vue/js/jquery.min.js"></script>
    <script src="../vue/js/popper.js"></script>
    <script src="../vue/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
    
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
            url: "contrEnseigner.php",
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
            url: "contrEnseigner.php",
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
            url: "contrEnseigner.php",
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
            url: "contrEnseigner.php",
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
            url: "contrEnseigner.php",
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
            url: "contrEnseigner.php",
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
            url: "contrEnseigner.php",
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
            url: "contrEnseigner.php",
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
            url: "contrEnseigner.php",
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
            url: "contrEnseigner.php",
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
    
</script>

<?php

ob_end_flush();

?>