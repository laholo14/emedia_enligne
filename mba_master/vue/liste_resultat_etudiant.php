<?php
$currentPage = 'examens';
require('include/header.php');
?>
<link rel="stylesheet" href="css/liste_resultat_etudiant.css">
<?php
require('include/nav.php');
?>
<section id="List_etudiant_resultat">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mt-3">
        <form>
            <div class="form-row align-items-center">
                <div class="col-auto my-1">

                    <label for="">Semestre:</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">

                        <option selected>Choose...</option>
                        <option value="1">S7</option>
                        <option value="2">S8</option>
                        <option value="3">S9</option>
                        <option value="4">S10</option>
                        <option value="5">S11</option>
                        <option value="6">S12</option>
                    </select>
                </div>
                <div class="col-auto my-1">

                    <label for="">Session d'examen:</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Choose...</option>
                        <option value="1">Mensuel</option>
                        <option value="2">Semestriel</option>

                    </select>
                </div>
                <div class="col-auto my-1">

                    <label for="">Elément constitutif:</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>


            </div>
        </form>


    </div>
    <div class="table-responsive">
        <table class="table mt-3">
            <thead class="thead">
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Copie</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="col d-flex justify-content-center">

        <button type="button" class="btn">Telecharger</button>
    </div>
</section>

<?php

require('include/script.html');

?>
<script src="js/liste_resultat_etudiant.js"></script>
</body>

</html>