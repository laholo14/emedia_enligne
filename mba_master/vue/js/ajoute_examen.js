$(document).ready(function() {
    //listExam();
    $("#mensuel").click(function(e) {
        e.preventDefault();
        $('h1').text('Examen Mensuel');
        $('#session_exam').val('1');

        listExam();
    });

    $("#semestriel").click(function(e) {
        e.preventDefault();
        $('h1').text('Examen Semestriel');
        $('#session_exam').val('2');

        listExam();
    });



     $("#mensuele").click(function(e) {
        e.preventDefault();
        $('h1').text('Examen Mensuel');
        $('#session_exam').val('1');

        listExam();
    });

    $("#semestriele").click(function(e) {
        e.preventDefault();
        $('h1').text('Examen Semestriel');
        $('#session_exam').val('2');

        listExam();
    });

    recherche();

});


function GetUser(idmat, idsession, idtype, titrematiere, titresession, titretype) {
    $("#id_matiere_up").val(idmat);
    $("#id_type_up").val(idtype);
    $("#id_session_up").val(idsession);
    $("#matiere_up").val(titrematiere);
    $("#format_up").val(titretype);
    $("#session_exam_up").val(titresession);
};

$(document).on("click", "#format", function() {

    let type = $("#format").val();

    if (type == '2') {
        $("#textsujet").val('');
        $("#durre_qcm").val('');
        $("#question_qcm").val('');
        $("#reponse_qcm").val('');
        $("#div_durre_redac").fadeIn();
        $("#div_question_redac").fadeIn();
        $("#sujet").fadeOut();
        $("#div_durre_qcm").fadeOut();
        $("#div_question_qcm").fadeOut();
        $("#div_reponse_qcm").fadeOut();



    } else if (type == '3') {
        $("#textsujet").val('');
        $("#durre_redac").val('');
        $("#question_redac").val('');
        $("#div_durre_qcm").fadeIn();
        $("#div_question_qcm").fadeIn();
        $("#div_reponse_qcm").fadeIn();
        $("#sujet").fadeOut();
        $("#div_durre_redac").fadeOut();
        $("#div_question_redac").fadeOut();

    } else {
        $("#durre_qcm").val('');
        $("#question_qcm").val('');
        $("#reponse_qcm").val('');
        $("#durre_redac").val('');
        $("#question_redac").val('');
        $("#sujet").fadeIn();
        $("#div_durre_redac").fadeOut();
        $("#div_question_redac").fadeOut();
        $("#div_durre_qcm").fadeOut();
        $("#div_question_qcm").fadeOut();
        $("#div_reponse_qcm").fadeOut();

    }
});


$(document).on("click", ".edit", function(e) {

    let type = $("#id_type_up").val();
    let matiere = $("#id_matiere_up").val();
    let session = $("#id_session_up").val();
    let action = 'update';
    $.ajax({

        url: "../Controller/contrExam.php", //Controller
        method: "POST",
        data: {
            type: type,
            session: session,
            matiere: matiere,
            action: action
        }, //valeur alefa
        dataType: "json",
        success: function(data) {

            $('#durre_qcm_up').val(data.durre);
            $('#durre_redac_up').val(data.durre);
            $('#durre_upload_up').val(data.durre);
            $('#question_redac_up').val(data.sujet);
            $('#question_qcm_up').val(data.sujet);
            $('#reponse_qcm_up').val(data.reponse_qcm);
            
            
            if (type == 2) {
                $("#textsujet_up").val('');
                $("#durre_qcm_up").val('');
                $("#question_qcm_up").val('');
                $("#reponse_qcm_up").val('');
                $("#div_durre_redac_up").fadeIn();
                $("#div_question_redac_up").fadeIn();
                $("#sujet_up").fadeOut();
                $("#div_durre_qcm_up").fadeOut();
                $("#div_question_qcm_up").fadeOut();
                $("#div_reponse_qcm_up").fadeOut();



            } else if (type == 3) {
                $("#textsujet_up").val('');
                $("#durre_redac_up").val('');
                $("#question_redac_up").val('');
                $("#div_durre_qcm_up").fadeIn();
                $("#div_question_qcm_up").fadeIn();
                $("#div_reponse_qcm_up").fadeIn();
                $("#sujet_up").fadeOut();
                $("#div_durre_redac_up").fadeOut();
                $("#div_question_redac_up").fadeOut();

            } else {
                $("#durre_qcm_up").val('');
                $("#question_qcm_up").val('');
                $("#reponse_qcm_up").val('');
                $("#durre_redac_up").val('');
                $("#question_redac_up").val('');
                $("#sujet_up").fadeIn();
                $("#div_durre_redac_up").fadeOut();
                $("#div_question_redac_up").fadeOut();
                $("#div_durre_qcm_up").fadeOut();
                $("#div_question_qcm_up").fadeOut();
                $("#div_reponse_qcm_up").fadeOut();

            }



        }
    });

});




$(document).on("submit", "#formulaire", function(e) {
    e.preventDefault();
    //let 
    $.ajax({
        url: "../Controller/contrExam.php",
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            if (data == 'success') {
                alert('Ajout reussi');
                location.reload();
            

            }
            
        }
    });
});


$(document).on("submit", "#formulaire_update", function(e) {
    e.preventDefault();
    //let 
    $.ajax({
        url: "../Controller/contrExam.php",
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            
                alert('Update reussi');
                location.reload();
         

             
            
        }
    });
});
listExam();

function listExam() {

    let tabexam = '';
    let session_exam = $('#session_exam').val();

    $.ajax({
        url: "../Controller/contrExam.php",
        type: "POST",
        data: {
            tabexam: tabexam,
            session_exam: session_exam
        },
        success: function(data) {
            $("#tabexam").html(data);
        }
    });

};

$(document).on("keyup", "#search", function() {
    recherche();
});
recherche();

function recherche() {
    let search = $('#search').val();
    let session_exam = $('#session_exam').val();
    $.ajax({
        url: "../Controller/contrExam.php",
        type: "POST",
        data: {
            search: search,
            session_exam: session_exam
        },
        success: function(data) {
            $("#tabexam").html(data);
        }
    });
}