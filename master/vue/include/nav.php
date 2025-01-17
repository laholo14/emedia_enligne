<link rel="stylesheet" href="css/header.css">
</head>

<body>
  
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">MBA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'inscription' ? 'active' : '' ?>" href="inscription">Inscriptions <span class="badge badge-danger" id="count-inscription"></span></a>
                    </li>
                    <li class="n
                    av-item">
                        <a class="nav-link <?php echo $currentPage == 'etudiant' ? 'active' : '' ?>" href="etudiant">Etudiants <span class="badge badge-success" id="count-etudiants"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'cours' ? 'active' : '' ?>" href="cours">Cours</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'examens' ? 'active' : '' ?>" href="examens">Examen</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'admission' ? 'active' : '' ?>" href="admission">Admissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'status' ? 'active' : '' ?>" href="status">Statuts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'message' ? 'active' : '' ?>" href="message">Messages<span class="badge badge-primary">20</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage == 'scolarite' ? 'active' : '' ?>" href="scolarite">Scolarites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/controllerLogout"><i class="fa fa-power-off ml-4"></i></a>
                    </li>

                </ul>

            </div>
        </nav>
   