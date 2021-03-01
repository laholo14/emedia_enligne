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
                            <a class="nav-link sous_tabs" id="pills-EXAMEN_THEORIQUE-tab" data-toggle="pill" href="#pills-EXAMEN_THEORIQUE" role="tab" aria-controls="pills-EXAMEN_THEORIQUE" aria-selected="false">Examen Semestriel</a>
                        </li>

                    </ul>


                    <div class="tab-content" id="pills-tabContent">

                        <!--bloc ajoute examens mensuel-->
                        <div class="tab-pane fade show active" id="pills-EXAMEN_MENSUEL" role="tabpanel" aria-labelledby="pills-EXAMEN_MENSUEL-tab">
                            <div class="form_examen_mensuel">
                                <form method="POST" id="formAjoutExamMensuel" action="../controller/controllerAjoutExamMBA.php" enctype="multipart/form-data">
                                    <div class="form-group col-md-6">
                                        <input type="hidden" class="form-control" id="session_exam" name="session_exam" value="1">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">EC :</label>
                                        <select class="form-control form-control-sm" id="ec" name="ec">
                                            <option selected disabled>...</option>
                                            <?php
                                            $ecexammba = new Matiere();

                                            $res1 = $ecexammba->readAll();

                                            foreach ($res1 as $resultat) {
                                            ?>
                                                <option value="<?php echo $resultat['IDMATIERE']; ?>"><?php echo $resultat['INTITULE']; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Vague:</label>
                                        <select class="form-control" id="vague" name="vague">
                                            <option selected disabled>...</option>
                                            <?php
                                            $vagueexam = new Vague();
                                            foreach ($vagueexam->CountVague() as $resultat) {
                                            ?>
                                                <option value="<?php echo $resultat['CODE']; ?>"><?php echo $resultat['CODE']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Durée en minute:</label>
                                        <input type="number" class="form-control form-control-sm" id="duree" placeholder="Durée upload" name="duree" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Sujet:</label>
                                        <div class="custom-file form-control-sm">
                                            <input type="file" class="" id="sujet" name="sujet" accept="application/pdf">
                                            <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                        </div>
                                    </div>

                                    <button type="submit" class="btn ml-3 ajouter_examen_mensuel" id="btnAjouterExamMensuel">Ajouter</button>
                                </form>


                                <div class="form-group mr-auto">
                                    <form class="search m-3" method='POST'>
                                        <input class="p-1" class="form-control" type='search' id='search' placeholder='recherche' />
                                    </form>
                                </div>
                                <h2 class="text-center sous_titre">Examen Mensuel</h2>
                                <div class="table-responsive examen_mensuel" id="div_mens">

                                    <table class="table" id="table_mens">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col">Intitulé</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Vague</th>
                                                <th scope="col">Sujet</th>
                                                <th scope="col">Durée</th>
                                                <th scope="col">Modifier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $listemensuel = new Exam();
                                            $listemensuel->setIdsessiondexam(1);
                                            foreach ($listemensuel->listexam() as $resultat) {
                                            ?>
                                                <tr>

                                                    <td><?php echo $resultat['INTITULE']; ?></td>
                                                    <td>Examen Mensuel</td>
                                                    <td><?php echo $resultat['CODE']; ?></td>
                                                    <td><?php echo $resultat['SUJET']; ?></td>
                                                    <td><?php echo $resultat['DURRE']; ?></td>
                                                    <td align="center"><i class="fas fa-edit"></i></td>

                                                </tr>
                                            <?php
                                            }

                                            ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                        <!--Fin bloc ajoute examens mensuel-->




                        <!--bloc ajoute examens theorique-->
                        <div class="tab-pane fade" id="pills-EXAMEN_THEORIQUE" role="tabpanel" aria-labelledby="pills-EXAMEN_THEORIQUE-tab">

                            <div class="form_examen_theorique">
                                <form method="POST" id="formAjoutExamSemestriel" action="../controller/controllerAjoutExamMBA.php" enctype="multipart/form-data">
                                    <div class=" form-group col-md-6">
                                        <input type="hidden" class="form-control" id="session_exam_sem" name="session_exam_sem" value="2">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">EC :</label>
                                        <select class="form-control form-control-sm" id="ec_sem" name="ec_sem">
                                            <option selected disabled>...</option>
                                            <?php
                                            $ecexammba2 = new Matiere();
                                            $res2 = $ecexammba2->readAll();


                                            foreach ($res2 as $resultat) {
                                            ?>
                                                <option value="<?php echo $resultat['IDMATIERE']; ?>"><?php echo $resultat['INTITULE']; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Vague:</label>
                                        <select class="form-control" id="vague_sem" name="vague_sem">
                                            <option selected disabled>...</option>
                                            <?php
                                            $vagueexam = new Vague();
                                            foreach ($vagueexam->CountVague() as $resultat) {
                                            ?>
                                                <option value="<?php echo $resultat['CODE']; ?>"><?php echo $resultat['CODE']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Durée en minute:</label>
                                        <input type="number" class="form-control form-control-sm" id="duree_sem" placeholder="Durée upload" name="duree_sem" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Sujet:</label>
                                        <div class="custom-file form-control-sm">
                                            <input type="file" class="" id="sujet_sem" name="sujet_sem" accept="application/pdf">
                                            <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                        </div>
                                    </div>

                                    <button type="submit" class="btn ml-3 ajouter_examen_theorique" id="btnAjouterExamSemestriel">Ajouter</button>
                                </form>


                                <div class="form-group mr-auto">
                                    <form class="search m-3" method='POST'>
                                        <input class="p-1" class="form-control" type='search' id='search' placeholder='recherche' />
                                    </form>
                                </div>
                                <h2 class="text-center sous_titre">Examen Semestriel</h2>
                                <div class="table-responsive examen_theorique" id="div_sem">
                                    <table class="table" id="table_sem">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col">Intitulé</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Vague</th>
                                                <th scope="col">Sujet</th>
                                                <th scope="col">Durée</th>
                                                <th scope="col">Modifier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $listemensuel = new Exam();
                                            $listemensuel->setIdsessiondexam(2);
                                            foreach ($listemensuel->listexam() as $resultat) {
                                            ?>
                                                <tr>

                                                    <td><?php echo $resultat['INTITULE']; ?></td>
                                                    <td>Examen Semestriel</td>
                                                    <td><?php echo $resultat['CODE']; ?></td>
                                                    <td><?php echo $resultat['SUJET']; ?></td>
                                                    <td><?php echo $resultat['DURRE']; ?></td>
                                                    <td align="center"><i class="fas fa-edit"></i></td>

                                                </tr>
                                            <?php
                                            }

                                            ?>

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