<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

if (isset($_POST['idlivre'], $_POST['idcours'])) {
    extract($_POST);
    $db = new Connexion();
    $formation = new Formation();
    $tab_semestre = explode('S', $_SESSION['semestre']);
    $tab_semestre_size = sizeof($tab_semestre);
    $semestre = $tab_semestre[1];
    $formation->setSemetre($semestre);
    $formation->setFiliere($_SESSION['filiere']);
    $formation->setParcours($_SESSION['parcours']);
    $formation->setCategorie($idcours);
    $formation->setType($idlivre);
    $table = ' <div class="row mt-3">
    ';
    $tabletemporaire = '';
    if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
        $res = $formation->formationAncienL1L2M1();
    } else {
        $res = $formation->formationAncienL3M2();
    }

    foreach ($res as $resultat) {
        if ($idlivre == 2) {
            $contenuTab = explode(" \ ", $resultat['CONTENU_FR']);
            $contenuTabSize = sizeof($contenuTab);

            for ($i = 0; $i < $contenuTabSize; $i++) {
                $lien = $contenuTab[$i];
                if ($contenuTabSize < 2) {
                    $partie = '';
                    $part = '';
                } else {
                    $part = $i + 1;
                    $partie = ' Partie';
                }
                $tabletemporaire .= '<div class="col-12 col-sm-6 col-md-6 col-lg-4">
        <div class="card card_filiere">
            <div class="card-body  text-center"> 
                <iframe width="100%" height="115" src="' . $lien . '" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class="card-text text-center"><b>' . $resultat['INTITULE'] . $partie . ' ' . $part . '<b></p>
                <div class="text-center mt-1 mb-1 p-2" >
                <a href="' . $lien . '" target="_blank" style="color:white !important;" class="">Lien vers la Video</a>
                 </div>
            </div>

        </div>

    </div>';
            }
        } else {


            $contenuTab = explode(",", $resultat['CONTENU_FR']);
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
                $tabletemporaire .= '
                    <div class="gradient col-sm-12 col-md-4 col-lg-4">
                        <div class="card card_filiere mt-2 my-4">
        
                            <div class="card-header-first text-center">
                                <div class="card-img cours">
                                    <h2 class="text-center pb-5">' . $resultat['INTITULE'] . '</h2>
                                </div>
                            </div>
                            <a class="card-body text-center mt-2" data-toggle="modal" data-target="#pdfmodal" onclick="GetPdf(\'' . $courslivres . '\',\'' . $resultat['INTITULE'] . $partie . ' ' . $part . '\')">
                                Lire
                            </a>
                        </div>
                    </div>
                    
             ';
            }
        }
    }
    $table .= $tabletemporaire;
    echo $table;
}

?>

<?php

ob_end_flush();

?>