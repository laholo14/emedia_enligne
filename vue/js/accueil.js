//14-03-00
$(document).ready(function () {


});



function GetSemestreCours(semestre) {
   $("#valuesemestrecours").val(semestre);
   $("#titreSemestre").html(semestre);

    $.ajax({
       url: "controller/contrAffichageCours.php",
       type: "POST",
       data: {
          semestre: semestre
       },
       success: function (data) {
          $("#table-cours").html(data);
       }
    })

  

}

function GetSemestreExo(semestre) {
   $("#valuesemestreexo").val(semestre);
  // $("#titreSemestre").html(semestre);

   // $.ajax({
   //    url: "vue/coursVueCon.php",
   //    type: "POST",
   //    data: {
   //       semestre: semestre
   //    },
   //    success: function (data) {
   //       $("#table-cours").html(data);
   //    }
   // })

  

}
function GetPDF(intitule, titre) {

   $('#cours-pdf').attr('src', 'https://docs.google.com/viewer?url=https://e-media-madagascar.com/universite/Cours/' + intitule + '&embedded=true');
   //$('#cours-pdf').attr('src', 'https://e-media-madagascar.com/universite/Cours/' + intitule + '&embedded=true');
   $("#titre-cours").html(titre);


}


function GetYOUTUBE(idmatiere, intitule,semestre) {

   $.ajax({
      url: "controller/controllerVideoExplication.php",
      type: "POST",
      data: {

         idmatiere: idmatiere,
         semestre:semestre
      },
      success: function (data) {
         $('#cours_video').attr('src', '' + data);
         $('#titre_video').html(intitule);
	      //alert(''+data);
         
      }
   })


}

