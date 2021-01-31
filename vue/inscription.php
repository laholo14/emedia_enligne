<?php
//14-03-00
ob_start();

session_start();

session_destroy();

require_once("../model/Connexion.class.php");

?>
<?php
require('head.html');
?>
<link rel="stylesheet" href="vue/css/inscription.css">
<title>Inscription</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 d-flex justify-content-center">

                <?php

                if (isset($_SESSION['reesayer'])) {
                    echo $_SESSION['reesayer'];
                } else  if (isset($_SESSION['anarana'])) {
                    echo $_SESSION['anarana'];
                } else if (isset($_SESSION['extensioner'])) {
                    echo $_SESSION['extensioner'];
                } else if (isset($_SESSION['taille'])) {
                    echo $_SESSION['taille'];
                } else if (isset($_SESSION['echec'])) {

                    echo $_SESSION['echec'];
                } else if (isset($_SESSION['connect'])) {

                    echo $_SESSION['connect'];
                }

                ?>
                <div class="cesar">
                    <div class="">
                        <a href="vue/Lettre d'engagement.pdf" class="" download>
                            <img class="im-fluid info mt-5 pb-5" src="vue/image/iesa.png" alt="info" width="100%" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 overflow-auto inscription">
                <h4 class="text-center">Fiche d'inscription:</h4>

                <form method="POST" class="form" id="form1" action="controller/contrinscription.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="start" class="titre">Nom:</label>
                        <input type="text" name="name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="start" class="titre">prénom(s):</label>
                        <input type="text" name="firstname" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="start" class="titre">Date et lieu de naissance:</label><br>
                        <input type="date" id="start" name="born" value="1990-01-01" min="" max="" class="form-control" required><br>
                        <input type="text" placeholder="lieu" name="lieu" style="margin-top:-20px;" class="form-control" required />
                    </div>
                    <div class="radio-radio">
                        <label class="radio">
                            <input type="radio" value="masculin" name="sexe">Masculin<span></span>
                        </label>
                        <label class="radio">
                            <input type="radio" value="feminin" name="sexe">Feminin <span></span>
                        </label>
                    </div>


                    <div>
                        <label for="start" class="titre">Obtenir un diplôme de:</label>
                        <select class="form-control" id="obtenir" name="obtenir" required>
                            <option selected disabled>Choisissez ici</option>
                            <option value="LICENCE">Licence</option>
                            <option value="MASTER">Master</option>
                        </select>
                    </div>

                    <div>
                        <label for="start" class="titre">Choix du Niveau:</label>
                        <select class="form-control" id="niveau" name="niveau" required>

                        </select>
                    </div>

                    <div>
                        <label for="start" class="titre">Mention:</label>

                        <select class="form-control" id='filiere' name='filiere' required>

                        </select>
                    </div>

                    <div>
                        <label for="start" class="titre">Parcours:</label><br>
                        <label for="start" class="titre" style="margin-top:-100px; padding-left:70px;font-size:13px;">1er choix:</label>
                        <select class="form-control" id='parcours' name='parcours' required>
                        </select>

                        <label for="start" class="titre" style="margin-top:-100px;padding-left:70px;font-size:13px;">2ème choix:</label>
                        <select class="form-control" id='parcours2'>

                        </select>

                    </div>

                    <label for="start" class="titre">Pays d'origine:</label>
                    <select class="form-control" name="pays" id="pays" required>
                        <option value="MG">Madagascar</option>
                        <?php
                        $requete = Connexion::getCx()->query("select * from PAYS");
                        while ($donnees = $requete->fetch()) {
                        ?>
                            <option value="<?php echo $donnees['alpha2']; ?>"><?php echo $donnees['nom_fr_fr']; ?></option>
                        <?php }
                        $requete->closeCursor();
                        ?>
                    </select>
                    <div class="form-group">
                        <label for="start" class="titre">ville:</label>
                        <input type="text" name="ville" class="form-control" required />
                    </div>


                    <div class="block3">
                        <div class="form-group">
                            <label for="start" class="titre">adresse:</label>
                            <input type="text" name="adresse" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">1er contact:</label>
                            <input type="text" name="numero1" id="num1" class="form-control contact" maxlength="16" required />
                            <strong class="text-danger" id="num_error" style="display:none;">Error exemple: 261XXXXXXXXX sans espace<br>261 si vous ètes à Madagascar</strong>
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">2ème contact:</label>
                            <input type="text" name="numero2" id="num2" class="form-control contact" required />
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">Adresse gmail:(*)</label>
                            <input type="email" name="mail" id="gmail" class="form-control" required />
                            <strong class="text-danger" id="mail_error" style="display:none;">Veuillez saisir une adresse "@gmail.com"</strong>
                        </div>

                        <div class="form-group">
                            <label for="start" class="titre">nom du père:</label>
                            <input type="text" name="pere" id="" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">contact du père:</label>
                            <input type="text" name="cpere" id="num3" class="form-control contact" />
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">nom de la mère:</label>
                            <input type="text" name="mere" id="" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">contact de la mère:</label>
                            <input type="text" name="cmere" id="num4" class="form-control contact" />
                        </div>
                        <div class="form-group">
                            <label for="start" class="titre">tuteur:</label>
                            <input type="text" name="tuteur" id="" class="form-control" />
                        </div>
                        <div class="">
                            <label for="start" class="titre">contact du tuteur:</label>
                            <input type="text" name="ctuteur" id="num5" class="form-control contact" />
                        </div>
                    </div>
                    <div class="import block4" style="margin-top: 26px;">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" style="margin-top:0px;" placeholder="* CIN" readonly>
                                <div class="input-group-btn">
                                    <span class="fileUpload btn btn-primary">
                                        <span class="upl" id="upload">Importer</span>
                                        <input type="file" class="upload up" name="cin" onchange="readURL(this);" accept="image/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" />
                                    </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" style="margin-top:0px;" placeholder="* curriculum vitae" readonly>
                                <div class="input-group-btn">
                                    <span class="fileUpload btn btn-primary">
                                        <span class="upl" id="upload">Importer</span>
                                        <input type="file" class="upload up" name="cv" onchange="readURL(this);" accept="image/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" />
                                    </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                        </div><!-- form-group -->
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" style="margin-top:0px;" placeholder="* note ou copie du diplôme certifié" readonly>
                                <div class="input-group-btn">
                                    <span class="fileUpload btn btn-primary">
                                        <span class="upl" id="upload">Importer</span>
                                        <input type="file" class="upload up" name="note[]" onchange="readURL(this);" accept="image/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" multiple />
                                    </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                        </div><!-- form-group -->
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" style="margin-top:0px;" placeholder="* certificat de résidence" readonly>
                                <div class="input-group-btn">
                                    <span class="fileUpload btn btn-primary">
                                        <span class="upl" id="upload">Importer</span>
                                        <input type="file" class="upload up" name="residence" onchange="readURL(this);" accept="image/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" />
                                    </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                        </div><!-- form-group -->
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" style="margin-top:0px;" placeholder="* bulletin de naissance" readonly>
                                <div class="input-group-btn">
                                    <span class="fileUpload btn btn-primary">
                                        <span class="upl" id="upload">Importer</span>
                                        <input type="file" class="upload up" name="bnais" onchange="readURL(this);" accept="image/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" />
                                    </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                        </div><!-- form-group -->
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" style="margin-top:0px;" placeholder="* lettre de motivation" readonly>
                                <div class="input-group-btn">
                                    <span class="fileUpload btn btn-primary">
                                        <span class="upl" id="upload">Importer</span>
                                        <input type="file" class="upload up" name="lettre" onchange="readURL(this);" accept="image/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" />
                                    </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" style="margin-top:0px;" placeholder="* photo d'identitée" readonly>
                                <div class="input-group-btn">
                                    <span class="fileUpload btn btn-primary">
                                        <span class="upl" id="upload">Importer</span>
                                        <input type="file" class="upload up" name="photo" onchange="readURL(this);" accept="image/*" />
                                    </span><!-- btn-orange -->
                                </div><!-- btn -->
                            </div><!-- group -->
                        </div><!-- form-group -->
                        <div style="margin-bottom:10px">
                            <a href="#demo" class="btn btn-danger" data-toggle="collapse" id="tou"><b>Engagement | Fanekena</b></a><br>
                            <p style="font-size:14px;" id="pa">- Tous les diplôme,....</p>
                            <div id="demo" class="collapse">
                                <div class="overflow-auto" style="height:500px;padding-top:10px;font-size:12px;">
                                    <img src="vue/image/france.png" width="7%" class="img-fluid" />- Tous les diplômes, noms et autres informations fournis sont exactes.<br>
                                    - Accepter les conditions d’admissibilités et les règlements de l’établissement.<br>
                                    - Ne divulguer aucun contenu total ou partiel de ce site.<br>
                                    - Honorer mes frais de formations et les divers frais y afférant.<br>
                                    - Ne pas partager le mot de passe, autoriser d’autres personnes à accéder à mon compte, ni transférer mon compte à quiconque (sans l’autorisation de l’établissement).<br>
                                    - Aucun remboursement n’est possible après l’inscription ou tout autre paiement.<br><br>
                                    <b> En cliquant sur le bouton inscription, j’atteste avoir lu et pris conscience tous les règlements de l’établissement.</b><br><br>
                                    <img src="vue/image/mada.png" width="7%" class="img-fluid" /> - Marina avokoa ireo maripahaizana, anarana sy andinindininy rehetra nomeko.<br>
                                    - Manaiky ireo fepetra rehetra fidirana sy mifehy ny sekoly.<br>
                                    - Tsy hizara na amin’ny apahany na manontolo ny fianarana sy ny voarakitra rehetra anaty tranonkala.<br>
                                    - Hanaja ny fandoavana ny sarampianarana sy ireo sarany hafa rehetra tokony aloha amin’ny fianarako.<br>
                                    - Tsy hizara ny tenimiafina, tsy hampiditra olonkafa ao amin’ny kaontiko na ihany koa hamindra ny kaontiko ho amin’ny olonkafa (raha tsy mahazo fahazahoandalana manokana avy amin’ny sekoly).<br>
                                    - Tsy misy vola azo haverina intsony rehefa voaloha.<br><br>
                                    <b>Rehefa manindry ny bokotra fisoratana anarana aho dia manaiky tanteraka tsy antery ny lalana mifehy ny sekoly.</b> <br> <br>
                                    <input type="checkbox" id="check" name="regagree" value="valeur" onClick="ChangeStatut(this.form)" disabled /> <b style="font-size:16px;">Lu et Approuvé | Voavaky ary Ekena </b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div><input type="submit" class="btn btn-primary btn-block" id="submit" value="inscription" name="validation" disabled /></div>
                </form>
            </div>
        </div>
    </div>

    <?php
    require('script.html');
    ?>

    <script src="vue/js/inscription.js"></script>
    <script src="vue/js/inscriptionJS.js"></script>
</body>

</html>

<?php

ob_end_flush();

?>