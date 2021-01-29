<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

//matiere
if (isset($_POST['listmat'])) {
    extract($_POST);
    $db = new Connexion();
    $formation = new Formation($db->getCx());
    $formation->setSemetre($_SESSION['semestre']);
    $formation->setFiliere($_SESSION['filiere']);
    $res = $formation->listmat();
    $table = '';
    foreach ($res as $resultat) {
        if ($resultat['MOIS'] <= $_SESSION['mois']) {
            $statut = 'status-online';
        } else {
            $statut = 'status-offline';
        }
        $table .= '<div class="matiere-list">
        <span>' . $resultat['INTITULE'] . '</span><i class="fa fa-circle ' . $statut . '">
        </i>
    </div>';
    }

    echo $table;
}

//L1 L2 M1
//COURS LIVRES
if (isset($_POST['open_cours']) and isset($_POST['open_cours_livres'])) {

    extract($_POST);
    $db = new Connexion();
    $formation = new Formation($db->getCx());

    $formation->setSemetre($_SESSION['semestre']);
    $formation->setFiliere($_SESSION['filiere']);
    $formation->setParcours($_SESSION['parcours']);
    $formation->setMois($_SESSION['mois']);
    $formation->setCategorie($open_cours);
    $formation->setType($open_cours_livres);
    $table = ' <div class="row mt-3">
        ';
    $tabletemporaire = '';
    if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
        $res = $formation->formationL1L2M1();
    } else {
        $res = $formation->formationL3M2();
    }
    // $table .= $_SESSION['mois'];
    foreach ($res as $resultat) {
        if ($langue == 'Malagasy') {
            $contenu = $resultat['CONTENU_MG'];
        } else {
            $contenu = $resultat['CONTENU_FR'];
        }


        $contenuTab = explode(",", $contenu);
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

    $table .= $tabletemporaire;

    $table .= '</div>';


    if ($tabletemporaire != '') {
        echo $table;
    } else {
        echo '<h4 class="text-center text-danger ml-3">Pas de contenu disponible</h4>';
    }
}

//COURS VIDEO

if (isset($_POST['open_cours']) and isset($_POST['open_cours_video'])) {

    extract($_POST);
    $db = new Connexion();
    $formation = new Formation($db->getCx());
    $formation->setSemetre($_SESSION['semestre']);
    $formation->setFiliere($_SESSION['filiere']);
    $formation->setParcours($_SESSION['parcours']);
    $formation->setMois($_SESSION['mois']);
    $formation->setCategorie($open_cours);
    $formation->setType($open_cours_video);
    $table = '';
    $tabletemporaire = '';
    if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
        $res = $formation->formationL1L2M1();
    } else {
        //L3 M2 
        $res = $formation->formationL3M2();
    }

    foreach ($res as $resultat) {
        if ($langue == 'Malagasy') {
            $contenu = $resultat['CONTENU_MG'];
        } else {
            $contenu = $resultat['CONTENU_FR'];
        }

        $contenuTab = explode(" \ ", $contenu);
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
    }



    $table .= $tabletemporaire;

    if ($tabletemporaire != '') {
        echo $table;
    } else {
        echo '<h4 class="text-center text-danger ml-3">Pas de contenu disponible</h4>';
    }
}

//COURS AUDIO
if (isset($_POST['open_cours']) and isset($_POST['open_cours_audio'])) {

    extract($_POST);
    $db = new Connexion();
    $formation = new Formation($db->getCx());

    $table = '';
    $tabletemporaire = '';

    extract($_POST);
    $db = new Connexion();
    $formation = new Formation($db->getCx());
    $formation->setSemetre($_SESSION['semestre']);
    $formation->setFiliere($_SESSION['filiere']);
    $formation->setParcours($_SESSION['parcours']);
    $formation->setMois($_SESSION['mois']);
    $formation->setCategorie($open_cours);
    $formation->setType($open_cours_audio);

    $table = ' <div class="table-responsive mt-1">
<table class="table table-border-danger table-striped">
    <thead>
        <tr>
            <th>Cours Mp3</th>                
        </tr>
    </thead><tbody>';


    if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
        $res = $formation->formationL1L2M1();
    } else {
        //L3 M2
        $res = $formation->formationL3M2();
    }


    // $table .= $_SESSION['mois'];
    foreach ($res as $resultat) {
        if ($langue == 'Malagasy') {
            $contenu = $resultat['CONTENU_MG'];
        } else {
            $contenu = $resultat['CONTENU_FR'];
        }

        $contenuTab = explode(",", $contenu);
        $contenuTabSize = sizeof($contenuTab);
        if ($contenuTabSize == 1) {
            $tabsize = $contenuTabSize;
        } else {
            $tabsize = $contenuTabSize - 1;
        }
        for ($i = 0; $i < $tabsize; $i++) {
            $coursmp3 = $contenuTab[$i];
            if ($contenuTabSize <= 2) {
                $partie = '';
                $part = '';
            } else {
                $part = $i + 1;
                $partie = ' Partie';
            }
            $tabletemporaire .= '
                <tr onclick="GetMp3Cours(\'' . $coursmp3 . '\',\'' . $resultat['INTITULE'] . ' Partie ' . $part . '\')">   
                   <td><span class="listplay' . $class . '"><i class="fas fa-headphones-alt"></i></span> <span>' . $resultat['INTITULE'] . $partie . ' ' . $part . '</span></td>
                    
                </tr>
            ';
        }
    }

    $table .= $tabletemporaire;
    $table .= '</tbody></table></div>';




    if ($tabletemporaire != '') {
        echo $table;
    } else {
        echo '<h4 class="text-center text-danger ml-3">Pas de contenu disponible</h4>';
    }
}


