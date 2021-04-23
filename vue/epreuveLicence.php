<?php

ob_start();

session_start();

include("../controller/contrEnterEpreuveLicence.php");

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="vue/css/epreuve.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="vue/font-awesome/css/all.css" type="text/css">
    <link rel="icon" href="vue/image/logo E-media copie.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="vue/js/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vue/css/loading.css" type="text/css" />
    <title>Salle d'examen</title>
</head>

<body>

    <?php

    if ($id_type_exam == 2) {

        include("redactionLicence.php");
        
    } else if ($id_type_exam == 3) {

        include("qcmLicence.php");

    }else if($id_type_exam == 1){

        include("uploadLicence.php");
    }


    ?>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script><script src="vue/js/jquery.countdown.min.js"></script>
<script src="vue/js/epreuve.js "></script>
<script src="vue/js/countdown.js "></script>
<script src="vue/js/Myji.js "></script>
<script src="vue/js/disable.js "></script>


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

<script>

$(document).ready(function() {
     
});

$(document).on("click","#afficher",function(e){
    let sujet = $("#sujet").val();
    e.preventDefault();
    $('#table_sujet').attr('src', 'https://docs.google.com/viewer?url=https://e-media-madagascar.com/universite/Exam/' + sujet + '&embedded=true');
    
});

$(document).on("click","#fermer",function(e){
   
    e.preventDefault();
    $('#table_sujet').attr('src', '');
    
});

</script>
</html>


<?php

ob_end_flush();

?>