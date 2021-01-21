<?php

	require('../../model/Connexion.class.php');
	require('../../model/Suivre.class.php');
	require('../../model/Repecher.class.php');
	require('../../model/Matiere.class.php');
	require('../../model/Etudiant.class.php');
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
<?php
$db = new Connexion();

$suivre = new Suivre();
$repecher = new Repecher();
$etudiant = new Etudiant();
$matiere = new Matiere();
?>

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

            echo "<h1>Listes des Etudiants qui font des rapechages en:" . $resultat['DIPLOME'] . " " . $resultat['FILIERE'] . " " . $resultat['CODE'] . "/" . $semestre . "</h1>";


    ?>
	<div class="table-responsive mt-3">
		<table class="table table-border-danger table-striped">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Matiere à repecher</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
           		<tr>
 

<?php 
	 $filiere = $_POST['fil'];
	 $vague = $_POST['vague'];
	 $matricule = $filiere.'-'.$vague;
	 $res=$suivre->readAllEtudiant($matricule);

		foreach ($res as $resultat) {
			$idEtudiant = $resultat['IDETUDIANTS'];
			$matricule = $resultat['MATRICULE'];
			//echo "<td>".."</td>";

			$res = $repecher->readEtudById($idEtudiant);
			foreach ($res as $resultatRepecher) {
				$idRepecher = $resultatRepecher['IDETUDIANTS'];
				$idMatiere = $resultatRepecher['IDMATIERE'];
				$statut=$resultatRepecher['ETAT'];
					$resEtudiant = $etudiant->readEtudById($idRepecher);
					echo "<br>";
					foreach ($resEtudiant as $resultatEtudiant) {
						$nom = $resultatEtudiant['NOM'];
						echo "<td>".$matricule."</td>";
						echo "<td>".$nom."</td>";
						$prenom = $resultatEtudiant['PRENOM'];
						echo "<td>".$prenom."</td>";
					}
					$resMatiere = $matiere->readMatById($idMatiere);
					foreach ($resMatiere as $resultatMatiere) {
						$intitule = $resultatMatiere['INTITULE'];
						echo "<td>".$intitule."</td>";
					}
						echo "<td>".$statut."</td>";
						echo "</tr></tbody>";
	 
		}

}
}
}
?>

