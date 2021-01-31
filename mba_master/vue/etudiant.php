<?php
$currentPage = 'etudiant';
require('include/header.php');
?>
<link rel="stylesheet" href="css/etudiantMBA.css">
<?php
require('include/nav.php');
?>
<section id="Liste_etudiant">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="titre_inscriptions mt-3 d-flex justify-content-center">
            <h2 class="text-center">Listes des vagues</h2>  
        </div>
        <div class="bloc_list_etudiant mt-3">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-4">
                    <div class="form_ajoute_vague ">
                        <form class="ml-2">
                            <label for="ajout_vague" class="ml-2">Ajout Vague: </label>
                            <div class="row">

                                <div class="form-group form-inline mx-sm-3 mb-2">

                                    <input type="text" class="form-control" id="ajout_vague" placeholder="Vague">
                                </div>
                                <button type="submit" class="btn btn-ajouter mb-2" id="ajouter_vague">Ajouter</button>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="form_recherche_vague mt-2">
                        <form class="form-inline">

                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" id="vague" placeholder="Recherche">
                            </div>
                        </form>
                    </div> -->
                    <div class="bloc_modifier_vague mt-4">
                        <div class="titre_entrer_vague ml-4 row justify-content-between mr-1">
                            <h4>Vague</h4>
                            <h4>Date d'entrée</h4>
                            <h4>Modifier</h4>
                        </div>
                        <div id="listVagueAccordion">
                            <?php $afficahge = new Datyfidirana();
                            $res = $afficahge->read_mba();
                            foreach ($res as $resultat) {
                                if ($resultat['DATYFIDIRANA'] == "") {
                                    $daty = "0000-00-00";
                                } else {
                                    $daty = $resultat['DATYFIDIRANA'];
                                }
                            ?>
                                <div class="accordion ml-3 mb-4 mt-2" id="<?php echo $resultat['CODE']; ?>">
                                    <div class="card mt-3">
                                        <div class="card-header" id="">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo "collapse" . $resultat['IDDATYFIDIRANA']; ?>" aria-expanded="true" aria-controls="<?php echo "collapse" . $resultat['IDDATYFIDIRANA']; ?>">
                                                    <div class="content_modifier_vague  row ">
                                                        <h5 class="vague"><?php echo $resultat['CODE']; ?></h5>
                                                        <h5 class="date"><?php echo $daty; ?></h5>
                                                        <i class="fa fa-edit icon"></i>
                                                    </div>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="<?php echo "collapse" . $resultat['IDDATYFIDIRANA']; ?>" class="collapse" aria-labelledby="" data-parent="#<?php echo $resultat['CODE']; ?>">
                                            <div class="card-body">
                                                <div class="titre_modifier_vague">
                                                    <h5 class="text-center">Ajouter|Modifier la date d'entrée</h5>
                                                </div>
                                                <div class="corps_modifier">
                                                    <h6 class="mt-4">Date d'entrée :</h6>
                                                    <div class="form_modifier_vague mt-3">
                                                        <form>

                                                            <div class="form-group  mb-2">
                                                                <input type="date" class="form-control" id="<?php echo 'datevague' . $resultat['IDDATYFIDIRANA']; ?>" value="" name="">
                                                            </div>
                                                            <div class="form-group  mb-2">
                                                                <input type="submit" class="btnajoutdate btn btn-outline-info" id="" value="Ajouter|Modifier" onclick="GetIDDATY(<?php echo $resultat['IDDATYFIDIRANA']; ?>,'<?php echo 'datevague' . $resultat['IDDATYFIDIRANA']; ?>')" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card_vague">
                        <div class="row">
                            <?php $vague = new Code();
                            $res = $vague->listVague();
                            $suivre = new Suivre();
                            $suivre->setDip("MASTER");
                            $suivre->setFiliere("MBA");
                            
                            foreach ($res as $resultat) {
                                $suivre->setCode($resultat['CODE']);
                                foreach($suivre->ListEtudiantParVague() as $d){  $semestre = $d['SEMESTRE'];}
                            ?>

                                <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                    <div class="card p-2 ml-5 mt-5 " style="width: 9rem;">
                                        <div class="col d-flex justify-content-center">
                                            <div class="card-header-mba ">
                                                <h5 class="text-center"><?php echo $resultat['CODE']; ?></h5>

                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="text-center"><?php  echo $semestre ?> <span class="badge badge-danger"><?php echo count($suivre->ListEtudiantParVague()); ?></span></h5>
                                            <form action="liste_etudiant.php" method="POST">
                                                <div class="col d-flex justify-content-center">
                                                    <input type="hidden" name="diplome" value="MASTER">
                                                    <input type="hidden" name="filiere" value="MBA">
                                                    <input type="hidden" name="semestre" value="<?php echo $semestre; ?>">
                                                    <input type="hidden" name="vague" value="<?php echo $resultat['CODE']; ?>">
                                                   <input type="submit" class="btn btn-outline-info mt-3" value="Lire" />
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<!-- maka id an vague -->
<input type="hidden" id="iddaty" value="" />
<input type="hidden" id="idvaluedaty" value="" />
<?php

require('include/script.html');

?>
<script src="js/etudiants.js"></script>
</body>

</html>