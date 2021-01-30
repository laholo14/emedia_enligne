<?php
$currentPage = 'message';
require('include/header.php');
?>
<link rel="stylesheet" href="css/message.css">
<?php
require('include/nav.php');
?>
<section id="Message">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="titre_inscriptions mt-3 d-flex justify-content-center">
            <h2 class="text-center">Message MBA</h2>
        </div>
        <div class="bloc_list_etudiant mt-3">
            <form action="">
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead class="thead-background">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Filiere</th>
                                <th scope="col">Vague</th>
                                <th scope="col">Message</th>
                                <th scope="col">Repondre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>Vendredi 22 Janvier 2021 à 10:24</td>
                                <td>S2</td>
                                <td>Informatique et Télécommunication</td>
                                <td>TIC-V3/004/MG</td>
                                <td>fa otrany aona kay azafady ny manao an'lay exercice communication visuelles azafady, misaotra mialoha</td>
                                <td><button class="btn btn-success" type="button" data-toggle="modal" data-target=".bd-example-modal-xl">Repondre</button></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </form>

            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header col d-flex justify-content-center">
                            <h4 class="text-center mt-2">Message MBA</h4>
                        </div>
                        <div class="modal-body">
                            <div class="bloc_message_etudiant overflow-auto">
                                <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                                    <div class="row">

                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="message_etudiant ml-2 mt-3">
                                                <span>fa otrany aona kay azafady ny manao an'lay exercice communication visuelles azafady, misaotra mialoha</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="message_emedia d-flex ml-auto mr-2 mt-5">
                                                <span>fa otrany aona kay azafady ny manao an'lay exercice communication visuelles azafady, misaotra mialoha</span>
                                                <img src="./image/logoE-media.png" width="80px" height="45px" alt="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="message_etudiant ml-2 mt-3">
                                                <span>fa otrany aona kay azafady ny manao an'lay exercice communication visuelles azafady, misaotra mialoha</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="message_emedia d-flex ml-auto mr-2 mt-5">
                                                <span>fa otrany aona kay azafady ny manao an'lay exercice communication visuelles azafady, misaotra mialoha</span>
                                                <img src="./image/logoE-media.png" width="80px" height="45px" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Réponse:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <div class=" col d-flex justify-content-center">
                                <button type="button" class="btn btn-success mr-3">Envoyer</button>
                                <button type="button" class="btn btn-dark" data-dismiss="modal">close</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php

require('include/script.html');

?>
<script src="js/message.js"></script>
</body>

</html>