<?php
	session_start();

	require('../../model/Suivre.class.php');
	require('../../model/Connexion.class.php');

	$db=new Connexion;	
	$suivre=new Suivre();

	$semestre=$_POST["SEMESTRE"];

	if ($semestre != '---') {
		$suivre->setSemestre($semestre);

		$matricule=$_SESSION["matricule"];

		$arrayLength=count($matricule);

		$semestre=$suivre->getSemestre();

		for ($i=0; $i <$arrayLength ; $i++) { 
			$suivre->setMatricule($matricule[$i]);
			$suivre->updateSemestre();
		}

		header('Location:../vue/admission.php');
	}else{

		header('Location:../vue/admission.php?erreur=1');
	}

	
?>