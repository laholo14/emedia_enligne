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
        <input type="text" id='matiere' name='matiere' />
        <input class="ajout btn btn-primary" type='submit' id='ajoutmat' value='Ajouter' name='ajoutmat' />
    </form>

    <div class="container">

        <form class="search m-3" method='POST'>
            <input class="p-1" type='search' id='search' placeholder='recherche' />
        </form>

        <div id="tabmat">

        </div>

    </div>

    <div class="modal fade" id="Updata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">Modifier les EC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="update_fname" class="col-form-label">Intiule</label><br>
                            <input type="text" class="form-control" id="matiereup">

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
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

<?php

ob_end_flush();

?>