//14-03-00
$(document).ready(function () {

});



function GetSemestreCours(semestre) {
   $("#valuesemestrecours").val(semestre);
   $("#titreSemestre").html(semestre);

}

function GetPDF(intitule, titre) {

   $('#cours-pdf').attr('src', 'https://docs.google.com/viewer?url=https://e-media-madagascar.com/universite/Cours/' + intitule + '&embedded=true');
   $("#titre-cours").html(titre);


}


function GetYOUTUBE(idmatiere,intitule) {

   $.ajax({
      url: "controller/controllerVideoExplication.php",
      type: "POST",
      data: {
         
         idmatiere:idmatiere
      },
      success: function (data) {
         $('#cours_video').attr('src', ''+data);
         $('#titre_video').html(intitule);
      }
  })


}

