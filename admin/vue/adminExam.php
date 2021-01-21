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
    <link rel="stylesheet" href="css/adminExam.css" type="text/css" />
    <link rel="stylesheet" href="css/admin.css" type="text/css" />

    <link rel="stylesheet" href="css/animate.css" type="text/css" />

    <title>Document</title>
</head>



<body>

    <?php include("navadmin.php"); ?>

    <div class="d-flex" id="content-wrapper">
        <div id="sidebar-container" class="bg-light border-right pt-5">


            <div class="menu list-group-flush">

                <a href="#" id="mensuel" class="option list-group-item mt-4 list-group-item-action p-3 border-0"><i class="fas fa-file-alt lead mr-2"></i> Examen Mensuel</a>
                <a href="#" id="semestriel" class="option list-group-item mt-3 list-group-item-action p-3 border-0"><i class="fas fa-file-word lead mr-2"></i> Examen Semestriel</a>


            </div>
        </div>
        <div class="w-100 bg overflow-auto" style="height: 800px !important;">
            <button class="btn  ml-3 mt-3" id="menu-toggle"><i class="fas fa-bars lead"></i></button>
            <section class="container pt-5">
                <div class="contenu ">
                    <h1 class="">Examen Mensuel</h1>
                    <form method="post" id="formulaire" class="form1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="session_exam" class="form-control" id="session_exam" value="1" readonly>
                        </div>
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
                            <label for="start" class="titre">Format:</label><br>
                            <select class="form-control text-center" name="format" id="format">
                                <option value="1">Upload</option>
                                <option value="2">Rédaction</option>
                                <option value="3">QCM</option>
                            </select>
                        </div>



                        <div class="container">

                            <!-- contenu rehefa upload-->
                            <div class="form-group" id="sujet">
                                <div class="form-group" id="div_durre_upload">
                                    <label for="" class="col-form-label">Duré:</label>
                                    <input type="number" class="form-control" id="durre_upload" placeholder="Duré upload" name="durre_upload" />
                                </div>
                                <label for="start" class="titre">Sujet:</label><br>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="margin-top:0px;" id="textsujet" name='textsujet' placeholder="Sujet" readonly>
                                    <div class="input-group-btn">
                                        <span class="fileUpload btn btn-primary">
                                            <span class="upl" id="upload">Importer</span>
                                            <input type="file" class="upload up" name="sujet" onchange="readURL(this);" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" multiple />
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <!-- contenu rehefa redaction-->
                            <div class="form-group" id="div_durre_redac" style="display:none">
                                <label for="" class="col-form-label">Duré:</label>
                                <input type="number" class="form-control" id="durre_redac" placeholder="Duré redaction" name="durre_redac" />
                            </div>

                            <div class="form-group" id="div_question_redac" style="display:none">
                                <label for="" class="col-form-label">Les questions:</label>
                                <textarea type="text" name="question_redac" id="question_redac" class="form-control" placeholder="Les questions"></textarea>
                            </div>


                            <!-- contenu rehefa qcm-->
                            <div class="form-group" id="div_durre_qcm" style="display:none">
                                <label for="" class="col-form-label">Duré:</label>
                                <input type="number" class="form-control" id="durre_qcm" placeholder="Duré qcm" name="durre_qcm" />
                            </div>

                            <div class="form-group" id="div_question_qcm" style="display:none">
                                <label for="" class="col-form-label">Les questions:</label>
                                <textarea type="text" name="question_qcm" id="question_qcm" class="form-control" placeholder="Les questions"></textarea>
                            </div>

                            <div class="form-group" id="div_reponse_qcm" style="display:none">
                                <label for="" class="col-form-label">Les reponses:</label>
                                <textarea type="text" name="reponse_qcm" id="reponse_qcm" class="form-control" placeholder="Les reponses"></textarea>
                                
                            </div>


                        </div>

                        <div><input type="submit" class="btn btn-primary" id="ajouter" value="Ajouter" name="" /></div>

                    </form>
                    <div class="container-fluid">

                        <form class="search m-3" method='POST'>
                            <input class="p-1" class="form-control" type='search' id='search' placeholder='recherche' />
                        </form>

                        <div id="tabexam">

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="modal fade" id="Updata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">Modifier les EXAMEN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" id="formulaire_update" class="form1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="session_exam_up" class="form-control" id="session_exam_up" value="" readonly>
                        </div>
                        <div class="form-group marge">
                            <label for="start" class="titre">EC:</label><br>
                            <input type="text" class="form-control" name="matiere_up" id="matiere_up" readonly />
                        </div>

                        <div class="form-group marge">
                            <label for="start" class="titre">Format:</label><br>
                            <input class="form-control text-center" name="format_up" id="format_up" readonly />
                        </div>



                        <div class="container">

                            <!-- contenu rehefa upload-->
                            <div class="form-group" id="sujet_up">
                                <div class="form-group" id="div_durre_upload">
                                    <label for="" class="col-form-label">Duré:</label>
                                    <input type="number" class="form-control" id="durre_upload_up" placeholder="Drré upload" name="durre_upload_up" />
                                </div>
                                <label for="start" class="titre">Sujet:</label><br>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="margin-top:0px;" id="textsujet_up" name='textsujet_up' placeholder="Sujet" readonly>
                                    <div class="input-group-btn">
                                        <span class="fileUpload btn btn-primary">
                                            <span class="upl" id="upload">Importer</span>
                                            <input type="file" class="upload up" name="sujet_up" onchange="readURL(this);" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" multiple />
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <!-- contenu rehefa redaction-->
                            <div class="form-group" id="div_durre_redac_up" style="display:none">
                                <label for="" class="col-form-label">Duré:</label>
                                <input type="number" class="form-control" id="durre_redac_up" placeholder="Duré redaction" name="durre_redac_up" />
                            </div>

                            <div class="form-group" id="div_question_redac_up" style="display:none">
                                <label for="" class="col-form-label">Les questions:</label>
                                <textarea type="text" name="question_redac_up" id="question_redac_up" class="form-control" placeholder="Les questions"></textarea>
                            </div>


                            <!-- contenu rehefa qcm-->
                            <div class="form-group" id="div_durre_qcm_up" style="display:none">
                                <label for="" class="col-form-label">Duré:</label>
                                <input type="number" class="form-control" id="durre_qcm_up" placeholder="Duré Qcm" name="durre_qcm_up" />
                            </div>

                            <div class="form-group" id="div_question_qcm_up" style="display:none">
                                <label for="" class="col-form-label">Les questions:</label>
                                <textarea type="text" name="question_qcm_up" id="question_qcm_up" class="form-control" placeholder="Les questions"></textarea>
                            </div>

                            <div class="form-group" id="div_reponse_qcm_up" style="display:none">
                                <label for="" class="col-form-label">Les reponses:</label>
                                <textarea type="text" name="reponse_qcm_up" id="reponse_qcm_up" class="form-control" placeholder="Les reponses"></textarea>
                                
                            </div>


                        </div>
                        <input type="hidden" name="id_matiere_up" class="form-control" id="id_matiere_up" readonly>
                        <input type="hidden" name="id_session_up" class="form-control" id="id_session_up" readonly>
                        <input type="hidden" name="id_type_up" class="form-control" id="id_type_up" readonly>
                        <div><input type="submit" class="btn btn-primary" id="ajouter_up" value="Modilier" name="" /></div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/Myji.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        //listExam();
        $("#mensuel").click(function(e) {
            e.preventDefault();
            $('h1').text('Examen Mensuel');
            $('#session_exam').val('1');

            listExam();
        });

        $("#semestriel").click(function(e) {
            e.preventDefault();
            $('h1').text('Examen Semestriel');
            $('#session_exam').val('2');

            listExam();
        });

        recherche();

    });


    function GetUser(idmat, idsession, idtype, titrematiere, titresession, titretype) {
        $("#id_matiere_up").val(idmat);
        $("#id_type_up").val(idtype);
        $("#id_session_up").val(idsession);
        $("#matiere_up").val(titrematiere);
        $("#format_up").val(titretype);
        $("#session_exam_up").val(titresession);
    };

    $(document).on("click", "#format", function() {

        let type = $("#format").val();

        if (type == '2') {
            $("#textsujet").val('');
            $("#durre_qcm").val('');
            $("#question_qcm").val('');
            $("#reponse_qcm").val('');
            $("#div_durre_redac").fadeIn();
            $("#div_question_redac").fadeIn();
            $("#sujet").fadeOut();
            $("#div_durre_qcm").fadeOut();
            $("#div_question_qcm").fadeOut();
            $("#div_reponse_qcm").fadeOut();



        } else if (type == '3') {
            $("#textsujet").val('');
            $("#durre_redac").val('');
            $("#question_redac").val('');
            $("#div_durre_qcm").fadeIn();
            $("#div_question_qcm").fadeIn();
            $("#div_reponse_qcm").fadeIn();
            $("#sujet").fadeOut();
            $("#div_durre_redac").fadeOut();
            $("#div_question_redac").fadeOut();

        } else {
            $("#durre_qcm").val('');
            $("#question_qcm").val('');
            $("#reponse_qcm").val('');
            $("#durre_redac").val('');
            $("#question_redac").val('');
            $("#sujet").fadeIn();
            $("#div_durre_redac").fadeOut();
            $("#div_question_redac").fadeOut();
            $("#div_durre_qcm").fadeOut();
            $("#div_question_qcm").fadeOut();
            $("#div_reponse_qcm").fadeOut();

        }
    });


    $(document).on("click", ".edit", function(e) {

        let type = $("#id_type_up").val();
        let matiere = $("#id_matiere_up").val();
        let session = $("#id_session_up").val();
        let action = 'update';
        $.ajax({

            url: "../Controller/contrExam.php", //Controller
            method: "POST",
            data: {
                type: type,
                session: session,
                matiere: matiere,
                action: action
            }, //valeur alefa
            dataType: "json",
            success: function(data) {

                $('#durre_qcm_up').val(data.durre);
                $('#durre_redac_up').val(data.durre);
                $('#durre_upload_up').val(data.durre);
                $('#question_redac_up').val(data.sujet);
                $('#question_qcm_up').val(data.sujet);
                $('#reponse_qcm_up').val(data.reponse_qcm);
                
                
                if (type == 2) {
                    $("#textsujet_up").val('');
                    $("#durre_qcm_up").val('');
                    $("#question_qcm_up").val('');
                    $("#reponse_qcm_up").val('');
                    $("#div_durre_redac_up").fadeIn();
                    $("#div_question_redac_up").fadeIn();
                    $("#sujet_up").fadeOut();
                    $("#div_durre_qcm_up").fadeOut();
                    $("#div_question_qcm_up").fadeOut();
                    $("#div_reponse_qcm_up").fadeOut();



                } else if (type == 3) {
                    $("#textsujet_up").val('');
                    $("#durre_redac_up").val('');
                    $("#question_redac_up").val('');
                    $("#div_durre_qcm_up").fadeIn();
                    $("#div_question_qcm_up").fadeIn();
                    $("#div_reponse_qcm_up").fadeIn();
                    $("#sujet_up").fadeOut();
                    $("#div_durre_redac_up").fadeOut();
                    $("#div_question_redac_up").fadeOut();

                } else {
                    $("#durre_qcm_up").val('');
                    $("#question_qcm_up").val('');
                    $("#reponse_qcm_up").val('');
                    $("#durre_redac_up").val('');
                    $("#question_redac_up").val('');
                    $("#sujet_up").fadeIn();
                    $("#div_durre_redac_up").fadeOut();
                    $("#div_question_redac_up").fadeOut();
                    $("#div_durre_qcm_up").fadeOut();
                    $("#div_question_qcm_up").fadeOut();
                    $("#div_reponse_qcm_up").fadeOut();

                }



            }
        });

    });




    $(document).on("submit", "#formulaire", function(e) {
        e.preventDefault();
        //let 
        $.ajax({
            url: "../Controller/contrExam.php",
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data == 'success') {
                    alert('Ajout reussi');
                    location.reload();
                

                }
                
            }
        });
    });


    $(document).on("submit", "#formulaire_update", function(e) {
        e.preventDefault();
        //let 
        $.ajax({
            url: "../Controller/contrExam.php",
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                
                    alert('Update reussi');
                    location.reload();
             

                 
                
            }
        });
    });
    listExam();

    function listExam() {

        let tabexam = '';
        let session_exam = $('#session_exam').val();

        $.ajax({
            url: "../Controller/contrExam.php",
            type: "POST",
            data: {
                tabexam: tabexam,
                session_exam: session_exam
            },
            success: function(data) {
                $("#tabexam").html(data);
            }
        });

    };

    $(document).on("keyup", "#search", function() {
        recherche();
    });
    recherche();

    function recherche() {
        let search = $('#search').val();
        let session_exam = $('#session_exam').val();
        $.ajax({
            url: "../Controller/contrExam.php",
            type: "POST",
            data: {
                search: search,
                session_exam: session_exam
            },
            success: function(data) {
                $("#tabexam").html(data);
            }
        });
    }
</script>

<?php

ob_end_flush();

?>