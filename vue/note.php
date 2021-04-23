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

                    <div class="form-group select_langue mt-1 mr-5 ml-3">
                        
                        <select class="form-control" id="semestre">
                            <?php if ($_SESSION['diplome'] == 'LICENCE') { ?>
                                <option class="" value="S1">Semestre 1</option>
                                <option class="" value="S2">Semestre 2</option>
                                <option class="" value="S3">Semestre 3</option>
                                <option class="" value="S4">Semestre 4</option>
                                <option class="" value="S5">Semestre 5</option>
                                <option class="" value="S6">Semestre 6</option>
                            <?php } else { ?>
                                <option class="" value="S7">Semestre 7</option>
                                <option class="" value="S8">Semestre 8</option>
                                <option class="" value="S9">Semestre 9</option>
                                <option class="" value="S10">Semestre 10</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="table-note mt-3 pb-3 d-flex justify-content-center"><table border="1">
                    <thead>
                        <tr>
                            <th class="text-center">Unité d'enseignement</th>
                            <th class="text-center">Crédit</th>
                            <th  class="text-center">Moyenne finale</th>
                            <th  class="text-center">Element Constitutif</th>
                            <th class="text-center">Note par EC</th>
                        </tr>
                    </thead>   
                    <tbody id="tabnote">
                    </tbody>
                </table>



                </div>
            <?php
                if($_SESSION['diplome']=='LICENCE' && $_SESSION['vague']=='V1'){
                    echo "<div id='containerRepechage'></div>";
                }
            ?>

            

        
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
<script src="vue/js/bulletin.js"></script>

</html>
