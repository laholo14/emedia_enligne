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
      
        
            <!-- <table border="1">
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
            </table> -->

            <table border="1">
                <thead>
                    <th>Code</th>
                    <th>Unite d'enseignement</th>
                    <th>Credit</th>
                    <th>Moyenne</th>
                    <th>Mention</th>
                    <th>Resultat</th>
                    <th>Code EC</th>
                    <th>Elemnts constitutifs</th>
                    <th>Note</th>
                </thead>

                <tbody>
                    <tr>
                        <td rowspan="3">UE1</td>
                        <td rowspan="3">Informatique de base</td>
                        <td rowspan="3">9</td>
                        <td rowspan="3">13.80</td>
                        <td rowspan="3">Assez-Bien</td>
                        <td rowspan="3">9 sur 9</td>
                        <td>EC1</td>
                        <td>Algorithme</td>
                        <td>15.5</td>
                        <tr>
                            <td>EC1</td>
                            <td>Algorithme</td>
                            <td>15.5</td>
                        </tr>
                        <tr>
                            <td>EC1</td>
                            <td>Algorithme</td>
                            <td>15.5</td>
                        </tr>
                    </tr>

                    <tr>
                        <td rowspan="2">UE1</td>
                        <td rowspan="2">Informatique de base</td>
                        <td rowspan="2">9</td>
                        <td rowspan="2">13.80</td>
                        <td rowspan="2">Assez-Bien</td>
                        <td rowspan="2">9 sur 9</td>
                        <td>EC1</td>
                        <td>Algorithme</td>
                        <td>15.5</td>
                        <tr>
                            <td>EC1</td>
                            <td>Algorithme</td>
                            <td>15.5</td>
                        </tr>
                    </tr>

                    <tr>
                        <td colspan="2">Total</td>
                        <td>33</td>
                        <td></td>
                        <td></td>
                        <td>33 sur 33</td>
                    </tr>
                </tbody>
            </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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