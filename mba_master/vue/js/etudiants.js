$(document).ready(function () {


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


    $(".btnajoutdate").click(function (e) {

        e.preventDefault();
        let id =$("#idvaluedaty").val();
        $.ajax(({
            url: "../controller/controllerAjoutDate.php",
            type: "POST",
            data: {
                iddaty: $("#iddaty").val(),
                datyvalue: $("#"+id+"").val()
            },
            success: function (data) {
                alert(data);
                location.reload();
            }
        }))
  

    });

});


function GetIDDATY(iddaty,daty) {
    $("#iddaty").val(iddaty);
    $("#idvaluedaty").val(daty);



}




