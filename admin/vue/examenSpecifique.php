<?php

ob_start();

session_start();



if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminDossier.css" type="text/css" />
    <link rel="stylesheet" href="css/admin.css" type="text/css" />

    <link rel="stylesheet" href="css/animate.css" type="text/css" />

    <title>Document</title>
</head>



<body>

    <?php include("navadmin.php"); ?>

    <h1 class="">Insertion Examen Specifique</h1>

    <form method="POST" action="../Controller/contrExamSpecifique.php">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="col-5 form-group mt-5">
                <label for="exampleInputEmail1">Etudiant</label>
                <input type="number" class="form-control" name="idEtudiant" placeholder="IdEtudiant" required>
            </div>
            <div class="col-5  form-group">
                <label for="exampleInputEmail1">Matiere</label>
                <input type="number" class="form-control" name="idmatiere" placeholder="IdMatiere" required>
            </div>
            <div class="col-5 form-group">
                <label for="exampleInputEmail1">Session Examen</label>
                <input type="number" class="form-control" name="idSession" placeholder="IdSession" required>
            </div>
            
            <input type="submit" class="col-2 btn btn-primary" value="ajouter" />
        </div>
    </form>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/Myji.js"></script>
</body>

</html>

<script>
  
</script>

<?php

ob_end_flush();

?>