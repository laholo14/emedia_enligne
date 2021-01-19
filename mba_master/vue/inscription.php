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
                             <h5 class="modal-title" id="exampleModalLabel">Ajouter inscription</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="mb-3 select_semestre">
                                 <div class="">
                                     <label class="input-group-text ">Semestre</label>
                                 </div>
                                 <select class="custom-select mt-2" id="inputGroupSelect01">
                                     <option selected>Choose...</option>
                                     <option value="1">S1</option>
                                     <option value="2">S2</option>
                                     <option value="3">S3</option>
                                     <option value="4">S4</option>
                                     <option value="5">S5</option>
                                     <option value="6">S6</option>
                                     <option value="7">S7</option>
                                     <option value="8">S8</option>s
                                     <option value="9">S9</option>
                                     <option value="10">S10</option>
                                     <option value="11">S11</option>
                                     <option value="10">S12</option>
                                 </select>
                             </div>

                             <div class=" mb-3 select_vague mt-4">
                                 <div class="">
                                     <label class="input-group-text" for="inputGroupSelect02">Vague</label>
                                 </div>
                                 <select class="custom-select select_semestre mt-2" id="inputGroupSelect02">
                                     <option selected>Choose...</option>
                                     <option value="1">V1</option>
                                     <option value="2">V2</option>
                                     <option value="3">V3</option>
                                     <option value="4">V4</option>
                                     <option value="5">V5</option>
                                     <option value="6">V6</option>
                                     <option value="7">V7</option>
                                     <option value="8">V8</option>
                                     <option value="9">V9</option>

                                 </select>
                             </div>

                             <div class="select_numero mt-4">
                                 <div class="">
                                     <label class="input-group-text" for="inputGroupSelect02">Numero</label>
                                 </div>
                                 <div class="form-group mt-2">
                                     <input type="text" class="form-control" id="numero" aria-describedby="numero" placeholder="Entrer le numero">

                                 </div>
                             </div>
                             <div class="select_id mt-4">
                                 <div class="">
                                     <label class="input-group-text" for="inputGroupSelect02">ID</label>
                                 </div>
                                 <div class="form-group mt-2">
                                     <input type="text" class="form-control" id="id" aria-describedby="id" value="45">

                                 </div>
                             </div>
                             <div class="select_message_erreur mt-4">
                                 <div class="">
                                     <label class="input-group-text" for="inputGroupSelect02">Message d'erreur</label>
                                 </div>
                                 <div class="form-group mt-2">
                                     <input type="text" class="form-control" id="message_erreur" aria-describedby="message_erreur" placeholder="Message d'erreur">

                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <div class="col d-flex justify-content-center">

                                 <button class="btn btn-primary" type="submit">Valider</button>
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