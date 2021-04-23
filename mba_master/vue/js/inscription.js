$(document).ready(function () {
    listeEtudiant();
    listVague();
 
    function listeEtudiant() {
        $.ajax({
            url: "../controller/controllerListeNouveauxInscri.php",
            type: "POST",
            data: {
                liste: ""
            },
            success: function (data) {
                $("#section_list_etudiant").html(data);
            }
        })

    }

    $("body").mousemove(function (e) {
        listeEtudiant();
    })

    function listVague() {
        $.ajax({
            url: "../controller/controllerListVague.php",
            type: "POST",
            data: {
                vague: ""
            },
            success: function (data) {
                $("#vague").html(data);

            }
        })
    }

   
    function Valider() {
        $.ajax({
            url: "../controller/controllerValider.php",
            type: "POST",
            data: {
                semestre: $("#semestre").val(),
                vague: $("#vague").val(),
                numero: $("#numero").val(),
                idetudiant: $("#id_etu").val()
            },
            success: function (data) {
                alert(data)
            }
        })
    }

    $("#valider").click(function (e) {
        e.preventDefault();
        Valider();
    })

});

function GetIDE(ide) {
    $("#id_etu").val(ide);
}