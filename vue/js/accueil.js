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
