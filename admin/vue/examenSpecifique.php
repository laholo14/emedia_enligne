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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/adminDossier.css" type="text/css" />
    <link rel="stylesheet" href="css/admin.css" type="text/css" />

    <title>Document</title>
</head>



<body>

    <?php include("navadmin.php"); ?>

    <h1 class="">Insertion Examen Specifique</h1>

    <form method="POST" action="../controller/contrExamSpecifique.php">
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/Myji.js"></script>
</body>

</html>

<script>

</script>

<?php

ob_end_flush();

?>