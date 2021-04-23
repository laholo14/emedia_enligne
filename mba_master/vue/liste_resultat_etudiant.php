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
        <form action='' method='post'>
            <div class="form-row align-items-center">
			
                <div class="col-auto my-1">

                    <label for="">Session d'examen:</label>
                    <select name ='sessionExamen' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Choose...</option>
                        <option value="1">Mensuel</option>
                        <option value="2">Semestriel</option>

                    </select>
                </div>
                <div class="col-auto my-1">

                    <label for="">Elément constitutif:</label>
							<select name='ec' class="custom-select mr-sm-2" id="select_ec">

							</select>
                </div>
				 <div class="col-auto my-1">
					 <label for=""></label>
                    <input type='submit' class='btn btn-success' name='afficher' value='Afficher' />
							
                </div>
                </div>
            </div>
        </form>

    </div>
	
	 <?php
		if(isset($_POST['afficher'])){
			
			$suivre = new Suivre();
            $res = $suivre->resultatExamen($_GET['code'],$_GET['semestre'],"MBA");
			if(isset($_POST['ec'])){ 
			
				$mat = new Matiere();
				$readMat = $mat->readMatById($_POST['ec']);
				foreach($readMat as $selectMat){
					echo "<h3>E.C : ".$selectMat['INTITULE']."</h3>";
				}
			}
	?>
	
    <div class="table-responsive">
        <table class="table mt-3">
            <thead class="thead">
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Note</th>
					<th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
							<?php
                            foreach($res as $resultat){ 
									
								    $resultatEx = new Resultat();
									
									$resE = $resultatEx->readFileExamen($resultat['IDETUDIANTS'],$_POST['sessionExamen'],$_POST['ec']);
								
									
									if(empty($resE)){
										
									}else{
										
							?>
								<tr>
							<?php
							?>
								<th><?php echo $resultat['MATRICULE'] ." / ".$resultat['SEMESTRE']; ?></th>
								<th><?php echo $resultat['NOM']; ?></th>
								<th><?php echo $resultat['PRENOM']; ?></th>
								<th><?php echo $resultat['MAIL']; ?></th>
								<?php
									foreach($resE as $selectE){
										?><th><?php echo $selectE['NOTE']; ?></th> 
										<th>
											<form action='' method='post'>
												<input type='hidden' name='idEtud' value='<?php echo $resultat['IDETUDIANTS']; ?>' />
												<input type='hidden' name='idsessiondexam' value='<?php echo $selectE['IDSESSIONDEXAM']; ?>' />
												<input type='hidden' name='idmatiere' value='<?php echo $selectE['IDMATIERE']; ?>' />
												<input type='submit' class='btn btn-success' name='modifNote' value='Modifier le Note' />
											</form>
											
											<a href='https://e-media-madagascar.com/universite/Resultat/<?php echo $selectE['REPONSE']; ?>' class='btn btn-success' target='_blank'>Telecharger</a>
										</th>
										
										<?php
									}
								?>
								
							<?php 
                          }
						  ?></tr><?php
					}
				}
			   ?>

            </tbody>
        </table>
    </div>
</section>

<?php

require('include/script.html');

?>
<script src="js/liste_resultat_etudiant.js"></script>
<script src="js/coursAjax.js"></script>
</body>

</html>