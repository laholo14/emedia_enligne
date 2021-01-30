<?php 
session_start();
if(!isset($_SESSION['matriculemba'])){
    header('Content-Type:text/html ; charset=utf-8');
    header('location: ../../Abm');
}else{
    include_once("../model/Connexion.class.php");
}
$currentPage='cours';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cours</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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
        <div class="container-item d-flex justify-content-end px-5">
            <div class="setting align-self-center">
                <i class="fas fa-cog fa-1x"></i>
                <div class="dropdown">
                    <ul>
                        <li><a href="#">Deconnexion</a></li>
                        <li><a href="#">Paramètre</a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <div id="body" class="d-flex">
        <nav>

            <div class="container-navigation">
                <ul>
                    <li><a href="inscription.php"> <i class="fas fa-user-plus"></i><span>Inscriptions</span> </a></li>
                    <li><a href="etudiants.php"> <i class="fas fa-graduation-cap"></i><span>Etudiants</span></a></li>
                    <li><a href="admission.php"> <i class="fas fa-book"></i><span>Admissions</span> </a></li>

                    <li><a href="#" class="active"><i class="fas fa-pen"></i><span>Cours</span></a></li>
                    <li><a href="examens.php"><i class="fas fa-university"></i><span>Examen</span></a></li>
                    <li><a href="status.php"> <i class="fas fa-users"></i><span>Status</span></a></li>
                    <li><a href="message.php"> <i class="fas fa-envelope"></i><span>Message</span></a></li>
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
                        <select id="select_ue">
                            <optgroup label="M1">
                                <option value="s7">S7</option>
                                <option value="s8">S8</option>
                            </optgroup>
                            <optgroup label="M2">
                                <option value="s9">S9</option>
                                <option value="s10">S10</option>
                            </optgroup>
                        </select>
                    </div>

                </div>

                <div class="form-group d-flex flex-column">
                    <label>
                        Selectionnez le mois correspondant 
                    </label>
                    <div class="container-select">
                        <select id="select_ue">
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

                <input type="button" value="creez" id="btn_ajout_ec"/>

            </form>
            <form class="fieldset" action="#">
                <h3 class="fieldsetTitle">Cours</h3>
                <div class="form-group d-flex flex-column">
                    <label>
                        Selectionnez un element constitutif
                    </label>
                    <div class="container-select">
                        <select>
                            <option value="0">WS</option>
                            <option value="1">Audi</option>
                            <option value="2">BMW</option>
                        </select>
                    </div>

                </div>
                <div class="form-group d-flex flex-column">
                    <label>
                        Selectionnez la categorie du cours
                    </label>
                    <div class="container-select">
                        <select>
                            <option value="0">Cours</option>
                            <option value="1">Exercice</option>
                            <option value="2">Type du corrigé</option>
                        </select>
                    </div>

                </div>
                <div class="form-group d-flex flex-column">
                    <label>
                        Selectionnez le format du contenu
                    </label>
                    <div class="container-select">
                        <select>
                            <option value="0">Livre en pdf</option>
                            <option value="1">Video</option>
                            <option value="2">Audio</option>
                        </select>
                    </div>

                </div>
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

                <input type="button" value="creez" />
            </form>
        </section>

    </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="js/cours.js">

</script>
<script src="js/coursAjax.js">

</script>
        
</html>