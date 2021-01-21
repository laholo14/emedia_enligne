<?php

ob_start();

session_start();

require_once("../../model/Connexion.class.php");

require_once("../../model/Etudiant.class.php");

require_once("../../model/Suivre.class.php");

require_once("../../model/Status.class.php");

if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}






if (isset($_POST['dip']) and isset($_POST['fil']) and isset($_POST['vague'])) {

    extract($_POST);
    $db = new Connexion();

    $suivre = new Suivre();
    $stat = new Status();
    $suivre->setDip($dip);
    $suivre->setFiliere($fil);
    $suivre->setCode($vague);

    $res = $suivre->ListEtudiant();

    $output = '<table class="table table-border-danger table-striped">
                        <thead>
                            <tr>
                                
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Status</th>
                                

                            </tr>
                        </thead>
                    <tbody>';




    foreach ($res as $resultat) {

        $status = '';
        $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 5 second');
        $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
        $stt = $stat->fetch_user_last_activity($resultat['IDETUDIANTS'], $resultat['MATRICULE'], $resultat['FILIERE']);

        if ($stt > $current_timestamp) {
            $status = '<span style="color:rgb(0,255,0) !important;font-size
            :0.8vw;margin-left: 1vw"><i class="fa fa-circle" ></i></span>';
        } else {
            $status = '<span style="color:rgb(255,0,0); font-size
            :0.8vw;margin-left: 1vw"><i class="fa fa-circle" ></i></span>';
        }
        $output .= '<tbody> 

                         
                                                 
                                <tr>                  
                                    <td>' . $resultat['NOM'] . '</td>
                                    <td>' . $resultat['PRENOM'] . '</td>
                                    <td>' . $status . '</td>
                                    

                                </tr>
                    </tbody>';
    }

    $output .= '</table>';
    echo $output;
}


ob_end_flush();