//Contenu exercice livres

if (isset($_POST['open_exercice']) and isset($_POST['open_exercice_livres'])) {
    if ($_SESSION['mois'] == 1 and $_SESSION['jourdaujourdhui'] < 13) {
        $jourrest = 13 - $_SESSION['jourdaujourdhui']; //rehefa am deuxieme mois io ovaiko jour d'Aujourdhui ilay session
        if ($jourrest == 1) {
            $pluralite = ' Jour';
        } else {
            $pluralite = ' Jours';
        }

        echo '<h4 class="text-center text-danger ml-3">Les exercices s\'afficheront dans ' . $jourrest . $pluralite . '</h4>';
    } else if ($_SESSION['jourdaujourdhui'] >= 13 /*or $_SESSION['jourdaujourdhui'] >= 13*/) {
        extract($_POST);
        $db = new Connexion();
        $formation = new Formation($db->getCx());
        $formation->setSemetre($_SESSION['semestre']);
        $formation->setFiliere($_SESSION['filiere']);
        $formation->setParcours($_SESSION['parcours']);
        $formation->setMois($_SESSION['mois']);
        $formation->setCategorie($open_exercice);
        $formation->setType($open_exercice_livres);


        $table = ' <div class="row mt-3">
    ';
        $tabletemporaire = '';


        if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
            $res = $formation->formationL1L2M1();
        } else {
            $res = $formation->formationL3M2();
        }
        foreach ($res as $resultat) {
            if ($langue == 'Malagasy') {
                $contenu = $resultat['CONTENU_MG'];
            } else {
                $contenu = $resultat['CONTENU_FR'];
            }


            $contenuTab = explode(",", $contenu);
            $contenuTabSize = sizeof($contenuTab);
            if ($contenuTabSize == 1) {
                $tabsize = $contenuTabSize;
            } else {
                $tabsize = $contenuTabSize - 1;
            }

            for ($i = 0; $i < $tabsize; $i++) {
                $exolivres = $contenuTab[$i];

                if ($contenuTabSize <= 2) {
                    $partie = '';
                    $part = '';
                } else {
                    $part = $i + 1;
                    $partie = ' Partie';
                }
                //exolivres le pdf
                $tabletemporaire .= '
                    
                    <div class="gradient col-sm-12 col-md-4 col-lg-4">
                        <div class="card card_filiere mt-2 my-4">
        
                            <div class="card-header-first text-center">
                                <div class="card-img cours">
                                    <h2 class="text-center pb-5">' . $resultat['INTITULE'] . '</h2>
                                </div>
                            </div>
                            <a class="card-body text-center" data-toggle="modal" data-target="#pdfmodal" onclick="GetPdf(\'' . $exolivres . '\',\'Exercice: ' . $resultat['INTITULE'] . $partie . ' ' . $part . '\')">
                                Lire
                            </a>
                        </div>
                    </div>
                 ';
            }
        }

        $table .= $tabletemporaire;

        $table .= '</div>';




        if ($tabletemporaire != '') {
            echo $table;
        } else {
            echo '<h4 class="text-center text-danger ml-3">Pas de contenu disponible</h4>';
        }
    } else if ($_SESSION['jourdaujourdhui'] < 13) {
        extract($_POST);
        $db = new Connexion();
        $formation = new Formation($db->getCx());
        $formation->setSemetre($_SESSION['semestre']);
        $formation->setFiliere($_SESSION['filiere']);
        $formation->setParcours($_SESSION['parcours']);
        $formation->setMois($_SESSION['mois'] - 1);
        $formation->setCategorie($open_exercice);
        $formation->setType($open_exercice_livres);


        $table = ' <div class="row mt-3">
    ';
        $tabletemporaire = '';


        if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
            $res = $formation->formationL1L2M1();
        } else {
            $res = $formation->formationL3M2();
        }
        foreach ($res as $resultat) {
            if ($langue == 'Malagasy') {
                $contenu = $resultat['CONTENU_MG'];
            } else {
                $contenu = $resultat['CONTENU_FR'];
            }


            $contenuTab = explode(",", $contenu);
            $contenuTabSize = sizeof($contenuTab);
            if ($contenuTabSize == 1) {
                $tabsize = $contenuTabSize;
            } else {
                $tabsize = $contenuTabSize - 1;
            }

            for ($i = 0; $i < $tabsize; $i++) {
                $exolivres = $contenuTab[$i];

                if ($contenuTabSize <= 2) {
                    $partie = '';
                    $part = '';
                } else {
                    $part = $i + 1;
                    $partie = ' Partie';
                }
                //exolivres le pdf
                $tabletemporaire .= '
                    
                    <div class="gradient col-sm-12 col-md-4 col-lg-4">
                        <div class="card card_filiere mt-2 my-4">
        
                            <div class="card-header-first text-center">
                                <div class="card-img cours">
                                    <h2 class="text-center pb-5">' . $resultat['INTITULE'] . '</h2>
                                </div>
                            </div>
                            <a class="card-body text-center" data-toggle="modal" data-target="#pdfmodal" onclick="GetPdf(\'' . $exolivres . '\',\'Exercice: ' . $resultat['INTITULE'] . $partie . ' ' . $part . '\')">
                                Lire
                            </a>
                        </div>
                    </div>
                 ';
            }
        }

        $table .= $tabletemporaire;

        $table .= '</div>';




        if ($tabletemporaire != '') {
            echo $table;
        } else {
            echo '<h4 class="text-center text-danger ml-3">Pas de contenu disponible</h4>';
        }
    }
}

