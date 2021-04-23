<?php
	session_start();

	require('../../model/Suivre.class.php');
	require('../../model/Historique_statu.class.php');
	require('../../model/Connexion.class.php');
	
	$Historique = new Historique_statu();
	$suivre=new Suivre();

	$semestre=$_POST["SEMESTRE"];
	$Classe = $_POST["CLASSE"]."%";

	if ($semestre != '---') {
		if ($semestre == 'S3') {
			$res = $suivre->readIdLike($Classe);
			foreach ($res as $resultat) {

				//copier-na makao table historique_statu aloha ny donner eto
				$Historique->setCodeclasse('1');
				$Historique->setEtudiants($resultat['IDETUDIANTS']);
				$Historique->setEcolage($resultat['ECOLAGE']);
				$Historique->setInscription($resultat['INSCRIPTION']);
				$Historique->createHistorique_statu();

			}
				//akarina aloha semestre izy rehetra eto

				$suivre->setSemestre($semestre);
				$suivre->updateSemestreMiaraka($Classe);

				//modifiena amin'izay ny INSCRIPTION sy ECOLAGE ireo mpianatra matricul Ohatra TIC-V1%

				$suivre->restorSemestre($Classe);


		header('Location:../vue/admission.php');

		}
		else if($semestre == 'S5') {
			$res = $suivre->readIdLike($Classe);
			foreach ($res as $resultat) {

				//copier-na makao table historique_statu aloha ny donner eto
				$Historique->setCodeclasse('2');
				$Historique->setEtudiants($resultat['IDETUDIANTS']);
				$Historique->setEcolage($resultat['ECOLAGE']);
				$Historique->setInscription($resultat['INSCRIPTION']);
				$Historique->createHistorique_statu();

			}
				//akarina aloha semestre izy rehetra eto

				$suivre->setSemestre($semestre);
				$suivre->updateSemestreMiaraka($Classe);

				//modifiena amin'izay ny INSCRIPTION sy ECOLAGE ireo mpianatra matricul Ohatra TIC-V1%

				$suivre->restorSemestre($Classe);


		header('Location:../vue/admission.php');

		}
		else if($semestre == 'S7') {
			$res = $suivre->readIdLike($Classe);
			foreach ($res as $resultat) {

				//copier-na makao table historique_statu aloha ny donner eto
				$Historique->setCodeclasse('3');
				$Historique->setEtudiants($resultat['IDETUDIANTS']);
				$Historique->setEcolage($resultat['ECOLAGE']);
				$Historique->setInscription($resultat['INSCRIPTION']);
				$Historique->createHistorique_statu();

			}
				//akarina aloha semestre izy rehetra eto

				$suivre->setSemestre($semestre);
				$suivre->updateSemestreMiaraka($Classe);

				//modifiena amin'izay ny INSCRIPTION sy ECOLAGE ireo mpianatra matricul Ohatra TIC-V1%

				$suivre->restorSemestre($Classe);


		header('Location:../vue/admission.php');

		}
		else if($semestre == 'S9') {
			$res = $suivre->readIdLike($Classe);
			foreach ($res as $resultat) {

				//copier-na makao table historique_statu aloha ny donner eto
				$Historique->setCodeclasse('4');
				$Historique->setEtudiants($resultat['IDETUDIANTS']);
				$Historique->setEcolage($resultat['ECOLAGE']);
				$Historique->setInscription($resultat['INSCRIPTION']);
				$Historique->createHistorique_statu();

			}
				//akarina aloha semestre izy rehetra eto

				$suivre->setSemestre($semestre);
				$suivre->updateSemestreMiaraka($Classe);

				//modifiena amin'izay ny INSCRIPTION sy ECOLAGE ireo mpianatra matricul Ohatra TIC-V1%

				$suivre->restorSemestre($Classe);


		header('Location:../vue/admission.php');

		}



		else{
			$suivre->setSemestre($semestre);

			$matricule=$_SESSION["matricule"];

			$arrayLength=count($matricule);

			$semestre=$suivre->getSemestre();

			for ($i=0; $i <$arrayLength ; $i++) { 
				$suivre->setMatricule($matricule[$i]);
				$suivre->updateSemestre();
			}

		header('Location:../vue/admission.php');
		}

	}else{

		header('Location:../vue/admission.php?erreur=1');
	}

	
?>
