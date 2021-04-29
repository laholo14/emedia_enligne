<?php
session_start();
function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}
        if (isset($_POST['semestre'])) {
            $cours = new Formation();
            $cours->setSemetre($_POST['semestre']);
            $cours->setFiliere($_SESSION['filiere']);
            $cours->setMois($_SESSION['mois']);
            $cours->setCategorie(1);
            $cours->setType(1);

            if ($_SESSION['semestre'] != 'S5' or $_SESSION['semestre'] != 'S6' or $_SESSION['semestre'] != 'S9' or $_SESSION['semestre'] != 'S10') {

                $tabvague = explode("V", $_SESSION['vague']);
                for ($i = 0; $i < count($tabvague); $i++) {
                    $numvague = $tabvague[$i];
                }

                if ($numvague >= 7 and $_SESSION['diplome'] === 'MASTER') {
                    $tableaucours = $cours->formationMBAV7();
                } else if ($numvague <= 7 or ($numvague > 7 and $_SESSION['diplome'] === 'LICENCE')) {
                    $tableaucours = $cours->formationL1L2M1();
                }
            } else {

                $tableaucours = $cours->formationL3M2();
            }

            foreach ($tableaucours as $resultat) {
                $contenuTab = explode(",", $resultat['CONTENU_FR']);
                $contenuTabSize = sizeof($contenuTab);

                if ($contenuTabSize == 1) {
                    $tabsize = $contenuTabSize;
                } else {
                    $tabsize = $contenuTabSize - 1;
                }


                for ($i = 0; $i < $tabsize; $i++) {
                    $courslivres = $contenuTab[$i];

                    if ($contenuTabSize <= 2) {
                        $partie = '';
                        $part = '';
                    } else {
                        $part = $i + 1;
                        $partie = ' Partie';
                    } 
            ?>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-5">
                <div class="mb-2 pt-2 cours text-center">
                    <h5 class="d-flex justify-content-center align-items-center"><?php echo $resultat['INTITULE']; ?></h5>
                    <div class="button-cours d-block">
                        <!--
                            <button class="btn mt-2 active-cours-pdf" onclick="GetPDF('<?php echo $courslivres;  ?>','<?php echo $resultat['INTITULE'] . $partie . ' ' . $part; ?>')">PDF</button>
                        -->     


<a href="http://online.verypdf.com/app/reader2/web/?url=https://e-media-madagascar.com/universite/Cours/<?php echo $courslivres;  ?>&noopen=1&noprint=1&nosidebar=1&nofullscreen=1&nodownload=1&noviewbookmark=1&nofind=1&nomoretools=1" target='_blank' onmouseover="window.status='http://tonsite.com'" class="btn mt-2"><b>PDF</b> </a>

                        
                        <button class="btn active-cours-explication" onclick="GetYOUTUBE(<?php echo $resultat['IDMATIERE']; ?>,'<?php echo $resultat['INTITULE']; ?>','<?php echo $_POST['semestre']; ?>')">Explication</button>

                    </div>
                </div>
            </div>
    <?php
                }
            }
        }
    ?>
