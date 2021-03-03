<?php

require('include/header.php');
?>
<link rel="stylesheet" href="css/cours.css" type="text/css">
</head>

<body>
    <section>
        <div class="container">

            <div class="card p-2 mt-4">
                <h3 class="text-center mb-4">Unite d'enseignement</h3>
                <form class="form-inline d-flex justify-content-center">

                    <div class="form-group mx-sm-3 mb-2">

                        <input type="text" class="form-control" id="text_ue" placeholder="unite d'enseignement:">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" id="btn_ajout_ue">Creez</button>
                </form>
            </div>


            <div class="card p-2 mt-4">

                <h3 class="text-center mb-4">Element constitutif
                </h3>
                <form>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Ajouter une element constitutif:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="ajouter une element constitutif" id="text_ec">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Selectionnez l'unité d'enseignement correspondant:</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="select_ue">

                            </select>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Parcours</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="parcours">
                                <option value="" selected disabled>...</option>
                                <option value="CSS">CSS</option>
                                <option value="MSI">MSI</option>
                                <option value="ELE">ELE</option>
                                <option value="MPM">MPM</option>
                                <option value="JM">JM</option>
                                <option value="DPUM">DPUM</option>
                                <option value="DPAM">DPAM</option>
                                <option value="DIDM">DIDM</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Credit:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="text_credit" placeholder="credit">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Selectionnez la semestre correspondant:</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="select_semestre">

                                <option selected disabled>...</option>
                                <optgroup label="M1">
                                    <option value="S7">S7</option>
                                    <option value="S8">S8</option>
                                </optgroup>
                                <optgroup label="M2">
                                    <option selected disabled>...</option>
                                    <option value="S9">S9</option>
                                    <option value="S10">S10</option>
                                </optgroup>

                            </select>
                        </div>
                    </div>


                    <div class="form-group row ">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Selectionnez le mois correspondant:</label>
                        <div class="col-sm-8">
                            <select id="select_mois">
                                <optgroup label="1 ère Semestre">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </optgroup>
                                <optgroup label="2 ème Semestre">
                                    <option value="">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </optgroup>

                            </select>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="btn_ajout_ec">Creez</button>
                    </div>

                </form>


            </div>


            <div class="card p-2 mt-4">

                <h3 class="text-center mb-4">Cours
                </h3>
                <form id="ajout_dossier" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-4">Selectionnez un element constitutif:</label>
                        <div class="col-8">
                            <select name="elementConstitutif" id="select_ec">

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-4">Categorie:</label>
                        <div class="col-8">
                            <select name="categorie" id="">
                            <option selected disabled>...</option>
                                <option value="1">Cours</option>
                                <option value="2">Exercice</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-4">Selectionnez le format du contenu:</label>
                        <div class="col-8">
                            <select class="custom-select" name="type" id="format">
                                <option selected disabled>...</option>
                                <option value="1">Livre en pdf</option>
                                <option value="2">Video</option>
                            </select>
                        </div>
                    </div>

                    <div id="file">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-4">contenu pour les nationaux:</label>
                            <div class="col-8">
                                <input type="file" name="contenu_mg[]" type="file" accept="application/pdf" multiple />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputEmail3" class="col-4">contenu pour les etrangers:</label>
                            <div class="col-8">
                                <input type="file" name="contenu_fr[]" type="file" accept="application/pdf" multiple />
                            </div>
                        </div>
                    </div>

                    <div id="video">
                        <div class="form-group row ">
                            <label for="inputEmail3" class="col-4">contenu pour les nationaux:</label>
                            <div class="col-8">
                                <input type="text" class="form-control " id="lienVideoMg" name="lienVideoMg" placeholder="Lien video">
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label for="inputEmail3" class="col-4">contenu pour les etrangers:</label>
                            <div class="col-8">
                                <input type="text" class="form-control " name="lienVideoFr" placeholder="Lien video">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="btn_ajout_dossier">Ceez</button>
                    </div>

                </form>


            </div>





        </div>

    </section>
    <?php

    require('include/script.html');

    ?>
    <script src="js/coursAjax.js"></script>
    <script src="js/cours.js"></script>
</body>

</html>