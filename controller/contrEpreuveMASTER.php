<?php 

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}
if (!isset($_SESSION['session_exam'])) {

    header("location: Accueil");
}

$exam = new ExamMBA();

$exam->setIdsessiondexam($id_session_exam);
$exam->setIdmatiere($id_matiere);
$exam->setIdtypedexam($id_type_exam);
$exam->setCode($vague);
$res = $exam->listexam_format();

$matiere = new Matiere();
$matiere->setId_matiere($id_matiere);
$mat = $matiere->listMatiere_id_MASTER_V7();

?>  