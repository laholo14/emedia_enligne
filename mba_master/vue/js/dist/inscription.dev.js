"use strict";

$(document).ready(function () {
  listeEtudiant();

  function listeEtudiant() {
    $.ajax({
      url: "../controller/controllerListeNouveauxInscri.php",
      type: "POST",
      data: {
        liste: ""
      },
      success: function success(data) {
        $("#section_list_etudiant").html(data);
      }
    });
  }
});