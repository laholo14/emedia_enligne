<!--Calendrier-->
<?php

include '../controller/contrSessionExamLicence.php';

?>
<!-- Modal 

Fin Calendrier-->



<div class="calendar">

    <div class="modal fade" id="calendarPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CALENDRIER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="bd-example">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="vue/image/page1.png" class="d-block w-100" alt="img 1">

                                </div>
                                <div class="carousel-item">
                                    <img src="vue/image/page2.png" class="d-block w-100" alt="img 2">

                                </div>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions"
                                style="color:#000!important;" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" style="background-color:black;"
                                    aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions"
                                style="color:#000!important;" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" style="background-color:black;"
                                    aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="button_ancien" value="<?php echo $_SESSION['semestre']; ?>">
<!--Sidebar sy header-->
<div class="wrapper">
    <!--Sidebar Manomboka-->
    <div class="sidebar">
        <div class="bg_shadow"></div>

        <div class="sidebar_inner">
            <div class="profile">
                <img src="vue/image/logoE-media.png" width="140px">
                <div class="closse">
                    <i class="fa fa-times"></i>
                </div>
            </div>

            <ul class="sidebar_menu">
                <li class="active">
                    <a href="#" id="open_profile" class="clr">
                        <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <div class="title">Profil</div>
                        <span class="bottom-solid"></span>
                    </a>
                </li>
                <li id="side-licence" data-toggle="modal" data-target="#calendarPhoto">
                    <a href="#" id="calendar" class="clr">
                        <div class="row">
                            <div class="icon ml-1"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                            <div class="title mt-1">Calendrier</div>
                            <span class="bottom-solid"></span>
                        </div>

                    </a>
                </li>
                <li>
                    <a href="#" id="open_cours" class="clr">
                        <div class="icon"><i class="fa fa-file-alt" aria-hidden="true"></i></div>
                        <div class="title">Cours</div>
                        <span class="bottom-solid"></span>
                    </a>
                </li>
                <li>
                    <a href="#" id="open_exo" class="clr">
                        <div class="icon"><i class="fa fa-edit" aria-hidden="true"></i></div>
                        <div class="title">Exercices</div>
                        <span class="bottom-solid"></span>
                    </a>
                </li>
                <li>
                    <a href="Bulletin" id="open_examen" class="clr">
                        <div class="icon"><i class="fa fa-filter" aria-hidden="true"></i></div>
                        <div class="title">Note</div>
                        <span class="bottom-solid"></span>
                    </a>
                </li>
                <li>
                    <a href="#" id="open_message" class="clr">
                        <div class="icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
                        <div class="title">Messages</div>
                        <span class="bottom-solid"></span>
                    </a>
                </li>

                <li id="open_licence">
                    <a href="apTjay661lo" id="" class="clr">
                        <div class="row">
                            <div class="icon ml-3"><i class="fa fa-building-o" aria-hidden="true"></i></div>
                            <div class="title mt-1">Anciens Cours</div>
                            <span class="bottom-solid"></span>
                        </div>

                    </a>
                </li>




                <li>
                    <a href="Traitement" class="clr">
                        <div class="icon"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                        <div class="title">Paiement</div>
                        <span class="bottom-solid"></span>
                    </a>
                </li>
                <!--  <p class="deconnection-text text-center m-2">N’OUBLIEZ PAS DE VOUS DÉCONNECTER AVANT DE QUITTER</p>
                <div class="pt-2 pb-2 pr-2 pl-3 deconnection">
                    <a href="vue/logout.php">
                        <div class="title">Deconnexion <i class="fa fa-power-off"></i></div>
                    </a>
                </div>-->

                <!-- Button trigger modal -->



            </ul>
        </div>
    </div>

    <!--Sidebar tapitra-->
    <!--header-->
    <div class="content">
        <div class="wrappers">
            <div class="nabar fixed-top">
                <div class="nabar_left">
                    <div class="hamburger">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <div class="logo">
                        <a href="#"></a>
                    </div>
                </div>
                <div class="nabar_right">
                    <div class="form-group select_langue mt-1 mr-5">
                        <select class="form-control oplangue" id="langue">
                            <option selected disabled>Version cours</option>
                            <option class="oplangue">Français</option>
                            <option class="oplangue">Malagasy</option>
                        </select>
                    </div>


                    <div class="icon_wrap mr-2 ">

                    </div>


                    <div class="btn-group btn-group-parametre">
                        <span class="name mt-1 mr-2"><?php echo $_SESSION['prenom']; ?></span>
                        <a href="vue/logout.php" data-tooltip="Deconnexion"><i class="fa fa-power-off mr-2"
                                aria-hidden="true"></i></a>
                        <!--<img src="<?php echo $_SESSION['photo']; ?>" width="40px" alt="" class="fa fa-bars dropdown-toggle mb-4 imgparametre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalScrollable"> <i class="fa fa-cog fa-spin fa-3x fa-fw mr-2" aria-hidden="true"></i><b class="para">Paramètre</b></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="vue/logout.php"><i class="fa fa-power-off mr-2" aria-hidden="true"></i>Déconnexion</a>
                        </div>-->
                    </div>




                </div>
            </div>
            <!--header tapitra-->

            <!--modal-->
            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="en_tete d-flex justify-content-center p-2">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Paramètre</h5>
                            <button type="button" class="btn quitter_parametre" data-dismiss="modal">X</button>
                        </div>
                        <div class="modal-body">
                            <form id="dropFileForm" action="" method="post">

                                <input type="text" name="" id="fileInput" multiple>
                                <label for="fileInput" class="d-flex align-items-center " id="fileLabel">
                                    <img src="<?php echo $_SESSION['photo']; ?>" width="200px" alt="votre photo" />
                                    <div class="icon_edit_profile ml-5">
                                        <i class="fa fa-download fa-5x" id="fa_icons_dowload"></i><br>
                                        <div class="titre_edit d-flex">
                                            Fonction pas encore disponible <i class="fa fa-check ml-2 "
                                                id="fa_icons"></i>
                                        </div>
                                    </div>
                                </label>
                                <input type="" value="Enregistrer" class="upload_button">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--tapitra modal-->

            <!--profile-->
            <div class="profile-blocs mt-5" id="profile-blocs">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="corps">
                                <div class="cover-photo">
                                    <img src="<?php echo $_SESSION['photo']; ?>" alt="votre photo"
                                        class="img-profile" />
                                </div>
                                <div class="propos text-center pb-3 pt-3 ml-5">
                                    <div class="profile-legend">
                                        <h6 class=""><b>Nom:
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                            <?php echo $_SESSION['nom']; ?></h6>
                                    </div>
                                    <div class="profile-legend">
                                        <h6 class=""><b>Prénom: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                            <?php echo $_SESSION['prenom']; ?></h6>
                                    </div>
                                    <div class="profile-legend">
                                        <h6 class=""><b>Matricule: &nbsp;&nbsp;&nbsp;&nbsp;</b>
                                            <?php echo $_SESSION['matricule']; ?></h6>
                                    </div>
                                    <div class="profile-legend">
                                        <h6 class=""><b>E-mail:
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                            <?php echo $_SESSION['mail']; ?></h6>
                                    </div>
                                    <div class="profile-legend">
                                        <h6 class=""><b>>Pays d'origine: &nbsp;</b> <?php echo $_SESSION['pays']; ?></h6>
                                    </div>
                                    <div class="profile-legend mention">
                                        <h6 class=""><b>Mention: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                            <?php echo $_SESSION['nomfiliere']; ?></h6>
                                    </div>
                                    <div class="profile-legend">
                                        <h6 class=""><b>Parcours: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                            <?php echo $_SESSION['nomparcours']; ?></h6>
                                    </div>
                                    <div class="profile-legend">
                                        <h6 class=""><b>Niveau:
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                            <?php echo $_SESSION['semestre']; ?> </h6>
                                    </div>
                                    <div class="profile-legend">
                                        <h6 class=""><b>Mois:
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                            <?php echo $_SESSION['mois']; ?>/8 </h6>
                                    </div>
                                    <div class="profile-legend">
                                        <h6 class=""><b>Ecolage: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                            <?php echo $_SESSION['ecolage']; ?>/8 </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 corps-info d">
                                <h4 class="text-danger"><b>
                                        Information
                                    </b>
                                </h4>
                                <span>
                                    Veuillez vous connecter sur youtube via <i> <?php echo $_SESSION['mail']; ?></i>
                                    s'il vous plait (sur votre navigateur et non l'application).
                                </span>
                                <br>
                                <br>
                                <span>N’OUBLIEZ PAS DE VOUS DÉCONNECTER AVANT DE QUITTER</span>
                            </div>
                        </div>


                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="description">

                                <ul class="list-unstyled">


                                    <div class="mx-auto">
                                        <div class="rounded bg-gradient-4 mt-4 text-white shadow p-1 text-center mb-2">
                                            <h3>Examen dans</h3>
                                            <div id="count_exam"
                                                class="countdown-circles d-flex flex-wrap justify-content-center">
                                            </div>
                                            <h3>Paiement</h3>
                                            <div id="count_ecolage"
                                                class="countdown-circles d-flex flex-wrap justify-content-center">
                                            </div>
                                        </div>
                                    </div>


                                    <!--<li class="media my-3">
                                            <i class="fa fa-envelope"></i>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">E-Media Madagascar</h5>
                                                Bienvenue chez E-Media, votre formation commence ici...
                                            </div>
                                        </li>-->
                                    <li class="media my-2">

                                        <div class="media-body text-center">
                                            <h5 class="mt-0 mb-1">Astuce</h5>-
                                            Tutoriel manipulation de l'interface...
                                        </div>
                                    </li>
                                    <!--Manomboka eto ny video-->
                                    <li>
                                        <div class=" video_full mr-2">

                                            <div class="video_ambony ">
                                                <?php if (isset($_SESSION['tutomg'])) {
                                                    $lientuto = $_SESSION['tutomg'];
                                                } elseif (isset($_SESSION['tutofr'])) {
                                                    $lientuto = $_SESSION['tutofr'];
                                                }

                                                ?>

                                                <iframe sandbox="allow-scripts allow-same-origin" width="100%"
                                                    height="315" src="<?php echo $lientuto; ?>" frameborder="0"
                                                    allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                                <div class="text-light text-center mt-1 mb-1 p-2">
                                                    <a href="<?php echo $lientuto; ?>" target="_blank" class="">Lien
                                                        vers la Video</a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <!--Mifarana eto ny video-->

                                    <!--<li class="media my-2">
                                            <i class="fa fa-trophy"></i>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Exploit</h5>
                                                Félicitation vous montez au niveau L2...
                                            </div>
                                        </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--tapitra profile-->




            <!--cours-->
            <div class="cours-blocs mt-5" id="cours_blocs">
                <div class="container-fluid">
                    <div class="row">

                        <!--liste matiere-->

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-1 text-center">
                            <div class="matiere ">
                                <div class="mt-3">
                                    <h4 class="liste-cours-s">
                                        <!--Pour faciliter l'accès aux fichiers, on va procéder à une maintenance du site de 21h à 23h.<br><i>Désolé du désagrément</i>-->Programme
                                        du <?php echo $_SESSION['semestre']; ?>
                                    </h4>
                                </div>
                                <div class="matiere-blocs overflow-auto" id="listmatiere">

                                </div>

                            </div>
                        </div>


                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="cours-tabs overflow-auto p-3">
                                <!--<span class="cours-titre"><i class="fa fa-mortar-board mr-2 mt-2"></i>COURS</span>-->
                                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                    <li class="nav-item mr-5">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Livres</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="false">Explication</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <!--tabs documents-->
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">

                                        <div class="cours-doc overflow-auto" id="gradient">
                                            <div class="row contenu_cours_livres">
                                                <!--eto ny contenu cours livres-->
                                                <div class="col-12" id="contenu_cours_livres">

                                                </div>


                                            </div>

                                        </div>

                                    </div>
                                    <!--tapitra tabs documents-->

                                    <!--tabs video-->

                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">

                                        <div class="cours-video">
                                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                                <li class="nav-item mr-5">
                                                    <a class="nav-link active" id="profile-tab" data-toggle="tab"
                                                        href="#SousVideo" role="tab" aria-controls="home"
                                                        aria-selected="true">Video</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                        href="#SousAudio" role="tab" aria-controls="profile"
                                                        aria-selected="false">Audio</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="SousVideo" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    <!--explication video-->
                                                    <div class="explication_video overflow-auto">
                                                        <div class="row" id="contenu_cours_video">

                                                        </div>
                                                    </div>
                                                    <!--tapitra video-->
                                                </div>


                                                <div class="tab-pane fade" id="SousAudio" role="tabpanel"
                                                    aria-labelledby="profile-tab">
                                                    <!--explication audio-->
                                                    <div class="explication_audio">
                                                        <div class="row mt-4">
                                                            <div class="rond col-12 col-sm-12 col-md-4 col-lg-4">
                                                                <div class="text-content">
                                                                    <audio id="audioplayer" ontimeupdate="update(this)">
                                                                        <source src="" type="audio/mp3">
                                                                    </audio>
                                                                    <span class="text" id="titremp3"></span>
                                                                    <br>
                                                                    <div class="playback_controls"
                                                                        style="display: flex;">
                                                                        <button class="preview"
                                                                            onclick="preview('audioplayer')"><i
                                                                                class="fa fa-angle-double-left"></i></button>
                                                                        <button class="controlplay" id="cplay"
                                                                            onclick="play('audioplayer',this)"><i
                                                                                class="fa fa-play"></i></button>
                                                                        <button class="peview"
                                                                            onclick="next('audioplayer')"><i
                                                                                class="fa fa-angle-double-right"></i></button>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-12 justify-content-center"
                                                                        id="progressBarControl" style="display: none;">
                                                                        <div id="progressBar"
                                                                            onclick="clickProgress('audioplayer',this,event)">
                                                                            lecture
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <span id="progressTime"><b>00:00</b></span>
                                                                    </div>
                                                                    <br>
                                                                    <div class="volume_controls" style="display:flex;">
                                                                        <button class="moins"
                                                                            onclick="moins('audioplayer')"><i
                                                                                class="fa fa-minus"></i></button>
                                                                        <button class="mute"
                                                                            onclick="mute('audioplayer',this)"><i
                                                                                class="fa fa-volume-up"></i></button>
                                                                        <button class="plus"
                                                                            onclick="plus('audioplayer')"><i
                                                                                class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8"
                                                                id="contenu_cours_audio">

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--tapitra audio-->
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!--tapitra tabs video-->

                                </div>
                            </div>
                        </div>
                        <!--liste matiere-->

                        <!--<div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-5 text-center">
                                <div class="matiere ">
                                    <span class="cours-titre p-2">Semestre</span>
                                    <div class="matiere-blocs  overflow-auto" id="listmatiere">


                                    </div>
                                </div>
                            </div>-->




                        <!--tapitra matiere-->
                    </div>

                </div>
            </div>
            <!--tapitra ny cours-->



            <!--exercice-->
            <div class="exercice-blocs" id="exercice-blocs">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="cours-tabs overflow-auto p-3 mt-5">

                                <ul class="nav nav-tabs nav-justified mt-2" id="myTab" role="tablist">
                                    <li class="nav-item mr-3">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#exoDoc"
                                            role="tab" aria-controls="home" aria-selected="true">EXERCICES</a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#exoVid" role="tab"
                                            aria-controls="profile" aria-selected="false">EXPLICATIONS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#exoCorect"
                                            role="tab" aria-controls="profile" aria-selected="false"
                                            style="text-transform:uppercase;">CORRIGéS</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <!--tabs exercice-->
                                    <div class="tab-pane fade show active" id="exoDoc" role="tabpanel"
                                        aria-labelledby="home-tab">

                                        <div class="exo-doc overflow-auto">
                                            <div class="row contenu_exercice_livres">

                                                <div class="col-12" id="contenu_exercice_livres">

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--tapitra tabs exercice-->

                                    <!--tabs exercice-video-->

                                    <div class="tab-pane fade" id="exoVid" role="tabpanel"
                                        aria-labelledby="profile-tab">

                                        <div class="exo-video">

                                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                                <li class="nav-item mr-5">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                        href="#SousVideoExo" role="tab" aria-controls="home"
                                                        aria-selected="true">Video</a>
                                                </li>

                                            </ul>

                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="SousVideoExo" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    <!--explication videoExo-->
                                                    <div class="explication_video overflow-auto">
                                                        <div class="row" id="contenu_exercice_video">





                                                        </div>
                                                    </div>
                                                    <!--tapitra videoExo-->
                                                </div>


                                                <div class="tab-pane fade" id="SousAudioExo" role="tabpanel"
                                                    aria-labelledby="profile-tab">
                                                    <!--explication audioExo-->
                                                    <div class="explication_audio overflow-auto">
                                                        <div class="row">





                                                        </div>

                                                    </div>
                                                    <!--tapitra audioExo-->
                                                </div>

                                            </div>


                                        </div>


                                    </div>
                                    <!--tapitra exercice-video-->
                                    <!-- exercice-corrections-->
                                    <div class="tab-pane fade" id="exoCorect" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="exo-correct overflow-auto">
                                            <div class="row contenu_corrige_livres">
                                                <div class="col-12" id="contenu_corrige_livres">

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!--tapitra exercice-corrections-->
                                </div>

                            </div>
                        </div>
                        <!--exeo-right-->

                        <!--exeo-right-->
                    </div>
                </div>
            </div>
            <!--tapitra exercice-->


            <!--messages-->
            <div class="message-blocs mt-5" id="message-blocs">
                <div class="container-fluid">
                    <div class="row">


                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-message">
                            <div class="messsage-titre mt-2">
                                <h1 class="text-center"><i class="fa fa-comments-o"></i> MESSAGES</h1>
                            </div>
                            <div class="message">
                                <div class="corp_message">
                                    <div class="header_message pl-3 pt-2 ">
                                        <div class="row">
                                            <div class="image">
                                                <img src="<?php echo $_SESSION['photo']; ?>" width="3%" alt=""
                                                    class="profil">
                                            </div>
                                            <div class="prenom">
                                                <p class=" ml-1 profil_nom"><?php echo $_SESSION['prenom']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="body_message overflow-auto mt-2">
                                            <div class="response mt-1">



                                            </div>
                                        </div>
                                        <form class="login-form text-center mt-2" id="form" method="post">
                                            <div class="input_message">
                                                <div class="form-group mr-3">
                                                    <textarea type="text" name="message" class="text-white"
                                                        id="messageContenu" placeholder="Votre message..."
                                                        rows="5"></textarea>

                                                </div>
                                            </div>
                                            <input type="hidden" id="idetudiant" value="<?php echo $_SESSION['id']; ?>">
                                            <input type="hidden" id="filiere"
                                                value="<?php echo $_SESSION['nomfiliere']; ?>" />
                                            <input type="hidden" id="diplome"
                                                value="<?php echo $_SESSION['semestre']; ?>" />
                                            <input type="hidden" id="vague"
                                                value="<?php echo $_SESSION['matricule']; ?>" />
                                            <div class="button_message">
                                                <button type="submit" id="MessageAjouter" class="p-1 m-0 btn-login"><i
                                                        class="fas fa-paper-plane"
                                                        style="color:#0698cb !important;"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="message-right">
                                <ul class="list-unstyled mt-3">
                                    <li class="media my-2">
                                        <i class="fa fa-tint astuce"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">Astuce</h5>
                                            Si vous avez des questions à propos des cours ou des exercices,n'hésitez pas
                                            à les envoyer par message.
                                        </div>
                                    </li>
                                </ul>
                                <div class="messge-image mt-5 p-3">
                                    <img src="vue/image/Questions-.png" width="100%" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--tapitra messages-->

            <!--forum-->


            <!--tapitra furom-->

            <!--Examen-->
            <div class="EXAMEN" id="EXAMEN">

            </div>
            <!--tapitra Examen-->
        </div>


    </div>
