$(document).ready(function () {

    listVaguedate();

    function ajoutVague() {
        if ($("#ajout_vague").val() != "") {
            $.ajax({
                url: "../controller/controllerAjoutVague.php",
                type: "POST",
                data: {
                    vague: $("#ajout_vague").val()
                },
                success: function (data) {
                    alert(data);
                }
            })
        } else {
            alert("fenoy aloha");
        }
    }

    $("#ajouter_vague").click(function (e) {

        e.preventDefault();
        ajoutVague();

    });

    function listVaguedate() {
        $.ajax({
            url: "../controller/controllerListVagueDate.php",
            type: "POST",
            data: {
                listVagueAcordion: ""
            },
            success: function (data) {
                $("#listVagueAccordion").html(data);
            }
        })
    }

    $("body").mousemove(function (e) {
        listVaguedate();
    })
});