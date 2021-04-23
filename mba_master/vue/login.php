<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="mba_master/vue/css/loginMBA.css">
</head>

<body>
    <div class="container">
        <div class="col d-flex justify-content-center">
            <div class="image_logo_mba">
                <img src="mba_master/vue/image/logoE-media.png" alt="fff">
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 register-right">
                        <h2>MBA</h2>
                        <form action="mba_master/controller/controllerLogin" method="post">
                            <div class="register-form">
                                <div class="form-group">
                                    <input type="text" name="matricule" placeholder="matricule" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" placeholder="mot de passe" class="form-control" id="password" required>
                                </div>
                                <?php
                                if (isset($_SESSION['erreuradmin'])) {
                                    echo "<p style='color:white'>" . $_SESSION['erreuradmin'] . "</p>";
                                }

                                ?>
                                <label for="checkbox">
                                    <input type="checkbox" id="checkbox">
                                    Afficher le mot de passe
                                </label>
                                <div class="col d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary" value="Connexion"></input>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
<?php
    require_once("include/script.html");
?>
  <script src="mba_master/vue/js/login.js"></script>
</body>

</html>
<?php

?>