     <?php

        $currentPage = 'inscription';
        require('include/header.php');
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



         <div class="modal_section">
             <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-md">

                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Validation</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="mb-3 select_semestre">
                                 <div class="">
                                     <label class="input-group-text ">Semestre</label>
                                 </div>
                                 <select class="custom-select mt-2" id="semestre">
                                     <option disabled>Choose...</option>
                                     <option value="S7">S7</option>
                                     <option value="S8">S8</option>
                                     <option value="S9">S9</option>
                                     <option value="S10">S10</option>
                                 </select>
                             </div>

                             <div class=" mb-3 select_vague mt-4">
                                 <div class="">
                                     <label class="input-group-text" for="inputGroupSelect02">Vague</label>
                                 </div>
                                 <select class="custom-select select_semestre mt-2" id="vague">
                                    
                                    

                                 </select>
                             </div>

                             <div class="select_numero mt-4">
                                 <div class="">
                                     <label class="input-group-text" for="inputGroupSelect02">Numero</label>
                                 </div>
                                 <div class="form-group mt-2">
                                     <input type="number" class="form-control" id="numero" aria-describedby="numero" placeholder="Entrer le numero">

                                 </div>
                             </div>
                             <div class="select_id mt-4">
                                 <div class="form-group mt-2">
                                     <input type="hidden" class="form-control" id="id_etu" aria-describedby="id" value="" readonly>

                                 </div>
                             </div>

                         </div>
                         <div class="modal-footer">
                             <div class="col d-flex justify-content-center">

                                 <button class="btn btn-primary" id="valider" type="submit">Valider</button>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>

     </section>


     <?php

        require('include/script.html');

        ?>

     <script src="js/inscription.js"></script>
     </body>

     </html>