<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");


if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}


$datefr = new DateFr();

$db = new Connexion();

$suivre = new Suivre();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
    <title>Document</title>
</head>

<body>

    <?php


    if (isset($_POST['sub'])) {

        if (isset($_POST['dip']) and isset($_POST['fil']) and isset($_POST['vague'])) {

            extract($_POST);

            $suivre->setDip($dip);
            $suivre->setFiliere($fil);
            $suivre->setCode($vague);

            $res_Title = $suivre->ListEtudiant();

            foreach ($res_Title as $resultat) {
                $semestre = $resultat['SEMESTRE'];
            }

            echo "<h1>Listes des Etudiants en:" . $resultat['DIPLOME'] . " " . $resultat['FILIERE'] . " " . $resultat['CODE'] . "/" . $semestre . "</h1>";


    ?>

            <div class="table-responsive mt-3">
                <form action="../Controller/controlAdmission.php" method="post">
                      <div class="d-inline-flex p-3 text-white" style="height: 86px;">  
                        <div class="p-2 bg-primary" style="border-radius: 0px 0px 0px 10px;"><label for="select" class="" style="font-size: 22px;">Passer en</label></div>
                        <div class="p-2 bg-primary">
                            <select name="SEMESTRE" class="custom-select mb-3">
                            <option>---</option>
                                <?php
                                    if ($semestre == 'S1') {
                                        echo "<option>S2</option>";
                                    }elseif ($semestre == 'S2') {
                                        echo "<option>S3</option>";
                                    }elseif($semestre == 'S3') {
                                        echo "<option>S4</option>";
                                    }elseif ($semestre == 'S4') {
                                        echo "<option>S5</option>";
                                    }elseif($semestre == 'S5') {
                                        echo "<option>S6</option>";
                                    }elseif ($semestre == 'S6') {
                                        echo "<option>S7</option>";
                                    }elseif($semestre == 'S7') {
                                        echo "<option>S8</option>";
                                    }elseif ($semestre == 'S8') {
                                        echo "<option>S9</option>";
                                    }elseif($semestre == 'S9') {
                                        echo "<option>S10</option>";
                                    }elseif ($semestre == 'S10') {
                                        echo "<option>S11</option>";
                                    }elseif($semestre == 'S11') {
                                        echo "<option>S12</option>";
                                    }else{
                                        echo 'Erreur';
                                    }

                                ?>
                            </select>
                        </div>
                        <div class="p-2 bg-primary" style="border-radius: 0px 10px 0px 0px;"><input type="submit" class="btn btn-primary" value="Envoyer" /></div>
                      </div>
                        
                    <table class="table table-border-danger table-striped">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Semestre</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Diplome En</th>
                                <th>Parcours</th>
                                <th>Filière</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $res = $suivre->ListEtudiant();
                            $matricule=array("");

                            foreach ($res as $resultat) {
                            ?>
                                <tr>
                                    <td><?php echo $resultat['MATRICULE']; ?></td>
                                    <td><?php echo $resultat['SEMESTRE']; ?></td>
                                    <?php
                                        array_push($matricule,$resultat['MATRICULE'] );
                                    ?>
                                    <td><?php echo $resultat['NOM']; ?></td>
                                    <td><?php echo $resultat['PRENOM']; ?></td>
                                    <td><?php echo $resultat['DIPLOME']; ?></td>
                                    <td><?php echo $resultat['PARCOURS']; ?></td>
                                    <td><?php echo $resultat['FILIERE']; ?></td>

                                </tr>
                            <?php } 
                                $_SESSION['matricule']=$matricule;
                            ?>

                        </tbody>
                    </table>
                    <input type="hidden" name="dip" value="<?php echo $dip; ?>" />
                    <input type="hidden" name="fil" value="<?php echo $fil; ?>" />
                    <input type="hidden" name="vague" value="<?php echo $vague; ?>" />
                    
                </form>
            </div>
    <?php

        }
    }

    ?>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>







<?php

ob_end_flush();

?>