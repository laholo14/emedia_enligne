<?php
$currentPage = 'status';
require('include/header.php');
?>
<link rel="stylesheet" href="css/liste_status.css">
<?php
require('include/nav.php');
?>
<section id="Status_liste">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="bloc_status mt-3">
            <div class="table-responsive">
                <table class="table table-border-danger table-striped">
                    <thead class="thead-background">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Razananjatovo</td>
                            <td>Herizoa Sitraka</td>
                            <td><i class="fas fa-circle actif"></i></td>
                        </tr>
                        <tr>
                            <td>Razaka</td>
                            <td>Manta</td>
                            <td><i class="fas fa-circle inactif"></i></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php

require('include/script.html');

?>
<script src="js/status.js"></script>
</body>

</html>