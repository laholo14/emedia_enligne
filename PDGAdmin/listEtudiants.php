<?php 

ob_start();

session_start();

require_once("../model/Connexion.class.php");

require_once("../model/Etudiant.class.php");

require_once("../model/Suivre.class.php");

if(!isset($_SESSION['matriculeadmin'])){ 

    header("location: ../Suppr");

}




function dateToFrench($date, $format) 
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}



$suivre = new Suivre();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vue/css/admin.css" type="text/css"/>
    <link rel="stylesheet" href="../vue/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <img src="../vue/image/logo E-media.png" height="40" alt="">
            <h3 class="ml-2 mt-1 text-center">ETUDIANTS</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="adminEtudiant.php">Retour<span class="sr-only">(current)</span> </a>
                    </li>
                    <li class="nav-item">
                    <a class="btn btn-danger" href="logoutadmin.php">Se deconnecter</a>   
                    </li>
                </ul>

            </div>
        </div>
    </nav>

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

        echo "<h1>Listes des Etudiants en:" . $resultat['DIPLOME'] . " " . $resultat['FILIERE'] . " " . $resultat['CODE'] . "/" . $semestre."</h1>";


?>

        <div class="table-responsive mt-3">
            <form action="excel.php" method="post">
                <table class="table table-border-danger table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Matricule</th>
                            <th>Semestre</th>
                            <th>Vague</th>
                            <th>Inscription</th>
                            <th>Ecolage</th>
                            <th>Date de validation</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Diplome En</th>
                            <th>Parcours</th>
                            <th>Contact</th>
                            <th>Mail</th>
                            <th>Filière</th>
                            <th>Nationalité</th>
                            <th>Sexe</th>
                            <th>Date de naissance</th>
                            <th>Lieu de naissance</th>

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
                                <td><?php echo $resultat['CODE']; ?></td>
                                <td><?php if($resultat['INSCRIPTION'] == 0){
                                echo "<b style='color:red;'>Non payé</b>";
                                }else{echo "<b style='color:#0fcc19;'>Payé</b>";}
                                 ?></td>
                                <td><?php echo $resultat['ECOLAGE'].'/8'; ?></td>
                                <td><?php echo dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y ") ?></td>
                                <td><?php echo $resultat['NOM']; ?></td>
                                <td><?php echo $resultat['PRENOM']; ?></td>
                                <td><?php echo $resultat['DIPLOME']; ?></td>
                                <td><?php echo $resultat['PARCOURS']; ?></td>
                                <td><?php echo $resultat['NUMERO']; ?></td>
                                <td><?php echo $resultat['MAIL']; ?></td>
                                <td><?php echo $resultat['FILIERE']; ?></td>
                                <td><?php echo $resultat['NATIONALITE']; ?></td>
                                <td><?php echo $resultat['SEXE']; ?></td>
                                <td><?php echo $resultat['DATENAIS']; ?></td>
                                <td><?php echo $resultat['LIEUNAISS']; ?></td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
              
            </form>
        </div>
<?php

    }
}

?>

</body>

</html>





 




<?php

ob_end_flush();

?>