$(document).ready(function () {
    listUpload();
    afficherMatiere();

    function listUpload() {

        $.ajax({
            url: "controller/contrExamEtudiantMaster.php",
            method: "POST",
            data: {
                upload: 1
            },
            success: function (data) {
                $("#upload").html(data);
            }
        });
    }

    function afficherMatiere() {
        let listmat = '';
        $.ajax({
            url: "controller/contrExamEtudiantMasterListMat.php",
            method: "POST",
            data: {
                listmat: listmat
            },
            success: function (data) {
                $('#cours_matiere').html(data);
            }
        })

    }
});

function Get(session, matiere, type, durre) {
    $("#id_session_exam").val(session);
    $("#id_matiere").val(matiere);
    $("#id_type_exam").val(type);
    $("#durre_post").val(durre);
    let intdure = parseInt(durre);
    let heure = Math.floor(intdure / 60);
    let min = Math.floor(intdure % 60);
    if (min == 0) {

        min = '00';
    }

    let sec = Math.floor();
    $(".durre").text(heure + 'h' + min + 'min');
};

function GetPdf(pdfcours, titre) {

    $('#pdf').attr('src', 'https://docs.google.com/viewer?url=https://e-media-madagascar.com/universite/Cours/' + pdfcours + '&embedded=true');
    //alert( $('#courspdf').attr('src'));
    // alert('Ao e');
    $('#titrepdf').text(titre);

}