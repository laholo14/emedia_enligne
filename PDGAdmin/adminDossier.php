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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vue/css/adminDossier.css" type="text/css" />
    <link rel="stylesheet" href="../vue/css/admin.css" type="text/css" />

    <link rel="stylesheet" href="css/animate.css" type="text/css" />

    <title>Document</title>
</head>



<body>

    <?php include("navadmin.php"); ?>

    <h1 class="">Formation</h1>


   

    <div class="container-fluid">

        <form class="search m-3" method='POST'>
            <input class="p-1" class="form-control" type='search' id='search' placeholder='recherche' />
        </form>

        <div id="tabdoc">

        </div>

    </div>


    <script src="../vue/js/jquery.min.js"></script>
    <script src="../vue/js/popper.js"></script>
    <script src="../vue/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../vue/js/Myji.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        readDoc();
        recherche();
        //setInterval(recherche, 1000);


    });







    readDoc();

    function readDoc() {

        let tabdoc = '';

        $.ajax({
            url: "contrDossier.php",
            type: "POST",
            data: {
                tabdoc: tabdoc
            },
            success: function(data) {
                $("#tabdoc").html(data);
            }
        });

    };




    $(document).on("keyup", "#search", function() {
        recherche();
    });
    recherche();

    function recherche() {
        let search = $('#search').val();
        $.ajax({
            url: "contrDossier.php",
            type: "POST",
            data: {
                search: search
            },
            success: function(data) {
                $("#tabdoc").html(data);
            }
        });


    }
</script>

<?php

ob_end_flush();

?>