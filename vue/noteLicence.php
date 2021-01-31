<?php
ob_start();

session_start();

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}



spl_autoload_register("loadclass");

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}


$db = new Connexion();
$formation = new Formation();
$result = new Resultat();



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="icon" href="vue/image/logo E-media copie.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="vue/css/accueil.css" type="text/css" />
    <link rel="stylesheet" href="vue/css/note.css" type="text/css" />
    <script src="https://kit.fontawesome.com/874986f905.js" crossorigin="anonymous"></script>
    <title>Note d'examen</title>
</head>

<body>


    <div class="outer-container">
    <h1>NOTES D'EXAMEN</h1>

        <div class="form-group select_langue mt-1 mr-5 ml-3">
            
            <select class="form-control" id="semestre">
                <?php if ($_SESSION['diplome'] == 'LICENCE') { ?>
                    <option class="" value="S1">Semestre 1</option>
                    <option class="" value="S2">Semestre 2</option>
                    <option class="" value="S3">Semestre 3</option>
                    <option class="" value="S4">Semestre 4</option>
                    <option class="" value="S5">Semestre 5</option>
                    <option class="" value="S6">Semestre 6</option>
                <?php } else { ?>
                    <option class="" value="S7">Semestre 7</option>
                    <option class="" value="S8">Semestre 8</option>
                    <option class="" value="S9">Semestre 9</option>
                    <option class="" value="S10">Semestre 10</option>
                <?php } ?>
            </select>
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
        




    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <script src="vue/js/jquery.min.js"></script>
</body>

</html>


<script>
    $(document).ready(function() {
        Bulletin();
        $("#semestre").change(function() {
            Bulletin();
        });
    });

    function Bulletin() {
        let semestre = $("#semestre").val();
        $.ajax({
            url: "controller/contrAffichageNoteLicence.php",
            type: "post",
            data: {
                semestre: semestre
            },
            success: function (data) {
               $("#tabnote").html(data);
                
            }
        });
    };
  
</script>