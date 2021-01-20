    <?php
        require('head.html');
    ?>
        <link rel="stylesheet" href="vue/css/accueilMaster.css">
    </head>
    <body>

        <!-- preloading -->
        <div class="container-fluid preloading" id="preloading">
            <div class="contenu-preloading">
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
                        <div class="dropdown mt-1 mr-3">
                            <button class="dropbtn" id="langue-button">Version cours  <i class="fad fa-angle-down float-right mt-1 ml-4"></i></button>
                            <div class="dropdown-content mt-2" id="langue-content">
                                <a href="#" id="francais">Francais</a>
                                <a href="#" id="malagasy">Malagasy</a>
                            </div>
                        </div>
                                
                        <button type="button" class="btn notification" id="notification">
                            <i class="fal fa-bell"></i> <span class="badge badge-light">4</span>
                        </button>
                   
                    </div>
                </div>
                <!-- fin navbar -->

                <!-- sidebar -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 dashboard dashboard_mobile" id="dashboard">

                    <div class="pdp d-flex justify-content-center pt-3">
                        <img src="vue/image/user.jpg" class="mr-3" alt="">
                    </div>
                    <ul class="overflow-auto liste_dashboard mt-1">

                        <li id="active-video"><a href="#"><i class="fal fa-video-plus mr-3"></i><span>Video tuto</span></a></li>

                        <li class="profil">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" href="#collapse1" class="active-profil">
                                            <i class="fal fa-user-circle mr-3"></i>
                                            <span class="text-center">Santatra</span>
                                            <i class="fad fa-angle-down float-right mt-3 mr-2"></i>
                                        </a>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <ul class="list-group ml-3">
                                            <li class="list-group-item" id="active-profil">
                                                <i class="fal fa-user mr-3"></i>
                                                <span>Profil</span>
                                            </li>
                                            <li class="list-group-item" id="active-note">
                                                <i class="fal fa-clipboard mr-3"></i>
                                                <span>Note</span>
                                            </li>
                                            <li class="list-group-item">
                                                <i class="fal fa-credit-card mr-3"></i>
                                                <span>Paiment</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li id="active-calendrier"><a href="#"><i class="fal fa-calendar-alt mr-4"></i><span>Calendrier</span></a></li>

                        <li class="cours">
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
                                            <li class="list-group-item" id="active-cours">
                                                <i class="fal fa-user-graduate mr-2"></i>
                                                <span>S1</span>
                                            </li>
                                            <li class="list-group-item" id="active-cours">
                                                <i class="fal fa-user-graduate mr-2"></i>
                                                <span>S2</span>
                                            </li>
                                            <li class="list-group-item" id="active-cours">
                                                <i class="fal fa-user-graduate mr-2"></i>
                                                <span>Nouveau cours</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li id="active-exercice"><a href="#"><i class="fal fa-edit mr-3"></i><span>Exercices</span></a></li>
                        
                        <li id="active-chat"><a href="#"><i class="fal fa-comments-alt mr-3"></i><span>Nous vous ecoutons</span></a></li>
                    
                        <li id="active-contact"><a href="#"><i class="fal fa-phone-volume mr-3"></i><span>Contacts</span></a></li>

                        <li id="active-notification"><a href="#"><i class="fal fa-bell mr-3"></i><span>Notifications <span class="badge badge-light">4</span></span></a></li>

                        <li id="active-logout"><a href="#"><i class="fas fa-power-off mr-3"></i><span>Deconnexion </span></a></li>
                    </ul>
                </div>
                <!-- fin sidebar -->

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
                                <a href="https://www.youtube.com/embed/HgIeckuG7cQ" target="blank" class="text-center">Pour connaitre le manipulation de l'interface etudiants.</a>
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

                        <div class="corps mt-1">
                            <div class="propos">
                                <div class="propos-img d-flex justify-content-center">
                                    <img src="vue/image/user.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="col-12 d-md-flex d-lg-flex d-xl-flex propos-legende pt-3 pb-3">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">
                                        <div class="profile-legend profile-legend-nom">
                                            <h6>Nom <br><span> RATSITOHAINA </span></h6>
                                        </div>
                                        <div class="profile-legend">
                                            <h6>Prénom<br><span> Santatra </span></h6>
                                        </div>
                                        <div class="profile-legend">
                                            <h6>E-mail<br><span> santatra22ratsitohaina@gmail.com </span></h6>
                                        </div>
                                        <div class="profile-legend">
                                            <h6>Nationalité<br><span> MADAGASCAR, MAHAJANGA </span></h6>
                                        </div>      
                                        <div class="profile-legend">
                                            <h6>Mention<br><span> Marketing Publicité et Journalisme </span></h6>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-md-5 mt-lg-5 mt-xl-5 ml-md-5 ml-lg-5 ml-xl-5">
                                        <div class="profile-legend">
                                            <h6>Parcours<br><span> Réalisation Audiovisuelle </span></h6>
                                        </div>
                                        <div class="profile-legend">
                                            <h6>Matricule<br><span> TIC-V1/000/MG </span></h6>
                                        </div>  
                                        <div class="profile-legend">
                                            <h6>Niveau<br> <span> S2 </span> </h6>
                                        </div>
                                        <div class="profile-legend">
                                            <h6>Mois<br> <span> 6/8 </span></h6>
                                        </div>
                                        <div class="profile-legend">
                                            <h6>Ecolage<br> <span> 6/8 </span> </h6>
                                        </div> 
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
                                <button class="dropbtn" id="semestre-button">Semestre  <i class="fad fa-angle-down float-right mt-1 ml-4"></i></button>
                                <div class="dropdown-content mt-2" id="semestre-content">
                                    <a href="#" id="semestre1">S1</a>
                                    <a href="#" id="semestre2">S2</a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="table-note mt-3 pb-3 d-flex justify-content-center">
                            <table>
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center">LISTE DES MATIERES</th>
                                        <th colspan="2" class="text-center">NOTES /20</th>
                                        <th colspan="2" class="text-center">DECISION</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Mensuel</th>
                                        <th class="text-center">Semestriel</th>
                                        <th class="text-center">Moyenne des notes</th>
                                        <th class="text-center">Validation</th>
                                    </tr>
                                </thead>

                                <tbody id = "tabnote">

                                    <tr class="priority-300 ">
                                        <td class="matiere text-center">Matiere</td>
                                        <td class="note1 text-center">Note M</td>
                                        <td class="note1 text-center">Note S</td>
                                        <td class="note1 text-center">Moyenne</td>
                                        <td class="note1 text-center">Validation</td>

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
                       
                        <div class="col-12 table-calendrier mt-3 pb-3">
                            <h4 class="text-center">"1er - 3eme mois" et "5eme - 7eme mois"</h4>
                            
                            <div class="row legende d-flex justify-content-center">
                                <div class="cours d-flex justify-content-center align-items-center mr-1">
                                    Cours
                                </div>

                                <div class="exercices d-flex justify-content-center align-items-center mr-1">
                                    Exercices
                                </div>

                                <div class="corrige d-flex justify-content-center align-items-center mr-1">
                                    Corrige
                                </div>

                                <div class="examen-mensuel d-flex justify-content-center align-items-center mr-1">
                                    Examen Mensuel
                                </div>
                            </div>

                            <table class="mt-4">
                                <tbody id = "tabcalendrier">

                                    <tr class="priority-300">
                                        <td class="text-center">1</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center cours">3</td>
                                        <td class="text-center cours">4</td>
                                        <td class="text-center cours">5</td>
                                        <td class="text-center cours">6</td>
                                        <td class="text-center cours">7</td>
                                        <td class="text-center cours">8</td>
                                        <td class="text-center cours">9</td>
                                        <td class="text-center cours">10</td>

                                    </tr>

                                    <tr class="priority-300">
                                        <td class="text-center cours">11</td>
                                        <td class="text-center cours">12</td>
                                        <td class="text-center exercices">13</td>
                                        <td class="text-center exercices">14</td>
                                        <td class="text-center exercices">15</td>
                                        <td class="text-center exercices">16</td>
                                        <td class="text-center exercices">17</td>
                                        <td class="text-center exercices">18</td>
                                        <td class="text-center exercices">19</td>
                                        <td class="text-center corrige">20</td>

                                    </tr>

                                    <tr class="priority-300">
                                        <td class="text-center corrige">21</td>
                                        <td class="text-center corrige">22</td>
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
                            
                            <div class="row legende d-flex justify-content-center">
                                <div class="cours d-flex justify-content-center align-items-center mr-1">
                                    Cours
                                </div>

                                <div class="exercices d-flex justify-content-center align-items-center mr-1">
                                    Exercices
                                </div>

                                <div class="corrige d-flex justify-content-center align-items-center mr-1">
                                    Corrige
                                </div>

                                <div class="examen-mensuel d-flex justify-content-center align-items-center mr-1">
                                    Examen Mensuel
                                </div>

                                <div class="examen-semestriel d-flex justify-content-center align-items-center mr-1">
                                    Examen Semestriel
                                </div>
                            </div>

                            <table class="mt-4">
                                <tbody id = "tabcalendrier">

                                    <tr class="priority-300">
                                        <td class="text-center">1</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center cours">3</td>
                                        <td class="text-center cours">4</td>
                                        <td class="text-center cours">5</td>
                                        <td class="text-center cours">6</td>
                                        <td class="text-center cours">7</td>
                                        <td class="text-center cours">8</td>
                                        <td class="text-center cours">9</td>
                                        <td class="text-center cours">10</td>

                                    </tr>

                                    <tr class="priority-300">
                                        <td class="text-center cours">11</td>
                                        <td class="text-center cours">12</td>
                                        <td class="text-center exercices">13</td>
                                        <td class="text-center exercices">14</td>
                                        <td class="text-center exercices">15</td>
                                        <td class="text-center exercices">16</td>
                                        <td class="text-center exercices">17</td>
                                        <td class="text-center exercices">18</td>
                                        <td class="text-center exercices">19</td>
                                        <td class="text-center corrige">20</td>

                                    </tr>

                                    <tr class="priority-300">
                                        <td class="text-center corrige">21</td>
                                        <td class="text-center corrige">22</td>
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
                    <!-- fin calendrier -->

                    <!-- cours -->
                    <div class="col-12 mt-5 contenu-cours mb-2" id="contenu-cours">
                        <div class="head-cours">
                            <div class="icon-cours d-flex justify-content-center align-items-center">
                                <i class="fal fa-books"></i>
                            </div>
                            <div class="title-cours d-flex justify-content-center pt-3">
                                <h3>Cours S1</h3>
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
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 cours-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-cours">
                                        <button class="btn pl-4 pr-4 mt-2" id="active-cours-pdf">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2" id="active-cours-explication">Explication</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 cours-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-cours">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 cours-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-cours">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 cours-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-cours">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 cours-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-cours">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 cours-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-cours">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 cours-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-cours">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 cours-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-cours">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- contenu-cours-explication -->
                    <div class="row contenu-cours-explication mt-5 pb-3" id="contenu-cours-explication">
                        <div class="head d-flex">
                            <div class="col-12 title d-flex justify-content-center pt-1">
                                <h3>Algorithme</h3>
                            </div>
                        </div>

                        <iframe src="https://www.youtube.com/embed/HgIeckuG7cQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                <div class="mb-2 pt-2 pb-2 exercice-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-exercice">
                                        <button class="btn pl-4 pr-4 mt-2" id="active-exercice-pdf">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2" id="active-exercice-explication">Explication</button>
                                        <button class="btn pl-3 pr-3 mt-2" id="active-exercice-corrige">Corrige</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 exercice-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-exercice">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                        <button class="btn pl-3 pr-3 mt-2">Corrige</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 exercice-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-exercice">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                        <button class="btn pl-3 pr-3 mt-2">Corrige</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 exercice-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-exercice">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                        <button class="btn pl-3 pr-3 mt-2">Corrige</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 exercice-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-exercice">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                        <button class="btn pl-3 pr-3 mt-2">Corrige</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 exercice-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-exercice">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                        <button class="btn pl-3 pr-3 mt-2">Corrige</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 exercice-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-exercice">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                        <button class="btn pl-3 pr-3 mt-2">Corrige</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                                <div class="mb-2 pt-2 pb-2 exercice-pdf text-center">
                                    <h5 class="d-flex align-items-center">Algorithme Algorithme</h5>
                                    <div class="button-exercice">
                                        <button class="btn pl-4 pr-4 mt-2">PDF</button>
                                        <button class="btn pl-3 pr-3 mt-2">Explication</button>
                                        <button class="btn pl-3 pr-3 mt-2">Corrige</button>
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
                                        <img src="vue/image/user.jpg" class="img-fluid" alt="">
                                        <div class="ml-2">Si vous avez des question a propos des cours lorem</div>
                                    </div>

                                    <div class="mt-3 ml-1 admin-chat d-flex">
                                        <img src="vue/image/logo/logo_E-media_enligne_rond.png" class="img-fluid" alt="">
                                        <div class="ml-2">Si vous avez des question a propos des cours</div>
                                    </div>

                                    <div class="ml-5  mt-3 user-chat d-flex">
                                        <img src="vue/image/user.jpg" class="img-fluid" alt="">
                                        <div class="ml-2">Si vous avez des question a propos des cours</div>
                                    </div>

                                    <div class="mt-3 ml-1 admin-chat d-flex">
                                        <img src="vue/image/logo/logo_E-media_enligne_rond.png" class="img-fluid" alt="">
                                        <div class="ml-2">Si vous avez des question a propos des cours</div>
                                    </div>

                                    <div class="ml-5  mt-3 user-chat d-flex">
                                        <img src="vue/image/user.jpg" class="img-fluid" alt="">
                                        <div class="ml-2">Si vous avez des question a propos des cours lorem</div>
                                    </div>

                                    <div class="mt-3 ml-1 admin-chat d-flex">
                                        <img src="vue/image/logo/logo_E-media_enligne_rond.png" class="img-fluid" alt="">
                                        <div class="ml-2">Si vous avez des question a propos des cours</div>
                                    </div>

                                    <div class="ml-5  mt-3 user-chat d-flex">
                                        <img src="vue/image/user.jpg" class="img-fluid" alt="">
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
                                    <span>"Si vous avez des question a propos des cours , éxercice, éxamens n'égite pas envoyer votre question sur le messages..."</span>
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

                        <div class="col-12 row table-contact mt-3 text-center">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 contact">
                                <h6>Pedagogique License <br> <span>0347626108</span></h6>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4  contact">
                                <h6>Pedagogique Master <br> <span>0347626108</span></h6>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4  contact">
                                <h6>Pedagogique MBA <br> <span>0347626108</span></h6>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4  contact">
                                <h6>Finance <br> <span>0347626108</span></h6>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4  contact">
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
                            <h3>Algorithme</h3>
                        </div>
                        <div class="col-1 exit d-flex justify-content-center" id="exit-cours-pdf">
                            <span><i class="fas fa-times ml-lg-5 ml-xl-5"></i></span>
                        </div>
                    </div>

                    <div class="col-12 affiche-cours-pdf overflow-auto mt-1">
                                
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

            </div>
        </div>
        
        <?php
            require('script.html');
        ?>
        <script src="vue/js/accueilMaster.js"></script>
    </body>
    </html>