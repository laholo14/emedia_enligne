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
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminMatiere.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
    <title>Document</title>
</head>

<body>

    <?php include("navadmin.php"); ?>
    <h1 class="mt-2">Element Constitutif</h1>

    <form class="intitule text-center mt-3" method="POST">
        <label><b>L'intitulé de l'UE:</b></label>
        </br>
        <input type="text" id='ue' name='ue' />
        <input class="ajout btn btn-primary" type='submit' id='ajoutue' value='Ajouter' name='ajoutue' />
    </form>

    <div class="container">

        <form class="search m-3" method='POST'>
            <input class="p-1" type='search' id='search' placeholder='recherche' />
        </form>

        <div id="tabue">

        </div>

    </div>
            <div class="modal fade" id="Updata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center ">
                                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Modifier les UE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="update_fname" class="col-form-label">Intitule</label>
                                        <input type="text" class="form-control" id="ueup">
                                    </div>

                                    <div class="form-group">
                                        <label for="update_fname" class="col-form-label">ID</label>
                                        <input type="text" class="form-control" id="hidden" readonly>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                    <input type="submit" id="modifier" class="btn btn-primary" value="Modifier" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        readUe();
        recherche();

        // setInterval(recherche, 1000);


    });

    $(document).on("keyup", "#search", function() {
        recherche();
    });
    function GetUser(idue) {
        $('#hidden').val(idue);
    };$(document).on("click", "#ajoutmat", function(e) {

        e.preventDefault(); //mamono submit
        let intitule = $('#matiere').val();
        let idue=$('#ue').val();
        if (intitule != '') {
             $.ajax({
                url: "../Controller/contrAjoutMatiere.php", //Controller
                method: "POST",
                data: {
                    intitule: intitule,
                    idue:idue
                },//valeur alefa
                 success: function(data) {
                    alert(data);
                    recherche();
                }
            });
            $('#matiere').val('');
        } else {
            alert("Intitulé  obligatoire");
        }
    });
    $(document).on("click", "#ajoutue", function(e) {

    e.preventDefault(); //mamono submit
    let intitule = $('#ue').val();
    if (intitule != '') {
        $.ajax({
            url: "../Controller/contrAjoutUe.php", //Controller
            method: "POST",
            data: {
                intitule: intitule
            },//valeur alefa
            success: function(data) {
                alert(data);
                recherche();
            }
        });
        $('#ue').val('');
    } else {
        alert("Intitulé  obligatoire");
    }
    });
    $(document).on("click", ".edit", function(e) {
        let id = $('#hidden').val();
        let action = 'update';
        $.ajax({

            url: "../Controller/contrUe.php", //Controller
            method: "POST",
            data: {
                id: id,
                action: action
            }, //valeur alefa
            dataType: "json",
            success: function(data) {

                $('#ueup').val(data.ue);

            }
        });
    });
    $(document).on("click", "#modifier", function(e) {

        e.preventDefault(); //mamono submit

        let idue = $('#hidden').val();
        let intituleup = $('#ueup').val();

        if (intituleup != '') {

            $.ajax({
                url: "../Controller/contrUe.php", //Controller
                method: "POST",
                data: {
                    intituleup: intituleup,
                    idue:idue
                }, //valeur alefa
                success: function(data) {
                    alert("Modification reussi...");
                    readUe();
                    recherche();    
                }
            });

        } else {
            alert("Intitulé  obligatoire");
        }
    });


    readUe();

    function readUe() {

        let tabue = '';

        $.ajax({
            url: "../Controller/contrUe.php",
            type: "POST",
            data: {
                tabue: tabue
            },
            success: function(data) {
                $("#tabue").html(data);
            }
        });

    };
    $(document).on("click", "#modifier", function(e) {

    e.preventDefault(); //mamono submit

    let idue = $('#hidden').val();
    let intituleue = $('#ueup').val();

    if (intituleup != '') {

        $.ajax({
            url: "../Controller/contrMatiere.php", //Controller
            method: "POST",
            data: {
                intituleup: intituleue,
                idup: ueup
            }, //valeur alefa
            success: function(data) {
                alert("Modification reussi...");
                readUe();
                recherche();   
                alert(data) 
            }
        });

    } else {
        alert("Intitulé  obligatoire");
    }
    });


    recherche();

    function recherche() {

        let search = $('#search').val();
        $.ajax({
            url: "../Controller/contrUe.php",
            type: "POST",
            data: {
                search: search
            },
            success: function(data) {
                $("#tabue").html(data);
            }
        });


    }
</script>

<?php

ob_end_flush();

?>