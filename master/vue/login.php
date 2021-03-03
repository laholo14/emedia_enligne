<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 register-right">
                        <h2>MASTER</h2>
                        <form action="master/controller/controllerLogin" method="post">
                            <div class="register-form">
                                <div class="form-group">
                                    <input type="text" name="matricule" placeholder="matricule" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" placeholder="mot de passe" class="form-control" id="password" required>

                                    <label for="checkbox">
                                        <input type="checkbox" id="checkbox">
                                        Afficher le mot de passe
                                    </label>
                                    <div class="col d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary" value="Connexion"></input>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

</html>