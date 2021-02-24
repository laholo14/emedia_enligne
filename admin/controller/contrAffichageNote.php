<?php

session_start();

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();
if (isset($_POST['semestre'])) {

    extract($_POST); 
    $matiere = new  Formation();
    $moyenne = new Resultat();
    $matiere->setSemetre($semestre);
    $matiere->setFiliere($_POST['filiere']);
    $res = $matiere->listmat();
    $table = '';
    $credit=0;
    $a="";
    $row=1;
    foreach ($res as $resultat) {
        $b=$resultat['INTITULEUE'];
            if($a!=$b){

                //listeUe
                $resRows=$matiere->countUe($b);
                foreach ($resRows as $resultat1) {
                    $row=$resultat1['ROWSPAN'];
                }

                $table .= '<tr class="priority-300"><td class="matier" rowspan="'.$row.'">' .$b. '</td>';

                //credit total
                $resCredit=$matiere->totalCredit($b);
                foreach ($resCredit as $resultat1) {
                    $credit=$resultat1['TOTALCREDIT'];
                }
                $table .= '<td class="matier" rowspan="'.$row.'"><center>' .$credit. '</center></td>';

                //moyenne(idUe,idEtud)
                $resMoyenne=$matiere->MoyenneParUe($resultat['IDUE'],$idEtud);
                foreach ($resMoyenne as $resultatFinale) {
                    $table .= '<td class="matier" rowspan="'.$row.'"><center>'.$resultatFinale['MOYENNEFINALE'].'</center></td>';
                }

                
                $a=$b;
            }
        $table .= '<td class="matier" rowspan="1">' . $resultat['INTITULE'] . '</td>';
        //note
        $moyenne->setEtudiant($idEtud);
        $moyenne->setMatiere($resultat['IDMATIERE']);
        $resNote=$moyenne->selectMoyenne();
        foreach ($resNote as $resultatNote) {
            $table .= '<td class="matier" rowspan="1"><center>'. $resultatNote['MOYENNE'] . '</center></td></tr>';
        }
    }
    
    echo $table;
    }

