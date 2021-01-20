<?php
$currentPage = 'etudiant';
require('include/header.php');
?>
<link rel="stylesheet" href="css/etudiantMBA.css">
<?php
require('include/nav.php');
?>
<section id="Liste_etudiant">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="titre_inscriptions mt-3 d-flex justify-content-center">
            <h2 class="text-center">Listes des vagues</h2>
        </div>
        <div class="bloc_list_etudiant mt-3">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-4">
                    <div class="form_ajoute_vague">
                        <form class="form-inline">

                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Vague</label>
                                <input type="text" class="form-control" id="vague" placeholder="Vague">
                            </div>
                            <button type="submit" class="btn btn-ajouter mb-2">Ajouter</button>
                        </form>
                    </div>
                    <div class="form_recherche_vague mt-2">
                        <form class="form-inline">

                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" id="vague" placeholder="Recherche">
                            </div>
                        </form>
                    </div>
                    <div class="bloc_modifier_vague mt-2">
                        <div class="titre_entrer_vague ml-4 row justify-content-between mr-1">
                            <h4>Vague</h4>
                            <h4>Date d'entrée</h4>
                            <h4>Modifier</h4>
                        </div>
                        <div class="accordion ml-3 mb-4 mt-2" id="accordionExample">
                            <div class="card mt-3">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="content_modifier_vague  row ">
                                                <h5 class="vague">V1</h5>
                                                <h5 class="date">2020-07-03</h5>
                                                <i class="fa fa-edit icon"></i>
                                            </div>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="titre_modifier_vague">
                                            <h5 class="text-center">Ajouter/Modifier date d'entré</h5>
                                        </div>
                                        <div class="corps_modifier">
                                            <h6 class="mt-4">Vague :</h6>
                                            <div class="form_modifier_vague mt-3">
                                                <form>

                                                    <div class="form-group  mb-2">
                                                        <input type="text" class="form-control" id="vague" value="V1">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>




                            <div class="card mt-3">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <div class="content_modifier_vague  row ">
                                                <h5 class="vague">V2</h5>
                                                <h5 class="date">2020-07-03</h5>
                                                <i class="fa fa-edit icon"></i>
                                            </div>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseTwo" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="titre_modifier_vague">
                                            <h5 class="text-center">Ajouter/Modifier date d'entré</h5>
                                        </div>
                                        <div class="corps_modifier">
                                            <h6 class="mt-4">Vague :</h6>
                                            <div class="form_modifier_vague mt-3">
                                                <form>

                                                    <div class="form-group  mb-2">
                                                        <input type="text" class="form-control" id="vague" value="V1">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card_vague">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">

                                <div class="card p-2 ml-5 mt-5 " style="width: 9rem;">
                                    <div class="col d-flex justify-content-center">
                                        <div class="card-header-mba ">
                                            <h5 class="text-center">MBA</h5>

                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="text-center">V1 <span class="badge badge-danger">4</span></h5>
                                        <div class="col d-flex justify-content-center">
                                            <a href="liste_etudiant.php" class="btn boutton">Lire</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="card p-2 ml-5 mt-5 " style="width: 9rem;">
                                    <div class="col d-flex justify-content-center">
                                        <div class="card-header-mba ">
                                            <h5 class="text-center">MBA</h5>

                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="text-center">V2 <span class="badge badge-danger">4</span></h5>
                                        <div class="col d-flex justify-content-center">
                                            <a href="liste_etudiant.php" class="btn boutton">Lire</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="card p-2 ml-5 mt-5 " style="width: 9rem;">
                                    <div class="col d-flex justify-content-center">
                                        <div class="card-header-mba ">
                                            <h5 class="text-center">MBA</h5>

                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="text-center">V3 <span class="badge badge-danger">4</span></h5>
                                        <div class="col d-flex justify-content-center">
                                            <a href="liste_etudiant.php" class="btn boutton">Lire</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
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

</body>

</html>