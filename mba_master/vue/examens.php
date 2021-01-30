<?php
$currentPage = 'examens';
require('include/header.php');
?>
<link rel="stylesheet" href="css/examensMBA.css">
<?php
require('include/nav.php');
?>
<section id="Examens">
    <div class="row mt-3 ml-1 mr-1">

        <!--Button-->

        <div class="col-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <!--Button ajoute examens-->
                <a class="nav-link active" id="v-pills-AJOUTE_EXAMENS-tab" data-toggle="pill" href="#v-pills-AJOUTE_EXAMENS" role="tab" aria-controls="v-pills-AJOUTE_EXAMENS" aria-selected="true"><i class="fas fa-folder-plus ml-2 mr-2"></i> Ajout Examen</a>
                <!--Button Resultat & note-->
                <a class="nav-link" id="v-pills-RESULTAT-tab" data-toggle="pill" href="#v-pills-RESULTAT" role="tab" aria-controls="v-pills-RESULTAT" aria-selected="false"><i class="fas fa-poll ml-2 mr-2"></i>Resultat & Note</a>
                <!--Button Repechage-->
                <a class="nav-link" id="v-pills-REPECHAGE-tab" data-toggle="pill" href="#v-pills-REPECHAGE" role="tab" aria-controls="v-pills-REPECHAGE" aria-selected="false"><i class="fas fa-minus-circle ml-2 mr-2"></i>Liste repéchage</a>
                <!--Button Examen specifique-->
                <a class="nav-link" id="v-pills-EXAMENS_SPECIFIQUE-tab" data-toggle="pill" href="#v-pills-EXAMENS_SPECIFIQUE" role="tab" aria-controls="v-pills-EXAMENS_SPECIFIQUE" aria-selected="false"><i class="fas fa-pen-fancy ml-1 mr-1"></i>Examen spécifique</a>
            </div>
        </div>

        <!--FIN Button-->


        <!--BLOC-->


        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">

                <!--Bloc ajoute examens-->
                <div class="tab-pane fade show active" id="v-pills-AJOUTE_EXAMENS" role="tabpanel" aria-labelledby="v-pills-AJOUTE_EXAMENS-tab">


                    <!--bloc ajoute examens sous tabs-->
                    <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">


                        <li class="nav-item">
                            <a class="nav-link active sous_tabs" id="pills-EXAMEN_MENSUEL-tab" data-toggle="pill" href="#pills-EXAMEN_MENSUEL" role="tab" aria-controls="pills-EXAMEN_MENSUEL" aria-selected="true">Examen Mensuel</a>
                        </li>
                        <li class="nav-item ml-5">
                            <a class="nav-link sous_tabs" id="pills-EXAMEN_THEORIQUE-tab" data-toggle="pill" href="#pills-EXAMEN_THEORIQUE" role="tab" aria-controls="pills-EXAMEN_THEORIQUE" aria-selected="false">Examen Théorique</a>
                        </li>

                    </ul>


                    <div class="tab-content" id="pills-tabContent">

                        <!--bloc ajoute examens mensuel-->
                        <div class="tab-pane fade show active" id="pills-EXAMEN_MENSUEL" role="tabpanel" aria-labelledby="pills-EXAMEN_MENSUEL-tab">
                            <div class="form_examen_mensuel">
                                <form>
                                    <div class="form-group col-md-6">
                                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="1">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">EC :</label>
                                        <select class="form-control form-control-sm">
                                            <option value="1">Libéralisation informatique</option>
                                            <option value="2">Economie numérique</option>
                                            <option value="3">Leadership</option>
                                            <option value="4">Stratégie d’entreprise</option>
                                            <option value="7">Management Stratégique</option>
                                            <option value="6">Droit de Services Publics</option>
                                            <option value="20">Théorie de l’information et de la Communication</option>
                                            <option value="9">Droit Civil</option>
                                            <option value="10">Introduction au droit</option>
                                            <option value="11">Bases du Management</option>
                                            <option value="12">Planification et Gestion de Projet Médiatique</option>
                                            <option value="13">Comptabilité générale</option>
                                            <option value="14">Comptabilité analytique</option>
                                            <option value="15">Bases des systèmes numériques</option>
                                            <option value="16">Algorithme</option>
                                            <option value="17">Contrôle de Gestion</option>
                                            <option value="18">Leadership spécifique</option>
                                            <option value="19">Rappel du Système Numérique</option>
                                            <option value="5">Reportage</option>
                                            <option value="28">Architecture des ordinateurs</option>
                                            <option value="27">Communication visuelle</option>
                                            <option value="26">Montage vidéo</option>
                                            <option value="25">Bases du Management 2</option>
                                            <option value="29">Analyse et Algèbre</option>
                                            <option value="30">JOURNALISME D'INVESTIGATION</option>
                                            <option value="31">Rappel Algorithme</option>
                                            <option value="32">ELEMENTS FONDAMENTAUX DU MANAGEMENT</option>
                                            <option value="33">Geo-politique niveau Master</option>
                                            <option value="34">Maîtrise du travail de caméra</option>
                                            <option value="35">Montage Vidéo 2</option>
                                            <option value="36">Théorie du journalisme</option>
                                            <option value="37">Technique de rédaction journalistique</option>
                                            <option value="38">Introduction au langage filmique</option>
                                            <option value="39">Introduction à la communication</option>
                                            <option value="40">Droit constitutionnel</option>
                                            <option value="41">Observation et Lecture</option>
                                            <option value="42">Management organisationnel</option>
                                            <option value="43">Droit international</option>
                                            <option value="44">Matlab 1</option>
                                            <option value="45">Montage vidéo sur Adobe Premiere</option>
                                            <option value="46">Mathématique appliquée</option>
                                            <option value="47">Histoire des institutions</option>
                                            <option value="48">Comptabilité générale 2</option>
                                            <option value="49">Infographie 2D MASTER</option>
                                            <option value="50">Marché Financier MASTER</option>
                                            <option value="51">JRI Part 1</option>
                                            <option value="52">Communication et développement</option>
                                            <option value="53">GESTION DES RESSOURCES HUMAINES MASTER</option>
                                            <option value="54">POO PHP</option>
                                            <option value="66">Initiation infographie 2D</option>
                                            <option value="56">Planification et Gestion de Projet Médiatique 2</option>
                                            <option value="57">Droit de la Famille</option>
                                            <option value="58">Sage SAARI</option>
                                            <option value="59">Droit constitutionnel 2</option>
                                            <option value="60">MANAGEMENT PUBLIC</option>
                                            <option value="61">GESTION - SUIVI ET EVALUATION DE PROJET</option>
                                            <option value="62">AUDIT INTERNE</option>
                                            <option value="63">Infrastructures hertziennes2</option>
                                            <option value="64">Probabilité statistique</option>
                                            <option value="65">Matlab 2</option>
                                            <option value="67">Théorie Information Communication 2</option>
                                            <option value="68">Principe du Marketing</option>
                                            <option value="69">Introduction au droit 2</option>
                                            <option value="70">Introduction à la Communication 2</option>
                                            <option value="71">Composants électroniques</option>
                                            <option value="72">Système embarqué</option>
                                            <option value="73">Structure et analyse de coûts</option>
                                            <option value="74">Technique de recherche sur internet</option>
                                            <option value="75">Liaisons spatiales</option>
                                            <option value="76">ECONOMIE INTERNATIONALE</option>
                                            <option value="77">les Fonctions de langage appliquées en Publicité Communautaire</option>
                                            <option value="78">Voies d'exécution et profession judiciaire</option>
                                            <option value="79">Quadripoles et filtres</option>
                                            <option value="80">Introduction au son</option>
                                            <option value="81">Bases du dessin</option>
                                            <option value="82">Droit des affaires</option>
                                            <option value="83">Mathématique financière</option>
                                            <option value="84">Bases de la télécommunication</option>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Vague:</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="vague" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Format :</label>
                                        <select class="form-control form-control-sm">
                                            <option value="1">Upload</option>
                                            <option value="2">Rédaction</option>
                                            <option value="3">QCM</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Duré:</label>
                                        <input type="number" class="form-control form-control-sm" id="durre_upload" placeholder="Duré upload" name="durre_upload" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Sujet:</label>
                                        <div class="custom-file form-control-sm">
                                            <input type="file" class="custom-file-input " id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn ml-3 ajouter_examen_mensuel">Ajouter</button>
                                </form>


                                <div class="form-group mr-auto">
                                    <form class="search m-3" method='POST'>
                                        <input class="p-1" class="form-control" type='search' id='search' placeholder='recherche' />
                                    </form>
                                </div>
                                <h2 class="text-center sous_titre">Examen Mensuel</h2>
                                <div class="table-responsive examen_mensuel">
                                    <table class="table">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col">Intitulé</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Format</th>
                                                <th scope="col">Sujet</th>
                                                <th scope="col">Duré</th>
                                                <th scope="col">QCM</th>
                                                <th scope="col">Marina</th>
                                                <th scope="col">Modifier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>Algorithme</td>
                                                <td>Examen Mensuel</td>
                                                <td>Upload</td>
                                                <td>Algorithme_Exam_1.pdf</td>
                                                <td>180</td>
                                                <td></td>
                                                <td></td>
                                                <td align="center"><i class="fas fa-edit"></i></td>

                                            </tr>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                        <!--Fin bloc ajoute examens mensuel-->




                        <!--bloc ajoute examens theorique-->
                        <div class="tab-pane fade" id="pills-EXAMEN_THEORIQUE" role="tabpanel" aria-labelledby="pills-EXAMEN_THEORIQUE-tab">

                            <div class="form_examen_theorique">
                                <form>
                                    <div class="form-group col-md-6">
                                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="1">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">EC :</label>
                                        <select class="form-control form-control-sm">
                                            <option value="1">Libéralisation informatique</option>
                                            <option value="2">Economie numérique</option>
                                            <option value="3">Leadership</option>
                                            <option value="4">Stratégie d’entreprise</option>
                                            <option value="7">Management Stratégique</option>
                                            <option value="6">Droit de Services Publics</option>
                                            <option value="20">Théorie de l’information et de la Communication</option>
                                            <option value="9">Droit Civil</option>
                                            <option value="10">Introduction au droit</option>
                                            <option value="11">Bases du Management</option>
                                            <option value="12">Planification et Gestion de Projet Médiatique</option>
                                            <option value="13">Comptabilité générale</option>
                                            <option value="14">Comptabilité analytique</option>
                                            <option value="15">Bases des systèmes numériques</option>
                                            <option value="16">Algorithme</option>
                                            <option value="17">Contrôle de Gestion</option>
                                            <option value="18">Leadership spécifique</option>
                                            <option value="19">Rappel du Système Numérique</option>
                                            <option value="5">Reportage</option>
                                            <option value="28">Architecture des ordinateurs</option>
                                            <option value="27">Communication visuelle</option>
                                            <option value="26">Montage vidéo</option>
                                            <option value="25">Bases du Management 2</option>
                                            <option value="29">Analyse et Algèbre</option>
                                            <option value="30">JOURNALISME D'INVESTIGATION</option>
                                            <option value="31">Rappel Algorithme</option>
                                            <option value="32">ELEMENTS FONDAMENTAUX DU MANAGEMENT</option>
                                            <option value="33">Geo-politique niveau Master</option>
                                            <option value="34">Maîtrise du travail de caméra</option>
                                            <option value="35">Montage Vidéo 2</option>
                                            <option value="36">Théorie du journalisme</option>
                                            <option value="37">Technique de rédaction journalistique</option>
                                            <option value="38">Introduction au langage filmique</option>
                                            <option value="39">Introduction à la communication</option>
                                            <option value="40">Droit constitutionnel</option>
                                            <option value="41">Observation et Lecture</option>
                                            <option value="42">Management organisationnel</option>
                                            <option value="43">Droit international</option>
                                            <option value="44">Matlab 1</option>
                                            <option value="45">Montage vidéo sur Adobe Premiere</option>
                                            <option value="46">Mathématique appliquée</option>
                                            <option value="47">Histoire des institutions</option>
                                            <option value="48">Comptabilité générale 2</option>
                                            <option value="49">Infographie 2D MASTER</option>
                                            <option value="50">Marché Financier MASTER</option>
                                            <option value="51">JRI Part 1</option>
                                            <option value="52">Communication et développement</option>
                                            <option value="53">GESTION DES RESSOURCES HUMAINES MASTER</option>
                                            <option value="54">POO PHP</option>
                                            <option value="66">Initiation infographie 2D</option>
                                            <option value="56">Planification et Gestion de Projet Médiatique 2</option>
                                            <option value="57">Droit de la Famille</option>
                                            <option value="58">Sage SAARI</option>
                                            <option value="59">Droit constitutionnel 2</option>
                                            <option value="60">MANAGEMENT PUBLIC</option>
                                            <option value="61">GESTION - SUIVI ET EVALUATION DE PROJET</option>
                                            <option value="62">AUDIT INTERNE</option>
                                            <option value="63">Infrastructures hertziennes2</option>
                                            <option value="64">Probabilité statistique</option>
                                            <option value="65">Matlab 2</option>
                                            <option value="67">Théorie Information Communication 2</option>
                                            <option value="68">Principe du Marketing</option>
                                            <option value="69">Introduction au droit 2</option>
                                            <option value="70">Introduction à la Communication 2</option>
                                            <option value="71">Composants électroniques</option>
                                            <option value="72">Système embarqué</option>
                                            <option value="73">Structure et analyse de coûts</option>
                                            <option value="74">Technique de recherche sur internet</option>
                                            <option value="75">Liaisons spatiales</option>
                                            <option value="76">ECONOMIE INTERNATIONALE</option>
                                            <option value="77">les Fonctions de langage appliquées en Publicité Communautaire</option>
                                            <option value="78">Voies d'exécution et profession judiciaire</option>
                                            <option value="79">Quadripoles et filtres</option>
                                            <option value="80">Introduction au son</option>
                                            <option value="81">Bases du dessin</option>
                                            <option value="82">Droit des affaires</option>
                                            <option value="83">Mathématique financière</option>
                                            <option value="84">Bases de la télécommunication</option>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Vague:</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="vague" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Format :</label>
                                        <select class="form-control form-control-sm">
                                            <option value="1">Upload</option>
                                            <option value="2">Rédaction</option>
                                            <option value="3">QCM</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Duré:</label>
                                        <input type="number" class="form-control form-control-sm" id="durre_upload" placeholder="Duré upload" name="durre_upload" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Sujet:</label>
                                        <div class="custom-file form-control-sm">
                                            <input type="file" class="custom-file-input " id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn ml-3 ajouter_examen_theorique">Ajouter</button>
                                </form>


                                <div class="form-group mr-auto">
                                    <form class="search m-3" method='POST'>
                                        <input class="p-1" class="form-control" type='search' id='search' placeholder='recherche' />
                                    </form>
                                </div>
                                <h2 class="text-center sous_titre">Examen théorique</h2>
                                <div class="table-responsive examen_theorique">
                                    <table class="table">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col">Intitulé</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Format</th>
                                                <th scope="col">Sujet</th>
                                                <th scope="col">Duré</th>
                                                <th scope="col">QCM</th>
                                                <th scope="col">Marina</th>
                                                <th scope="col">Modifier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>Algorithme</td>
                                                <td>Examen Mensuel</td>
                                                <td>Upload</td>
                                                <td>Algorithme_Exam_1.pdf</td>
                                                <td>180</td>
                                                <td></td>
                                                <td></td>
                                                <td align="center"><i class="fas fa-edit"></i></td>

                                            </tr>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                        <!--Fin bloc ajoute examens theorique-->






                    </div>
                    <!--Fin bloc ajoute examens sous tabs-->


                </div>
                <!--Fin bloc ajoute examens-->

















                <!--Bloc resultat & note-->
                <div class="tab-pane fade" id="v-pills-RESULTAT" role="tabpanel" aria-labelledby="v-pills-RESULTAT-tab">

                    <section id="Resultat">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="titre_inscriptions mt-3 d-flex justify-content-center">
                                <h2 class="text-center">Resultat Etudiants</h2>
                            </div>
                            <div class="bloc_resultat mt-3 pl-5">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V1 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="liste_resultat_etudiant.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V2 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="liste_resultat_etudiant.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V3 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="liste_resultat_etudiant.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V4 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="liste_resultat_etudiant.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V5 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="liste_resultat_etudiant.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V6 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="liste_resultat_etudiant.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <!--Fin bloc resultat & note-->
























                <!--Bloc repechage-->
                <div class="tab-pane fade" id="v-pills-REPECHAGE" role="tabpanel" aria-labelledby="v-pills-REPECHAGE-tab">
                    <section id="Resultat">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="titre_inscriptions mt-3 d-flex justify-content-center">
                                <h2 class="text-center">Répechage</h2>
                            </div>
                            <div class="bloc_resultat mt-3 pl-5">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V1 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="Liste_repechage.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V2 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="Liste_repechage.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V3 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="Liste_repechage.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V4 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="Liste_repechage.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V5 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="Liste_repechage.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                                        <div class="card p-2 mr-5 mt-5 " style="width: 9rem;">
                                            <div class="col d-flex justify-content-center">
                                                <div class="card-header-mba ">
                                                    <h5 class="text-center">MBA</h5>

                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="text-center">V6 <span class="badge badge-danger">4</span></h5>
                                                <div class="col d-flex justify-content-center">
                                                    <a href="Liste_repechage.php" class="btn  boutton">Lister</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <!--Fin bloc repechage-->












                <!--Bloc examens specifique-->
                <div class="tab-pane fade" id="v-pills-EXAMENS_SPECIFIQUE" role="tabpanel" aria-labelledby="v-pills-EXAMENS_SPECIFIQUE-tab">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 justify-content-center">
                        <section id="Examen_specifique">
                            <div class="container">
                                <div class="form_bloc justify-content-center">
                                    <form action="">
                                        <div class="form-group col-md-6">
                                            <label for="">Etudiant:</label>
                                            <input type="number" class="form-control form-control-sm" id="IdEtudiant" placeholder="IdEtudiant" name="IdEtudiant" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Matiere:</label>
                                            <input type="number" class="form-control form-control-sm" id="IdMatiere" placeholder="IdMatiere" name="IdMatiere" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Session Examen:</label>
                                            <input type="number" class="form-control form-control-sm" id="IdSession" placeholder="IdSession" name="IdSession" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col d-flex justify-content-center">
                                                <input type="submit" class="btn" value="Ajouter">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
</section>



</div>
<!--Fin bloc examens specifique-->





















</div>
</div>


<!--FIN BLOC-->
</div>

</section>


<?php

require('include/script.html');

?>
<script src="js/examens.js"></script>
</body>

</html>