<?php
session_start();
if (!isset($_SESSION['matriculemba'])) {
    header('Content-Type:text/html ; charset=utf-8');
    header('location: ../../Abm');
} else {
    include_once("../model/Connexion.class.php");
}
$currentPage = 'cours';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cours</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jgthms/minireset.css@master/minireset.min.css">
    <link rel="stylesheet" href="gen/main.css" type="text/css">
</head>

<body>
    <div class="bar-navigation">
        <div class="container-item">
            <div class="brand">
                <img src="image/logoE-media.png" alt="e-media" />
            </div>
        </div>
        <div class="container-item">
            <div class="setting">
                <i class="fas fa-cog fa-1x"></i>
                <div class="mydropdown">
                    <ul>
                        <li><a href="../controller/controllerLogout">Deconnexion</a></li>
                        <li><a href="#">Paramètre</a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <div id="body">
        <nav>

            <div class="container-navigation">
                <ul class="navigation-item">
                    <li class="navigation-list-item"><a class="navigation-item-link" href="inscription.php"> <i class="fas fa-user-plus"></i><span>Inscriptions</span> </a></li>
                    <li class="navigation-list-item"><a class="navigation-item-link" href="etudiants.php"> <i class="fas fa-graduation-cap"></i><span>Etudiants</span></a></li>
                    <li class="navigation-list-item"><a class="navigation-item-link" href="admission.php"> <i class="fas fa-book"></i><span>Admissions</span> </a></li>

                    <li class="navigation-list-item"><a  href="#" class="active navigation-item-link"><i class="fas fa-pen"></i><span>Cours </span></a>
                        <div class="navigationdropdown1">
                            <ul class="ulnavigationdropdown1">
                                <li class="linavigationdropdown1" ><a class="anavigationdropdown1" href="#">Lister</a>
                                    <div class="navigationdropdown2">
                                        <ul class="ulnavigationdropdown2">
                                            <li class="linavigationdropdown2"><a class="anavigationdropdown2" href="#">Lister</a></li>
                                            <li class="linavigationdropdown2"><a class="anavigationdropdown2" href="#">Ajouter</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="linavigationdropdown1"><a class="anavigationdropdown1" href="#">Ajouter</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="navigation-list-item"><a class="navigation-item-link" href="examens.php"><i class="fas fa-university"></i><span>Examen</span></a></li>
                    <li class="navigation-list-item"><a class="navigation-item-link" href="status.php"> <i class="fas fa-users"></i><span>Status</span></a></li>
                    <li class="navigation-list-item"><a class="navigation-item-link" href="message.php"> <i class="fas fa-envelope"></i><span>Message</span></a></li>
                </ul>
            </div>
        </nav>

        <section>
            <!--
        manatsofoka unite d'enseignement 
-->
            <form class="fieldset" action="#" enctype="text/plain">
                <h3 class="fieldsetTitle">Unite d'enseignement</h3>
                <div class="form-group field-group d-flex flex-column">
                    <label>Ajouter une unité d'enseignement</label>
                    <input class="fieldinput" type="text" placeholder="unite d'enseignement" />
                </div>

                <input type="button" value="creez" id="btn_ajout_ue" />

            </form>

            <form class="fieldset" action="#">
                <h3 class="fieldsetTitle">Element constitutif</h3>
                <div class="form-group d-flex flex-column">
                    <label>
                        Ajouter une element constitutif
                    </label>
                    <input class="fieldinput" type="text" placeholder="ajouter une Element constitutif" id="text_ec" />
                </div>


                <div class="form-group d-flex flex-column">
                    <label>
                        Selectionnez l'unité d'enseignement correspondant
                    </label>
                    <div class="container-select">
                        <select id="select_ue">

                        </select>
                    </div>

                </div>

                <div class="form-group d-flex flex-column">
                    <label>
                        Selectionnez la semestre correspondant
                    </label>
                    <div class="container-select">
                        <select id="select_semestre">
                            <option selected disabled>...</option>
                            <optgroup label="M1">
                                <option value="S7">S7</option>
                                <option value="S8">S8</option>
                            </optgroup>
                            <optgroup label="M2">
                                <option selected disabled>...</option>
                                <option value="S9">S9</option>
                                <option value="S10">S10</option>
                            </optgroup>
                        </select>
                    </div>

                </div>

                <div class="form-group d-flex flex-column">
                    <label>
                        Selectionnez le mois correspondant
                    </label>
                    <div class="container-select">
                        <select id="select_mois">
                            <optgroup label="1 ère Semestre">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </optgroup>
                            <optgroup label="2 ème Semestre">
                                <option value="">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </optgroup>

                        </select>
                    </div>

                </div>

                <input type="button" value="creez" id="btn_ajout_ec" />

            </form>
            <form class="fieldset" id="ajout_dossier" enctype="multipart/form-data">
                <h3 class="fieldsetTitle">Cours</h3>
                <div class="form-group d-flex flex-column">
                    <label>
                        Selectionnez un element constitutif
                    </label>
                    <div class="container-select">
                        <select name="select_ec" id="select_ec">

                        </select>
                    </div>

                </div>
                <div class="form-group d-flex flex-column">
                   <input type="hidden" name="categorie" value="1">

                </div>
                <div class="form-group d-flex flex-column">
                    <label>
                        Selectionnez le format du contenu
                    </label>
                    <div class="container-select">
                        <select id="formatchoosing" name="type">
                            <option value="1">Livre en pdf</option>
                            <option value="2">Video</option>
                            <option value="3">Audio</option>
                        </select>
                    </div>

                </div>
                <div class="containerinputforsenditformat">
                    <div class="form-group">
                        <div class="container_field_import">
                            <label for="file_book_mg">
                                contenu pour les nationaux
                            </label>
                            <div class="boutton_file">
                                choisir
                            </div>
                            <input id="file_book_mg" class="file_book" type="file" />
                            <span class="file_name">Aucune fichier selectionné</span>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="container_field_import">
                            <label for="file_book_et">
                                contenu pour les etrangers
                            </label>
                            <div class="boutton_file">
                                choisir
                            </div>
                            <input id="file_book_et" class="file_book" type="file" />
                            <span class="file_name">Aucune fichier selectionné</span>
                        </div>
                    </div>
                </div>
                <input type="submit" value="croeez" id="btn_ajout_dossier" />
            </form>
            <div class="alert alert-success" role="alert">
  A simple success alert—check it out!
</div>
        </section>
        
    </div>

  

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="js/cours.js">

</script>
<script src="js/coursAjax.js">

</script>

</html>