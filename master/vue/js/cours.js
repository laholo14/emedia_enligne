$(document).ready(function () {
    $("#video").hide();
    $("#file").hide();
    $("#format").change(function (e) {
        if ($("#format").val() == "1") {
            $("#video").hide();
            $("#file").show();
        } else {
            $("#video").show();
            $("#file").hide();
        }
    })


});