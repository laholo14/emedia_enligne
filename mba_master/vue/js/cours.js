$(document).ready(function () {

    function ajoutUE() {
        if ($("#text_ue").val() != "") {
            $.ajax({
                url: "../controller/controllerAjoutUE.php",
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

    });


    

});





