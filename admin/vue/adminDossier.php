<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$connexion = new Connexion();

$base=Connexion::getCx();

if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminDossier.css" type="text/css" />
    <link rel="stylesheet" href="css/admin.css" type="text/css" />

    <link rel="stylesheet" href="css/animate.css" type="text/css" />

    <title>Document</title>
</head>



<body>

    <?php include("navadmin.php"); ?>

    <h1 class="">Formation</h1>


    <form method="POST" action="" id="formajout" class="form1" enctype="multipart/form-data">

        <div class="form-group marge">
            <label for="start" class="titre">EC:</label><br>
            <select class="form-control text-center" name="matiere" id="matiere">

                <?php
                $requete = $base->query("select * from MATIERE");

                while ($donnees = $requete->fetch()) {
                ?>
                    <option value="<?php echo $donnees['IDMATIERE']; ?>"><?php echo $donnees['INTITULE']; ?></option>
                <?php }
                $requete->closeCursor();
                ?>
            </select>
        </div>

        <div class="form-group marge">
            <label for="start" class="titre">Categorie:</label><br>
            <select class="form-control text-center" name="categorie" id="categorie">
                <option value="1">Cours</option>
                <option value="2">Exercice</option>
                <option value="3">Type du Corrigé</option>
            </select>
        </div>

        <div class="form-group marge">
            <label for="start" class="titre">Type:</label><br>
            <select class="form-control text-center" name="type" id="type">
                <option value="1">Livres</option>
                <option value="2">Video</option>
                <option value="3">Audio</option>
            </select>
        </div>


        <div class="container">
            <div class="form-group" id="contenu_mg">
                <label for="start" class="titre">Contenu MG:</label><br>
                <div class="input-group">
                    <input type="text" class="form-control" style="margin-top:0px;" id="fcontenu_mg" name='textcontmg' placeholder="contenu mg" readonly>
                    <div class="input-group-btn">
                        <span class="fileUpload btn btn-primary">
                            <span class="upl" id="upload">Importer</span>
                            <input type="file" class="upload up" name="contenu_mg[]" onchange="readURL(this);" accept="audio/* ,application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" multiple />
                        </span><!-- btn-orange -->
                    </div><!-- btn -->
                </div><!-- group -->
            </div><!-- form-group -->

            <div class="form-group" id="contenu_fr">
                <label for="start" class="titre">Contenu FR:</label><br>
                <div class="input-group">
                    <input type="text" class="form-control" style="margin-top:0px;" id="fcontenu_fr" name='textcontfr' placeholder="contenu fr" readonly>
                    <div class="input-group-btn">
                        <span class="fileUpload btn btn-primary">
                            <span class="upl" id="upload">Importer</span>
                            <input type="file" class="upload up" name="contenu_fr[]" onchange="readURL(this);" accept="audio/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" multiple />
                        </span><!-- btn-orange -->
                    </div><!-- btn -->
                </div><!-- group -->
            </div><!-- form-group -->

            <div class="form-group" id="youtube_mg" style="display:none">
                <label for="" class="col-form-label">Lien Youtube MG:</label>
                <textarea name="youtube_mg" id="fyoutube_mg" class="form-control" placeholder="lien youtube mg"></textarea>
            </div>

            <div class="form-group" id="youtube_fr" style="display:none">
                <label for="" class="col-form-label">Lien Youtube FR:</label>
                <textarea type="text" name="youtube_fr" id="fyoutube_fr" class="form-control" placeholder="lien youtube fr"></textarea>
            </div>





            <div><input type="submit" class="btn btn-primary" id="ajouter" value="Ajouter" name="" /></div>
        </div>
    </form>

    <div class="container-fluid">

        <form class="search m-3" method='POST'>
            <input class="p-1" class="form-control" type='search' id='search' placeholder='recherche' />
        </form>

        <div id="tabdoc">

        </div>

    </div>



    <div class="modal fade" id="Updata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">Modifier les EC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" id="formupdate" enctype="multipart/form-data">
                        <div class="form-group marge">
                            <label for="start" class="titre">EC:</label><br>
                            <input type="text" class="form-control" id="matiereupab" readonly />
                        </div>

                        <div class="form-group marge">
                            <label for="start" class="titre">Categorie:</label><br>
                            <input type="text" class="form-control" id="categorieupab" readonly />
                        </div>

                        <div class="form-group marge">
                            <label for="start" class="titre">Type:</label><br>
                            <input type="text" class="form-control" id="typeupab" readonly />
                        </div>


                        <div class="container">
                            <div id="contenu_mgup" class="form-group">
                                <label for="start" class="titre">Contenu MG:</label><br>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="margin-top:0px;" id="fcontenu_mgup" placeholder="contenu mg" readonly>
                                    <div class="input-group-btn">
                                        <span class="fileUpload btn btn-primary">
                                            <span class="upl" id="upload">Importer</span>
                                            <input type="file" class="upload up" name="contenu_mgup[]" onchange="readURL(this);" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf ,audio/*" multiple />
                                        </span><!-- btn-orange -->
                                    </div><!-- btn -->
                                </div><!-- group -->
                            </div><!-- form-group -->

                            <div id="contenu_frup" class="form-group">
                                <label for="start" class="titre">Contenu FR:</label><br>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="margin-top:0px;" id="fcontenu_frup" placeholder="contenu fr" readonly>
                                    <div class="input-group-btn">
                                        <span class="fileUpload btn btn-primary">
                                            <span class="upl" id="upload">Importer</span>
                                            <input type="file" class="upload up" name="contenu_frup[]" onchange="readURL(this);" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf ,audio/*" multiple />
                                        </span><!-- btn-orange -->
                                    </div><!-- btn -->
                                </div><!-- group -->
                            </div><!-- form-group -->

                            <div class="form-group" id="youtube_mgup" style="display:none">
                                <label for="" class="col-form-label">Lien Youtube MG:</label>
                                <textarea name="youtube_mgup" id="fyoutube_mgup" class="form-control" placeholder="lien youtube mg"></textarea>
                            </div>

                            <div class="form-group" id="youtube_frup" style="display:none">
                                <label for="" class="col-form-label">Lien Youtube FR:</label>
                                <textarea name="youtube_frup" id="fyoutube_frup" class="form-control" placeholder="lien youtube fr"></textarea>
                            </div>






                            <div class="form-group">

                                <input type="hidden" name="matiereup" class="form-control" id="matiereup" readonly>
                            </div>
                            <div class="form-group">

                                <input type="hidden" name="categorieup" class="form-control" id="categorieup" readonly>
                            </div>

                            <div class="form-group">

                                <input type="hidden" name="typeup" class="form-control" id="typeup" readonly>
                            </div>

                            <div class="modal-footer d-flex justify-content-center">

                                <input type="submit" class="btn btn-primary" value="Modifier" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/Myji.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        readDoc();
        recherche();
        //setInterval(recherche, 1000);


    });

    $(document).on("click", "#type", function() {

        let type = $("#type").val();

        if (type == '2') {
            $("#fcontenu_mg").val('');
            $("#fcontenu_fr").val('');
            $("#youtube_mg").fadeIn();
            $("#youtube_fr").fadeIn();
            $("#contenu_mg").fadeOut();
            $("#contenu_fr").fadeOut();


        } else {
            $("#fyoutube_mg").val('');
            $("#fyoutube_fr").val('');
            $("#youtube_mg").fadeOut();
            $("#youtube_fr").fadeOut();
            $("#contenu_mg").fadeIn();
            $("#contenu_fr").fadeIn();

        }

    });



    function GetUser(idm, idc, idt) {
        $('#matiereup').val(idm);
        $('#categorieup').val(idc);
        $('#typeup').val(idt);
    };

    $(document).on("submit", "#formajout", function(e) {
        e.preventDefault();
        //let 
        $.ajax({
            url: "../controller/contrDossier.php",
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data == 'success') {
                    alert('Ajout reussi');
                    location.reload();
                } else {

                    alert('Ajout echec');
                }
            }
        });
    });

    readDoc();

    function readDoc() {

        let tabdoc = '';

        $.ajax({
            url: "../controller/contrDossier.php",
            type: "POST",
            data: {
                tabdoc: tabdoc
            },
            success: function(data) {
                $("#tabdoc").html(data);
            }
        });

    };


    $(document).on("click", ".edit", function(e) {
        let idm = $('#matiereup').val();
        let idc = $('#categorieup').val();
        let idt = $('#typeup').val();
        let action = 'update';
        $.ajax({

            url: "../controller/contrDossier.php", //controller
            method: "POST",
            data: {
                idm: idm,
                idc: idc,
                idt: idt,
                action: action
            }, //valeur alefa
            dataType: "json",
            success: function(data) {

                $('#matiereupab').val(data.matiere);
                $('#categorieupab').val(data.categorie);
                $('#typeupab').val(data.type);
                $('#fyoutube_mgup').val(data.contenu_mg);
                $('#fyoutube_frup').val(data.contenu_fr);

                let matiere = $('#matiereupab').val();
                let categorie = $('#categorieupab').val();
                let type = $('#typeupab').val();

                if (type == 'Video') {
                    $("#fcontenu_mgup").val('');
                    $("#fcontenu_frup").val('');
                    $("#youtube_mgup").fadeIn();
                    $("#youtube_frup").fadeIn();
                    $("#contenu_mgup").fadeOut();
                    $("#contenu_frup").fadeOut();


                } else {
                    $("#fyoutube_mgup").val('');
                    $("#fyoutube_frup").val('');
                    $("#youtube_mgup").fadeOut();
                    $("#youtube_frup").fadeOut();
                    $("#contenu_mgup").fadeIn();
                    $("#contenu_frup").fadeIn();

                }

            }
        });



    });



    $(document).on("submit", "#formupdate", function(e) {
        e.preventDefault();
        //let 
        $.ajax({
            url: "../controller/contrDossier.php",
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data == 'success') {
                    alert('Ajout reussi');
                    readDoc();
                    recherche();

                } else {

                    alert('Ajout echec');
                }
            }
        });
    });

    $(document).on("keyup", "#search", function() {
        recherche();
    });
    recherche();

    function recherche() {
        let search = $('#search').val();
        $.ajax({
            url: "../controller/contrDossier.php",
            type: "POST",
            data: {
                search: search
            },
            success: function(data) {
                $("#tabdoc").html(data);
            }
        });


    }
</script>

<?php

ob_end_flush();

?>