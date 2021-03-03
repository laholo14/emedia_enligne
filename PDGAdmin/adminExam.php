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
    <link rel="stylesheet" href="../vue/css/adminExam.css" type="text/css" />
    <link rel="stylesheet" href="../vue/css/admin.css" type="text/css" />

    <link rel="stylesheet" href="css/animate.css" type="text/css" />

    <title>Document</title>
</head>



<body>

    <?php include("navadmin.php"); ?>

    <div class="d-flex" id="content-wrapper">
        <div id="sidebar-container" class="bg-light border-right pt-5">


            <div class="menu list-group-flush">

                <a href="#" id="mensuel" class="option list-group-item mt-4 list-group-item-action p-3 border-0"><i class="fas fa-file-alt lead mr-2"></i> Examen Mensuel</a>
                <a href="#" id="semestriel" class="option list-group-item mt-3 list-group-item-action p-3 border-0"><i class="fas fa-file-word lead mr-2"></i> Examen Semestriel</a>
              

            </div>
        </div>
        <div class="w-100 bg overflow-auto" style="height: 800px !important;">
            <button class="btn  ml-3 mt-3" id="menu-toggle"><i class="fas fa-bars lead"></i></button>
            <section class="container pt-5">
                <div class="contenu ">
                    <h1 class="">Examen Mensuel</h1>
                    <div class="form-group">
                            <input type="hidden" name="session_exam" class="form-control" id="session_exam" value="1" readonly>
                        </div>
                    <div class="container-fluid">

                        <form class="search m-3" method='POST'>
                            <input class="p-1" class="form-control" type='search' id='search' placeholder='recherche' />
                        </form>

                        <div id="tabexam">

                        </div>

                    </div>
                </div>
            </section>
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
        //listExam();
        $("#mensuel").click(function(e) {
            e.preventDefault();
            $('h1').text('Examen Mensuel');
            $('#session_exam').val('1');

            listExam();
        });

        $("#semestriel").click(function(e) {
            e.preventDefault();
            $('h1').text('Examen Semestriel');
            $('#session_exam').val('2');

            listExam();
        });

        recherche();

    });



    listExam();

    function listExam() {

        let tabexam = '';
        let session_exam = $('#session_exam').val();

        $.ajax({
            url: "contrExam.php",
            type: "POST",
            data: {
                tabexam: tabexam,
                session_exam: session_exam
            },
            success: function(data) {
                $("#tabexam").html(data);
            }
        });

    };

    $(document).on("keyup", "#search", function() {
        recherche();
    });
    recherche();

    function recherche() {
        let search = $('#search').val();
        let session_exam = $('#session_exam').val();
        $.ajax({
            url: "contrExam.php",
            type: "POST",
            data: {
                search: search,
                session_exam: session_exam
            },
            success: function(data) {
                $("#tabexam").html(data);
            }
        });
    }
</script>

<?php

ob_end_flush();

?>