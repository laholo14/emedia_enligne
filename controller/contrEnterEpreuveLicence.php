<?php 

if (!isset($_SESSION['matricule'])) {

    header("location: Connecter");
}
if (!isset($_SESSION['session_exam'])) {

    header("location: Home");
}

function loadclass($class)
{

    require "../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();

if(isset($_POST['sub_exam'])){
 
extract($_POST);
$verify = new Resultat();
$verify->setEtudiant($_SESSION['id']);
$verify->setSessiondexam($id_session_exam);
$verify->setMatiere($id_matiere);
$res = $verify->verify();
foreach($res as $resultat){
    $count = $resultat["COUNT(*)"];
}

//$count = 0;
if($count != 0){
    $_SESSION['interdit'] = '<div class="alert alert-danger  alert-dismissible fade show" style="position:relative;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Desolé!</strong><br>Vous avez déja passez cette épreuve.
    </div>';
    header("location:Examen");
    unset($_SESSION['envoie']);
    unset($_SESSION['echec']);

}else{
unset($_SESSION['interdit']);
unset($_SESSION['envoie']);
unset($_SESSION['echec']);
$insertresultat = new Resultat();
$insertresultat->setEtudiant($_SESSION['id']);
$insertresultat->setSessiondexam($id_session_exam);
$insertresultat->setMatiere($id_matiere);
$insertresultat->insertResultat();

}


}else{
    header("location: Examen");  
}


?>