<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <img src="image/logo E-media.png" height="40" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="../../Bureau">Inscription<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminEtudiant.php">Etudiant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admission.php">Admission</a>
                </li>
                <li class="nav-item active">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" style="cursor :pointer;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cours</a>
                        <div class="dropdown-menu" aria-labelldby="dropdownMenuLink">
                            <a class="dropdown-item" href="adminMatiere.php">Ajout EC</a>
                            <a class="dropdown-item" href="adminEnseigner.php">Ajout EC par Mention</a>
                            <a class="dropdown-item" href="adminDossier.php">Ajout des Formations</a>
                        </div>

                    </li>
                    <li class="nav-item active">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" style="cursor :pointer;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Examen</a>
                            <div class="dropdown-menu" aria-labelldby="dropdownMenuLink">
                                <a class="nav-link" href="adminExam.php">Ajout Examen</a>
                                <a class="nav-link" href="adminNote.php">Resultat & Note</a>
                                <a class="nav-link" href="AdminRepechage.php">Liste repéchage</a>
                                <a class="nav-link" href="examenSpecifique.php">Insértion Examen Spécifique</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="statusEtudiants.php">Status des Etudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminMessage.php">Message</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="btn btn-danger" href="logoutadmin.php">Se deconnecter</a>
                    </li>
                </ul>



        </div>
    </div>
</nav>