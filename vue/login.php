<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Se connecter</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="vue/css/login.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center login">
                <div class="login_contenu">
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="vue/js/login.js"></script>
</body>

</html>
<?php

?>