//contenu exercice video

if (isset($_POST['open_exercice']) and isset($_POST['open_exercice_video'])) {
    if ($_SESSION['mois'] == 1) {
        $exo = 13;
    } else {
        $exo = 3;
    }
    if ($_SESSION['jourdaujourdhui'] >= $exo /*or $_SESSION['jourdaujourdhui'] >= 13*/) {
        extract($_POST);
        $db = new Connexion();
        $formation = new Formation($db->getCx());
        $formation->setSemetre($_SESSION['semestre']);
        $formation->setFiliere($_SESSION['filiere']);
        $formation->setParcours($_SESSION['parcours']);
        $formation->setMois($_SESSION['mois']);
        $formation->setCategorie($open_exercice);
        $formation->setType($open_exercice_video);
        $table = '';
        $tabletemporaire = '';

        if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
            $res = $formation->formationL1L2M1();
        } else {

            $res = $formation->formationL3M2();
        }

        foreach ($res as $resultat) {
            if ($langue == 'Malagasy') {
                $contenu = $resultat['CONTENU_MG'];
            } else {
                $contenu = $resultat['CONTENU_FR'];
            }

            $contenuTab = explode(" \ ", $contenu);
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
                                        </div>
                                        </div>
                                       </div>';
            }
        }

        $table .= $tabletemporaire;
        if ($tabletemporaire != '') {
            echo $table;
        } else {
            echo '<h4 class="text-center text-danger ml-3">Pas de contenu disponible</h4>';
        }
    } else {
        $jourrest = 13 - $_SESSION['jourdaujourdhui']; //rehefa am deuxieme mois io ovaiko jour d'Aujourdhui de lasa 13 drai
        if ($jourrest == 1) {
            $pluralite = ' Jour';
        } else {
            $pluralite = ' Jours';
        }

        echo '<h4 class="text-center text-danger ml-3">Les exercices s\'afficheront dans ' . $jourrest . $pluralite . '</h4>';
    }
}

//CONTENU CORRIGE

