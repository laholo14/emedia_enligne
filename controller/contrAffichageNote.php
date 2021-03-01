<?php
session_start();
function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}
$db = new Connexion();
    $matiere = new  Formation();
    $moyenne = new Resultat();
    if(isset($_POST['semestre'])){
        extract($_POST);
        $matiere->setSemetre($semestre);
        $matiere->setFiliere($_SESSION['filiere']);
        $res = $matiere->listmat();
        $table = '';
        $credit=0;
        $a="";
        $row=1;
        $color='';
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
                    $resMoyenne=$matiere->MoyenneParUe($resultat['IDUE'],$_SESSION['id']);
                    foreach ($resMoyenne as $resultatFinale) {
                        if($resultatFinale['MOYENNEFINALE']>=9.75){
                            $color='bg-success';
                        }else{
                            $color='bg-danger';
                        }
                        $table .= '<td class="'.$color.'" rowspan="'.$row.'"><center>'.$resultatFinale['MOYENNEFINALE'].'</center></td>';
                    }

                    
                    $a=$b;
                }
            $table .= '<td class="matier" rowspan="1">' . $resultat['INTITULE'] . '</td>';
            //note
            $moyenne->setEtudiant($_SESSION['id']);
            $moyenne->setMatiere($resultat['IDMATIERE']);
            $resNote=$moyenne->selectMoyenne();
            foreach ($resNote as $resultatNote) {
                if($resultatNote['MOYENNE']>10){
                    $color='bg-success';
                }else{
                    $color='bg-danger';
                }
                $table .= '<td class="'.$color.'" rowspan="1"><center>'. $resultatNote['MOYENNE'] . '</center></td></tr>';
            }
        }
        
        echo $table;


    }
?>