<?php


$tabvague = explode("V", $_SESSION['vague']);
for ($i = 0; $i < count($tabvague); $i++) {
    $numvague = $tabvague[$i];
}

if ($numvague >= 7 and $_SESSION['diplome'] === 'MASTER') {
 
    if ($_SESSION['mois'] == 5 or $_SESSION['mois'] == 10) {
       
        if ($_SESSION['jourdaujourdhui'] >= 20 and $_SESSION['jourdaujourdhui'] <= 27) {
            if ($_SESSION['droitexamen'] == 1) {
                $jourdexam = $_SESSION['jourdaujourdhui'] - 19;
                $_SESSION['session_exam'] = 2;
                $_SESSION['session_exam_jour'] = 'Examen Semestriel jour ' . $jourdexam . '/8';
                header("location: Examen");
            } else {
                header("location: Traitement");
            }
        }
    } else if ($_SESSION['jourdaujourdhui'] == 25 or $_SESSION['jourdaujourdhui'] == 26) {
        
        $jourdexam = $_SESSION['jourdaujourdhui'] - 24;

        $_SESSION['session_exam'] = 1;

        $_SESSION['session_exam_jour'] = 'Examen Mensuel jour ' . $jourdexam . '/2';

        header("location: Examen");
    }
} else if ($numvague <= 7) {
    if ($_SESSION['mois'] == 4 or $_SESSION['mois'] == 8) {

        if ($_SESSION['jourdaujourdhui'] >= 25 and $_SESSION['jourdaujourdhui'] <= 30) {


            //mijery nandoa sa tsia
            if ($_SESSION['droitexamen'] == 1) {

                $jourdexam = $_SESSION['jourdaujourdhui'] - 24;

                $_SESSION['session_exam'] = 2;

                $_SESSION['session_exam_jour'] = 'Examen Semestriel jour ' . $jourdexam . '/6';

                header("location: Examen");
            } else {
                header("location: Traitement");
            }
        } else if ($_SESSION['jourdaujourdhui'] == 23 or $_SESSION['jourdaujourdhui'] == 24) { //rehefa amin 2em mois dia lasa 23 24

            $jourdexam = $_SESSION['jourdaujourdhui'] - 22;
            $_SESSION['session_exam'] = 1;

            $_SESSION['session_exam_jour'] = 'Examen Mensuel jour ' . $jourdexam . '/2';

            header("location: Examen");
        }
    } else if ($_SESSION['jourdaujourdhui'] == 23 or $_SESSION['jourdaujourdhui'] == 24) {

        $jourdexam = $_SESSION['jourdaujourdhui'] - 22;

        $_SESSION['session_exam'] = 1;

        $_SESSION['session_exam_jour'] = 'Examen Mensuel jour ' . $jourdexam . '/2';

        header("location: Examen");
    }
}


?>
<?php ?>