<?php

	require('../../model/Connexion.class.php');
	require('../../model/Resultat.class.php');
	require('../../model/Repecher.class.php');
	require('../../model/Matiere.class.php');
	require('../../model/Etudiant.class.php');

$db = new Connexion();

$resultat = new Resultat();
$repecher = new Repecher();
$etudiant = new Etudiant();
$matiere = new Matiere();
$nombreEtudiant = 0;
$nombreMatiere = 0;

//maka idEtudiants rehetra
$resEtudiant = $etudiant->readAllEtud();
foreach ($resEtudiant as $resultatEtudiant) {
	$nombreEtudiant = $nombreEtudiant +2;
}

//maka idMatiere rehetre
$resMatiere = $matiere->readAllMatiere();
foreach ($resMatiere as $resultatMatiere) {
	$nombreMatiere = $nombreMatiere +2;
}

//fafana daholo aloha ny ao table repecher de aveo verenana inserena daholo
//manjary misy erreur satria miverina soratana clé primaire mitovy teo aloha
for ($idMatiere = 0; $idMatiere < $nombreMatiere; $idMatiere++) {
	$repecher->deleteMatById($idMatiere);
}

//insertion makao amin'ny table repecher
for ($maxIdEtudiants = 0; $maxIdEtudiants < $nombreEtudiant ; $maxIdEtudiants++) { 
	for ($maxIdMatiere = 0; $maxIdMatiere < $nombreMatiere ; $maxIdMatiere++) {
		$resultat->setEtudiant($maxIdEtudiants);
		$resultat->setMatiere($maxIdMatiere);
		$resMoyenne = $resultat->selectMoyenne();
			foreach ($resMoyenne as $resultatMoyenne) {
				$moyenne = $resultatMoyenne['MOYENNE'];

				if ($moyenne < 10 and $moyenne != 0){
					$repecher->setIdEtudiant($maxIdEtudiants);
					$repecher->setIdMatiere($maxIdMatiere);
					$repecher->setEtat("NON PAYER");
					$repecher->create();
				}
			}
	}
}

	header('location: ../vue/AdminRepechage.php');
?>