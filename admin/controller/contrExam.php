
<?php 

ob_start();

session_start();

function loadclass($class){
  
    require "../../model/".$class.'.class.php';
  }

  spl_autoload_register("loadclass");

$db = new Connexion();

if(isset($_POST['session_exam']) and isset($_POST['matiere']) and isset($_POST['format'])){

    extract($_POST);

    $exam = new Exam();
    $mat = new Matiere();
    $mat->setId_matiere($matiere);
    $res  = $mat->listMatiere_id();
    foreach ($res as $resultat) {
        $nomat = $resultat['INTITULE'];
    }
    $exam->setMatiere($matiere);
    $exam->setSessiondexam($session_exam);
    $exam->setTypedexam($format);


    if (!empty($durre_redac) and !empty($question_redac) and empty($durre_qcm) and empty($question_qcm) and empty($reponse_qcm)){

        $exam->setSujet($question_redac);
        $exam->setDurre($durre_redac);
       // $exam->setQcm('');

    }else if(empty($durre_redac) and empty($question_redac) and !empty($durre_qcm) and !empty($question_qcm) and !empty($reponse_qcm)){

        $exam->setSujet($question_qcm);
        $exam->setDurre($durre_qcm);
        $exam->setQcm($reponse_qcm);
       

    } else{
        $infos = pathinfo($_FILES["sujet"]["name"]);
        $extension = $infos["extension"];
        move_uploaded_file($_FILES["sujet"]["tmp_name"], "../../Exam/" . $nomat .'_Exam_' .$session_exam. '.' . $extension);
        $exam->setSujet($nomat .'_Exam_' .$session_exam. '.' . $extension);
        $exam->setDurre($durre_upload);
        //$exam->setQcm('');

    }

    $exam->insertExam(); 
    echo 'success';
}

//list
if(isset($_POST['tabexam']) and isset($_POST['session_exam'])){
    extract($_POST);
    $exam = new Exam();

    $table =
    ' <div class="table-responsive mt-3">
        <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th class="text-center">Intitulé</th>
                <th class="text-center">Session</th>
                <th class="text-center">Format</th>
                <th class="text-center">Sujet</th>
                <th class="text-center">Durré</th>
                <th class="text-center">QCM</th>
                <th class="text-center">Modifier</th>
        </thead>';
        $exam->setSessiondexam($session_exam);
        $res = $exam->listexam();
        foreach ($res as $resultat) {
            $table .= '<tbody>
                <tr>
                    <td class="text-center">' . $resultat['INTITULE'] . '</td>
                    <td class="text-center">' . $resultat['SESSIONDEXAM'] . '</td>
                    <td class="text-center">' . $resultat['TYPEDEXAM'] . '</td>
                    <td class="text-center">' . $resultat['SUJET'] . '</td>
                    <td class="text-center">' . $resultat['DURRE'] . '</td>
                    <td class="text-center">' . $resultat['QCM'] . '</td>
                   
                    <td class="text-center"> <button class="btn btn-outline-primary edit" data-toggle="modal" data-target="#Updata" onclick="GetUser(' . $resultat['IDMATIERE'] .','.$resultat['IDSESSIONDEXAM'].','.$resultat['IDTYPEDEXAM']. ')"><img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
                </tr>
             </tbody>';
        } 

        $table .= '</table>';
        echo $table; 

}

if(isset($_POST['search'])){
    extract($_POST);
    $exam = new Exam();

    $table =
    ' <div class="table-responsive mt-3">
        <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th class="text-center">Intitulé</th>
                <th class="text-center">Session</th>
                <th class="text-center">Format</th>
                <th class="text-center">Sujet</th>
                <th class="text-center">Duré</th>
                <th class="text-center">QCM</th>
                <th class="text-center">Modifier</th>
                
        </thead>';
        $exam->setSessiondexam($session_exam);
        $res = $exam->search($search.'%');
        foreach ($res as $resultat) {
            $table .= '<tbody>
                <tr>
                    <td class="text-center">' . $resultat['INTITULE'] . '</td>
                    <td class="text-center">' . $resultat['SESSIONDEXAM'] . '</td>
                    <td class="text-center">' . $resultat['TYPEDEXAM'] . '</td>
                    <td class="text-center">' . $resultat['SUJET'] . '</td>
                    <td class="text-center">' . $resultat['DURRE'] . '</td>
                    <td class="text-center">' . $resultat['QCM'] . '</td>
                   
                    <td class="text-center"> <button class="btn btn-outline-primary edit" data-toggle="modal" data-target="#Updata" onclick="GetUser(' . $resultat['IDMATIERE'] .','.$resultat['IDSESSIONDEXAM'].','.$resultat['IDTYPEDEXAM']. ',\''.$resultat['INTITULE'].'\',\''.$resultat['SESSIONDEXAM'].'\',\''.$resultat['TYPEDEXAM'].'\')"><img src="image/edit.png" width="30px" height="30px" alt=""></button></td>
                </tr>
             </tbody>';
        } 

        $table .= '</table>';
        echo $table; 

}


if(isset($_POST['id_session_up']) and isset($_POST['id_matiere_up']) and isset($_POST['id_type_up'])){

    extract($_POST);

    $exam = new Exam();
    $mat = new Matiere();
    $mat->setId_matiere($id_matiere_up);
    $res  = $mat->listMatiere_id();
    foreach ($res as $resultat) {
        $nomat = $resultat['INTITULE'];
    }
    $exam->setMatiere($id_matiere_up);
    $exam->setSessiondexam($id_session_up);
    $exam->setTypedexam($id_type_up);


    if (!empty($durre_redac_up) and !empty($question_redac_up) and empty($durre_qcm_up) and empty($question_qcm_up) and empty($reponse_qcm_up)){

        $exam->setSujet($question_redac_up);
        $exam->setDurre($durre_redac_up);
       
        $exam->setQcm(NULL);

    }else if(empty($durre_redac_up) and empty($question_redac_up) and !empty($durre_qcm_up) and !empty($question_qcm_up) and !empty($reponse_qcm_up)){

        $exam->setSujet($question_qcm_up);
        $exam->setDurre($durre_qcm_up);
        $exam->setQcm($reponse_qcm_up);
     

    } else{
        $infos = pathinfo($_FILES["sujet_up"]["name"]);
        $extension = $infos["extension"];
        move_uploaded_file($_FILES["sujet_up"]["tmp_name"], "../../Exam/" . $nomat .'_Exam_' .$id_session_up. '.' . $extension);
        $exam->setSujet($nomat .'_Exam_'.$id_session_up. '.' . $extension);
       
        $exam->setDurre($durre_upload_up);
        $exam->setQcm(NULL);

    }

    $exam->update(); 

    echo 'success';
}

if(isset($_POST['action']) and isset($_POST['session']) and isset($_POST['matiere']) and isset($_POST['type'])){
    extract($_POST);
    $exam = new Exam();
    if ($_POST["action"] == "update") {
        $exam->setMatiere($matiere);
        $exam->setSessiondexam($session);
        $exam->setTypedexam($type);
        $res = $exam->listexam_format();
        foreach($res as $resultat){
            $output['durre'] = $resultat['DURRE'];
            $output['sujet'] = $resultat['SUJET'];
            $output['reponse_qcm'] = $resultat['QCM'];      
        }
       
        echo json_encode($output);
    }

}

ob_end_flush();


?>