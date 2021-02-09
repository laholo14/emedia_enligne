<!--Calendrier-->
<?php

include '../controller/contrSessionExamLicence.php';


require('head.html');

?>

<link rel="stylesheet" href="vue/css/accueilMaster.css">
</head>

<body>

    <!-- preloading -->
    <div class="container-fluid preloading" id="preloading">
        <div class="contenu-preloading text-center">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- fin preloading -->

    <div class="container-fluid universite-Emedia" id="universite-Emedia">
        <div class="row">

            <!-- navbar -->
            <div class="row d-flex fixed-top nav_bar" id="nav_bar">
                <div class="col-4">
                    <img src="vue/image/logo/logo_E-media_enligne.png" class="img-fluid ml-4 logo" alt="">
                    <div id="fa-bars"><i class="fas fa-bars pt-2 pl-4"></i></div>
                    <div id="fa-times"><i class="fas fa-times pt-2 pl-4"></i></div>
                </div>

                <div class="col-8 d-flex justify-content-end select-langue">
                    <button type="button" class="btn-notification mr-3" id="active-notification">
                        <i class="fad fa-alarm-clock"></i> <span class="badge badge-light">4</span>
                    </button>

                </div>
            </div>
            <!-- fin navbar -->

            <!-- dashboard -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 dashboard dashboard_mobile" id="dashboard">

                <div class="pdp d-flex justify-content-center pt-3">
                    <img src="<?php echo $_SESSION["photo"]; ?>" class="mr-3" alt="">
                </div>
                <ul class="overflow-auto liste_dashboard mt-1">

                    <li id="active-video" class="active"><a href="#"><i class="fal fa-video-plus mr-3"></i><span>Video
                                tuto</span></a></li>

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
                                            <i class="fal fa-clipboard ml-2 mr-3"></i>
                                            <span>Note</span>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="fal fa-credit-card ml-2 mr-3"></i>
                                            <span>Paiement</span>
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
                                        $formation = new Formation();
                                        foreach ($formation->selectNumSemestre($_SESSION['semestre']) as $d) {
                                            $numsemestre = $d['NUM'];
                                        }
                                        if ($_SESSION['diplome'] == "LICENCE") {
                                            $requete = $formation->listliensemestre($numsemestre);
                                        } else {
                                            $requete = $formation->listliensemestreMaster($numsemestre);
                                        }
                                        foreach ($requete as $resultat) {
                                        ?>
                                            <li class="list-group-item active-cours" onclick="GetSemestreCours('<?php echo $resultat['SEMESTRE']; ?>')">
                                                <i class="fal fa-user-graduate ml-2 mr-2"></i>
                                                <span><?php echo $resultat['SEMESTRE']; ?></span>
                                                <input type="hidden" id="<?php echo "lien" . $resultat['SEMESTRE']; ?>" value="<?php echo $resultat['SEMESTRE']; ?>" />
                                            </li>
                                        <?php } ?>
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
                                            $formation = new Formation();
                                            foreach ($formation->selectNumSemestre($_SESSION['semestre']) as $d) {
                                                $numsemestre = $d['NUM'];
                                            }
                                            if ($_SESSION['diplome'] == "LICENCE") {
                                                $requete = $formation->listliensemestre($numsemestre);
                                            } else {
                                                $requete = $formation->listliensemestreMaster($numsemestre);
                                            }
                                            foreach ($requete as $resultat) {
                                            ?>
                                                <li class="list-group-item active-exercice">
                                                    <i class="fal fa-user-graduate ml-2 mr-2"></i>
                                                    <span><?php echo $resultat['SEMESTRE']; ?></span>

                                                </li>
                                            <?php } ?>
                                            <input type="hidden" id="" value="" />
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <li id="active-chat"><a href="#"><i class="fal fa-comments-alt mr-3"></i><span>Nous vous
                                ecoutons</span></a></li>

                    <li id="active-contact"><a href="#"><i class="fal fa-phone-volume mr-3"></i><span>Contacts</span></a></li>

                    <li id="active-notification"><a href="#"><i class="fal fa-bell mr-3"></i><span>Notifications <span class="badge badge-light">4</span></span></a></li>

                    <li id="active-logout"><a href="vue/logout.php"><i class="fas fa-power-off mr-3"></i><span>Deconnexion </span></a></li>
                </ul>
            </div>
            <!-- fin dashboard -->

            <!-- section -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 contenu overflow-auto" id="contenu">

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
                            <a href="https://www.youtube.com/embed/HgIeckuG7cQ" target="blank" class="text-center">Pour
                                connaitre le manipulation de l'interface etudiants.</a>
                        </div>
                        <iframe src="https://www.youtube.com/embed/HgIeckuG7cQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 video2">
                            <div class="video1_text text-center p-2">
                                <a href="https://www.youtube.com/embed/HgIeckuG7cQ" target="blank" class="text-center">Pour connaitre le manipulation de l'interface etudiants.</a>
                            </div>
                            <iframe src="https://www.youtube.com/embed/HgIeckuG7cQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 video3">
                            <div class="video1_text text-center p-2">
                                <a href="https://www.youtube.com/embed/HgIeckuG7cQ" target="blank" class="text-center">Pour connaitre le manipulation de l'interface etudiants.</a>
                            </div>
                            <iframe src="https://www.youtube.com/embed/HgIeckuG7cQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                            <div class="row propos-contenu d-flex p-3">
                                <div class="col-12 col-lg-2 col-xl-2 propos-img d-flex align-items-center">
                                    <img src="<?php echo $_SESSION["photo"]; ?>" class="img-fluid" alt="">
                                </div>

                                <div class="col-12 col-lg-5 col-xl-5 propos-details">
                                    <h6 class="">Nom<br><span><?php echo $_SESSION['nom'] ?></span></h6>
                                    <h6 class="">Prenom<br><span><?php echo $_SESSION['prenom'] ?></span></h6>
                                    <h6>E-mail<br><span><?php echo $_SESSION['mail'] ?></span></h6>
                                    <h6>Parcours<br><span><?php echo $_SESSION['nomparcours'] ?></span></h6>
                                    <h6>Mention<br><span><?php echo $_SESSION['nomfiliere'] ?></span></h6>
                                </div>

                                <div class="col-12 col-lg-5 col-xl-5 propos-details">
                                    <h6>Niveau<br> <span><?php echo $_SESSION['semestre'] ?></span> </h6>
                                    <h6>Matricule<br><span><?php echo $_SESSION['matricule'] ?></span></h6>
                                    <h6>Mois<br> <span><?php echo $_SESSION['mois'] ?>/8</span> </h6>
                                    <h6>Ecolage<br> <span><?php echo $_SESSION['ecolage'] ?>/8 </span> </h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin profil -->

                <!-- note -->
                <div class="col-12 mt-5 contenu-note mb-2" id="contenu-note">
                    <div class="head-note">
                        <div class="icon-note d-flex justify-content-center align-items-center">
                            <i class="fal fa-clipboard"></i>
                        </div>
                        <div class="title-note d-flex justify-content-center pt-3">
                            <h3>Notes d'examen</h3>
                        </div>
                    </div>


                    <div class="d-flex justify-content-center select-semestre">
                        <div class="dropdown mt-1">
                            <button class="dropbtn" id="semestre-button">Semestre <i class="fad fa-angle-down float-right mt-1 ml-4"></i></button>
                            <div class="dropdown-content mt-2" id="semestre-content">
                                <a href="#" id="semestre1">S1</a>
                                <a href="#" id="semestre2">S2</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-note mt-3 pb-3 d-flex justify-content-center">
                        <table>
                            <thead>
                                <th>Code</th>
                                <th>Unite d'enseignement</th>
                                <th>Credit</th>
                                <th>Moyenne</th>
                                <th>Mention</th>
                                <th>Resultat</th>
                                <th>Code EC</th>
                                <th>Elemnts constitutifs</th>
                                <th>Note</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td rowspan="3">UE1</td>
                                    <td rowspan="3">Informatique de base</td>
                                    <td rowspan="3">9</td>
                                    <td rowspan="3">13.80</td>
                                    <td rowspan="3">Assez-Bien</td>
                                    <td rowspan="3">9 sur 9</td>
                                    <td>EC1</td>
                                    <td>Algorithme</td>
                                    <td>15.5</td>
                                    <tr>
                                        <td>EC1</td>
                                        <td>Algorithme</td>
                                        <td>15.5</td>
                                    </tr>
                                    <tr>
                                        <td>EC1</td>
                                        <td>Algorithme</td>
                                        <td>15.5</td>
                                    </tr>
                                </tr>

                                <tr>
                                    <td rowspan="2">UE1</td>
                                    <td rowspan="2">Informatique de base</td>
                                    <td rowspan="2">9</td>
                                    <td rowspan="2">13.80</td>
                                    <td rowspan="2">Assez-Bien</td>
                                    <td rowspan="2">9 sur 9</td>
                                    <td>EC1</td>
                                    <td>Algorithme</td>
                                    <td>15.5</td>
                                    <tr>
                                        <td>EC1</td>
                                        <td>Algorithme</td>
                                        <td>15.5</td>
                                    </tr>
                                </tr>

                                <tr>
                                    <td colspan="2">Total</td>
                                    <td>33</td>
                                    <td></td>
                                    <td></td>
                                    <td>33 sur 33</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- fin note -->

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
                    <div class="calendrier-licence d-flex">
                        <div class="col-12 col-lg-8 col-xl-8 calendrier-corps">
                            <div class="col-12 table-calendrier mt-3 pb-3">
                                <h4 class="text-center">"1er - 3eme mois" et "5eme - 7eme mois"</h4>
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
                                <h4 class="text-center">"4eme mois" et "9eme mois"</h4>
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
                                <span class="d-flex justify-content-center align-items-center">3</span><p class="ml-2">Debut cours</p>
                            </div>
                            <div class="exercice-legende d-flex align-items-center mt-2">
                                <span class="d-flex justify-content-center align-items-center">13</span><p class="ml-2">Debut exercice</p>
                            </div>
                            <div class="corrige-legende d-flex align-items-center mt-2">
                                <span class="d-flex justify-content-center align-items-center">20</span><p class="ml-2">Debut correction</p>
                            </div>
                            <div class="examen-mensuel-legende d-flex align-items-center mt-2">
                                <span class="d-flex justify-content-center align-items-center">23</span><span class="d-flex justify-content-center align-items-center">24</span><p class="ml-2">Examen mensuel</p>
                            </div>
                            <div class="examen-semestriel-legende d-flex align-items-center mt-2">
                                <span class="d-flex justify-content-center align-items-center">25 a</span><span class="d-flex justify-content-center align-items-center">30</span><p class="ml-2">Examen semestriel</p>
                            </div>
                        </div>
                    </div>

                    <!-- calendrier-master -->
                    <div class="calendrier-master d-flex">
                        <div class="col-12 col-lg-8 col-xl-8 calendrier-corps">
                            <div class="col-12 table-calendrier mt-3 pb-3">
                                <h4 class="text-center">"1er - 4eme mois" et "6eme - 8eme mois"</h4>
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
                                <h4 class="text-center">"5eme mois" et "10eme mois"</h4>
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
                                <span class="d-flex justify-content-center align-items-center">3</span><p class="ml-2">Debut cours</p>
                            </div>
                            <div class="exercice-legende d-flex align-items-center mt-2">
                                <span class="d-flex justify-content-center align-items-center">10 a</span><span class="d-flex justify-content-center align-items-center">12</span><p class="ml-2">Depot questions</p>
                            </div>
                            <div class="corrige-legende d-flex align-items-center mt-2">
                                <span class="d-flex justify-content-center align-items-center">17</span><p class="ml-2">Reponse au question</p>
                            </div>
                            <div class="examen-mensuel-legende d-flex align-items-center mt-2">
                                <span class="d-flex justify-content-center align-items-center">25</span><span class="d-flex justify-content-center align-items-center">26</span><p class="ml-2">Examen mensuel</p>
                            </div>
                            <div class="examen-semestriel-legende d-flex align-items-center mt-2">
                                <span class="d-flex justify-content-center align-items-center">20 a</span><span class="d-flex justify-content-center align-items-center">27</span><p class="ml-2">Examen semestriel</p>
                            </div>
                        </div>
                    </div>

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

                            if ($numvague < 7) {
                                $res = $cours->formationL1L2M1();
                            } else {
                                $res = $cours->formationMBAV7();
                            }
                        } else {
                            //L3 M2 
                            if ($numvague < 7) {
                                $res = $cours->formationL3M2();
                            } else {
                                $res = $cours->formationMASTERM2();
                            }
                        }

                        foreach ($res as $resultat) {
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
                        ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                    <div class="mb-2 pt-2 cours text-center">
                                        <h5 class="d-flex justify-content-center align-items-center"><?php echo $resultat['INTITULE']; ?></h5>
                                        <div class="button-cours d-block">

                                            <button class="btn mt-2 active-cours-pdf" onclick="GetPDF('<?php echo $courslivres; ?>','<?php echo $resultat['INTITULE'] . $partie . ' ' . $part; ?>')">PDF</button>
                                            <button class="btn active-cours-explication" onclick="GetYOUTUBE(<?php echo $resultat['IDMATIERE']; ?>,'<?php echo $resultat['INTITULE']; ?>')">Explication</button>

                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>


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
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                            <div class="mb-2 pt-2 exercice text-center">
                                <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                <div class="button-exercice">
                                    <button class="btn mt-2" id="active-exercice-pdf">PDF</button>
                                    <button class="btn" id="active-exercice-explication">Explication</button>
                                    <button class="btn" id="active-exercice-corrige">Corrige</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                            <div class="mb-2 pt-2 exercice text-center">
                                <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                <div class="button-exercice">
                                    <button class="btn mt-2">PDF</button>
                                    <button class="btn">Explication</button>
                                    <button class="btn">Corrige</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                            <div class="mb-2 pt-2 exercice text-center">
                                <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                <div class="button-exercice">
                                    <button class="btn mt-2">PDF</button>
                                    <button class="btn">Explication</button>
                                    <button class="btn">Corrige</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                            <div class="mb-2 pt-2 exercice text-center">
                                <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                <div class="button-exercice">
                                    <button class="btn mt-2">PDF</button>
                                    <button class="btn">Explication</button>
                                    <button class="btn">Corrige</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                            <div class="mb-2 pt-2 exercice text-center">
                                <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                <div class="button-exercice">
                                    <button class="btn mt-2">PDF</button>
                                    <button class="btn">Explication</button>
                                    <button class="btn">Corrige</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                            <div class="mb-2 pt-2 exercice text-center">
                                <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                <div class="button-exercice">
                                    <button class="btn mt-2">PDF</button>
                                    <button class="btn">Explication</button>
                                    <button class="btn">Corrige</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                            <div class="mb-2 pt-2 exercice text-center">
                                <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                <div class="button-exercice">
                                    <button class="btn mt-2">PDF</button>
                                    <button class="btn">Explication</button>
                                    <button class="btn">Corrige</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                            <div class="mb-2 pt-2 exercice text-center">
                                <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                <div class="button-exercice">
                                    <button class="btn mt-2">PDF</button>
                                    <button class="btn">Explication</button>
                                    <button class="btn">Corrige</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- contenu-exercice-explication -->
                <div class="row contenu-exercice-explication mt-5 pb-3" id="contenu-exercice-explication">
                    <div class="head d-flex">
                        <div class="col-12 title d-flex justify-content-center pt-1">
                            <h3>Algorithme</h3>
                        </div>
                    </div>

                    <iframe src="https://www.youtube.com/embed/HgIeckuG7cQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

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
                    </div>

                    <div class="col-12 d-flex mt-3 table-chat overflow-auto">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 m-1 chat">
                            <div class="body-chat overflow-auto">
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
                                </div>
                            </div>

                            <div class="form-chat">
                                <form class="login-form mt-2" id="" method="post">
                                    <div class="d-flex input-chat">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 form-group">
                                            <textarea type="text" name="message" class="text-input p-1" id="" placeholder="Votre message..."></textarea>
                                            <button type="submit" class="btn"><i class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="col-4 m-1 astuce-chat">
                            <img src="vue/image/chat.png" class="img-fluid" alt="">
                            <div class="d-flex justify-content-center">
                                <span>"Si vous avez des question a propos des cours , éxercice, éxamens n'égite pas
                                    envoyer votre question sur le messages..."</span>
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

                    <div class="col-12 row table-contact">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5 contact">
                            <h6>Pedagogique License <br> <span>0347626108</span></h6>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5 contact">
                            <h6>Pedagogique Master <br> <span>0347626108</span></h6>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5 contact">
                            <h6>Pedagogique MBA <br> <span>0347626108</span></h6>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5 contact">
                            <h6>Finance <br> <span>0347626108</span></h6>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-5 contact">
                            <h6>Technique <br> <span>0347626108</span></h6>
                        </div>
                    </div>
                </div>
                <!-- fin contact -->

            </div>
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
            <div class="col-12 contenu-exercice-pdf pb-3" id="contenu-exercice-pdf">
                <div class="head d-flex">
                    <div class="col-11 title d-flex justify-content-center pt-1">
                        <h3>Algorithme</h3>
                    </div>
                    <div class="col-1 exit d-flex justify-content-center" id="exit-exercice-pdf">
                        <span><i class="fas fa-times ml-lg-5 ml-xl-5"></i></span>
                    </div>
                </div>

                <div class="col-12 affiche-exercice-pdf overflow-auto mt-1">

                </div>
            </div>

            <!-- contenu-exercice-corrige -->
            <div class="col-12 contenu-exercice-corrige pb-3" id="contenu-exercice-corrige">
                <div class="head d-flex">
                    <div class="col-11 title d-flex justify-content-center pt-1">
                        <h3>Algorithme</h3>
                    </div>
                    <div class="col-1 exit d-flex justify-content-center" id="exit-exercice-corrige">
                        <span><i class="fas fa-times ml-lg-5 ml-xl-5"></i></span>
                    </div>
                </div>

                <div class="col-12 affiche-exercice-corrige overflow-auto mt-1 pt-3">
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/HgIeckuG7cQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <!-- contenu-notification -->
            <div class="col-12 contenu-notification mt-5" id="contenu-notification">
                <h4 class="d-flex justify-content-center mt-4">Examen dans:</h4>
                <div id="count_exam" class="d-flex justify-content-center">

                </div>
                <button class="btn-details-examen" id="btn-details-examen">Details</button>

                <h4 class="d-flex justify-content-center mt-5">Paiments dans:</h4>
                <div id="count_ecolage" class="d-flex justify-content-center">

                </div>
            </div>

        </div>
    </div>


</body>
<?php
require('script.html');
?>
<script src="vue/js/accueilMaster.js"></script>
<script src="vue/js/accueil.js"></script>
<script src="vue/js/jquery.countdown.min.js"></script>
<script src="vue/js/countdownCountExam.js"></script>
<script src="vue/js/countdownCountEcolage.js"></script>


</html>

</html>

</html>

</html>