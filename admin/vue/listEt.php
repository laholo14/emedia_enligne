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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css" type="text/css" />
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
                <form action="excel.php" method="post">
                    <table class="table table-border-danger table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Matricule</th>
                                <th>Semestre</th>
                                <!-- <th>Vague</th> -->
                                <!-- <th>Inscription</th>
                                <th>Ecolage</th>-->
                                <th>Date de validation</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <!-- <th>Diplome En</th> -->
                                <th>Parcours</th>
                                <th>Contact</th>
                                <th>Mail</th>
                                <!-- <th>Filière</th> -->
                                <th>Nationalité</th>
                                <th>Sexe</th>
                                <th>Date de naissance</th>
                                <th>Lieu de naissance</th>
                                <th>Ecolage</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $res = $suivre->ListEtudiant();

                            foreach ($res as $resultat) {
                            ?>
                                <tr>
                                    <td><?php echo $resultat['IDETUDIANTS']; ?></td>
                                    <td><?php echo $resultat['MATRICULE']; ?></td>
                                    <td><?php echo $resultat['SEMESTRE']; ?></td>
                                    <!-- <td><?php/* echo $resultat['CODE'];*/ ?></td> -->
                                    <!--    <td><?php if ($resultat['INSCRIPTION'] == 0) {
                                                    echo "<b style='color:red;'>Non payé</b>";
                                                } else {
                                                    echo "<b style='color:#0fcc19;'>Payé</b>";
                                                }
                                                ?></td>
                                    <td><?php echo $resultat['ECOLAGE'] . '/8'; ?></td>-->
                                    <td><?php echo $datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y ") ?></td>
                                    <td><?php echo $resultat['NOM']; ?></td>
                                    <td><?php echo $resultat['PRENOM']; ?></td>
                                    <!-- <td><?php/* echo $resultat['DIPLOME'];*/ ?></td> -->
                                    <td><?php echo $resultat['PARCOURS']; ?></td>
                                    <td><?php echo $resultat['NUMERO']; ?></td>
                                    <td><?php echo $resultat['MAIL']; ?></td>
                                    <!-- <td><?php/* echo $resultat['FILIERE']; */?></td> -->
                                    <td><?php echo $resultat['NATIONALITE']; ?></td>
                                    <td><?php echo $resultat['SEXE']; ?></td>
                                    <td><?php echo $resultat['DATENAIS']; ?></td>
                                    <td><?php echo $resultat['LIEUNAISS']; ?></td>
                                    <td><?php echo $resultat['ECOLAGE']; ?>/8</td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <input type="hidden" name="dip" value="<?php echo $dip; ?>" />
                    <input type="hidden" name="fil" value="<?php echo $fil; ?>" />
                    <input type="hidden" name="vague" value="<?php echo $vague; ?>" />
                    <span class="row justify-content-center">
                        <input type="submit" name="eport_excel" class="btn btn-primary" value="Exporter en Excel" />
                    </span>
                </form>
            </div>
    <?php

        }
    }

    ?>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>







<?php

ob_end_flush();

?>