</div>
<div class="modal fade" id="pdfmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="titrepdf"></h5>
                <button type="button" class="close" id="pdfmodalclose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body" id="pdfload">
                <div id="loading">

                    <svg id="loader" xmlns:dc="http://purl.org/dc/elements/1.1/"
                        xmlns:cc="http://creativecommons.org/ns#"
                        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" sodipodi:docname="Loader.svg"
                        inkscape:version="1.0 (6e3e5246a0, 2020-05-07)" id="svg8" version="1.1" viewBox="0 0 297 92"
                        height="92mm" width="297mm">
                        <defs id="defs2">
                            <linearGradient id="linearGradient24" inkscape:collect="always">
                                <stop id="stop20" offset="0" style="stop-color:#0000d1;stop-opacity:1" />
                                <stop style="stop-color:#2c2ae3;stop-opacity:1" offset="0.2490395" id="stop30" />
                                <stop style="stop-color:#690e41;stop-opacity:0.89803922" offset="0.74368078"
                                    id="stop28" />
                                <stop id="stop22" offset="1" style="stop-color:#6d001b;stop-opacity:0.98823529" />
                            </linearGradient>
                            <rect id="rect12" height="33.568283" width="117.24554" y="61.503849" x="67.447067" />
                            <linearGradient gradientUnits="userSpaceOnUse" y2="79.050186" x2="171.81123" y1="73.175713"
                                x1="75.364067" id="linearGradient26" xlink:href="#linearGradient24"
                                inkscape:collect="always" />
                        </defs>
                        <sodipodi:namedview inkscape:window-maximized="1" inkscape:window-y="34" inkscape:window-x="0"
                            inkscape:window-height="781" inkscape:window-width="1600" height="209mm" showgrid="false"
                            inkscape:document-rotation="0" inkscape:current-layer="text10" inkscape:document-units="mm"
                            inkscape:cy="363.92656" inkscape:cx="840.4063" inkscape:zoom="0.7" inkscape:pageshadow="2"
                            inkscape:pageopacity="0.0" borderopacity="1.0" bordercolor="#666666" pagecolor="#ffffff"
                            id="base" />
                        <metadata id="metadata5">
                            <rdf:RDF>
                                <cc:Work rdf:about="">
                                    <dc:format>image/svg+xml</dc:format>
                                    <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                    <dc:title></dc:title>
                                </cc:Work>
                            </rdf:RDF>
                        </metadata>
                        <g id="layer1" inkscape:groupmode="layer" inkscape:label="Calque 1">
                            <g id="ground"
                                style="font-size:25.4px;line-height:1.25;font-family:sans-serif;-inkscape-font-specification:'sans-serif, Normal';white-space:pre;fill:#11d13b05;fill-opacity:1"
                                id="text10" transform="matrix(2.1121103,0,0,2.1121103,-106.13642,-112.61819)"
                                aria-label="E-MEDIA">
                                <path id="path857"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal"
                                    stroke-width="0.2" stroke="rgb(42, 45, 190)"
                                    d="M 69.530859,84.993945 V 67.010547 h 13.146485 v 2.108398 H 71.763281 v 5.692676 h 8.421191 v 2.108398 h -8.421191 v 5.965528 h 10.914063 v 2.108398 z" />
                                <path id="path859" stroke-width="0.2" stroke="rgb(42, 45, 190)"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal"
                                    d="m 84.67412,79.4625 v -2.108399 h 6.858496 V 79.4625 Z" />
                                <path id="path861" stroke-width="0.2" stroke="rgb(42, 45, 190)"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal"
                                    d="M 94.236326,84.993945 V 67.010547 h 2.232422 l 6.436812,16.333886 6.43682,-16.333886 h 2.23242 v 17.983398 h -2.23242 V 73.038086 l -4.63848,11.955859 h -3.59668 L 96.468748,73.038086 v 11.955859 z" />
                                <path id="path863" stroke-width="0.2" stroke="rgb(42, 45, 190)"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal"
                                    d="M 115.61797,84.993945 V 67.010547 h 13.14648 v 2.108398 h -10.91406 v 5.692676 h 8.42119 v 2.108398 h -8.42119 v 5.965528 h 10.91406 v 2.108398 z" />
                                <path id="path865" stroke-width="0.2" stroke="rgb(42, 45, 190)"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal"
                                    d="m 147.07031,75.903027 q 0,9.090918 -8.4708,9.090918 h -6.56084 V 67.010547 h 6.26318 q 2.05879,0 3.59668,0.446484 1.55029,0.446485 2.51768,1.21543 0.97978,0.768945 1.57509,1.922363 0.60772,1.153418 0.84336,2.430859 0.23565,1.265039 0.23565,2.877344 z m -2.23242,-0.03721 q 0,-1.562695 -0.37207,-2.75332 -0.37207,-1.203028 -0.99219,-1.947168 -0.60772,-0.744141 -1.47588,-1.21543 -0.86816,-0.471289 -1.77354,-0.644922 -0.90537,-0.186035 -1.95957,-0.186035 h -3.99355 v 13.766602 h 4.05557 q 1.46347,0 2.61689,-0.384473 1.16582,-0.396875 2.04639,-1.203027 0.89297,-0.818555 1.36426,-2.195215 0.48369,-1.37666 0.48369,-3.237012 z" />
                                <path id="path867" stroke-width="0.2" stroke="rgb(42, 45, 190)"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal"
                                    d="m 156.06201,82.885547 v 2.108398 h -7.4414 v -2.108398 h 2.60449 V 69.118945 h -2.60449 v -2.108398 h 7.4414 v 2.108398 h -2.60449 v 13.766602 z" />
                                <path id="path869" stroke-width="0.2" stroke="rgb(42, 45, 190)"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal"
                                    d="m 173.31367,84.993945 h -2.54248 l -2.35645,-5.915918 h -7.10654 l -2.35644,5.915918 h -2.54248 l 7.18095,-17.983398 h 2.54248 z m -8.4584,-14.795996 -2.70371,6.77168 h 5.41983 z" />
                            </g>
                        </g>
                    </svg>
                </div>

                <iframe id="pdf" sandbox="allow-scripts allow-same-origin" src="" width="100%" height="800px"
                    frameborder="0" allowfullscreen></iframe>

            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-12">

        <p class="text-center text-white">&copy; Copyright E-MEDIA 2020</p>

    </div>

</div>


<!--Prise de contact-->
<?php

if (isset($_SESSION['prisedecontactfr'])) {
?>
<input type="hidden" id="priseclick" data-toggle="modal" data-target="#prisedecontact" />
<div class="modal fade" id="prisedecontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center ">
                <h5 class="modal-title">Présentation de l'Université E-media</h5>
                <button type="button" class="close" id="closePresentation" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <iframe id="srcpre" width="100%" height="600px" src="<?php echo $_SESSION['prisedecontactfr']; ?>"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<?php
} elseif (isset($_SESSION['prisedecontactmg'])) {
?>
<input type="hidden" id="priseclick" data-toggle="modal" data-target="#prisedecontact" />
<div class="modal fade" id="prisedecontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center ">
                <h5 class="modal-title">Présentation de l'Université E-media</h5>
                <button type="button" class="close" id="closePresentation" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <iframe id="srcpre" width="100%" height="600px" src="<?php echo $_SESSION['prisedecontactmg']; ?>"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<?php
}
?>