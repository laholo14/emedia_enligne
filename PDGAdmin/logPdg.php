<?php

ob_start();

session_start();

session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="vue/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="vue/css/loginadmin.css" type="text/css" />
    <link rel="stylesheet" href="vue/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
    <script src="vue/js/jquery.min.js"></script>
    <script src="vue/js/popper.js"></script>
    <script src="vue/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="login-container d-flex align-items-center ">
        <form class="login-form text-center" method="post" action="PDGAdmin/contrloginadmin">
            <img src="vue/image/logo E-media.png" class="image" alt="">
            <div class="form-group">
                <input type="text" name="login" class="form-control rounded-pill form-control-lg" placeholder="Login..." required>
            </div>
            <div class="form-group">
                <input type="password" name="pass" class="form-control rounded-pill form-control-lg" id="password" placeholder="Mot de passe..." required>
                <label for="checkbox">
                    <input type="checkbox" id="checkbox">
                    Afficher le mot de passe
                </label>
            </div>
            <input type='submit' class="btn mt-5 btn-primary btn-custom btn-block text-uppercase rounded-pill btn-lg" value="lognin">
            <?php
            if (isset($_SESSION['erreuradmin'])) {
                echo $_SESSION['erreuradmin'];
            }
            ?>
        </form>

    </div>
</body>
<script>
    $(document).ready(function() {
        let checkbox = $("#checkbox");
        let password = $("#password");
        checkbox.click(function() {
            if (checkbox.prop("checked")) {
                password.attr("type", "text");
            } else {
                password.attr("type", "password");
            }
        });
    });
</script>

<script>
    
    //edit this message to say what you want
    let message = "Clic droite désactiver";

    function clickIE() {
        if (document.all) {
            //alert(message);
            return false;
        }
    }

    function clickNS(e) {
        if (document.layers || (document.getElementById && !document.all)) {
            if (e.which == 2 || e.which == 3) {
                //alert(message);
                return false;
            }
        }
    }
    if (document.layers) {
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown = clickNS;
    } else {
        document.onmouseup = clickNS;
        document.oncontextmenu = clickIE;
    }
    document.oncontextmenu = new Function("return false")
    //
    
</script>

</html>

<?php

ob_end_flush();

?>