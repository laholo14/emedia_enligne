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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="vue/css/accueil.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="vue/font-awesome/css/all.css" type="text/css">
    <link rel="icon" href="vue/image/logo E-media copie.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="vue/js/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vue/css/loading.css" type="text/css" />
    <link rel="stylesheet" href="vue/css/ancien.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Anciens Cours</title>
</head>

<body>





    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="cours-tabs overflow-auto p-3">
            <!--<span class="cours-titre"><i class="fa fa-mortar-board mr-2 mt-2"></i>COURS</span>-->
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item mr-5">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Explication</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!--tabs documents-->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="cours-doc overflow-auto" id="gradient">
                        <div class="row">
                            <!--eto ny contenu cours livres-->
                            <label for="contenu_cours_livres" class="titre">Cours</label>
                            <div class="col-12" id="contenu_cours_livres">

                            </div>
                            <label for="contenu_exo_livres" class="titre">Exercice</label>
                            <div class="col-12" id="contenu_exo_livres">

                            </div>
                            <label for="contenu_corrige_livres" style="text-transform:uppercase;" class="titre">CORRIGéS</label>
                            <div class="col-12" id="contenu_corrige_livres">

                            </div>
                        </div>

                    </div>

                </div>
                <!--tapitra tabs documents-->

                <!--tabs video-->

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="cours-video">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item mr-5">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#SousVideo" role="tab" aria-controls="home" aria-selected="true">Video</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="SousVideo" role="tabpanel" aria-labelledby="home-tab">
                                <!--explication video-->
                                <div class="explication_video overflow-auto">
                                    <div class="row" id="contenu_cours_video">

                                    </div>
                                </div>
                                <!--tapitra video-->
                            </div>
                        </div>


                    </div>
                </div>
                <!--tapitra tabs video-->

            </div>
        </div>
    </div>



    <div class="modal fade" id="pdfmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="titrepdf"></h5>
                    <button type="button" class="close" id="pdfmodalclose" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body" id="pdfload">
                    <div id="loading">

                        <svg id="loader" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" sodipodi:docname="Loader.svg" inkscape:version="1.0 (6e3e5246a0, 2020-05-07)" id="svg8" version="1.1" viewBox="0 0 297 92" height="92mm" width="297mm">
                            <defs id="defs2">
                                <linearGradient id="linearGradient24" inkscape:collect="always">
                                    <stop id="stop20" offset="0" style="stop-color:#0000d1;stop-opacity:1" />
                                    <stop style="stop-color:#2c2ae3;stop-opacity:1" offset="0.2490395" id="stop30" />
                                    <stop style="stop-color:#690e41;stop-opacity:0.89803922" offset="0.74368078" id="stop28" />
                                    <stop id="stop22" offset="1" style="stop-color:#6d001b;stop-opacity:0.98823529" />
                                </linearGradient>
                                <rect id="rect12" height="33.568283" width="117.24554" y="61.503849" x="67.447067" />
                                <linearGradient gradientUnits="userSpaceOnUse" y2="79.050186" x2="171.81123" y1="73.175713" x1="75.364067" id="linearGradient26" xlink:href="#linearGradient24" inkscape:collect="always" />
                            </defs>
                            <sodipodi:namedview inkscape:window-maximized="1" inkscape:window-y="34" inkscape:window-x="0" inkscape:window-height="781" inkscape:window-width="1600" height="209mm" showgrid="false" inkscape:document-rotation="0" inkscape:current-layer="text10" inkscape:document-units="mm" inkscape:cy="363.92656" inkscape:cx="840.4063" inkscape:zoom="0.7" inkscape:pageshadow="2" inkscape:pageopacity="0.0" borderopacity="1.0" bordercolor="#666666" pagecolor="#ffffff" id="base" />
                            <metadata id="metadata5">
                                <rdf:RDF>
                                    <cc:Work rdf:about="">
                                        <dc:format>image/svg+xml</dc:format>
                                        <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                        <dc:title></dc:title>
                                    </cc:Work>
                                </rdf:RDF>
                            </metadata>
                            <g id="layer1" inkscape:groupmode="layer" inkscape:label="Calque 1">
                                <g id="ground" style="font-size:25.4px;line-height:1.25;font-family:sans-serif;-inkscape-font-specification:'sans-serif, Normal';white-space:pre;fill:#11d13b05;fill-opacity:1" id="text10" transform="matrix(2.1121103,0,0,2.1121103,-106.13642,-112.61819)" aria-label="E-MEDIA">
                                    <path id="path857" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal" stroke-width="0.2" stroke="rgb(42, 45, 190)" d="M 69.530859,84.993945 V 67.010547 h 13.146485 v 2.108398 H 71.763281 v 5.692676 h 8.421191 v 2.108398 h -8.421191 v 5.965528 h 10.914063 v 2.108398 z" />
                                    <path id="path859" stroke-width="0.2" stroke="rgb(42, 45, 190)" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal" d="m 84.67412,79.4625 v -2.108399 h 6.858496 V 79.4625 Z" />
                                    <path id="path861" stroke-width="0.2" stroke="rgb(42, 45, 190)" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal" d="M 94.236326,84.993945 V 67.010547 h 2.232422 l 6.436812,16.333886 6.43682,-16.333886 h 2.23242 v 17.983398 h -2.23242 V 73.038086 l -4.63848,11.955859 h -3.59668 L 96.468748,73.038086 v 11.955859 z" />
                                    <path id="path863" stroke-width="0.2" stroke="rgb(42, 45, 190)" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal" d="M 115.61797,84.993945 V 67.010547 h 13.14648 v 2.108398 h -10.91406 v 5.692676 h 8.42119 v 2.108398 h -8.42119 v 5.965528 h 10.91406 v 2.108398 z" />
                                    <path id="path865" stroke-width="0.2" stroke="rgb(42, 45, 190)" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal" d="m 147.07031,75.903027 q 0,9.090918 -8.4708,9.090918 h -6.56084 V 67.010547 h 6.26318 q 2.05879,0 3.59668,0.446484 1.55029,0.446485 2.51768,1.21543 0.97978,0.768945 1.57509,1.922363 0.60772,1.153418 0.84336,2.430859 0.23565,1.265039 0.23565,2.877344 z m -2.23242,-0.03721 q 0,-1.562695 -0.37207,-2.75332 -0.37207,-1.203028 -0.99219,-1.947168 -0.60772,-0.744141 -1.47588,-1.21543 -0.86816,-0.471289 -1.77354,-0.644922 -0.90537,-0.186035 -1.95957,-0.186035 h -3.99355 v 13.766602 h 4.05557 q 1.46347,0 2.61689,-0.384473 1.16582,-0.396875 2.04639,-1.203027 0.89297,-0.818555 1.36426,-2.195215 0.48369,-1.37666 0.48369,-3.237012 z" />
                                    <path id="path867" stroke-width="0.2" stroke="rgb(42, 45, 190)" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal" d="m 156.06201,82.885547 v 2.108398 h -7.4414 v -2.108398 h 2.60449 V 69.118945 h -2.60449 v -2.108398 h 7.4414 v 2.108398 h -2.60449 v 13.766602 z" />
                                    <path id="path869" stroke-width="0.2" stroke="rgb(42, 45, 190)" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:25.4px;font-family:Loma;-inkscape-font-specification:'Loma, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal" d="m 173.31367,84.993945 h -2.54248 l -2.35645,-5.915918 h -7.10654 l -2.35644,5.915918 h -2.54248 l 7.18095,-17.983398 h 2.54248 z m -8.4584,-14.795996 -2.70371,6.77168 h 5.41983 z" />
                                </g>
                            </g>
                        </svg>
                    </div>

                    <iframe id="pdf" sandbox="allow-scripts allow-same-origin" src="" width="100%" height="800px" frameborder="0" allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="vue/js/owl.carousel/owl.carousel.min.js "></script>
    <script src="vue/js/disable.js "></script>
