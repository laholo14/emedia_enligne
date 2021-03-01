<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");



function Insertion($ec, $session_exam, $vague, $duree, $file)
{
    $mat = new Matiere();
    $mat->setId_matiere($ec);
    $res  = $mat->readById();
    foreach ($res as $resultat) {
        $nomat = $resultat['INTITULE'];
    }
    $exam = new Exam();
    $exam->setIdmatiere($ec);
    $exam->setIdsessiondexam($session_exam);
    $exam->setIdtypedexam("1");
    $exam->setCode($vague);
    $exam->setDurre($duree);
    $exam->setQcm(NULL);
    $infos = pathinfo(($file["name"]));
    $extension = $infos["extension"];
    move_uploaded_file($file["tmp_name"], "../../Exam/" . $nomat . '_' . $vague . '_Exam_' . $session_exam . '.' . $extension);

    $exam->setSujet($nomat . '_' . $vague . '_Exam_' . $session_exam . '.' . $extension);
    $exam->insertExam();
}


if (isset($_FILES['sujet'])) {
    if (!empty($_FILES['sujet']) and !empty($_POST['session_exam']) and !empty($_POST['ec']) and !empty($_POST['vague']) and !empty($_POST['duree'])) {
        extract($_POST);

        Insertion($ec, $session_exam, $vague, $duree, $_FILES['sujet']);


        echo "OK";
    } else {
        echo "fenoy daholo";
    }
}

if (isset($_FILES['sujet_sem'])) {
    if (!empty($_FILES['sujet_sem']) and !empty($_POST['session_exam_sem']) and !empty($_POST['ec_sem']) and !empty($_POST['vague_sem']) and !empty($_POST['duree_sem'])) {
        extract($_POST);

        Insertion($ec_sem, $session_exam_sem, $vague_sem, $duree_sem, $_FILES['sujet_sem']);


        echo "OK";
    } else {
        echo "fenoy daholo";
    }
}


?>



<?php ?>