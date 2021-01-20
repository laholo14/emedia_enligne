<?php
$currentPage = 'etudiant';
require('include/header.php');
?>
<link rel="stylesheet" href="css/liste_etudiant.css">
<?php
require('include/nav.php');
?>
<section id="Liste_etudiant_vague">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="titre_inscriptions mt-3 d-flex justify-content-center">
            <h2 class="text-center">Listes des Etudiants en:MASTER MBA V2/S8</h2>
        </div>
        <div class="bloc_list_etudiant mt-3">
            <form action="">
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead class="thead-background">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Matricule</th>
                                <th scope="col">Semestre</th>
                                <th scope="col">Vague</th>
                                <th scope="col">Date de validation</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Diplome</th>
                                <th scope="col">Parcours</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Filière</th>
                                <th scope="col">Nationalité</th>
                                <th scope="col">Sexe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>TICM-V2/001/MG</td>
                                <td>S8</td>
                                <td>V2</td>
                                <td>Samedi 25 Juillet 2020 </td>
                                <td>RAZANAJATOVO</td>
                                <td>Herizo Sitraka</td>
                                <td>MASTER</td>
                                <td>MSI</td>
                                <td>261331140787</td>
                                <td>sandayvarison@gmail.com</td>
                                <td>MBA</td>
                                <td>MG</td>
                                <td>Masculin</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="button_export mt-3">
                    <div class="col d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary mb-5" value="Exporter en Exel"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>

<?php

require('include/script.html');

?>

</body>

</html>