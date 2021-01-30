<?php

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();
if (isset($_POST['semestre'])) {

    extract($_POST);
    $matiere = new  Formation();
    $matiere->setSemetre($semestre);
    $matiere->setFiliere($_SESSION['filiere']);
    $res = $matiere->listmat();
    $table = '';
    foreach ($res as $resultat) {
        $table .= '<tr class="priority-300">
     <td class="matier">' . $resultat['INTITULE'] . '</td>';

        $note1 = new Resultat();
        $note2 = new Resultat();
        $moyenne = new Resultat();

        $note1->setEtudiant($_SESSION['id']); 
        $note2->setEtudiant($_SESSION['id']);
        $moyenne->setEtudiant($_SESSION['id']);

        $note1->setMatiere($resultat['IDMATIERE']);
        $note2->setMatiere($resultat['IDMATIERE']);
        $moyenne->setMatiere($resultat['IDMATIERE']);

        $note1->setSessiondexam(1);
        $note2->setSessiondexam(2);
        $resMoyenne=$moyenne->selectMoyenne();

        $resMensuel = $note1->Note();
        $resSemestriel = $note2->Note();
        if (count($resMensuel) == 1) {
            foreach ($resMensuel as $resultatMensuel) {
                if($resultatMensuel['REPONSE'] == ''){
                    $color ="bg-secondary";
                    $resultatMensuel['NOTE'] = 'Votre r&eacuteponse est vide';
                }else
                if ($resultatMensuel['NOTE'] == '' ) {
                    $color ="bg-secondary";
                    $resultatMensuel['NOTE'] = 'Réponse déposée';
                }else{
                    if($resultatMensuel['NOTE']<10){
                        $color = 'bg-danger';
                    }else{
                        $color = 'bg-success';
                    }
                }
                $table .= '<td class="note1 text-center '.$color.'"><strong>' . $resultatMensuel['NOTE'] .'</strong></td>';
            }
        } else {
            $color ="bg-dark";
            $table .= '<td class="note1 text-center '.$color.'" >Vous n\'avez pas encore pass&eacute  cet examen</td>';
        }
        if (count($resSemestriel) == 1) {
            foreach ($resSemestriel as $resultatSemestriel) {
                if($resultatSemestriel['REPONSE'] == ''){
                    $color ="bg-secondary";
                    $resultatSemestriel['NOTE'] = 'Votre r&eacuteponse est vide';
                }else
                if ($resultatSemestriel['NOTE'] == '') {
                    $color ="bg-secondary";
                    $resultatSemestriel['NOTE'] = 'Réponse déposée';
                }else{
                    if($resultatSemestriel['NOTE']<10){
                        $color = 'bg-danger';
                    }else{
                        $color = 'bg-success';
                    }
                }
                $table .= '<td class="note1 text-center '.$color.'"><strong>' . $resultatSemestriel['NOTE'] . '</strong></td>';
            }
        } else {
            $color ="bg-dark";
            $table .= '<td class="note1 text-center '.$color.'" >Vous n\'avez pas encore pass&eacute cet examen</td>';
        }
            foreach ($resMoyenne as $resultat) {
            if ($resultat['MOYENNE'] != "") {
                $table .= '<td class="moyenne text-center '.$color.'"><strong>' . $resultat['MOYENNE'] .'</strong></td>';

            }else{
            $color ="bg-dark";
            $table .= '<td class="moyenne text-center '.$color.'" >Vous n\'avez pas encore pass&eacute  cet examen</td>';
            } 
            }
        foreach ($resMoyenne as $resultat) {
        if ($resultat['MOYENNE'] != "" ) {
            if ($resultat['MOYENNE']<10) {
                $table .= '<td class="moyenne text-center '.$color.'">non valide</td>';
            }else{
                $table .= '<td class="moyenne text-center '.$color.'">valide</td>';}

        }else{
        $color ="bg-dark";
        $table .= '<td class="moyenne text-center '.$color.'" >Vous n\'avez pas encore pass&eacute  cet examen</td>';
        } 
        }

        $table .= '</tr>';
    }
    
    echo $table;
}
