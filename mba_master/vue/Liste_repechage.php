<?php
$currentPage = 'examens';
require('include/header.php');
?>
<link rel="stylesheet" href="css/liste_repechage.css">
<?php
require('include/nav.php');
?>
<section id="List_repechage">
<div class="table-responsive">
        <table class="table mt-3">
            <thead class="thead">
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Matiere à repecher</th>
                    <th scope="col">Statut</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>EPS</td>
                    <td>Otto</td>

                </tr>

            </tbody>
        </table>
    </div>
   
  
</section>

<?php

require('include/script.html');

?>
<script src="js/liste_repechage.js"></script>
</body>

</html>