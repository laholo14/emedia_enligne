<!--Calendrier-->
<?php

if (!isset($_SESSION['etat_etude'])) { 
        include '../controller/contrSessionExamLicence.php';
}
require('head.html');

?>

<link rel="stylesheet" href="vue/css/accueilMaster.css">
</head>

<body>

    <!-- preloading -->
    <div class="container-preloading flex-column" id="preloading">
        <img src="vue/image/logo/logo_E-media_enligne_rond.png" class="img-fluid logo" alt="">
        <div class="preloading">
            <span></span>
        </div>
    </div>
    <!-- fin preloading -->

    <div class="container-fluid universite-Emedia" id="universite-Emedia">
        <div class="row">

            <!-- navbar -->
            <nav class="row d-flex fixed-top nav_bar" id="nav_bar">
                <div class="col-4">
                    <img src="vue/image/logo/logo_E-media_enligne.png" class="img-fluid ml-4 logo" alt="">
                </div>

                <div class="col-8 d-flex justify-content-end select-langue">
                    <button type="button" class="btn-notification" id="active-notification">
                        <i class="fad fa-alarm-clock"></i> <span class="badge badge-light">2</span>
                    </button>
                    <div class="mr-3" id="fa-bars"><i class="fas fa-bars pt-2 pl-4"></i></div>
                    <div class="mr-3" id="fa-times"><i class="fas fa-times pt-2 pl-4"></i></div>
                </div>
            </nav>
            <!-- fin navbar -->

            <!-- dashboard -->
            <aside class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 dashboard dashboard_mobile" id="dashboard">

                <div class="pdp d-flex justify-content-center pt-3">
                    <img src="<?php echo $_SESSION["photo"]; ?>" class="mr-3" alt="">
                </div>
                <ul class="overflow-auto liste_dashboard mt-1">

                    <li id="active-video" class="active"><a href="#"><i class="fal fa-hands-helping mr-3"></i><span>Aide</span></a></li>

                    <li class="profil">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" href="#collapse1" class="active-profil">
                                        <i class="fal fa-user-circle mr-3"></i>
                                        <span class="text-center"><?php echo $_SESSION['prenom'] ?></span>
                                        <i class="fad fa-angle-down float-right mt-3 mr-2"></i>
                                    </a>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <ul class="list-group ml-3">
                                        <li class="list-group-item" id="active-profil">
                                            <i class="fal fa-user ml-2 mr-3"></i>
                                            <span>Profil</span>
                                        </li>
                                        <li class="list-group-item" id="active-note">
                                            <a href="Bulletin">
                                                <i class="fal fa-clipboard ml-2 mr-3"></i>
                                                <span>Note</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="Traitement">
                                                <i class="fal fa-credit-card ml-2 mr-3"></i>
                                                <span>Paiement</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li id="active-calendrier"><a href="#"><i class="fal fa-calendar-alt mr-4"></i><span>Calendrier</span></a></li>

                    <li class="cours-menu">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" href="#collapse2">
                                        <i class="fal fa-books mr-3"></i>
                                        <span>Cours</span>
                                        <i class="fad fa-angle-down float-right mt-3 mr-2"></i>
                                    </a>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <ul class="list-group ml-3">
                                        <?php
                                        // $formation = new Formation();
                                        // foreach ($formation->selectNumSemestre($_SESSION['semestre']) as $d) {
                                        //     $numsemestre = $d['NUM'];
                                        // }
                                        // if ($_SESSION['diplome'] == "LICENCE") {
                                        //     $requete = $formation->listliensemestre($numsemestre);
                                        // } else {
                                        //     $requete = $formation->listliensemestreMaster($numsemestre);
                                        // }
                                        // foreach ($requete as $resultat) {
                                        ?>
                                        <li class="list-group-item active-cours" onclick="GetSemestreCours('<?php echo $_SESSION['semestre']; ?>')">
                                            <i class="fal fa-user-graduate ml-2 mr-2"></i>
                                            <span><?php echo $_SESSION['semestre']; ?></span>
                                            <input type="hidden" id="<?php echo "lien" . $_SESSION['semestre']; ?>" value="<?php echo $_SESSION['semestre']; ?>" />
                                        </li>
                                        <li class="list-group-item">
                                            <i class="fal fa-user-graduate ml-2 mr-2"></i>
                                            <span>...</span>

                                        </li>
                                        <?php //} 
                                        ?>
                                        <input type="hidden" id="valuesemestrecours" value="" />
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php if ($_SESSION['filiere'] != 'MBA') { ?>
                        <li class="exercice-menu">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" href="#collapse3">
                                            <i class="fal fa-edit mr-3"></i>
                                            <span>Exercices</span>
                                            <i class="fad fa-angle-down float-right mt-3 mr-2"></i>
                                        </a>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <ul class="list-group ml-3">
                                            <?php
                                            // $formation1 = new Formation();
                                            // foreach ($formation1->selectNumSemestre($_SESSION['semestre']) as $d) {
                                            //     $numsemestre = $d['NUM'];
                                            // }
                                            // if ($_SESSION['diplome'] == "LICENCE") {
                                            //     $requete = $formation1->listliensemestre($numsemestre);
                                            // } else {
                                            //     $requete = $formation1->listliensemestreMaster($numsemestre);
                                            // }
                                            // foreach ($requete as $resultat) {
                                            ?>
                                            <li class="list-group-item active-exercice" onclick="GetSemestreExo('<?php echo $_SESSION['semestre']; ?>')">
                                                <i class="fal fa-user-graduate ml-2 mr-2"></i>
                                                <span><?php echo $_SESSION['semestre']; ?></span>
                                                <input type="hidden" id="<?php echo "lienexo" . $_SESSION['semestre']; ?>" value="<?php echo $_SESSION['semestre']; ?>" />

                                            </li>
                                            <li class="list-group-item">
                                                <i class="fal fa-user-graduate ml-2 mr-2"></i>
                                                <span>...</span>

                                            </li>
                                            <?php //} 
                                            ?>
                                            <input type="hidden" id="valuesemestreexo" value="" />
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <li id="active-chat"><a href="#"><i class="fal fa-comments-alt mr-3"></i><span>Nous vous
                                ecoutons</span></a></li>

                    <li id="active-contact"><a href="#"><i class="fal fa-phone-volume mr-3"></i><span>Contacts</span></a></li>

                    <li id="active-logout"><a href="vue/logout.php"><i class="fas fa-power-off mr-3"></i><span>Deconnexion </span></a></li>
                </ul>
            </aside>
            <!-- fin dashboard -->

            <!-- section -->
            <section class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 contenu overflow-auto" id="contenu">

                <!-- video tuto -->
                <div class="col-12 contenu-video mt-5 pb-3 mb-2" id="contenu-video">
                    <div class="head-video">
                        <div class="icon-video d-flex justify-content-center align-items-center">
                            <i class="fal fa-video-plus"></i>
                        </div>
                        <div class="title-video d-flex justify-content-center pt-3">
                            <h3>Video tuto</h3>
                        </div>
                    </div>

                    <div class="col-12 mb-3 video1">
                        <div class="video1_text text-center mt-3 p-2">
                            <a href="" target="blank" class="text-center">Pour
                                connaitre le manipulation de l'interface etudiants.</a>
                        </div>
                        <iframe src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 video2">
                            <div class="video1_text text-center p-2">
                                <a href="" target="blank" class="text-center">Pour connaitre le manipulation de l'interface etudiants.</a>
                            </div>
                            <iframe src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 video3">
                            <div class="video1_text text-center p-2">
                                <a href="" target="blank" class="text-center">Pour connaitre le manipulation de l'interface etudiants.</a>
                            </div>
                            <iframe src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <!-- fin video tuto -->

                <!-- profil -->
                <div class="col-12 mt-5 contenu-profil pb-3 mb-2" id="contenu-profil">
                    <div class="head-profil">
                        <div class="icon-profil d-flex justify-content-center align-items-center">
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="title-profil d-flex justify-content-center pt-3">
                            <h3>Profil</h3>
                        </div>
                    </div>

                    <div class="corps">
                        <div class="propos">
                            <div class="row propos-contenu p-3">
                                <div class="col-12 col-lg-12 col-xl-12 propos-img d-flex justify-content-center">
                                    <img src="<?php echo $_SESSION["photo"]; ?>" class="img-fluid" alt="">
                                </div>

                                <div class="col-12 d-block d-lg-flex d-xl-flex mt-4">
                                    <div class="col-12 col-lg-6 col-xl-6 propos-details">
                                        <h6 class="">Nom<br><span><?php echo $_SESSION['nom'] ?></span></h6>
                                        <h6 class="">Prenom<br><span><?php echo $_SESSION['prenom'] ?></span></h6>
                                        <h6>E-mail<br><span><?php echo $_SESSION['mail'] ?></span></h6>
                                        <h6>Parcours<br><span><?php echo $_SESSION['nomparcours'] ?></span></h6>
                                        <h6>Mention<br><span><?php echo $_SESSION['nomfiliere'] ?></span></h6>
                                    </div>

                                    <div class="col-12 col-lg-6 col-xl-6 propos-details">
                                        <h6>Niveau<br> <span><?php echo $_SESSION['semestre'] ?></span> </h6>
                                        <h6>Matricule<br><span><?php echo $_SESSION['matricule'] ?></span></h6>
                                        <h6>Mois<br> <span><?php echo $_SESSION['mois'] ?>/8</span> </h6>
                                        <h6>Ecolage<br> <span><?php echo $_SESSION['ecolage'] ?>/8 </span> </h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin profil -->

                <!-- calendrier -->
                <div class="col-12 mt-5 contenu-calendrier mb-2" id="contenu-calendrier">
                    <div class="head-calendrier">
                        <div class="icon-calendrier d-flex justify-content-center align-items-center">
                            <i class="fal fa-calendar-alt"></i>
                        </div>
                        <div class="title-calendrier d-flex justify-content-center pt-3">
                            <h3>Calendrier</h3>
                        </div>
                    </div>

                    <!-- calendrier-licence -->
                    <?php
                    $tabvaguecalendr = explode("V", $_SESSION['vague']);
                    for ($i = 0; $i < count($tabvaguecalendr); $i++) {
                        $numvaguecalendr = $tabvaguecalendr[$i];
                    }

                    if ($numvaguecalendr >= 7 and $_SESSION['diplome'] == 'MASTER') {
                        $cal_examen = 25;
                    ?>

                        <!-- calendrier-master -->
                        <div class="calendrier-master d-block d-lg-flex d-xl-flex pb-2">
                            <div class="col-12 col-lg-8 col-xl-8 calendrier-corps">
                                <div class="col-12 table-calendrier mt-3 pb-3">
                                    <h4 class="text-center">"1er - 4ème mois" et "6ème - 8ème mois"</h4>
                                    <table class="mt-4">
                                        <tbody id="tabcalendrier">

                                            <tr class="priority-300">
                                                <td class="text-center">1</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center cours-calendrier">3</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">5</td>
                                                <td class="text-center">6</td>
                                                <td class="text-center">7</td>
                                                <td class="text-center">8</td>
                                                <td class="text-center">9</td>
                                                <td class="text-center question-calendrier">10</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center question-calendrier">11</td>
                                                <td class="text-center question-calendrier">12</td>
                                                <td class="text-center">13</td>
                                                <td class="text-center">14</td>
                                                <td class="text-center">15</td>
                                                <td class="text-center">16</td>
                                                <td class="text-center reponse-calendrier">17</td>
                                                <td class="text-center">18</td>
                                                <td class="text-center">19</td>
                                                <td class="text-center">20</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center">21</td>
                                                <td class="text-center">22</td>
                                                <td class="text-center">23</td>
                                                <td class="text-center">24</td>
                                                <td class="text-center examen-mensuel">25</td>
                                                <td class="text-center examen-mensuel">26</td>
                                                <td class="text-center">27</td>
                                                <td class="text-center">28</td>
                                                <td class="text-center">29</td>
                                                <td class="text-center">30</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center">31</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 table-calendrier mt-3 pb-3">
                                    <h4 class="text-center">"5ème mois" et "10ème mois"</h4>
                                    <table class="mt-4">
                                        <tbody id="tabcalendrier">

                                            <tr class="priority-300">
                                                <td class="text-center">1</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center cours-calendrier">3</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">5</td>
                                                <td class="text-center">6</td>
                                                <td class="text-center">7</td>
                                                <td class="text-center">8</td>
                                                <td class="text-center">9</td>
                                                <td class="text-center question-calendrier">10</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center question-calendrier">11</td>
                                                <td class="text-center question-calendrier">12</td>
                                                <td class="text-center">13</td>
                                                <td class="text-center">14</td>
                                                <td class="text-center">15</td>
                                                <td class="text-center">16</td>
                                                <td class="text-center reponse-calendrier">17</td>
                                                <td class="text-center">18</td>
                                                <td class="text-center">19</td>
                                                <td class="text-center examen-semestriel">20</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center examen-semestriel">21</td>
                                                <td class="text-center examen-semestriel">22</td>
                                                <td class="text-center examen-semestriel">23</td>
                                                <td class="text-center examen-semestriel">24</td>
                                                <td class="text-center examen-semestriel">25</td>
                                                <td class="text-center examen-semestriel">26</td>
                                                <td class="text-center examen-semestriel">27</td>
                                                <td class="text-center">28</td>
                                                <td class="text-center">29</td>
                                                <td class="text-center">30</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center">31</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4 col-xl-4 d-flex flex-column justify-content-center calendrier-legende pl-3">
                                <div class="cours-legende d-flex align-items-center">
                                    <div class="d-flex align-items-center p-2">3 : Début cours</div>
                                </div>
                                <div class="exercice-legende d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center p-2">10 au 12 : Dépot questions</div>
                                </div>
                                <div class="corrige-legende d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center p-2">17 : Réponse au question</div>
                                </div>
                                <div class="examen-mensuel-legende d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center p-2">25 et 26 : Examen mensuel</div>
                                </div>
                                <div class="examen-semestriel-legende d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center p-2">20 au 27 : Examen semestriel</div>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                        $cal_examen = 23; ?>

                        <div class="calendrier-licence d-block d-lg-flex d-xl-flex pb-2">
                            <div class="col-12 col-lg-8 col-xl-8 calendrier-corps">
                                <div class="col-12 table-calendrier mt-3 pb-3">
                                    <h4 class="text-center">"1er - 3ème mois" et "5ème - 7ème mois"</h4>
                                    <table class="mt-4">
                                        <tbody id="tabcalendrier">

                                            <tr class="priority-300">
                                                <td class="text-center">1</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center cours-calendrier">3</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">5</td>
                                                <td class="text-center">6</td>
                                                <td class="text-center">7</td>
                                                <td class="text-center">8</td>
                                                <td class="text-center">9</td>
                                                <td class="text-center">10</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center">11</td>
                                                <td class="text-center">12</td>
                                                <td class="text-center exercices-calendrier">13</td>
                                                <td class="text-center">14</td>
                                                <td class="text-center">15</td>
                                                <td class="text-center">16</td>
                                                <td class="text-center">17</td>
                                                <td class="text-center">18</td>
                                                <td class="text-center">19</td>
                                                <td class="text-center corrige-calendrier">20</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center">21</td>
                                                <td class="text-center">22</td>
                                                <td class="text-center examen-mensuel">23</td>
                                                <td class="text-center examen-mensuel">24</td>
                                                <td class="text-center">25</td>
                                                <td class="text-center">26</td>
                                                <td class="text-center">27</td>
                                                <td class="text-center">28</td>
                                                <td class="text-center">29</td>
                                                <td class="text-center">30</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center">31</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 table-calendrier mt-3 pb-3">
                                    <h4 class="text-center">"4ème mois" et "8ème mois"</h4>
                                    <table class="mt-4">
                                        <tbody id="tabcalendrier">

                                            <tr class="priority-300">
                                                <td class="text-center">1</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center cours-calendrier">3</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">5</td>
                                                <td class="text-center">6</td>
                                                <td class="text-center">7</td>
                                                <td class="text-center">8</td>
                                                <td class="text-center">9</td>
                                                <td class="text-center">10</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center">11</td>
                                                <td class="text-center">12</td>
                                                <td class="text-center exercices-calendrier">13</td>
                                                <td class="text-center">14</td>
                                                <td class="text-center">15</td>
                                                <td class="text-center">16</td>
                                                <td class="text-center">17</td>
                                                <td class="text-center">18</td>
                                                <td class="text-center">19</td>
                                                <td class="text-center corrige-calendrier">20</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center">21</td>
                                                <td class="text-center">22</td>
                                                <td class="text-center examen-mensuel">23</td>
                                                <td class="text-center examen-mensuel">24</td>
                                                <td class="text-center examen-semestriel">25</td>
                                                <td class="text-center examen-semestriel">26</td>
                                                <td class="text-center examen-semestriel">27</td>
                                                <td class="text-center examen-semestriel">28</td>
                                                <td class="text-center examen-semestriel">29</td>
                                                <td class="text-center examen-semestriel">30</td>

                                            </tr>

                                            <tr class="priority-300">
                                                <td class="text-center">31</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4 col-xl-4 d-flex flex-column justify-content-center calendrier-legende pl-3">
                                <div class="cours-legende d-flex align-items-center">
                                    <div class="d-flex align-items-center p-2">3 : Début cours</div>
                                </div>
                                <div class="exercice-legende d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center p-2">13 : Début exercice</div>
                                </div>
                                <div class="corrige-legende d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center p-2">20 : Début correction</div>
                                </div>
                                <div class="examen-mensuel-legende d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center p-2">23 et 24 : Examen mensuel</div>
                                </div>
                                <div class="examen-semestriel-legende d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center p-2">25 au 30 : Examen semestriel</div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <input type="hidden" value="<?php echo $cal_examen == '23' ? '23' : '25' ?>" id="cal_examen" />
                </div>
                <!-- fin calendrier -->





                <!-- cours -->
                <div class="col-12 mt-5 contenu-cours mb-2" id="contenu-cours">
                    <div class="head-cours">
                        <div class="icon-cours d-flex justify-content-center align-items-center">
                            <i class="fal fa-books"></i>
                        </div>
                        <div class="title-cours d-flex justify-content-center pt-3">
                            <h3>Cours <span id="titreSemestre">S1 </span></h3>
                        </div>
                        <!-- <div class="col-12 d-flex menu-cours mt-3">
                                        <div class="col-6 d-flex justify-content-center pt-2">
                                            <h4>PDF</h4>
                                        </div>
                                        <div class="col-6 d-flex justify-content-center pt-2">
                                            <h4>Video</h4>
                                        </div>
                                    </div> -->
                    </div>

                    <div class="col-12 row table-cours" id="table-cours">
                        <?php
                        $cours = new Formation();
                        $cours->setSemetre($_SESSION['semestre']);
                        $cours->setFiliere($_SESSION['filiere']);
                        $cours->setMois($_SESSION['mois']);
                        $cours->setCategorie(1);
                        $cours->setType(1);

                        if ($_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S6' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {

                            $tabvague = explode("V", $_SESSION['vague']);
                            for ($i = 0; $i < count($tabvague); $i++) {
                                $numvague = $tabvague[$i];
                            }

                            if ($numvague >= 7 and $_SESSION['diplome'] === 'MASTER') {
                                $tableaucours = $cours->formationMBAV7();
                            } else if ($numvague <= 7 or ($numvague > 7 and $_SESSION['diplome'] === 'LICENCE')) {
                                $tableaucours = $cours->formationL1L2M1();
                            }
                        } else {

                            $tableaucours = $cours->formationL3M2();
                        }

                        foreach ($tableaucours as $resultat) {
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
                                } ?>

                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                    <div class="mb-2 pt-2 cours text-center">
                                        <h5 class="d-flex justify-content-center align-items-center"><?php echo $resultat['INTITULE']; ?></h5>
                                        <div class="button-cours d-block">
											<!--
												<button class="btn mt-2 active-cours-pdf" onclick="GetPDF('<?php echo $courslivres;  ?>','<?php echo $resultat['INTITULE'] . $partie . ' ' . $part; ?>')">PDF</button>
											-->     


<a href="http://online.verypdf.com/app/reader2/web/?url=https://e-media-madagascar.com/universite/Cours/<?php echo $courslivres;  ?>&noopen=1&noprint=1&nosidebar=1&nofullscreen=1&nodownload=1&noviewbookmark=1&nofind=1&nomoretools=1" target='_blank' onmouseover="window.status='http://tonsite.com'" class="btn mt-2"><b>PDF</b> </a>

											
										   <button class="btn active-cours-explication" onclick="GetYOUTUBE(<?php echo $resultat['IDMATIERE']; ?>,'<?php echo $resultat['INTITULE']; ?>')">Explication</button>

                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>

                <!-- contenu-cours-explication -->
                <div class="row contenu-cours-explication mt-5 pb-3" id="contenu-cours-explication">
                    <div class="head d-flex">
                        <div class="col-12 title d-flex justify-content-center pt-1">
                            <h3 id="titre_video">Algorithme</h3>
                        </div>
                    </div>

                    <iframe id="cours_video" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <!-- fin cours -->

                <!-- exercice -->
                <div class="col-12 mt-5 contenu-exercice mb-2" id="contenu-exercice">
                    <div class="head-exercice">
                        <div class="icon-exercice d-flex justify-content-center align-items-center">
                            <i class="fal fa-edit"></i>
                        </div>
                        <div class="title-exercice d-flex justify-content-center pt-3">
                            <h3>Exercice</h3>
                        </div>
                        <!-- <div class="col-12 d-flex menu-cours mt-3">
                                        <div class="col-6 d-flex justify-content-center pt-2">
                                            <h4>PDF</h4>
                                        </div>
                                        <div class="col-6 d-flex justify-content-center pt-2">
                                            <h4>Video</h4>
                                        </div>
                                    </div> -->
                    </div>

                    <div class="col-12 row table-exercice" id="table-exercice">
                        <?php
                        $cours = new Formation();
                        $cours->setSemetre($_SESSION['semestre']);
                        $cours->setFiliere($_SESSION['filiere']);
                        $cours->setMois($_SESSION['mois']);
                        $cours->setCategorie(2);
                        $cours->setType(1);

                        if ($_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S6' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {

                            $tabvague = explode("V", $_SESSION['vague']);
                            for ($i = 0; $i < count($tabvague); $i++) {
                                $numvague = $tabvague[$i];
                            }

                            if ($numvague >= 7 and $_SESSION['diplome'] === 'MASTER') {
                                $tableaucours = $cours->formationMBAV7();
                            } else if ($numvague <= 7 or ($numvague > 7 and $_SESSION['diplome'] === 'LICENCE')) {
                                $tableaucours = $cours->formationL1L2M1();
                            }
                        } else {

                            $tableaucours = $cours->formationL3M2();
                        }

                        foreach ($tableaucours as $resultat) {
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
                                } ?>

                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                    <div class="mb-2 pt-2 exercice text-center">
                                        <h5 class="d-flex justify-content-center align-items-center"><?php echo $resultat['INTITULE']; ?></h5>
                                        <div class="button-exercice d-block">
<!--
                                            <button class="btn mt-2 active-cours-pdf" onclick="GetPDF('<?php echo $courslivres;  ?>','<?php echo $resultat['INTITULE'] . $partie . ' ' . $part; ?>')">PDF</button>
-->


<a href="http://online.verypdf.com/app/reader2/web/?url=https://e-media-madagascar.com/universite/Cours/<?php echo $courslivres;  ?>&noopen=1&noprint=1&nosidebar=1&nofullscreen=1&nodownload=1&noviewbookmark=1&nofind=1&nomoretools=1" target='_blank' onmouseover="window.status='http://tonsite.com'" class="btn mt-2"><b>PDF</b> </a>


                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>

                <!-- contenu-exercice-explication -->

                <!-- fin exercice -->

                <!-- nous vous ecoutons -->
                <div class="col-12 mt-5 contenu-chat mb-2 pb-2" id="contenu-chat">
                    <div class="head-chat">
                        <div class="icon-chat d-flex justify-content-center align-items-center">
                            <i class="fal fa-comments-alt"></i>
                        </div>
                        <div class="title-chat d-flex justify-content-center pt-3">
                            <h3>Nous vous ecoutons</h3>
                        </div>
                        <!-- <div class="d-flex justify-content-center pt-3">
                            
                            <h6 class="text-danger">Pas encore disponible</h6>
                        </div> -->
                    </div>

                    <div class="col-12 mt-3 table-chat overflow-auto">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 m-1 chat">
                            <div class="body-chat overflow-auto">
                                <!-- <div class="ml-5  mt-3 user-chat d-flex">
                                    <img src="<?php echo $_SESSION["photo"]; ?>" class="img-fluid" alt="">
                                    <div class="ml-2">Si vous avez des question a propos des cours lorem</div>
                                </div>

                                <div class="mt-3 ml-1 admin-chat d-flex">
                                    <img src="vue/image/logo/logo_E-media_enligne_rond.png" class="img-fluid" alt="">
                                    <div class="ml-2">Si vous avez des question a propos des cours</div>
                                </div>

                                <div class="ml-5  mt-3 user-chat d-flex">
                                    <img src="<?php echo $_SESSION["photo"]; ?>" class="img-fluid" alt="">
                                    <div class="ml-2">Si vous avez des question a propos des cours</div>
                                </div>

                                <div class="mt-3 ml-1 admin-chat d-flex">
                                    <img src="vue/image/logo/logo_E-media_enligne_rond.png" class="img-fluid" alt="">
                                    <div class="ml-2">Si vous avez des question a propos des cours</div>
                                </div>

                                <div class="ml-5  mt-3 user-chat d-flex">
                                    <img src="<?php echo $_SESSION["photo"]; ?>" class="img-fluid" alt="">
                                    <div class="ml-2">Si vous avez des question a propos des cours lorem</div>
                                </div>

                                <div class="mt-3 ml-1 admin-chat d-flex">
                                    <img src="vue/image/logo/logo_E-media_enligne_rond.png" class="img-fluid" alt="">
                                    <div class="ml-2">Si vous avez des question a propos des cours</div>
                                </div>

                                <div class="ml-5  mt-3 user-chat d-flex">
                                    <img src="<?php echo $_SESSION["photo"]; ?>" class="img-fluid" alt="">
                                    <div class="ml-2">Si vous avez des question a propos des cours</div>
                                </div>

                                <div class="mt-3 ml-1 admin-chat d-flex">
                                    <img src="vue/image/logo/logo_E-media_enligne_rond.png" class="img-fluid" alt="">
                                    <div class="ml-2">Si vous avez des question a propos des cours</div>
                                </div> -->
                            </div>

                            <div class="form-chat">
                                <!-- <form class="login-form mt-2" id="" method="post">
                                    <div class="d-flex input-chat">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 form-group">
                                            <textarea type="text" name="message" class="text-input p-1" id="" placeholder="Votre message..."></textarea>
                                            <button type="submit" class="btn"><i class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </div>

                                </form> -->
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 m-1 astuce-chat">
                            <img src="vue/image/chat.png" class="img-fluid" alt="">
                            <div class="d-flex flex-column justify-content-center">
                                <span>"Si vous avez des question a propos des cours , éxercice, éxamens n'égite pas
                                    envoyer votre question sur ce lien"</span>

                                <form action="">
                                    <div class="d-flex">
                                        <div class="importChat">
                                            <button class="btnImportChat float-right">Choisir le fichier</button>
                                            <input type="file" name="importChat" />
                                        </div>

                                        <div class="ml-2 btnEnvoyerImportChat">
                                            <input type="submit" value="Envoyer">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- fin nous vous ecoutons  -->

                <!-- contact -->
                <div class="col-12 mt-5 contenu-contact mb-2 pb-2" id="contenu-contact">
                    <div class="head-contact">
                        <div class="icon-contact d-flex justify-content-center align-items-center">
                            <i class="fal fa-phone-volume"></i>
                        </div>
                        <div class="title-contact d-flex justify-content-center pt-3">
                            <h3>Contact</h3>
                        </div>
                    </div>

                    <div class="col-12 row table-contact texte-center">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-3 mt-lg-5 mt-xl-5 contact">
                            <h6>Sérvice Pédagogie Licence <br> <span>0345677707</span></h6>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-3 mt-lg-5 mt-xl-5 contact">
                            <h6>Sérvice Pédagogie Master <br> <span>0349177707</span></h6>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-3 mt-lg-5 mt-xl-5 contact">
                            <h6>Sérvice Pédagogie MBA <br> <span>0340349177707</span></h6>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-3 mt-lg-5 mt-xl-5 contact">
                            <h6>Sérvice Finance <br> <span>0344013064</span></h6>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-3 mt-lg-5 mt-xl-5 contact">
                            <h6>Sérvice Technique <br> <span>0345077707</span></h6>
                        </div>
                    </div>
                </div>
                <!-- fin contact -->

            </section>
            <!-- fin section -->

            <!-- contenu-cours-pdf -->
            <div class="col-12 contenu-cours-pdf pb-3" id="contenu-cours-pdf">
                <div class="head d-flex">
                    <div class="col-11 title d-flex justify-content-center pt-1">
                        <h3 id="titre-cours"></h3>
                    </div>
                    <div class="col-1 exit d-flex justify-content-center" id="exit-cours-pdf">
                        <span><i class="fas fa-times ml-lg-5 ml-xl-5"></i></span>
                    </div>
                </div>

                <div class="col-12 affiche-cours-pdf overflow-auto mt-1">
                    <iframe id="cours-pdf" sandbox="allow-scripts allow-same-origin" src="" width="100%" height="800px" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <!-- contenu-exercice-pdf -->

            <!-- contenu-exercice-corrige -->

            <!-- contenu-notification -->
            <div class="col-12 contenu-notification mt-5" id="contenu-notification">
                <h4 class="d-flex justify-content-center mt-4">Examen dans:</h4>
                <div id="count_exam" class="d-flex justify-content-center"></div>

                <h4 class="d-flex justify-content-center mt-5">Paiments dans:</h4>
                <div id="count_ecolage" class="d-flex justify-content-center">

                </div>
            </div>

        </div>
    </div>
    <input type="hidden" value="<?php echo $_SESSION['diplome'] ?>" id="diplf">

</body>
<?php
require('script.html');
?>

<script src="vue/js/jquery.countdown.min.js"></script>
<script src="vue/js/countdownCountExam.js"></script>
<script src="vue/js/countdownCountEcolage.js"></script>
<script src="vue/js/accueilMaster.js"></script>
<script src="vue/js/accueil.js"></script>

</html>

</html>