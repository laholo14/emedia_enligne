<?php

ob_start();

session_start();

include("../Controleur/contrloginadmin.php");

$connexion = new Connexion();



if(!isset($_SESSION['matriculeadmin'])){ 

    header("location: ../../admin/index.php");

}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css" type="text/css"/>
    <link rel="stylesheet" href="css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img src="image/logo E-media.png" height="40" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
              
                    <li class="nav-item">
                        <a class="nav-link" href="../Bureau">Inscription<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminEtudiant.php">Etudiant</a>
                    </li>
                    <li class="nav-item active">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" style="cursor :pointer;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cours</a>
                            <div class="dropdown-menu" aria-labelldby="dropdownMenuLink">
                                <a class="dropdown-item" href="adminCours.php">Ajout cours</a>
                                <a class="dropdown-item" href="adminMatiere.php">Ajout matiere</a>
                                <a class="dropdown-item" href="adminDossier.php">Ajout des Formations</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Message</a>
                    </li>
                    <li class="nav-item">
                    <a class="btn btn-danger" href="logoutadmin.php">Se deconnecter</a>   
                    </li>
                </ul>

            </div>
        </div>
    </nav>

<h1>Cours</h1>

<script src="js/jquery.min.js"></script> 
<script src="js/popper.js"></script>
<script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<script>

</script>
<?php 

ob_end_flush();

?>