</body>

<script>
    $(document).ready(function() {
        afficheCoursLivre();
        afficheCoursVideo();
        afficheExoLivre()
        afficheCorrigeLivre()

    });
    document.getElementById("pdf").onload = function() {

        document.getElementById("loading").style.opacity = '0';
        //alert('nety');

    };

    function afficheCoursLivre() {
        let idcours = 1;
        let idlivre = 1;

        $.ajax({
            url: "controller/contrAncien.php",
            method: "POST",
            data: {
                idcours: idcours,
                idlivre: idlivre
            },
            success: function(data) {
                $('#contenu_cours_livres').html(data);


            }
        });
    }

    function afficheCoursVideo() {
        let idcours = 1;
        let idlivre = 2;

        $.ajax({
            url: "controller/contrAncien.php",
            method: "POST",
            data: {
                idcours: idcours,
                idlivre: idlivre
            },
            success: function(data) {
                $('#contenu_cours_video').html(data);


            }
        });
    }

    function afficheExoLivre() {
        let idcours = 2;
        let idlivre = 1;

        $.ajax({
            url: "controller/contrAncien.php",
            method: "POST",
            data: {
                idcours: idcours,
                idlivre: idlivre
            },
            success: function(data) {
                $('#contenu_exo_livres').html(data);


            }
        });
    }

    function afficheCorrigeLivre() {
        let idcours = 3;
        let idlivre = 1;

        $.ajax({
            url: "controller/contrAncien.php",
            method: "POST",
            data: {
                idcours: idcours,
                idlivre: idlivre
            },
            success: function(data) {
                $('#contenu_corrige_livres').html(data);


            }
        });
    }

    function GetPdf(pdfcours, titre) {

        $('#pdf').attr('src', 'https://docs.google.com/viewer?url=https://e-media-madagascar.com/universite/Cours/' + pdfcours + '&embedded=true');
        // alert('Ao e');
        $('#titrepdf').text(titre);

    }

    $(document).on("click", "#pdfmodalclose", function() {
        $('#pdf').attr('src', '');


    });
</script>
<?php

ob_end_flush();

?>