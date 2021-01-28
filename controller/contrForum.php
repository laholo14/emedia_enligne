<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");



$db = new Connexion();


if (isset($_POST['comment_content']) && isset($_POST['comment_id'])) {

    extract($_POST);
    $forum = new Forum();

    $forum->setEtudiant($_SESSION['id']);
    $forum->setFiliere($_SESSION['filiere']);
    $forum->setParcours($_SESSION['parcours']);
    $forum->setVague($_SESSION['vague']);
    $forum->setReply($_POST['comment_id']);
    $forum->setContenu($_POST['comment_content']);

    $forum->insertForum();
}
    //L1L2M1
    //if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
       
        $forum2 = new Forum();
        $suivre = new Suivre();

        $forum2->setFiliere($_SESSION['filiere']);
        $forum2->setVague($_SESSION['vague']);
        $res = $forum2->forumetudaintL1L2M1();
        

        $output = '<div class="card">'; //ny manidy anio div io tokony tsy anaty foreach fa amboary kely
        foreach ($res as $row) {
            $rec = $suivre->readAllById($row['IDETUDIANTS']);
            foreach ($rec as $row1) {
                $name = $row1['MATRICULE'];
            }
            $output .= '
                      <div class="card-header">Envoié par <b>' . $name . '</b> le <i>' . $row["DATEF"] . '</i></div>
                      <div class="card-body"> <p class="card-text" style="color:black !important;">' . $row["CONTENU"] . '</p> </div>
                      <div class="card-footer" align="right"><button type="button" class="btn btn-primary reply" id="' . $row["IDFORUM"] . '">Reply</button></div>';

            $output .= get_reply_comment($db::getCx(), $row["IDFORUM"]);

        }
        $output .= '</div>';
        echo $output;

        function get_reply_comment($cx, $parent_id = 0, $marginleft = 0)
        {
            $forum3 = new Forum($cx);
            $suivre = new Suivre($cx);
            
            $forum3->setReply($parent_id);
            $forum3->setFiliere($_SESSION['filiere']);
            $forum3->setVague($_SESSION['vague']);
            $rep = $forum3->replyL1L2M1();

            $countTab = $forum3->countreplyL1L2M1();
            $rowCount = $forum3->rowcountreplyL1L2M1();
            
            //echo $rowCount;
            if ($parent_id == 0) {
                $marginleft = 0;
            } else {
                $marginleft = $marginleft + 48;    
            }

            $output = '';
            
            foreach($countTab as $row1){
              
               $count = $row1['COUNT(*)'];
                if ($rowCount > 0) {
                    foreach ($rep as $row) {
                        $rc = $suivre->readAllById($row['IDETUDIANTS']);
                        foreach ($rc as $row2) {
                            $rname = $row2['MATRICULE'];
                        }
                        $output .= '
                        <div class="card" style="margin-left:' . $marginleft . 'px">
                            <div class="card-header">By <b>' . $rname . '</b> on <i>' . $row["DATEF"] . '</i></div>
                            <div class="card-body"><p class="card-text" style="color:black !important;">' . $row["CONTENU"] . '</p></div>
                            <div class="card-footer" align="right"><button type="button" class="btn btn-primary reply" id="' . $row["IDFORUM"] . '">Reply</button></div>
                        </div>
                        ';
                        $output .= get_reply_comment($cx, $row["IDFORUM"], $marginleft);
                    }
                }
            }
            echo $output;
        }
    //}
    


?>
