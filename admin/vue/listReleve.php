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
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
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
                <th rowspan="2" class="text-center">LISTE DES MATIERES</th>
                <th colspan="2" class="text-center">NOTES /20</th>
                <th colspan="2" class="text-center"><center>DECISION</center></th>
            </tr>
            <tr>
                <th class="text-center">Mensuel</th>
                <th class="text-center">Semestriel</th>
                <th class="text-center">Moyenne des notes</th>
                <th class="text-center">Validation</th>
            </tr>
        </thead>

        <tbody id = "tabnote">

            <tr class="priority-300">
                <td class="matier">Matiere</td>
                <td class="note1 text-center">Note M</td>
                <td class="note1 text-center">Note S</td>
                <td class="note1 text-center">Moyenne</td>
                <td class="note1 text-center">Validation</td>

            </tr>



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
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
        url: "../Controller/contrAffichageNote.php", //Controller
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
            url: "../Controller/contrAffichageNote.php",
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