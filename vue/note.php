<?php

    require('head.html');
?>
    <link rel="stylesheet" href="vue/css/note.css">
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

    <div class="container-fluid releveNote" id="releveNote">
        <div class="">
            <!-- navbar -->
            <nav class="row d-flex fixed-top nav_bar" id="nav_bar">
                <div class="col-4">
                    <a href="Accueil">
                        <img src="vue/image/logo/logo_E-media_enligne.png" class="img-fluid ml-4 logo" alt="">
                    </a>
                </div>

                <div class="col-8 d-flex justify-content-end select-langue">
                    <button type="button" class="btn-notificationNote" id="active-notification">
                        <i class="fad fa-alarm-clock"></i> <span class="badge badge-light">2</span>
                    </button>
                    <a href="vue/logout.php">
                        <div class="logoutNote mr-2"><i class="fas fa-power-off pt-2 pl-4"></i></div>
                    </a>
                </div>
            </nav>
            <!-- fin navbar -->

            <!-- note -->
            <div class="col-12 contenu-note mb-2" id="contenu-note">
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

            <!-- footer -->
                <footer class="row justify-content-center"> 
                    <div class="d-flex justify-content-center align-items-center">
                        <p>Copyright © E-MEDIA 2021</p>
                    </div>
                </footer>

        </div>
    </div>
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