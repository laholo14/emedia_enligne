<?php



if ($_SESSION['mois'] == 4 or $_SESSION['mois'] == 8) {

    if ($_SESSION['jourdaujourdhui'] >= 25 and $_SESSION['jourdaujourdhui'] <= 30) {

        if ($_SESSION['examen'] == 1) {

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
