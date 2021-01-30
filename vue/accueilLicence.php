<?php

ob_start();


session_start();

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}

include("../controller/contrIEM.php");

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="vue/css/accueil.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="vue/font-awesome/css/all.css" type="text/css">
    <link rel="icon" href="vue/image/logo E-media copie.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="vue/js/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vue/css/loading.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Accueil</title>
</head>

<body>


    <?php

    if ($_SESSION['testInclude']  == 1) {

        include("rentrer.php");
    } else if ($_SESSION['testInclude']  == 0) {

        include("plateforme.php");
    }



    ?>







    <script src="vue/js/jquery-3.3.1.slim.min.js"></script>
    <script src="vue/js/popper.js"></script>
    <script src="vue/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="vue/js/jquery.min.js"></script>
    <script src="vue/js/owl.carousel/owl.carousel.min.js "></script>
    <script src="vue/js/jquery.countdown.min.js"></script>
    <script src="vue/js/accueil.js "></script>
    <script src="vue/js/mp3.js "></script>
    <script src="vue/js/countdownCountExam.js"></script>
    <script src="vue/js/countdownCountEcolage.js"></script>
    <script src="vue/js/disable.js "></script>
</body>

<script>
    $(document).ready(function() {

        $(".sidebar_menu li ").click(function() {
            $(".sidebar_menu li ").removeClass("active ");
            $(this).addClass("active ");
        });
        $(".hamburger ").click(function() {
            $(".wrapper ").addClass("active ");
        });
        $(".closse, .bg_shadow ").click(function() {
            $(".wrapper ").removeClass("active ");
        });

        $(".clr, .bg_shadow ").click(function() {
            $(".wrapper ").removeClass("active ");
        });




    });
    $(document).ready(function() {

        let profile = document.getElementById('profile-blocs'),
            openProfile = document.getElementById('open_profile');

        openProfile.addEventListener('click', function() {
            profile.style.display = "block";

            cours.style.display = "none";
            exercice.style.display = "none";
            message.style.display = "none";


            examen.style.display = "none";
        });




        /*  
                let programme = document.getElementById('programme_blocs'),
                    openProgramme = document.getElementById('open_programme');
                
                openProgramme.addEventListener('click', function() {
                    programme.style.display = "block";
                    profile.style.display = "none";
                    cours.style.display = "none";
                    exercice.style.display = "none";
                    message.style.display = "none";
                   
                    
                    examen.style.display = "none";
                });*/

        let cours = document.getElementById('cours_blocs'),
            openCours = document.getElementById('open_cours');

        openCours.addEventListener('click', function() {
            cours.style.display = "block";
            profile.style.display = "none";

            exercice.style.display = "none";
            message.style.display = "none";


            examen.style.display = "none";
        });



        let exercice = document.getElementById('exercice-blocs'),
            openExo = document.getElementById('open_exo');

        openExo.addEventListener('click', function() {
            cours.style.display = "none";
            exercice.style.display = "block";
            profile.style.display = "none";

            message.style.display = "none";


            examen.style.display = "none";
        });



        let message = document.getElementById('message-blocs'),
            openMessage = document.getElementById('open_message');

        openMessage.addEventListener('click', function() {
            cours.style.display = "none";
            message.style.display = "block";
            profile.style.display = "none";

            exercice.style.display = "none";


            examen.style.display = "none";
        });






        let examen = document.getElementById('EXAMEN'),
            openExamen = document.getElementById('open_examen');

        openExamen.addEventListener('click', function() {
            cours.style.display = "none";
            message.style.display = "none";
            profile.style.display = "none";

            exercice.style.display = "none";


            examen.style.display = "block";

        });




        // let encien = $("#button_encien").val();
        // let button_licence = document.getElementById('open_licence');
        // cour_encien();

        // function cour_encien() {
        //     if (encien != "S1" && encien != "S7") {
        //         button_licence.style.display = "block"
        //     }
        // }
        let notif_message = document.getElementById('message_notif'),
            notif_notif = document.getElementById('notif_notif');



    });
</script>
<script>
    //edit this message to say what you want
    let message = "Clic droite désactiver";

    function clickIE() {
        if (document.all) {
            //alert(message);
            return false;
        }
    }

    function clickNS(e) {
        if (document.layers || (document.getElementById && !document.all)) {
            if (e.which == 2 || e.which == 3) {
                //alert(message);
                return false;
            }
        }
    }
    if (document.layers) {
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown = clickNS;
    } else {
        document.onmouseup = clickNS;
        document.oncontextmenu = clickIE;
    }
    document.oncontextmenu = new Function("return false");
    //-->
</script>

<script>
    //loading
    document.getElementById("pdf").onload = function() {

        document.getElementById("loading").style.opacity = '0';
        //alert('nety');

    };
</script>

<script>
    //forum
    $(document).ready(function() {
        setInterval(function() {
            load_comment();
        }, 5000);
    });

    $(document).on("click", "#submit", function(e) {
        e.preventDefault();
        let comment_content = $("#comment_content").val();
        let comment_id = $("#comment_id").val();

        if (comment_content != '') {

            $.ajax({
                url: "Controller/contrForum.php", //Controller
                method: "POST",
                data: {
                    comment_content: comment_content,
                    comment_id: comment_id
                }, //valeur alefa
                //dataType: "json",
                success: function(data) {
                    $('#comment_form')[0].reset();
                    load_comment();
                    alert('lala');
                }
            });

        } else {
            alert("Commentaire obligatoire");
        }

    });


    load_comment();

    function load_comment() {
        $.ajax({
            url: "Controller/contrForum.php",
            method: "POST",
            success: function(data) {
                $('#display_comment').html(data);
            }
        })
    }

    $(document).on('click', '.reply', function() {
        let reply_id_comment = $(this).attr("id");
        $('#comment_id').val(reply_id_comment);
        $('#comment_content').focus();
    });
</script>

<!-- google analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166112055-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-166112055-1');
</script>




</html>

<?php

ob_end_flush();

?>