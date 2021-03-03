<?php 

session_start();

function loadclass($class){
  
  require "../model/".$class.'.class.php';
}
spl_autoload_register("loadclass");



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
/*
  $query = "INSERT INTO LOGIN_DETAILS (MATRICULESTATUS) VALUES('".$_SESSION['matriculeadmin']."')";
                    $statement = ->prepare($query);
                    $statement->execute();
                    $_SESSION['LOGIN_DETAILS_ID'] = ->lastInsertId();
*/
     header("location: admin.php");

 

 }else{
  $_SESSION['erreuradmin'] = "Matricule ou mot de passe incorrect";

  header("location:../Suppr");
}

}else{
  header("location:../Suppr");
}

?>

