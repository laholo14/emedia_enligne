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
    if(isset($_POST['semestre'])){
        extract($_POST);
        $contenu='';
        $rep=new Repecher();
        $rep->setIdEtudiant($_SESSION['id']);
        $rep->setSemestre($semestre);
        $countEtu=count($rep->verifyEtudiant());
        if ($countEtu!=0) {
        $contenu.='
        <div class="title-note d-flex justify-content-center pt-3">
            <h3>Listes des matières à repecher</h3>
        </div>
        <div class="table-note mt-3 pb-3 d-flex justify-content-center">
            <table border="1">
                <thead>
                    <tr>
                        <th class="text-center">Intitule</th>
                        <th class="text">Montant à payer</th>
                        <th class="text">Statut</th>
                    </tr>
                </thead>   
        <tbody>';
        $res=$rep->readEtudById();
        foreach ($res as $resultat) {
            $contenu.='<tr><td>'.$resultat['INTITULE'].'</td><td>'.$resultat['MONTANT'].'Ariary</td>';
            if ($resultat['ETAT']!=0) {
                $contenu.='<td class="text-succes">Payé</td></tr>';
            }else{
                $contenu.='<td class="text-danger">non payé</td></tr>';
            }
        }
        $resultatMontant=$rep->readTotal();
        foreach ($resultatMontant as $resultat) {
            $contenu.='<tr><td><b>TOTAL</b></td><td><b>'.$resultat['MONTANTTOTAL'].'Ariary</b></td></tr>';
        }
        $contenu.='</tbody> 
            </table>
        </div>';
        echo $contenu;
        }
    
    }
?>
