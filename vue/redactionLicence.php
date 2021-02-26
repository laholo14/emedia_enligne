<?php

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}
if (!isset($_SESSION['session_exam'])) {

    header("location: Home");
}


?>

<!--
    any am epreuve ny doctype nito fa tonga dia body no eto

     anaovy redaction misy question 1 dia textarea  dia anaty form dia misy submit dia misy placeny timmer ery ambony
-->

<!--redaction-->

<?php

include("../controller/contrEpreuveLicence.php");

?>

<div class="container">
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

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 timer-redaction timer mt-5">
            <div class="mx-auto">
                <div class="rounded bg-gradient-4 mt-4 text-white shadow p-1 text-center mb-2">
                    <div id="clock-b" class="countdown-circles d-flex flex-wrap justify-content-center"></div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 overflow-auto redaction mt-5 mb-5">
            <form class="container" method="post" id="myform" action="controller/contrreponseLicence.php">
                <div class="form-group mt-4">
                    <input type="hidden" name="durre" id="durre" value="<?php echo $durre_post; ?>" readonly />
                    <input type="hidden" name="type_exam_reponse" value="<?php echo $id_type_exam; ?>" readonly />
                    <input type="hidden" name="id_matiere_reponse" value="<?php echo $id_matiere; ?>" readonly />
                    <input type="hidden" name="session_exam_reponse" value="<?php echo $id_session_exam; ?>" readonly />
                    <input type="hidden" name="id_etudiants" value="<?php echo $id_et; ?>" readonly />
                    <input type="hidden" name="mail_etudiants" value="<?php echo $mail_et; ?>" readonly />
                    <?php
                    foreach ($res as $resultat) {
                        $sujet = explode('/;', $resultat['SUJET']);
                        $sujetSize = sizeof($sujet);

                        for ($i = 0; $i < $sujetSize; $i++) {
                            $question = $sujet[$i];
                            $index = $i + 1;

                    ?> <div class="pb-4">
                                <h6 class="pb-1"><?php echo $index . ')-' . $question;  ?></h6>
                                <textarea class="form-control" name="<?php echo 'reponse' . $index; ?>" rows="4" id="redaction"></textarea>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <input type="submit" class="btn btn-info envoyer mt-3 ml-4" name="sub_reponse" value="Envoyer" />
                </div>
            </form>
        </div>

    </div>
</div>