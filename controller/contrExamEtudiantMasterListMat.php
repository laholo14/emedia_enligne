<?php

session_start();
function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

if (isset($_POST['listmat'])) {

    $formation = new Formation();
    $formation->setSemetre($_SESSION['semestre']);
    $formation->setFiliere($_SESSION['filiere']);
    $formation->setParcours($_SESSION['parcours']);
    $formation->setMois($_SESSION['mois']);
    $formation->setCategorie(1);
    $formation->setType(1);
    $table = '';
    if ($_SESSION['session_exam'] == 1) {
        $cours = $formation->formationExamenMensuelV7MASTER();
    } else {
        $cours = $formation->listMatSemestrielV7MASTER();
    }
    foreach ($cours as $resultatCours) {

        $contenuTab = explode(",", $resultatCours['CONTENU_FR']);
        $contenuTabSize = sizeof($contenuTab);

        if ($contenuTabSize == 1) {
            $tabsize = $contenuTabSize;
        } else {
            $tabsize = $contenuTabSize - 1;
        }

        for ($i = 0; $i < $tabsize; $i++) {
            $courslivres = $contenuTab[$i];

            if ($contenuTabSize <= 2) {
                $partie = '';
                $part = '';
            } else {
                $part = $i + 1;
                $partie = ' Partie';
            }
            //courslivres le pdf
            $table .= '
            <li class="mt-1" ><button type="button" class="btn btn-matiere" id="bnt-list-matiere" data-toggle="modal" data-target="#pdfmodal" onclick="GetPdf(\'' . $courslivres . '\',\'' . $resultatCours['INTITULE'] . $partie . ' ' . $part . '\')">
            ' . $resultatCours['INTITULE'] . '
        </button></li>
         ';
        }
    }

    echo $table;
}





?>
<?php ?>