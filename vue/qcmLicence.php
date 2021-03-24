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

    <div class="row">
        <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4 timer mt-5">
            <div class="mx-auto">
                <div class="rounded bg-gradient-4 mt-4 text-white shadow p-1 text-center mb-2">
                    <div id="clock-b" class="countdown-circles d-flex flex-wrap justify-content-center"></div>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-8 col-xl-8 col-lg-8 overflow-auto qcm mt-5">
            <form class="container" method="post" id="myform" action="controller/contrreponse.php">
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

                        $nbQcm = explode('/;', $resultat['QCM']);
                        $sujetSize = sizeof($sujet);
                        // $radiosize = sizeof($qcm);

                        for ($i = 0; $i < $sujetSize; $i++) {
                            $question = $sujet[$i];
                            $index = $i + 1;
                            $qcm = explode('/,', $nbQcm[$i]);
                            $radiosize = sizeof($qcm);

                    ?>
                            <h6><?php echo $index . ')-' . $question;  ?></h6>
                            <?php
                            for ($j = 0; $j < $radiosize; $j++) {
                                $radioSuggestion = $qcm[$j];
                            ?>
                                <div class="ml-4">
                                    <label class="suggestion">
                                        <input type="radio" name="<?php echo 'reponse' . $index; ?>" value="<?php echo $radioSuggestion ?>"> <?php echo $radioSuggestion ?>
                                    </label>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <input type="submit" class="btn btn-info mt-3 ml-4 envoyer" name="sub_reponse" value="Envoyer" />
                </div>
            </form>
        </div>

    </div>
</div>