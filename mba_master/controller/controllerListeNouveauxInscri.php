<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");




if (isset($_POST['liste'])) {
    $datefr = new DateFr();
    $etudiantNouveuxInscriMba = new Suivre();
    $res = $etudiantNouveuxInscriMba->NouveauxInscriMba();
    $table = "";
    foreach ($res as $resultat) {
        $table .= '<tr>
                    <td>'.$resultat['IDETUDIANTS'].'</td>
                    <td>'.$resultat['NOM'].'</td>
                    <td>'.$resultat['PRENOM'].'</td>
                    <td>'.$resultat['SEMESTRE'].'</td>
                    <td>'.$resultat['PARCOURS'].'</td>
                    <td>'.$resultat['NUMERO'].'</td>
                    <td>'.$resultat['NATIONALITE'].'</td>
                    <td>'.$datefr->dateToFrench($resultat['DATEDINSCRIPTION'], "l j F Y à H:i").'</td>
                    <td>'.$resultat['MAIL'].'</td>
                    <td align="center"><i class="fa fa-folder-open" aria-hidden="true"></i></td>
                    <td align="center"><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                    <td align="center"><i class="fa fa-times" aria-hidden="true"></i></td>
                  </tr>';
    }
    echo $table; 
}

?>

<?php ?>