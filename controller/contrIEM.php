
<?php

//classe mamadika date en Francais
$datefr = new DateFr();



//date d'entrer
$datedentrer = new DateTime($_SESSION['datedenter']);

//date androany
//$datedaujourdhui = new DateTime('2021-03-03');
$date = Date('Y-m-d');
$datedaujourdhui = new DateTime($date);

//comparaison date androany sy date fidirana
$diff = $datedentrer->diff($datedaujourdhui);

//mijery oe efa lasa sa tsia ilay daty icomparena azy
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
    
    //rentrer le moisDenter
    $moisDenter =  $datefr->dateToFrench(date($_SESSION['datedenter']), " F ");
    $_SESSION['jourdaujourdhui'] = intval(Date('d')); //ito no tena maka ny date d'aujourdhui
    $diff = $datedentrer->diff($datedaujourdhui);
    $moisM = ($diff->m);
    $differencejour = ($diff->days);

    //mijery oe efa miditra ve ny vague misy azy sa tsia amin alalan difference datedenter su datedoujourdhui 1mbola tsy miditra 0 efa midditra
    $_SESSION['testInclude'] = ($diff->invert);
    $_SESSION['jour'] = $differencejour + 1;
    $_SESSION['mois'] = $moisM + 1;
}

?>
<?php ?>