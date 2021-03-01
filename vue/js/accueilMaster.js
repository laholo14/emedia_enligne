$(document).ready(function () {
    //function acces contenu video
    function acceContenuVideo() {
        $("#contenu-video").fadeIn(1200);
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $(".active-cours").removeClass("active")
        $(".active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-video").addClass("active");
    }

    //function acces contenu profil
    function acceContenuProfil() {
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeIn(1200);
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-video").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $(".active-cours").removeClass("active")
        $(".active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-profil").addClass("active");
    }

    //function acces contenu calendier
    function acceCotenuCalendrier() {
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeIn(1200);
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-video").removeClass("active")
        $(".active-cours").removeClass("active")
        $(".active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-calendrier").addClass("active");
    }

    //functio acces contenu cours
    function acceContenuCours() {
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeIn(1200);
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $("#active-video").removeClass("active")
        $(".active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $(".active-cours").addClass("active");
    }

    //function acces contenu exercice
    function acceContenuExercice() {
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeIn(1200);
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $(".active-cours").removeClass("active")
        $("#active-video").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $(".active-exercice").addClass("active");
    }

    //function acces contenu chat
    function acceContenuChat() {
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeIn(1200);
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $(".active-cours").removeClass("active")
        $(".active-exercice").removeClass("active")
        $("#active-video").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-chat").addClass("active");
    }

    //function acces contenu contact
    function acceContenuContact() {
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeIn(1200);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $(".active-cours").removeClass("active")
        $(".active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-video").removeClass("active")
        $("#active-contact").addClass("active");
    }
    
    //preloading
    $("#preloading").delay(3000).fadeOut("slow");
    $("#universite-Emedia").delay(3100).fadeIn("slow");
    $("#releveNote").delay(3100).fadeIn("slow");

    //afficher notification
    $("#active-notification").click(function () {
        $("#contenu-notification").modal({
            fadeDuration: 100
        }); 
    });

    //details examen
    $("#btn-details-examen").click(function () {
        $("#contenu-examen").modal({
            fadeDuration: 100
        }); 
    });

    //afficher contenu-video
    $("#active-video").click(function() {
        acceContenuVideo();
    });

    //afficher contenu-profil
    $("#active-profil").click(function() {
        acceContenuProfil();
    });

    //afficher contenu-calendrier
    $("#active-calendrier").click(function(){
        acceCotenuCalendrier();
    });

    //afficher contenu-cours
    $(".active-cours").click(function(){
        acceContenuCours();
    });

    //afficher contenu-exercice
    $(".active-exercice").click(function(){
        acceContenuExercice();
    });

    //afficher contenu-chat
    $("#active-chat").click(function(){
        acceContenuChat();
    });

    //afficher contenu-contact
    $("#active-contact").click(function(){
        acceContenuContact();
    });

    //active select semestre
    $("#semestre-button").click(function(){
        $("#semestre-content").fadeToggle();
    });

    $("#semestre1").click(function(){
        $("#semestre-content").fadeToggle();
    });

    $("#semestre2").click(function(){
        $("#semestre-content").fadeToggle();
    });

    //active-cours 
    $(".active-cours-pdf").click(function () {
        $("#contenu").fadeOut(1000);
        $("#dashboard").fadeOut(1000);
        $("#contenu-cours-pdf").fadeIn(1200);
    });

    $(".active-cours-explication").click(function () {
        $("#contenu-cours-explication").modal({
            fadeDuration: 100
        }); 
    });

    $("#exit-cours-explication").click(function () {
        $("#contenu-cours-explication").fadeOut(1000);
        $("#contenu-cours").fadeIn();
        $("#contenu").fadeIn("slow");
        $("#contenu").fadeIn(1200);
    });

    $("#exit-cours-pdf").click(function () {
        $("#contenu-cours-pdf").fadeOut(1000);
        $("#contenu").fadeIn(1200);
        $("#dashboard").fadeIn(1200);
    });

    //active-exercice
    $(".active-exercice-pdf").click(function(){
        $("#contenu").fadeOut(1000);
        $("#contenu-exercice-pdf").fadeIn(1200);
        $("#dashboard").fadeOut(1000);
    });

    $(".active-exercice-explication").click(function () {
        $("#contenu-exercice-explication").modal({
            fadeDuration: 100
        }); 
    });

    $(".active-exercice-corrige").click(function(){
        $("#contenu").fadeOut(1000);
        $("#dashboard").fadeOut(1000);
        $("#contenu-exercice-corrige").fadeIn(1200);
    });

    $("#exit-exercice-explication").click(function(){
        $("#contenu-exercice").fadeIn(1200);
        $("#contenu-exercice-explication").fadeOut(1000);
    });

    $("#exit-exercice-pdf").click(function(){
        $("#contenu").fadeIn(1200);
        $("#dashboard").fadeIn(1200);
        $("#contenu-exercice-pdf").fadeOut(1000);
    });

    $("#exit-exercice-corrige").click(function(){
        $("#contenu").fadeIn(1200);
        $("#dashboard").fadeIn(1200);
        $("#contenu-exercice-corrige").fadeOut(1000);
    });

    //active dashboard
    $("#fa-bars").click(function() {
        $("#dashboard").css({"left": "0"});
        $("#fa-bars").fadeOut(200);
        $("#fa-times").fadeIn(500);
    });

    //desactive dashboard
    function desactiveDashboard() {
        $("#dashboard").css({"left": "-100rem"});
        $("#fa-bars").fadeIn(500);
        $("#fa-times").fadeOut(200);
    }

    $("#fa-times").click(function() {
        desactiveDashboard();
    });

    //mobile version 
    let largeurEcran = $(window).width();

    if (largeurEcran <= 991) {
        $("#active-video").click(function () {
            desactiveDashboard();
        });

        $("#active-profil").click(function () {
            desactiveDashboard();
        });

        $("#active-calendrier").click(function () {
            desactiveDashboard();
        });

        $("#active-calendrier").click(function () {
            desactiveDashboard();
        });

        $(".active-cours").click(function () {
            desactiveDashboard();
        });

        $(".active-exercice").click(function () {
            desactiveDashboard();
        });

        $("#active-chat").click(function () {
            desactiveDashboard();
        });

        $("#active-contact").click(function () {
            desactiveDashboard();
        });
    }
});

