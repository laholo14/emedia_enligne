
<?php



$datefr = new DateFr();

$date = Date('Y-m-d');

$datedentrer = new DateTime($_SESSION['datedenter']);
//$datedaujourdhui = new DateTime("2021-03-03");
$datedaujourdhui = new DateTime($date);


$diff = $datedentrer->diff($datedaujourdhui);


if ($diff->invert == 1) {
    $mois = 0;
} else {
    $mois = ($diff->m);
}

if (isset($_SESSION['matricule']) and $_SESSION['inscription'] == 0) {

    header("location: Commission");
} else if (isset($_SESSION['matricule']) and $_SESSION['inscription'] == 1 and $_SESSION['ecolage'] < $mois + 1) {

    header("location: Traitement");
} else {

    $moisDenter =  $datefr->dateToFrench(date($_SESSION['datedenter']), " F ");
    $diff = $datedentrer->diff($datedaujourdhui);

    $moisM = ($diff->m);
    $differencejour = ($diff->days);

    $_SESSION['testInclude'] = ($diff->invert); //mijery oe efa miditra ve ny vague misy azy sa tsia amin alalan difference datedenter su datedoujourdhui 1mbola tsy miditra 0 efa midditra
    $_SESSION['jour'] = $differencejour + 1;
    $_SESSION['mois'] = $moisM + 1;
    $_SESSION['tutomg'] = 'https://www.youtube.com/embed/0r1zpCAbdNY';
    $_SESSION['tutofr'] = 'https://www.youtube.com/embed/49jKRIdS2v4';

    $_SESSION['jouravantexam'] = 23 - $_SESSION['jourdaujourdhui'];
    //resaka prise de contac
    if ($differencejour <= 7 and $_SESSION['nationalite'] == 'MG') {
        $_SESSION['prisedecontactmg'] = 'https://www.youtube.com/embed/dzgRtzd0MvE';
    } else if ($differencejour <= 7 and $_SESSION['nationalite'] != 'MG') {

        $_SESSION['prisedecontactfr'] = 'https://www.youtube.com/embed/FqXzCzJR-y0';
    } else {

        $_SESSION['finduprisedecontact'] = 'tapitra';
    }
}

?>
<?php ?>