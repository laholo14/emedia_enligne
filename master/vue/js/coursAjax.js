$(document).ready(function () {
    selectEC();
    selectUE();
    
    function ajoutUE() {
        if ($("#text_ue").val() != "") {
            $.ajax({
                url: "../../mba_master/controller/controllerAjoutUE.php",
                type: "POST",
                data: {
                    text_ue: $("#text_ue").val()
                },
                success: function (data) {
                    alert(data);
                }
            })
        } else {
            alert("fenoy aloha");
        }
    }

    $("#btn_ajout_ue").click(function (e) {

        e.preventDefault();
        ajoutUE();
        selectUE();

    });

    function selectUE() {
        $.ajax({
            url: "../../mba_master/controller/controllerSelectUE.php",
            type: "POST",
            data: {
                select_ue: ""
            },
            success: function (data) {
                $("#select_ue").html(data);
            }
        })
    }
    function selectEC() {
        $.ajax({
            url: "../../mba_master/controller/controllerSelectEC.php",
            type: "POST",
            data: {
                select_ec: "master"
            },
            success: function (data) {
                $("#select_ec").html(data);
            }
        })
    }

    function ajoutEC() {
        if ($("#text_ec").val() != "" & $("#text_credit").val() != "") {
            $.ajax({
                url: "../../mba_master/controller/controllerAjoutEC.php",
                type: "POST",
                data: {
                    select_ue: $("#select_ue").val(),
                    text_ec: $("#text_ec").val(),
                    semestre: $("#select_semestre").val(),
                    mois: $("#select_mois").val(),
                    credit: $("#text_credit").val(),
                    parcours: $("#parcours").val()
                },
                success: function (data) {
                    alert(data);
                }
            })
        } else {
            alert("fenoy aloha");
        }
    }


    $("#btn_ajout_ec").click(function (e) {

        e.preventDefault();
        ajoutEC();
        selectEC()

    });

    $("#ajout_dossier").submit(function(e){
          e.preventDefault();
          $.ajax({
            url: "../../mba_master/controller/controllerAjoutDossier.php",
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                alert(data);
            }
        });
        
    });
 
});

