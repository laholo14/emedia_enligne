<?php

ob_start();

session_start();

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");


if (!isset($_SESSION['matriculeadmin'])) {

    header("location:../admin/index.php");
}


$datefr = new DateFr();

$db = new Connexion();

$suivre = new Suivre();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css" type="text/css" />
    <title>Document</title>
</head>

<body>

    <?php


    if (isset($_POST['sub'])) {

        if (isset($_POST['dip']) and isset($_POST['fil']) and isset($_POST['vague'])) {

            extract($_POST);

            $suivre->setDip($dip);
            $suivre->setFiliere($fil);
            $suivre->setCode($vague);

            $res_Title = $suivre->ListEtudiant();

            foreach ($res_Title as $resultat) {
                $semestre = $resultat['SEMESTRE'];
            }

            echo "<h1>Bulletin des Etudiants en:" . $resultat['DIPLOME'] . " " . $resultat['FILIERE'] . " " . $resultat['CODE'] ."</h1>";


    ?> 
    <div class="table-responsive mt-3">
        <form action="../controller/controlAdmission.php" method="post">
              <div class="d-inline-flex p-3 text-white" style="height: 86px;">  
                <div class="p-2 bg-primary" style="border-radius: 0px 0px 0px 10px;"><label for="select" class="" style="font-size: 22px;">Envoyer les repechages en</label></div>
                <div class="p-2 bg-primary">
                    <select name="SEMESTRE" class="custom-select mb-3">
                    <option>---</option>
                        <?php
                            if ($semestre == 'S1') {
                                echo "<option>S2</option>";
                            }elseif ($semestre == 'S2') {
                                echo "<option>S3</option>";
                            }elseif($semestre == 'S3') {
                                echo "<option>S4</option>";
                            }elseif ($semestre == 'S4') {
                                echo "<option>S5</option>";
                            }elseif($semestre == 'S5') {
                                echo "<option>S6</option>";
                            }elseif ($semestre == 'S6') {
                                echo "<option>S7</option>";
                            }elseif($semestre == 'S7') {
                                echo "<option>S8</option>";
                            }elseif ($semestre == 'S8') {
                                echo "<option>S9</option>";
                            }elseif($semestre == 'S9') {
                                echo "<option>S10</option>";
                            }elseif ($semestre == 'S10') {
                                echo "<option>S11</option>";
                            }elseif($semestre == 'S11') {
                                echo "<option>S12</option>";
                            }else{
                                echo 'Erreur';
                            }

                        ?>
                    </select>
                </div>
                <div class="p-2 bg-primary" style="border-radius: 0px 10px 0px 0px;"><input type="submit" class="btn btn-primary" value="Envoyer" /></div>
              </div>

            <div class="table-responsive mt-3">
                <form method="POST">
                    <table class="table table-border-danger table-striped">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Contact</th>
                                <th>Mail</th>
                                <th>Bulletin</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $res = $suivre->ListEtudiant();

                            foreach ($res as $resultat) {
                            ?>
                                <tr>
                                    <td><?php echo $resultat['MATRICULE']; ?></td>
                                    <td><?php echo $resultat['NOM']; ?></td>
                                    <td><?php echo $resultat['PRENOM']; ?></td>
                                    <td><?php echo $resultat['NUMERO']; ?></td>
                                    <td><?php echo $resultat['MAIL']; ?></td>
                                        <input type="hidden" id="idEtud" value="">
                                        <input type="hidden" id="filiere" value="">
                                        <td><button type="submit" id="afficherB" class="btn btn-outline-dark affiche" data-toggle="modal" data-target="#myModal" onclick="GetUser(<?php echo $resultat['IDETUDIANTS']; ?>,'<?php echo $resultat['FILIERE']; ?>','<?php echo $resultat['SEMESTRE']; ?>','<?php echo $resultat['NOM']; ?>','<?php echo $resultat['PRENOM']; ?>','<?php echo $resultat['MATRICULE']; ?>')">Afficher</button></td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </form>
            </div>
    <?php

        }
    }

    ?>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title"><center>Relevés de notes</center></h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

<div class="form-group mt-1 mr-5 ml-3">
    
    <select class="form-control" id="semestre">
            <option class="" value="S1">Semestre 1</option>
            <option class="" value="S2">Semestre 2</option>
            <option class="" value="S3">Semestre 3</option>
            <option class="" value="S4">Semestre 4</option>
            <option class="" value="S5">Semestre 5</option>
            <option class="" value="S6">Semestre 6</option>
    </select>
</div>

<div>
    <p>Nom:<span style="margin-left:32px" id="nom"></span></p>
    <p>Prenom:<span style="margin-left:12px" id="prenom"></span></p>
    <p>Matricule:<span style="margin-left:2px" id="matricule"></span></p>
</div>

<table border="1">
    <thead>
        <tr>
            <th class="text-center">Unité d'enseignement</th>
            <th class="text-center">Crédit</th>
            <th  class="text-center">Moyenne finale</th>
            <th  class="text-center">Element Constitutif</th>
            <th class="text-center">Note par EC</th>
        </tr>
    </thead>   
    <tbody id="tabnote">
    </tbody>
</table>
    <br>




        <button type="button" class="btn btn-info" >Exporter</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
      </div>

    </div>
  </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
<script>
function GetUser(idEtudiants,filiere,semestre,nom,prenom,matricule){
    $("#idEtud").val(idEtudiants),
    $("#filiere").val(filiere),
    $("#semestre").val(semestre),
    $("#nom").html(nom),
    $("#prenom").html(prenom),
    $("#matricule").html(matricule)
};
$(document).on("click", "#afficherB", function(e) {
e.preventDefault();
let idEtud =$('#idEtud').val();
let filiere = $('#filiere').val();
let semestre = $('#semestre').val();
let nom=$("#nom").html();
let prenom=$("#prenom").html();
let matricule=$("#matricule").html();
$("#nom").html(nom);
$("#prenom").html(prenom);
$("#matricule").html(matricule);

 $.ajax({
        url: "../controller/contrAffichageNote.php", //controller
        method: "POST",
        data: {
            idEtud:idEtud,
            filiere:filiere,
            semestre:semestre
        }, //valeur alefa
        success: function(data) {
            $('#tabnote').html(data);
        }
    });
});
    $(document).ready(function() {
        Bulletin();
        $("#semestre").change(function() {
            Bulletin();
        });
    });

    function Bulletin() {
        let semestre = $("#semestre").val();
        let filiere = $('#filiere').val();
        let idEtud = $('#idEtud').val();
        $.ajax({
            url: "../controller/contrAffichageNote.php",
            type: "post",
            data: {
                idEtud:idEtud,
                filiere:filiere,
                semestre:semestre
            },
            success: function (data) {
               $("#tabnote").html(data);
                
            }
        });
    };
  
</script>






<?php

ob_end_flush();

?>