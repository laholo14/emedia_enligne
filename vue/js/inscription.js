$(document).ready(function() {
    readfiliere();
    // readParcours();
    //setInterval(readfiliere, 1000);
    // setInterval(readParcours, 1000);
});

$(document).on("keyup", "#gmail", function(e) {

    if (e.key == "Enter" || e.key == "Control") {
        e.preventDefault();
    } else {
        let emailRegex = /^[a-zA-Z0-9.\-]{1,50}@gmail.com$/;
        if (emailRegex.test($(this).val())) {
            $('#mail_error').fadeOut();
            $("#check").removeAttr('disabled');
        } else {
            $('#mail_error').fadeIn();
            $('#check').attr("disabled", "true");
            $('#submit').attr("disabled", "true");
            $("#check").removeAttr('checked');
        }
    }
});

$(document).on("keyup", "#num1", function(e) {

    if (e.key == "Enter" || e.key == "Control") {
        e.preventDefault();
    } else {
        let numRegex = /^[0-9\-]{1,20}$/;
        if (numRegex.test($(this).val())) {
            $('#num_error').fadeOut();

        } else {
            $('#num_error').fadeIn();

        }
    }
});




readfiliere();

function readfiliere() {
    let obtenir = $('#obtenir').val();

    if (obtenir != 'choix') {

        $.ajax({
            url: "vue/filiere.php", //Controller
            method: "POST",
            data: {
                obtenir: obtenir
            }, //valeur alefa
            success: function(data) {
                $("#filiere").html(data);

            }
        });

    } else {

        $("#filiere").html('<option>...</option>');

    }
}

$(document).on("change", "#obtenir", function(e) {
    readfiliere();

});

readParcours();

function readParcours() {

    let filiere = $('#filiere').val();

    if (filiere != '...') {

        $.ajax({
            url: "vue/filiere.php", //Controller
            method: "POST",
            data: {
                filiere: filiere
            }, //valeur alefa
            success: function(data) {
                $("#parcours").html(data);
                $("#parcours2").html(data);

            }
        });

    } else {

        $("#parcours").html('<option>...</option>');
        $("#parcours2").html('<option>...</option>');

    }
}

$(document).on("change", "#filiere", function(e) {

    readParcours();

});