
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
                            } else if ($numvague <= 7) {
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

                                            <button class="btn mt-2 active-cours-pdf" onclick="GetPDF('<?php echo $courslivres;  ?>','<?php echo $resultat['INTITULE'] . $partie . ' ' . $part; ?>')">PDF</button>
                                            <button class="btn active-cours-explication" onclick="GetYOUTUBE(<?php echo $resultat['IDMATIERE']; ?>,'<?php echo $resultat['INTITULE']; ?>')">Explication</button>

                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>