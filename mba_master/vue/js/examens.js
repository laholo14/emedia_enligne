$(document).ready(function () {


    $("#formAjoutExamMensuel").submit(function (e) {
        e.preventDefault();
        let action = $("#formAjoutExamMensuel").attr("action");
        $.ajax({
            url: action,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                alert(data);
            }
        })
    });

});

