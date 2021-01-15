<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="jquery/owl.carousel/assets/owl.carousel.min.css">

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">MBA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage=='index' ? 'active' : '' ?>" href="index.php">Inscriptions<span class="badge badge-danger">4</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage=='etudiant' ? 'active' : '' ?>" href="etudiant.php">Etudiants<span class="badge badge-success">560</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage=='cours' ? 'active' : '' ?>" href="cours.php">Cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage=='examens' ? 'active' : '' ?>" href="examens.php">Examens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage=='admission' ? 'active' : '' ?>" href="admission.php">Admissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage=='status' ? 'active' : '' ?>" href="status.php">Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage=='message' ? 'active' : '' ?>" href="message.php">Messages<span class="badge badge-primary">20</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage=='scolarite' ? 'active' : '' ?>" href="scolarite.php">Scolarites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-power-off ml-4"></i></a>
                    </li>

                </ul>
                
            </div>
        </nav>





    </div>
