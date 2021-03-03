<?php

ob_start();

session_start();



if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}



?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vue/css/adminMatiere.css" type="text/css" />
    <link rel="stylesheet" href="../vue/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
    <title>Document</title>
</head>

<body>

    <?php include("navadmin.php"); ?>
    <h1 class="m-5">Element Constitutif</h1>

   

    <div class="container">

        <form class="search m-3" method='POST'>
            <input class="p-1" type='search' id='search' placeholder='recherche' />
        </form>

        <div id="tabmat">

        </div>

    </div>

    <script src="../vue/js/jquery.min.js"></script>
    <script src="../vue/js/popper.js"></script>
    <script src="../vue/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        readMat();
        recherche();

        // setInterval(recherche, 1000);


    });

    $(document).on("keyup", "#search", function() {
        recherche();
    });









    readMat();

    function readMat() {

        let tabmat = '';

        $.ajax({
            url: "contrMatiere.php",
            type: "POST",
            data: {
                tabmat: tabmat
            },
            success: function(data) {
                $("#tabmat").html(data);
            }
        });

    };

    recherche();

    function recherche() {

        let search = $('#search').val();
        $.ajax({
            url: "contrMatiere.php",
            type: "POST",
            data: {
                search: search
            },
            success: function(data) {
                $("#tabmat").html(data);
            }
        });


    }
</script>

<?php

ob_end_flush();

?>