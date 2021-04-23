<?php
$currentPage = 'admission';
require('include/header.php');
?>
<link rel="stylesheet" href="css/liste_etudiant_admission.css">
<?php
require('include/nav.php');
?>
<section id="Liste_etudiant_admission">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="titre_inscriptions mt-3 d-flex justify-content-center">
            <h2 class="text-center">Listes des Etudiants en:MASTER MBA V2/S8</h2>
        </div>
        <div class="bloc_list_etudiant_admission mt-3">
        <div class="table-responsive mt-3">
            <form action="" method="post">
                <div class="d-inline-flex p-3 text-white" style="height: 86px;">
                    <div class="p-2 bg-primary" style="border-radius: 0px 0px 0px 10px;"><label for="select" class="" style="font-size: 22px;">Passer en</label></div>
                    <div class="p-2 bg-primary">
                        <select name="SEMESTRE" class="custom-select mb-3">
                            <option>---</option>
                            <option>S9</option>
                        </select>
                    </div>
                    <div class="p-2 bg-primary" style="border-radius: 0px 10px 0px 0px;"><input type="submit" class="btn btn-primary" value="Envoyer" /></div>
                </div>

                <table class="table table-border-danger table-striped">
                    <thead class="thead-background">
                        <tr>
                            <th>Matricule</th>
                            <th>Semestre</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Diplome En</th>
                            <th>Parcours</th>
                            <th>Filière</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>TICM-V2/001/MG</td>
                            <td>S8</td>
                            <td>RAZANAJATOVO</td>
                            <td>Herizo Sitraka</td>
                            <td>MASTER</td>
                            <td>MSI</td>
                            <td>TICM</td>

                        </tr>
                        <tr>
                            <td>TICM-V2/002/MG</td>
                            <td>S8</td>
                            <td>RANDRIAMANJATO</td>
                            <td>BRUNO</td>
                            <td>MASTER</td>
                            <td>MSI</td>
                            <td>TICM</td>

                        </tr>
                        <tr>
                            <td>TICM-V2/003/MG</td>
                            <td>S8</td>
                            <td>RAMAROSANDRATANA</td>
                            <td>Arison Sandanirina Yves</td>
                            <td>MASTER</td>
                            <td>ELE</td>
                            <td>TICM</td>

                        </tr>

                    </tbody>
                </table>


            </form>
        </div>
        </div>
    </div>
</section>

<?php

require('include/script.html');

?>
<script src="js/admission.js"></script>
</body>

</html>