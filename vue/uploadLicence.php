<?php

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}
if (!isset($_SESSION['session_exam'])) {

    header("location: Accueil");
}


?>

<!--
    any am epreuve ny doctype nito fa tonga dia body no eto

    anaovy qcm misy question 1 dia input radio anak 3 dia anaty form dia misy submit dia misy placeny timmer ery ambony
-->


<?php

$tabvague = explode("V", $_SESSION['vague']);
for ($i = 0; $i < count($tabvague); $i++) {
    $numvague = $tabvague[$i];
}

 if ($numvague >= 7 and $_SESSION['diplome'] === 'MASTER') {
    include("../controller/contrEpreuveMASTER.php");

} else if ($numvague <= 7) {
    include("../controller/contrEpreuveLicence.php");
}

?>

<div class="container-fluid">
    <div class="row shadow-lg fixed-top">
        <div class="col-12">
            <h2 align="center">
                <?php
                foreach ($mat as $resultat) {
                    echo $resultat['INTITULE'];
                }
                ?>
            </h2>
        </div>
    </div>

    <div class="row pt-3 pb-5">
        <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4 timer mt-5">
            <div class="mx-auto">
                <div class="rounded bg-gradient-4 mt-4 text-white shadow p-1 text-center mb-2">
                    <div id="clock-b" class="countdown-circles d-flex flex-wrap justify-content-center"></div>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-8 col-xl-8 col-lg-8 overflow-auto mt-5">
            <form method="post" id="myform" action="controller/contrreponseUploadLicence.php" enctype="multipart/form-data">
                <input type="hidden" name="durre" id="durre" value="<?php echo $durre_post; ?>" readonly />
                <input type="hidden" name="type_exam_reponse" value="<?php echo $id_type_exam; ?>" readonly />
                <input type="hidden" name="id_matiere_upload" value="<?php echo $id_matiere; ?>" readonly />
                <input type="hidden" name="id_session_exam_upload" value="<?php echo $id_session_exam; ?>" readonly />
                <input type="hidden" name="id_et_upload" value="<?php echo $id_et; ?>" readonly />
                <input type="hidden" name="mail_et_upload" value="<?php echo $mail_et; ?>" readonly />
                <input type="hidden" name="matricule" value="<?php echo $matricule; ?>" readonly />
                <div class="table-responsive">
                    <table border="1" class="table table-border-danger table-striped">
                        <thead>
                            <tr>
                                <th>Sujet</th>
                                <th>Importer votre Réponse ici</th>
                            </tr>
                        </thead>
                        <?php foreach ($res as $resultat) { ?>
                            <tbody>
                                <tr>
                                    <td><button type="button" id="afficher" class="btn btn-primary"> Afficher <i class="fas fa-eye"></i></button> <button id="fermer" type="button" class="btn btn-danger"> Fermer <i class="fas fa-eye-slash"></i></button>
                                    <br><small class="text-dark">Cliquer sur "Afficher" et répéter si besoin <br>pour afficher le sujet à traiter</small>
                                    </td>
                                    <td>
                                    <input type="hidden" value="<?php echo $resultat['SUJET']?>" id="sujet"/>
                                        <div class="form-group">
                                            <div class="row input-group">
                                                <div class="col-sm-12 col-md-8 col-xl-8 col-lg-8"> <input type="text" class="form-control" name="nom_file" style="margin-top:0px;" placeholder="reponse" readonly></div>
                                                <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4 input-group-btn">
                                                    <span class="fileUpload btn download-upload">
                                                        <span class="upl btn btn-primary" style="cursor:pointer" id="upload">Importer <i class="fas fa-upload"></i></span>
                                                        <input type="file" class="upload up" name="reponse_file" onchange="readURL(this);" accept="image/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" />
                                                    </span><!-- btn-orange -->
                                                </div><!-- btn -->
                                            </div><!-- group -->
                                        </div><!-- form-group -->
                                    </td>
                                </tr>

                            </tbody>
                        <?php } ?>

                    </table>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <input type="submit" class="btn btn-primary download-envoyer float-right mb-2" name="sub_exam" value="Envoyer" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <iframe id="table_sujet" sandbox="allow-scripts allow-same-origin" src="" width="100%" height="800px" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>