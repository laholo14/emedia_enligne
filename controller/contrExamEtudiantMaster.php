<?php

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

if ($_SESSION['session_exam'] == 1) {

    $formation = new Formation();
    $formation->setSemetre($_SESSION['semestre']);
    $formation->setFiliere($_SESSION['filiere']);
    $res = $formation->listmatMasterV7();
    foreach ($res as $resultat) {

        if ($resultat['MOIS'] == $_SESSION['mois']) {

            if (isset($_POST['upload'])) {
                extract($_POST);
                $examupload = new ExamMBA();
                $examupload->setIdsessiondexam(1);
                $examupload->setIdmatiere($resultat['IDMATIERE']);
                $examupload->setIdtypedexam($upload);
                $resupload = $examupload->listexam_format();
                $table = '';
                foreach ($resupload as $resultatupload) {

                    $table .= '<div class="row pb-2">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10"><span style="font-size:18px;">' . $resultatupload['INTITULE'] . ':</span></div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2"><button type="button" class="btn qcm  btn-qcm-right" data-toggle="modal" data-target="#modal_alert"  onclick="Get(' . $resultatupload['IDSESSIONDEXAM'] . ',' . $resultatupload['IDMATIERE'] . ',' . $resultatupload['IDTYPEDEXAM'] . ',' . $resultatupload['DURRE'] . ')">Commencer</button>
        
                  </div>
                  </div>
                  <div class="row m-4">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
                  <div class="separator"></div>
                  </div>
                 </div>';
                }
                echo $table;
            }
        }
    }
} else if ($_SESSION['session_exam'] == 2) {
    extract($_POST);
    $formation = new Formation();
    $formation->setSemetre($_SESSION['semestre']);
    $formation->setFiliere($_SESSION['filiere']);
    $res = $formation->listmatMasterV7();
    if ($_SESSION['mois'] == 5) {
        $moisdexamdiff1 = 1;
        $moisdexamdiff2 = 4;
    } else if ($_SESSION['mois'] == 10) {
        $moisdexamdiff1 = 5;
        $moisdexamdiff2 = 8;
    }
    foreach ($res as $resultat) {
        if ($resultat['MOIS'] >= $moisdexamdiff1 and $resultat['MOIS'] <= $moisdexamdiff2) {

            if (isset($_POST['upload'])) {
                extract($_POST);
                $examupload = new Exam();
                $examupload->setSessiondexam(2);
                $examupload->setMatiere($resultat['IDMATIERE']);
                $examupload->setTypedexam($upload);
                $resupload = $examupload->listexam_format();
                $table = '';
                foreach ($resupload as $resultatupload) {

                    $table .= '<div class="row pb-2">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10"><span style="font-size:18px;">' . $resultatupload['INTITULE'] . ':</span></div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2"><button type="button" class="btn qcm  btn-qcm-right" data-toggle="modal" data-target="#modal_alert"  onclick="Get(' . $resultatupload['IDSESSIONDEXAM'] . ',' . $resultatupload['IDMATIERE'] . ',' . $resultatupload['IDTYPEDEXAM'] . ',' . $resultatupload['DURRE'] . ')">Commencer</button>
        
                  </div>
                  </div>
                  <div class="row m-4">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
                  <div class="separator"></div>
                  </div>
                  </div>';
                }
                echo $table;
            }
        }
    }
}

?>
<?php ?>