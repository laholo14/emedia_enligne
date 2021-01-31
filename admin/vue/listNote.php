<?php

ob_start();

session_start();

if (!isset($_SESSION['matriculeadmin'])) {

  header("location:../admin/index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" href="css/admin.css" type="text/css" />
  <title>Document</title>
</head>

<body>



  <?php
  include("../controller/contrListnote.php");
  ?>

  <h1>Listes des Etudiants en:<?php echo $resultat['DIPLOME'] . ' ' . $resultat['FILIERE'] . '' . $resultat['CODE'] . '/' . $semestre; ?> </h1>

  <input type="hidden" class="form-control" name="diplome_ajax" id="diplome_ajax" value="<?php echo $resultat['DIPLOME']; ?>" readonly>
  <input type="hidden" class="form-control" name="filiere_ajax" id="filiere_ajax" value="<?php echo $resultat['FILIERE']; ?>" readonly>
  <input type="hidden" class="form-control" name="vague_ajax" id="vague_ajax" value="<?php echo $resultat['CODE']; ?>" readonly>


  <div class="table-responsive mt-3">
    <form action='downAll.php' method="POST">
      <div class="col-lg-12 d-flex justify-content-center">
        <div class="form-group mr-4">
          <label>Semestre</label>
          <select class="form-control text-center" name="semestre" id="semestre">
            <option selected disabled>....</option>
            <option class="semestreLicence" value="S1">S1</option>
            <option class="semestreLicence" value="S2">S2</option>
            <option class="semestreLicence" value="S3">S3</option>
            <option class="semestreLicence" value="S4">S4</option>
            <option class="semestreLicence" value="S5">S5</option>
            <option class="semestreLicence" value="S6">S6</option>
            <option class="semestreMaster" value="S7">S7</option>
            <option class="semestreMaster" value="S8">S8</option>
            <option class="semestreMaster" value="S9">S9</option>
            <option class="semestreMaster" value="S10">S10</option>
            <option class="semestreMaster" value="S11">S11</option>
            <option class="semestreMaster" value="S12">S12</option>
          </select>
        </div>
        <div class="form-group mr-4" id="test">

        </div>
        <div class="form-group mr-4">
          <label>Session d'examen:</label>
          <select class="form-control text-center" name="session" id="session">
            <option value="1">Mensuel</option>
            <option value="2">Semestriel</option>
          </select>
        </div>

        <div class="form-group ml-2">
          <label>Elément constitutif:</label>
          <select class="form-control text-center" name="matiere" id="matiere">

          </select>
          </select>
        </div>
      </div>
      <div id="content">

      </div>
      <input type="hidden" class="form-control" name="vague_exam" id="vague_exam" value="<?php echo $resultat['CODE']; ?>" readonly>
      <input type="hidden" class="form-control" name="filiere_exam" id="filiere_exam" value="<?php echo $resultat['FILIERE']; ?>" readonly>
      <input type="submit" id="ajouter" name="down_all" class="btn btn-primary" value="Telecharger" />
    </form>
  </div>

  <div id="test">


  </div>


  <div class="modal fade" id="modal_copie" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center ">
          <h5 class="modal-title text-capitalize" id="titre_modal">Copie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body">
          <form method="post" action="word.php">

            <div class="form-group">
              <input type="hidden" class="form-control" name="id_et" id="id_et" readonly>
              <input type="hidden" class="form-control" name="matricule" id="matricule" readonly>
            </div>
            <div id="content_affichage_copie">
              bbgbgbg
            </div>

            <div class="modal-footer d-flex justify-content-center">

            </div>
          </form>

        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modal_note" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center ">
          <h5 class="modal-title text-capitalize" id="titre_modal_note">Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body">
          <form method="post" action="word.php">
            <label>Note:</label>
            <div class="form-group">
              <input type="hidden" class="form-control" name="id_et_note" id="id_et_note" readonly>

              <input type="hidden" class="form-control" name="matricule_note" id="matricule_note" readonly>
              <input type="number" class="form-control" id="note" />
            </div>


            <div class="modal-footer d-flex justify-content-center">
              <input type="submit" class="btn btn-outline-dark" id="ajout_note" value="Noter" />
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="admin" value="<?php echo $_SESSION['admin'] ?>" />
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    listcopie();
    listExam();
    if ($("#admin").val() == 'master') {

      $(".semestreLicence").hide();
    } else if ($("#admin").val() == 'licence') {

      $(".semestreMaster").hide();
    } else {

    }
    MatiereSemestre();
  });

  GetAfficher();

  function GetAfficher(idet, intitule) {
    $("#id_et").val(idet);
    $("#matricule").val(intitule);
    $("#titre_modal").text(intitule);
    listcopie();
    listExam();
  }
  GetNote();

  function GetNote(idet, intitule, valnote) {
    $("#id_et_note").val(idet);
    $("#matricule_note").val(intitule);
    $("#titre_modal_note").text(intitule);
    $("#note").val(valnote);
    listcopie();
    listExam();
  }

  listcopie();

  function listcopie() {
    let matiere = $("#matiere").val();
    let etudiants = $("#id_et").val();
    let session = $("#session").val();
    $.ajax({
      url: "../controller/contrAffichagecopie.php", //controller
      method: "POST",
      data: {
        matiere: matiere,
        etudiants: etudiants,
        session: session
      }, //valeur alefa

      success: function(data) {
        $("#content_affichage_copie").html(data);
      }
    });
  }
  listExam();

  function listExam() {
    let diplome_ajax = $("#diplome_ajax").val();
    let filiere_ajax = $("#filiere_ajax").val();
    let vague_ajax = $("#vague_ajax").val();
    let session_ajax = $("#session").val();
    let matiere_ajax = $("#matiere").val();
    $.ajax({
      url: "../controller/contrAffichagecopie.php", //controller
      method: "POST",
      data: {
        diplome_ajax: diplome_ajax,
        filiere_ajax: filiere_ajax,
        vague_ajax: vague_ajax,
        session_ajax: session_ajax,
        matiere_ajax: matiere_ajax
      }, //valeur alefa

      success: function(data) {
        $("#content").html(data);
      }
    });
  }

  MatiereSemestre();

  function MatiereSemestre() {
    let semestre = $("#semestre").val();
    let filiere_ajax = $("#filiere_ajax").val();
    $.ajax({
      url: "../controller/contrListnote.php", //controller
      method: "POST",
      data: {
        semestre: semestre,
        filiere_ajax: filiere_ajax
      }, //valeur alefa

      success: function(data) {

        $("#matiere").html(data);

      }
    });
  }



  $(document).on("click", "#ajout_note", function(e) {
    e.preventDefault();
    let note = '';
    let valeur_note = $("#note").val();
    let etudiants_note = $("#id_et_note").val();
    let session_note = $("#session").val();
    let matiere_note = $("#matiere").val();
    $.ajax({
      url: "../controller/contrAffichagecopie.php", //controller
      method: "POST",
      data: {
        note: note,
        valeur_note: valeur_note,
        matiere_note: matiere_note,
        etudiants_note: etudiants_note,
        session_note: session_note
      }, //valeur alefa

      success: function(data) {
        listcopie();
        listExam();

      }
    });

  });

  $(document).on("change", "#semestre", function(e) {
    listcopie();
    listExam();
    MatiereSemestre();


  });
  $(document).on("change", "#session", function(e) {
    listcopie();
    listExam();

  });
  $(document).on("change", "#matiere", function(e) {
    listcopie();
    listExam();

  });
</script>

</html>