<?php

function loadclass($class)
{
    require "../model/" . $class . '.class.php';
}
spl_autoload_register("loadclass");

if (isset($_POST['listVagueAcordion'])) {

    $afficahge = new Datyfidirana();
    $res = $afficahge->read_mba();
    $table = "";
    foreach ($res as $resultat) {
        if($resultat['DATYFIDIRANA'] == ""){
            $daty = "0000-00-00";
        }else{
            $daty = $resultat['DATYFIDIRANA'] ;
        }
        $table .= '<div class="accordion ml-3 mb-4 mt-2" id="'.$resultat['CODE'].'">
        <div class="card mt-3">
            <div class="card-header" id="">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#'.'collapse'.$resultat['IDDATYFIDIRANA'].'" aria-expanded="true" aria-controls="'.'collapse'.$resultat['IDDATYFIDIRANA'].'">
                        <div class="content_modifier_vague  row ">
                            <h5 class="vague">'.$resultat['CODE'].'</h5>
                            <h5 class="date">'.$daty.'</h5>
                            <i class="fa fa-edit icon"></i>
                        </div>
                    </button>
                </h2>
            </div>

            <div id="'.'collapse'.$resultat['IDDATYFIDIRANA'].'" class="collapse" aria-labelledby="" data-parent="#'.$resultat['CODE'].'">
                <div class="card-body">
                    <div class="titre_modifier_vague">
                        <h5 class="text-center">Ajouter/Modifier date d\'entré</h5>
                    </div>
                    <div class="corps_modifier">
                        <h6 class="mt-4">Vague :</h6>
                        <div class="form_modifier_vague mt-3">
                            <form>

                                <div class="form-group  mb-2">
                                    <input type="text" class="form-control" id="vague" value="'.$resultat['CODE'].'">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>';
    }
    echo $table;
}


?>



<?php ?>