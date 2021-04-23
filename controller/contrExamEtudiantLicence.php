<?php

ob_start();

session_start();

function loadclass($class)
{

  require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();

//Affichage des Matieres et leur format 
/*mapiasa classe Formation methode listmat()


*/
if (isset($_POST['listmat'])) {

  $formation = new Formation();
  $formation->setSemetre($_SESSION['semestre']);
  $formation->setFiliere($_SESSION['filiere']);
  $formation->setParcours($_SESSION['parcours']);
  $formation->setMois($_SESSION['mois']);
  $formation->setCategorie(1);
  $formation->setType(1);
  $table = '';
  if ($_SESSION['session_exam'] == 1) {
    $cours = $formation->formationExamenMensuel();
  } else {
    $cours = $formation->listMatSemestriel();
  }
  foreach ($cours as $resultatCours) {

    $contenuTab = explode(",", $resultatCours['CONTENU_FR']);
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
      }
      //courslivres le pdf
      $table .= '
          <li class="mt-1" ><button type="button" class="btn btn-matiere" id="bnt-list-matiere" data-toggle="modal" data-target="#pdfmodal" onclick="GetPdf(\'' . $courslivres . '\',\'' . $resultatCours['INTITULE'] . $partie . ' ' . $part . '\')">
          ' . $resultatCours['INTITULE'] . '
      </button></li>
       ';
    }
  }

  echo $table;
}



if ($_SESSION['session_exam'] == 1) {


  $formation = new Formation();
  $formation->setSemetre($_SESSION['semestre']);
  $formation->setFiliere($_SESSION['filiere']);
  $res = $formation->listmat();
  foreach ($res as $resultat) {

    if ($resultat['MOIS'] == $_SESSION['mois']) {
      //listmat



      //exam format qcm
      if (isset($_POST['qcm'])) {
        extract($_POST);
        $examqcm = new Exam();
        $examqcm->setSessiondexam(1);
        $examqcm->setMatiere($resultat['IDMATIERE']);
        $examqcm->setTypedexam($qcm);
        $resqcm = $examqcm->listexam_format();
        $table = '';
        foreach ($resqcm as $resultatqcm) {
          $table .= '<div class="row pb-2">
          <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10"><span style="font-size:18px;">' . $resultatqcm['INTITULE'] . ':</span></div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2"><button type="button" class="btn qcm  btn-qcm-right" data-toggle="modal" data-target="#modal_alert"  onclick="Get(' . $resultatqcm['IDSESSIONDEXAM'] . ',' . $resultatqcm['IDMATIERE'] . ',' . $resultatqcm['IDTYPEDEXAM'] . ',' . $resultatqcm['DURRE'] . ')">Commencer</button>

          </div>
    </div>
    <div class="row m-4">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
    <div class="separator"></div>
    </div>
    </div>

';
        }


        echo $table;
      } //exam format upload
      if (isset($_POST['upload'])) {
        extract($_POST);
        $examupload = new Exam();
        $examupload->setSessiondexam(1);
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
    </div>

';
        }

        echo $table;
      }

      //examen format redaction
      if (isset($_POST['redaction'])) {
        extract($_POST);
        $examredaction = new Exam();
        $examredaction->setSessiondexam(1);
        $examredaction->setMatiere($resultat['IDMATIERE']);
        $examredaction->setTypedexam($redaction);
        $resredaction = $examredaction->listexam_format();
        $table = '';
        foreach ($resredaction as $resultatredaction) {
          $table .= '<div class="row pb-2">
                          <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10"><span style="font-size:18px;">' . $resultatredaction['INTITULE'] . ':</span></div>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2"><button type="button" class="btn" data-toggle="modal" data-target="#modal_alert"  onclick="Get(' . $resultatredaction['IDSESSIONDEXAM'] . ',' . $resultatredaction['IDMATIERE'] . ',' . $resultatredaction['IDTYPEDEXAM'] . ',' . $resultatredaction['DURRE'] . ')">Commencer</button>
                          
                          </div>
                    </div>
                    <div class="row m-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
            <div class="separator"></div>
            </div>
            </div>

         ';
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
  $res = $formation->listmat();
  if ($_SESSION['mois'] == 4) {
    $moisdexamdiff1 = 1;
    $moisdexamdiff2 = 4;
  } else if ($_SESSION['mois'] == 8) {
    $moisdexamdiff1 = 5;
    $moisdexamdiff2 = 8;
  }
  foreach ($res as $resultat) {
    if ($resultat['MOIS'] >= $moisdexamdiff1 and $resultat['MOIS'] <= $moisdexamdiff2) {
      //exam format qcm
      if (isset($_POST['qcm'])) {
        extract($_POST);
        $examqcm = new Exam();
        $examqcm->setSessiondexam(2);
        $examqcm->setMatiere($resultat['IDMATIERE']);
        $examqcm->setTypedexam($qcm);
        $resqcm = $examqcm->listexam_format();
        $table = '';
        foreach ($resqcm as $resultatqcm) {
          $table .= '<div class="row pb-2">
          <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10"><span style="font-size:18px;"><u>' . $resultatqcm['INTITULE'] . ':</u></span></div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2"><button type="button" class="btn qcm  btn-qcm-right" data-toggle="modal" data-target="#modal_alert"  onclick="Get(' . $resultatqcm['IDSESSIONDEXAM'] . ',' . $resultatqcm['IDMATIERE'] . ',' . $resultatqcm['IDTYPEDEXAM'] . ',' . $resultatqcm['DURRE'] . ')">Commencer</button>

          </div>
    </div>
    <div class="row m-4">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
    <div class="separator"></div>
    </div>
    </div>';
        }
        echo $table;
      } //exam format upload
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
    </div>

';
        }
        echo $table;
      }

      //examen format redaction
      if (isset($_POST['redaction'])) {
        extract($_POST);
        $examredaction = new Exam();
        $examredaction->setSessiondexam(2);
        $examredaction->setMatiere($resultat['IDMATIERE']);
        $examredaction->setTypedexam($redaction);
        $resredaction = $examredaction->listexam_format();
        $table = '';
        foreach ($resredaction as $resultatredaction) {
          $table .= '<div class="row pb-2">
          <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10"><span style="font-size:18px;"><u>' . $resultatredaction['INTITULE'] . ':</u></span></div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2"><button type="button" class="btn" data-toggle="modal" data-target="#modal_alert"  onclick="Get(' . $resultatredaction['IDSESSIONDEXAM'] . ',' . $resultatredaction['IDMATIERE'] . ',' . $resultatredaction['IDTYPEDEXAM'] . ',' . $resultatredaction['DURRE'] . ')">Commencer</button>
          
          </div>
          </div>
          <div class="row m-4">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
          <div class="separator"></div>
          </div>
         </div>

         ';
        }
        echo $table;
      }
    }
  }
}


ob_end_flush();
