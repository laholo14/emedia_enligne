<?php
session_start();
session_destroy();
?>
<?php
require('head.html');
?>
<link rel="stylesheet" href="vue/css/login.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center login mt-5">
                <div class="login_contenu mt-md-5 mt-lg-5 mt-xl-5">
                    <img src="vue/image/logo/logo_E-media_enligne.png" alt="">
                    <h3 class="text-center">Se connecter</h3>
                    <div class="form">
                        <form action="controller/controllerLogin" method="post" class="d-flex flex-column align-items-center">
                            <div class="login_input">
                                <div><input type="text" placeholder="Matricule" name="matricule" required></div>
                                <div class="mt-3 mb-3"><input type="password" placeholder="Mot de passe" name="password" id="password" required></div>
                                <?php
                                if (isset($_SESSION['erreur'])) {
                                    echo "<p style='color:white'>" . $_SESSION['erreur'] . "</p>";
                                }
                                ?>
                                <label for="checkbox">
                                    <input type="checkbox" id="checkbox">
                                    Afficher le mot de passe
                                </label>
                            </div>

                            <div class="login_button d-flex mb-3">
                                <div class="col-6 login_button_sinscrire">
                                    <a href="Register" class="btn btn-success">S'inscrire ici</a>
                                </div>

                                <div class="col-6 login_button_seconnecter">
                                    <input type="submit" value="Se connecter" class="btn btn-primary" name="connect" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require('script.html');
    ?>
    <script src="vue/js/login.js"></script>
</body>

</html>
<?php

?>