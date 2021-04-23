$(document).ready(function () {
    listQcm();
    listUpload();
    listRedaction();
    afficherMatiere();
});

function Get(session, matiere, type, durre) {
    $("#id_session_exam").val(session);
    $("#id_matiere").val(matiere);
    $("#id_type_exam").val(type);
    $("#durre_post").val(durre); 
    let intdure = parseInt(durre);
    let heure = Math.floor(intdure/60);
    let min = Math.floor(intdure%60);
    if(min == 0){

        min = '00';
    }
    
    let sec = Math.floor();
    $(".durre").text(heure + 'h'+min + 'min');
};

function listQcm() {
    let qcm = 3;
    $.ajax({
        url: "controller/contrExamEtudiantLicence.php",
        method: "POST",
        data: {
            qcm: qcm
        },
        success: function (data) {
            $("#qcm").html(data);
        }
    });
}; 

function listRedaction() {
    let redaction = 2;
    $.ajax({
        url: "controller/contrExamEtudiantLicence.php",
        method: "POST",
        data: {
            redaction: redaction
        },
     success: function (data) {
            $("#redaction").html(data);
        }
    });
}

function listUpload() {
   let upload = 1;
    $.ajax({
        url: "controller/contrExamEtudiantLicence.php",
        method: "POST",
        data: {
        upload: upload
        },
        success: function(data){
            $("#upload").html(data);
        }
    });
}


afficherMatiere();

function afficherMatiere() {
    let listmat = '';
    $.ajax({
        url: "controller/contrExamEtudiantLicence.php",
        method: "POST",
        data: {
            listmat: listmat
        },
        success: function (data) {
            $('#cours_matiere').html(data);
        }
    })

}

function GetPdf(pdfcours, titre) {

    $('#pdf').attr('src','https://docs.google.com/viewer?url=https://e-media-madagascar.com/universite/Cours/' + pdfcours + '&embedded=true');
    //alert( $('#courspdf').attr('src'));
    // alert('Ao e');
    $('#titrepdf').text(titre);

}