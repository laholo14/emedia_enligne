<?php 

session_start();

function loadclass($class){
  
  require "../../model/".$class.'.class.php';
}
spl_autoload_register("loadclass");


$db = new Connexion();

  if(isset($_POST["login"]) and isset($_POST["pass"])){

    extract($_POST);

    $log = new Admin();

    $log->setMatricule($login);
    $crypt = new Cryptage();
    $mdp = $crypt->crpt14($pass);
    //$mdp = md5($pass);

    $log->setMdp($mdp);

    $res = $log->login();

    foreach($res as $resultat){

     $_SESSION['matriculeadmin']=$resultat['MATRICULE'];

     $_SESSION['mdpadmin']=$resultat['MDP'];

    }

 if(isset($_SESSION['matriculeadmin'])){
     if($_SESSION['matriculeadmin'] == 'SCOL-001' or $_SESSION['matriculeadmin'] == 'SCOL-002'){
       $_SESSION['admin'] = 'licence'; 
     }else if($_SESSION['matriculeadmin'] == 'SCOL-003'){
      $_SESSION['admin'] = 'master'; 
     }else{
       $_SESSION['admin'] = 'admintsisy';
     }
    header("location: ../../Bureau");
   //  echo 'marina';
 }else{
  $_SESSION['erreuradmin'] = "Matricule ou mot de passe incorrect";

  header("location: ../../Succes");
}

}else{
  header("location: ../../Succes");
}
