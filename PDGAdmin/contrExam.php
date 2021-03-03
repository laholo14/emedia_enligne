<?php 

ob_start();

session_start();

function loadclass($class){
  
    require "../model/".$class.'.class.php';
  }

  spl_autoload_register("loadclass");


//list
if(isset($_POST['tabexam']) and isset($_POST['session_exam'])){
    extract($_POST);
    $exam = new Exam();

    $table =
    ' <div class="table-responsive mt-3">
        <table class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th class="">Intitulé</th>
                <th class="">Session</th>
                <th class="">Format</th>
                <th class="">Sujet</th>
                <th class="">Durré</th>
                <th class="">QCM</th>
                
        </thead>';
        $exam->setSessiondexam($session_exam);
        $res = $exam->listexam();
        foreach ($res as $resultat) {
            $table .= '<tbody>
                <tr>
                    <td class="">' . $resultat['INTITULE'] . '</td>
                    <td class="">' . $resultat['SESSIONDEXAM'] . '</td>
                    <td class="">' . $resultat['TYPEDEXAM'] . '</td>
                    <td class="">' . $resultat['SUJET'] . '</td>
                    <td class="">' . $resultat['DURRE'] . '</td>
                    <td class="">' . $resultat['QCM'] . '</td>
                   
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
                <th class="">Intitulé</th>
                <th class="">Session</th>
                <th class="">Format</th>
                <th class="">Sujet</th>
                <th class="">Duré</th>
                <th class="">QCM</th>
                
        </thead>';
        $exam->setSessiondexam($session_exam);
        $res = $exam->search($search.'%');
        foreach ($res as $resultat) {
            $table .= '<tbody>
                <tr>
                    <td class="">' . $resultat['INTITULE'] . '</td>
                    <td class="">' . $resultat['SESSIONDEXAM'] . '</td>
                    <td class="">' . $resultat['TYPEDEXAM'] . '</td>
                    <td class="">' . $resultat['SUJET'] . '</td>
                    <td class="">' . $resultat['DURRE'] . '</td>
                    <td class="">' . $resultat['QCM'] . '</td>
                    
                </tr>
             </tbody>';
        } 

        $table .= '</table>';
        echo $table; 

}


ob_end_flush();

?>