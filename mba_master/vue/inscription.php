     <?php

        $currentPage = 'inscription';
        require('include/header.html');
        require('include/nav.php');

        ?>
     <section id="inscription">

         <div class="col-12 col-sm-12 col-md-12 col-lg-12">
             <div class="titre_inscriptions mt-3 d-flex justify-content-center">
                 <h2 class="text-center">Nouveaux inscrits</h2>
             </div>
             <div class="table-responsive mt-4">
                 <table class="table table-striped table-hover table-light">
                     <thead class="thead-background">
                         <tr>
                             <th scope="col">ID</th>
                             <th scope="col">Nom</th>
                             <th scope="col">Prénom</th>
                             <th scope="col">Semestre</th>
                             <th scope="col">Parcours</th>
                             <th scope="col">Contact</th>
                             <th scope="col">Nationalité</th>
                             <th scope="col">Date</th>
                             <th scope="col">Email</th>
                             <th scope="col">Dossier</th>
                             <th scope="col">Valider</th>
                             <th scope="col">Effacer</th>
                         </tr>
                     </thead>
                     <tbody id="section_list_etudiant">
            
                     </tbody>
                 </table>


             </div>
         </div>

     </section>


     <?php

        require('include/script.html');

        ?>

<script src="js/inscription.js"></script>
</body>

</html>