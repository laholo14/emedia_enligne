//14-03-00
$(document).ready(function () {
    
    affichercourslivres();
    affichercoursvideo();
    affichercoursaudio();
    afficherMatiere();
    afficherexercicelivres();
    afficherexercicevideo();
    affichercorrigelivres();
    readMessage();
    update_last_activity();
    setInterval(readMessage, 1000);
    setInterval(update_last_activity, 1000);
   

   $("#priseclick").click();

    $(window).click(function () {
        $('#srcpre').attr('src', '');
    });
    
    if($("#button_ancien").val() == 'S1' || $("#button_ancien").val() == 'S7' ){
      $("#open_licence").hide();
    }else{
        $("#open_licence").show();  
    }


});


$(document).on("change", "#langue", function () {

    affichercourslivres();
    affichercoursvideo();
    affichercoursaudio();
    afficherexercicelivres();
    afficherexercicevideo()
    update_last_activity();

});

$(document).on("click","#open_licence",function(){
    $(".cours_encien_licence").fadeIn();
    

})




//MESSAGE
//AJOUTER MESSAGE
$(document).on("click", "#MessageAjouter", function (e) {
    e.preventDefault();
    let idetudiant = $('#idetudiant').val();
    let diplomeEtudiant = $('#diplome').val();
    let filiereEtudiant = $('#filiere').val();
    let vagueEtudiant = $('#vague').val();
    let message = $('#messageContenu').val();
    if (message == '') {
        alert('Veuillez remplir le champ');
    } else {
        $.ajax({
            url: "controller/Message.php",
            type: "post",
            data: {
                id: idetudiant,
                message: message,
                diplomeEtudiant: diplomeEtudiant,
                filiereEtudiant: filiereEtudiant,
                vagueEtudiant: vagueEtudiant
            },
            success: function (data) {
                $('#messageContenu').val("");
                readMessage();
            }
        });
    }

});


//AFFICHE MESSAGE
readMessage();

function readMessage() {
    let idetudiant = $('#idetudiant').val();
    let readMessage = "readMessage";
    $.ajax({
        url: "controller/Message.php",
        method: "POST",
        data: {
            idetudiant: idetudiant,
            readMessage: readMessage
        },
        success: function (data) {
            $('.response').html(data);
        }
    });
}


//TAPITRA MESSAGE






//CONTENU COURS
function affichercourslivres() {
    let open_cours = 1;
    let open_cours_livres = 1;
    let langue = $('#langue').val();


    $.ajax({
        url: "controller/contrFormation.php",
        method: "POST",
        data: {
            open_cours: open_cours,
            open_cours_livres: open_cours_livres,
            langue: langue

        },
        success: function (data) {
            $('#contenu_cours_livres').html(data);

        }
    })

}


function affichercoursvideo() {
    let open_cours = 1;
    let open_cours_video = 2;
    let langue = $('#langue').val();


    $.ajax({
        url: "controller/contrFormation.php",
        method: "POST",
        data: {
            open_cours: open_cours,
            open_cours_video: open_cours_video,
            langue: langue

        },
        success: function (data) {
            $('#contenu_cours_video').html(data);
        }
    })

}


function affichercoursaudio() {
    let open_cours = 1;
    let open_cours_audio = 3;
    let langue = $('#langue').val();


    $.ajax({
        url: "controller/contrFormation.php",
        method: "POST",
        data: {
            open_cours: open_cours,
            open_cours_audio: open_cours_audio,
            langue: langue

        },
        success: function (data) {
            $('#contenu_cours_audio').html(data);

        }
    })

}


//GetMp3();
function GetMp3Cours(mp3, titre) {

    $('#audioplayer').attr('src', 'Cours/' + mp3);
    $('#titremp3').text(titre);
    $('#cplay').click();

    //alert(classe);

}

function GetPdf(pdfcours, titre) {

    $('#pdf').attr('src', 'https://docs.google.com/viewer?url=https://e-media-madagascar.com/universite/Cours/' + pdfcours + '&embedded=true');
    // alert('Ao e');
    $('#titrepdf').text(titre);

}

$(document).on("click", "#pdfmodalclose", function () {
    $('#pdf').attr('src', '');


});


$(document).on("click", "#closePresentation", function () {
    $('#srcpre').attr('src', '');
    //alert('desa');
});



//CONTENU EXERCICE
function afficherexercicelivres() {
    let open_exercice = 2;
    let open_exercice_livres = 1;
    let langue = $('#langue').val();


    $.ajax({
        url: "controller/contrFormation.php",
        method: "POST",
        data: {
            open_exercice: open_exercice,
            open_exercice_livres: open_exercice_livres,
            langue: langue

        },
        success: function (data) {
            $('#contenu_exercice_livres').html(data);

        }
    })

}

function afficherexercicevideo() {
    let open_exercice = 2;
    let open_exercice_video = 2;
    let langue = $('#langue').val();


    $.ajax({
        url: "controller/contrFormation.php",
        method: "POST",
        data: {
            open_exercice: open_exercice,
            open_exercice_video: open_exercice_video,
            langue: langue

        },
        success: function (data) {
            $('#contenu_exercice_video').html(data);

        }
    })

}

function afficherexerciceaudio() {
    let open_exercice = 2;
    let open_exercice_audio = 3;
    let langue = $('#langue').val();


    $.ajax({
        url: "controller/contrFormation.php",
        method: "POST",
        data: {
            open_exercice: open_exercice,
            open_exercice_audio: open_exercice_audio,
            langue: langue

        },
        success: function (data) {
            $('#contenu_exercice_audio').html(data);

        }
    })

}

//CORRIGE
function affichercorrigelivres() {
    let open_corrige = 3;
    let open_corrige_livres = 1;
    let langue = $('#langue').val();


    $.ajax({
        url: "controller/contrFormation.php",
        method: "POST",
        data: {
            open_corrige: open_corrige,
            open_corrige_livres: open_corrige_livres,
            langue: langue
        },
        success: function (data) {
            $('#contenu_corrige_livres').html(data);

        }
    })

}


//MATIERE
afficherMatiere();

function afficherMatiere() {
    let listmat = '';
    $.ajax({
        url: "controller/contrFormation.php",
        method: "POST",
        data: {
            listmat: listmat
        },
        success: function (data) {
            $('#listmatiere').html(data);
        }
    })



}

//update last activity etudiant
update_last_activity();

function update_last_activity() {
    var update_last_activity = "update_last_activity";
    $.ajax({
        url: "controller/contrStatus.php",
        method: "POST",
        data: { update_last_activity: update_last_activity },
        success: function (data) {
            
        }
    });
}