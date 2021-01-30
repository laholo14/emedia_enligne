<?php
$currentPage = 'etudiant';
require('include/header.php');
?>
<link rel="stylesheet" href="css/liste_etudiantMBA.css">
<?php
require('include/nav.php');
if(!isset($_POST['diplome'],$_POST['filiere'],$_POST['vague'])){
    header("Location: etudiant.php");
}else{
    extract($_POST);
}
?>
<section id="Liste_etudiant_vague">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="titre_inscriptions mt-3 d-flex justify-content-center">
            <h2 class="text-center">Listes des Etudiants en: <?php echo $diplome.' '.$filiere.'/'.$semestre.' '.$vague?></h2>
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
                                <th scope="col">Date de validation</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Parcours</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Sexe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $suivre = new Suivre();
                            $suivre->setDip($diplome);
                            $suivre->setFiliere($filiere);
                            $suivre->setCode($vague);
                            $res = $suivre->ListEtudiantParVague();
                            foreach($res as $resultat){ 
                            ?>
                            <tr>
                                <th scope="row"><?php echo $resultat['IDETUDIANTS'];?></th>
                                <td><?php echo $resultat['MATRICULE'];?></td>
                                <td><?php echo $resultat['SEMESTRE'];?></td>
                                <td><?php echo $resultat['DATEDINSCRIPTION'];?></td>
                                <td><?php echo $resultat['NOM'];?></td>
                                <td><?php echo $resultat['PRENOM'];?></td>
                                <td><?php echo $resultat['PARCOURS'];?></td>
                                <td><?php echo $resultat['NUMERO'];?></td>
                                <td><?php echo $resultat['MAIL'];?></td>
                                <td><?php echo $resultat['SEXE'];?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="button_export mt-3">
                    <div class="col d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary mb-5" value="Exporter en Exel" />
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>

<?php

require('include/script.html');

?>
<script src="js/liste_etudiant.js"></script>
</body>

</html>