if (isset($_POST['open_corrige']) and isset($_POST['open_corrige_livres'])) {

    if ($_SESSION['mois'] == 1 and $_SESSION['jourdaujourdhui'] < 20) {
        $jourrest = 20 - $_SESSION['jourdaujourdhui']; //rehefa am deuxieme mois io ovaiko jour d'Aujourdhui ilay session
        if ($jourrest == 1) {
            $pluralite = ' Jour';
        } else {
            $pluralite = ' Jours';
        }

        echo '<h4 class="text-center text-danger ml-3">Les corrigés s\'afficheront dans ' . $jourrest . $pluralite . '</h4>';
    } else
    if ($_SESSION['jourdaujourdhui'] >= 20) { //rehafa 2em mois miova io lasa 20

        extract($_POST);
        $db = new Connexion();
        $formation = new Formation($db->getCx());
        $formation->setSemetre($_SESSION['semestre']);
        $formation->setFiliere($_SESSION['filiere']);
        $formation->setParcours($_SESSION['parcours']);
        $formation->setMois($_SESSION['mois']);
        $formation->setCategorie($open_corrige);
        $formation->setType($open_corrige_livres);
        $table = ' <div class="row mt-3">
        ';
        $tabletemporaire = '';
        if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
            $res = $formation->formationL1L2M1();
        } else {
            $res = $formation->formationL3M2();
        }
        foreach ($res as $resultat) {
            if ($langue == 'Malagasy') {

                $contenu = $resultat['CONTENU_MG'];

            } else {

                $contenu = $resultat['CONTENU_FR'];
                
            }


            $contenuTab = explode(",", $contenu);
            $contenuTabSize = sizeof($contenuTab);
            if ($contenuTabSize == 1) {
                $tabsize = $contenuTabSize;
            } else {
                $tabsize = $contenuTabSize - 1;
            }

            for ($i = 0; $i < $tabsize; $i++) {
                $corrigelivres = $contenuTab[$i];

                if ($contenuTabSize <= 2) {
                    $partie = '';
                    $part = '';
                } else {
                    $part = $i + 1;
                    $partie = ' Partie';
                }
                //exolivres le pdf
                $tabletemporaire .= '
                        <div class="gradient col-sm-12 col-md-4 col-lg-4">
                            <div class="card card_filiere mt-2 my-4">
            
                                <div class="card-header-first text-center">
                                    <div class="card-img cours">
                                        <h2 class="text-center pb-5">' . $resultat['INTITULE'] . '</h2>
                                    </div>
                                </div>
                                <a class="card-body text-center" data-toggle="modal" data-target="#pdfmodal" onclick="GetPdf(\'' . $corrigelivres . '\',\'Corrigé: ' . $resultat['INTITULE'] . $partie . ' ' . $part . '\')">
                                    Lire
                                </a>
                            </div>
                        </div>
                     ';
            }
        }
        $table .= $tabletemporaire;

        $table .= '</div>';


        if ($tabletemporaire != '') {
            echo $table;
        } else {
            echo '<h4 class="text-center text-danger ml-3">Pas de contenu disponible</h4>';
        }
    } else if ($_SESSION['jourdaujourdhui'] < 20) {
        extract($_POST);
        $db = new Connexion();
        $formation = new Formation($db->getCx());
        $formation->setSemetre($_SESSION['semestre']);
        $formation->setFiliere($_SESSION['filiere']);
        $formation->setParcours($_SESSION['parcours']);
        $formation->setMois($_SESSION['mois'] - 1);
        $formation->setCategorie($open_corrige);
        $formation->setType($open_corrige_livres);
        $table = ' <div class="row mt-3">
        ';
        $tabletemporaire = '';
        if ($_SESSION['semestre'] != 'S4' or $_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {
            $res = $formation->formationL1L2M1();
        } else {
            $res = $formation->formationL3M2();
        }
        foreach ($res as $resultat) {
            if ($langue == 'Malagasy') {
                $contenu = $resultat['CONTENU_MG'];
            } else {
                $contenu = $resultat['CONTENU_FR'];
            }


            $contenuTab = explode(",", $contenu);
            $contenuTabSize = sizeof($contenuTab);
            if ($contenuTabSize == 1) {
                $tabsize = $contenuTabSize;
            } else {
                $tabsize = $contenuTabSize - 1;
            }

            for ($i = 0; $i < $tabsize; $i++) {
                $corrigelivres = $contenuTab[$i];

                if ($contenuTabSize <= 2) {
                    $partie = '';
                    $part = '';
                } else {
                    $part = $i + 1;
                    $partie = ' Partie';
                }
                //exolivres le pdf
                $tabletemporaire .= '
                        <div class="gradient col-sm-12 col-md-4 col-lg-4">
                            <div class="card card_filiere mt-2 my-4">
            
                                <div class="card-header-first text-center">
                                    <div class="card-img cours">
                                        <h2 class="text-center pb-5">' . $resultat['INTITULE'] . '</h2>
                                    </div>
                                </div>
                                <a class="card-body text-center" data-toggle="modal" data-target="#pdfmodal" onclick="GetPdf(\'' . $corrigelivres . '\',\'Corrigé: ' . $resultat['INTITULE'] . $partie . ' ' . $part . '\')">
                                    Lire
                                </a>
                            </div>
                        </div>
                     ';
            }
        }
        $table .= $tabletemporaire;

        $table .= '</div>';


        if ($tabletemporaire != '') {
            echo $table;
        } else {
            echo '<h4 class="text-center text-danger ml-3">Pas de contenu disponible</h4>';
        }
    }
}
?>

<?php

ob_end_flush();

?>