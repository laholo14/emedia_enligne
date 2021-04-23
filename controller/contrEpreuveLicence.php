<?php 

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}
if (!isset($_SESSION['session_exam'])) {

    header("location: Accueil");
}

$exam = new Exam();

$exam->setSessiondexam($id_session_exam);
$exam->setMatiere($id_matiere);
$exam->setTypedexam($id_type_exam);
$res = $exam->listexam_format();

$matiere = new Matiere();
$matiere->setId_matiere($id_matiere);
$mat = $matiere->listMatiere_id();

?>  