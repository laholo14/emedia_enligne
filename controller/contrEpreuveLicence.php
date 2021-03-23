<?php 

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}
if (!isset($_SESSION['session_exam'])) {

    header("location: Home");
}

$exam = new Exam($db->getcx());

$exam->setSessiondexam($id_session_exam);
$exam->setMatiere($id_matiere);
$exam->setTypedexam($id_type_exam);
$res = $exam->listexam_format();

$matiere = new Matiere($db->getCx());
$matiere->setId_matiere($id_matiere);
$mat = $matiere->listMatiere_id();

?>  