//preloading
$(document).ready(function() {
    $("#preloading").delay(3000).fadeOut("slow");
    $("#universite-Emedia").delay(3100).fadeIn("slow");

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
        $("#contenu-video").fadeIn();
        $("#contenu-video").fadeIn("slow");
        $("#contenu-video").fadeIn(1200);
        $("#contenu-profil").fadeOut();
        $("#contenu-profil").fadeOut("slow");
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut();
        $("#contenu-note").fadeOut("slow");
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut();
        $("#contenu-calendrier").fadeOut("slow");
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut();
        $("#contenu-cours").fadeOut("slow");
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut();
        $("#contenu-exercice").fadeOut("slow");
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut();
        $("#contenu-chat").fadeOut("slow");
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut();
        $("#contenu-contact").fadeOut("slow");
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $("#active-cours").removeClass("active")
        $("#active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-video").addClass("active");
    });

    //afficher contenu-profil
    $("#active-profil").click(function() {
        $("#contenu-video").fadeOut();
        $("#contenu-video").fadeOut("slow");
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeIn();
        $("#contenu-profil").fadeIn("slow");
        $("#contenu-profil").fadeIn(1200);
        $("#contenu-note").fadeOut();
        $("#contenu-note").fadeOut("slow");
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut();
        $("#contenu-calendrier").fadeOut("slow");
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut();
        $("#contenu-cours").fadeOut("slow");
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut();
        $("#contenu-exercice").fadeOut("slow");
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut();
        $("#contenu-chat").fadeOut("slow");
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut();
        $("#contenu-contact").fadeOut("slow");
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-video").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $("#active-cours").removeClass("active")
        $("#active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-profil").addClass("active");
    });

    //afficher contenu-note
    $("#active-note").click(function() {
        $("#contenu-video").fadeOut();
        $("#contenu-video").fadeOut("slow");
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut();
        $("#contenu-profil").fadeOut("slow");
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeIn();
        $("#contenu-note").fadeIn("slow");
        $("#contenu-note").fadeIn(1200);
        $("#contenu-calendrier").fadeOut();
        $("#contenu-calendrier").fadeOut("slow");
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut();
        $("#contenu-cours").fadeOut("slow");
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut();
        $("#contenu-exercice").fadeOut("slow");
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut();
        $("#contenu-chat").fadeOut("slow");
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut();
        $("#contenu-contact").fadeOut("slow");
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-video").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $("#active-cours").removeClass("active")
        $("#active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-note").addClass("active");
    });

    //afficher contenu-calendrier
    $("#active-calendrier").click(function(){
        $("#contenu-video").fadeOut();
        $("#contenu-video").fadeOut("slow");
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut();
        $("#contenu-profil").fadeOut("slow");
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut();
        $("#contenu-note").fadeOut("slow");
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeIn();
        $("#contenu-calendrier").fadeIn("slow");
        $("#contenu-calendrier").fadeIn(1200);
        $("#contenu-cours").fadeOut();
        $("#contenu-cours").fadeOut("slow");
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut();
        $("#contenu-exercice").fadeOut("slow");
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut();
        $("#contenu-chat").fadeOut("slow");
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut();
        $("#contenu-contact").fadeOut("slow");
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-video").removeClass("active")
        $("#active-cours").removeClass("active")
        $("#active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-calendrier").addClass("active");
    });

    //afficher contenu-cours
    $("#active-cours").click(function(){
        $("#contenu-video").fadeOut();
        $("#contenu-video").fadeOut("slow");
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut();
        $("#contenu-profil").fadeOut("slow");
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut();
        $("#contenu-note").fadeOut("slow");
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut();
        $("#contenu-calendrier").fadeOut("slow");
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeIn();
        $("#contenu-cours").fadeIn("slow");
        $("#contenu-cours").fadeIn(1200);
        $("#contenu-exercice").fadeOut();
        $("#contenu-exercice").fadeOut("slow");
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut();
        $("#contenu-chat").fadeOut("slow");
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut();
        $("#contenu-contact").fadeOut("slow");
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $("#active-video").removeClass("active")
        $("#active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-cours").addClass("active");
    });

    //afficher contenu-exercice
    $("#active-exercice").click(function(){
        $("#contenu-video").fadeOut();
        $("#contenu-video").fadeOut("slow");
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut();
        $("#contenu-profil").fadeOut("slow");
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut();
        $("#contenu-note").fadeOut("slow");
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut();
        $("#contenu-calendrier").fadeOut("slow");
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut();
        $("#contenu-cours").fadeOut("slow");
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeIn();
        $("#contenu-exercice").fadeIn("slow");
        $("#contenu-exercice").fadeIn(1200);
        $("#contenu-chat").fadeOut();
        $("#contenu-chat").fadeOut("slow");
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeOut();
        $("#contenu-contact").fadeOut("slow");
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $("#active-cours").removeClass("active")
        $("#active-video").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-exercice").addClass("active");
    });

    //afficher contenu-chat
    $("#active-chat").click(function(){
        $("#contenu-video").fadeOut();
        $("#contenu-video").fadeOut("slow");
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut();
        $("#contenu-profil").fadeOut("slow");
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut();
        $("#contenu-note").fadeOut("slow");
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut();
        $("#contenu-calendrier").fadeOut("slow");
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut();
        $("#contenu-cours").fadeOut("slow");
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut();
        $("#contenu-exercice").fadeOut("slow");
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeIn();
        $("#contenu-chat").fadeIn("slow");
        $("#contenu-chat").fadeIn(1200);
        $("#contenu-contact").fadeOut();
        $("#contenu-contact").fadeOut("slow");
        $("#contenu-contact").fadeOut(1000);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $("#active-cours").removeClass("active")
        $("#active-exercice").removeClass("active")
        $("#active-video").removeClass("active")
        $("#active-contact").removeClass("active")
        $("#active-chat").addClass("active");
    });

    //afficher contenu-contact
    $("#active-contact").click(function(){
        $("#contenu-video").fadeOut();
        $("#contenu-video").fadeOut("slow");
        $("#contenu-video").fadeOut(1000);
        $("#contenu-profil").fadeOut();
        $("#contenu-profil").fadeOut("slow");
        $("#contenu-profil").fadeOut(1000);
        $("#contenu-note").fadeOut();
        $("#contenu-note").fadeOut("slow");
        $("#contenu-note").fadeOut(1000);
        $("#contenu-calendrier").fadeOut();
        $("#contenu-calendrier").fadeOut("slow");
        $("#contenu-calendrier").fadeOut(1000);
        $("#contenu-cours").fadeOut();
        $("#contenu-cours").fadeOut("slow");
        $("#contenu-cours").fadeOut(1000);
        $("#contenu-exercice").fadeOut();
        $("#contenu-exercice").fadeOut("slow");
        $("#contenu-exercice").fadeOut(1000);
        $("#contenu-chat").fadeOut();
        $("#contenu-chat").fadeOut("slow");
        $("#contenu-chat").fadeOut(1000);
        $("#contenu-contact").fadeIn();
        $("#contenu-contact").fadeIn("slow");
        $("#contenu-contact").fadeIn(1200);

        //ajout class active
        $("#active-profil").removeClass("active")
        $("#active-note").removeClass("active")
        $("#active-calendrier").removeClass("active")
        $("#active-cours").removeClass("active")
        $("#active-exercice").removeClass("active")
        $("#active-chat").removeClass("active")
        $("#active-video").removeClass("active")
        $("#active-contact").addClass("active");
    });

    //active langue
    $("#langue-button").click(function(){
        $("#langue-content").fadeToggle();
    });

    $("#francais").click(function(){
        $("#langue-content").fadeToggle();
    });

    $("#malagasy").click(function(){
        $("#langue-content").fadeToggle();
    });

    //active langue
    $("#semestre-button").click(function(){
        $("#semestre-content").fadeToggle();
    });

    $("#semestre1").click(function(){
        $("#semestre-content").fadeToggle();
    });

    $("#semestre2").click(function(){
        $("#semestre-content").fadeToggle();
    });

    //rotate fa-angle-down profil
    $(".active-profil").click(function(){
      $(".active-profil").addclass("desactive-profil");
    });

    //active-cours 
    $("#active-cours-pdf").click(function () {
        $("#contenu").fadeOut();
        $("#contenu").fadeOut("slow");
        $("#contenu").fadeOut(1000);
        $("#dashboard").fadeOut();
        $("#dashboard").fadeOut("slow");
        $("#dashboard").fadeOut(1000);
        $("#contenu-cours-pdf").fadeIn();
        $("#contenu-cours-pdf").fadeIn("slow");
        $("#contenu-cours-pdf").fadeIn(1200);
    });

    $("#active-cours-explication").click(function () {
        $("#contenu-cours-explication").modal({
            fadeDuration: 100
        }); 
    });

    $("#exit-cours-explication").click(function () {
        $("#contenu-cours-explication").fadeOut();
        $("#contenu-cours-explication").fadeOut("slow");
        $("#contenu-cours-explication").fadeOut(1000);
        $("#contenu-cours").fadeIn();
        $("#contenu").fadeIn("slow");
        $("#contenu").fadeIn(1200);
    });

    $("#exit-cours-pdf").click(function () {
        $("#contenu-cours-pdf").fadeOut();
        $("#contenu-cours-pdf").fadeOut("slow");
        $("#contenu-cours-pdf").fadeOut(1000);
        $("#contenu").fadeIn();
        $("#contenu").fadeIn("slow");
        $("#contenu").fadeIn(1200);
        $("#dashboard").fadeIn();
        $("#dashboard").fadeIn("slow");
        $("#dashboard").fadeIn(1200);
    });

    //active-exercice
    $("#active-exercice-pdf").click(function(){
        $("#contenu").fadeOut();
        $("#contenu").fadeOut("slow");
        $("#contenu").fadeOut(1000);
        $("#contenu-exercice-pdf").fadeIn();
        $("#contenu-exercice-pdf").fadeIn("slow");
        $("#contenu-exercice-pdf").fadeIn(1200);
        $("#dashboard").fadeOut();
        $("#dashboard").fadeOut("slow");
        $("#dashboard").fadeOut(1000);
    });

    $("#active-exercice-explication").click(function () {
        $("#contenu-exercice-explication").modal({
            fadeDuration: 100
        }); 
    });

    $("#active-exercice-corrige").click(function(){
        $("#contenu").fadeOut();
        $("#contenu").fadeOut("slow");
        $("#contenu").fadeOut(1000);
        $("#dashboard").fadeOut();
        $("#dashboard").fadeOut("slow");
        $("#dashboard").fadeOut(1000);
        $("#contenu-exercice-corrige").fadeIn();
        $("#contenu-exercice-corrige").fadeIn("slow");
        $("#contenu-exercice-corrige").fadeIn(1200);
    });

    $("#exit-exercice-explication").click(function(){
        $("#contenu-exercice").fadeIn();
        $("#contenu-exercice").fadeIn("slow");
        $("#contenu-exercice").fadeIn(1200);
        $("#contenu-exercice-explication").fadeOut();
        $("#contenu-exercice-explication").fadeOut("slow");
        $("#contenu-exercice-explication").fadeOut(1000);
    });

    $("#exit-exercice-pdf").click(function(){
        $("#contenu").fadeIn();
        $("#contenu").fadeIn("slow");
        $("#contenu").fadeIn(1200);
        $("#dashboard").fadeIn();
        $("#dashboard").fadeIn("slow");
        $("#dashboard").fadeIn(1200);
        $("#contenu-exercice-pdf").fadeOut();
        $("#contenu-exercice-pdf").fadeOut("slow");
        $("#contenu-exercice-pdf").fadeOut(1000);
    });

    $("#exit-exercice-corrige").click(function(){
       $("#contenu").fadeIn();
        $("#contenu").fadeIn("slow");
        $("#contenu").fadeIn(1200);
        $("#dashboard").fadeIn();
        $("#dashboard").fadeIn("slow");
        $("#dashboard").fadeIn(1200);
        $("#contenu-exercice-corrige").fadeOut();
        $("#contenu-exercice-corrige").fadeOut("slow");
        $("#contenu-exercice-corrige").fadeOut(1000);
    });

    //active dashboard
    $("#fa-bars").click(function() {
        $("#dashboard").css({"left": "0"});
        $("#fa-bars").fadeOut();
        $("#fa-bars").fadeOut("slow");
        $("#fa-bars").fadeOut(200);
        $("#fa-times").fadeIn();
        $("#fa-times").fadeIn("slow");
        $("#fa-times").fadeIn(500);
    });

    $("#fa-times").click(function() {
        $("#dashboard").css({"left": "-100rem"});
        $("#fa-bars").fadeIn();
        $("#fa-bars").fadeIn("slow");
        $("#fa-bars").fadeIn(500);
        $("#fa-times").fadeOut();
        $("#fa-times").fadeOut("slow");
        $("#fa-times").fadeOut(200);
    });

    //mobile version 
    var largeurEcran = $(window).width();

    if (largeurEcran <= 991) {
        $("#active-video").click(function () {
            $("#dashboard").css({ "left": "-100rem" });
            $("#fa-bars").fadeIn();
            $("#fa-bars").fadeIn("slow");
            $("#fa-bars").fadeIn(500);
            $("#fa-times").fadeOut();
            $("#fa-times").fadeOut("slow");
            $("#fa-times").fadeOut(200);
        });

        $("#active-profil").click(function () {
            $("#dashboard").css({ "left": "-100rem" });
            $("#fa-bars").fadeIn();
            $("#fa-bars").fadeIn("slow");
            $("#fa-bars").fadeIn(500);
            $("#fa-times").fadeOut();
            $("#fa-times").fadeOut("slow");
            $("#fa-times").fadeOut(200);
        });

        $("#active-note").click(function () {
            $("#dashboard").css({ "left": "-100rem" });
            $("#fa-bars").fadeIn();
            $("#fa-bars").fadeIn("slow");
            $("#fa-bars").fadeIn(500);
            $("#fa-times").fadeOut();
            $("#fa-times").fadeOut("slow");
            $("#fa-times").fadeOut(200);
        });

        $("#active-calendrier").click(function () {
            $("#dashboard").css({ "left": "-100rem" });
            $("#fa-bars").fadeIn();
            $("#fa-bars").fadeIn("slow");
            $("#fa-bars").fadeIn(500);
            $("#fa-times").fadeOut();
            $("#fa-times").fadeOut("slow");
            $("#fa-times").fadeOut(200);
        });

        $("#active-calendrier").click(function () {
            $("#dashboard").css({ "left": "-100rem" });
            $("#fa-bars").fadeIn();
            $("#fa-bars").fadeIn("slow");
            $("#fa-bars").fadeIn(500);
            $("#fa-times").fadeOut();
            $("#fa-times").fadeOut("slow");
            $("#fa-times").fadeOut(200);
        });

        $("#active-cours").click(function () {
            $("#dashboard").css({ "left": "-100rem" });
            $("#fa-bars").fadeIn();
            $("#fa-bars").fadeIn("slow");
            $("#fa-bars").fadeIn(500);
            $("#fa-times").fadeOut();
            $("#fa-times").fadeOut("slow");
            $("#fa-times").fadeOut(200);
        });

        $("#active-exercice").click(function () {
            $("#dashboard").css({ "left": "-100rem" });
            $("#fa-bars").fadeIn();
            $("#fa-bars").fadeIn("slow");
            $("#fa-bars").fadeIn(500);
            $("#fa-times").fadeOut();
            $("#fa-times").fadeOut("slow");
            $("#fa-times").fadeOut(200);
        });

        $("#active-chat").click(function () {
            $("#dashboard").css({ "left": "-100rem" });
            $("#fa-bars").fadeIn();
            $("#fa-bars").fadeIn("slow");
            $("#fa-bars").fadeIn(500);
            $("#fa-times").fadeOut();
            $("#fa-times").fadeOut("slow");
            $("#fa-times").fadeOut(200);
        });

        $("#active-contact").click(function () {
            $("#dashboard").css({ "left": "-100rem" });
            $("#fa-bars").fadeIn();
            $("#fa-bars").fadeIn("slow");
            $("#fa-bars").fadeIn(500);
            $("#fa-times").fadeOut();
            $("#fa-times").fadeOut("slow");
            $("#fa-times").fadeOut(200);
        });
    }
});

