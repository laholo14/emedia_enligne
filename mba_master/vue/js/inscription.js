$(document).ready(function () {
    listeEtudiant();
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
});