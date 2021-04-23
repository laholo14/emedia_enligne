<?php



class Admin{
  
   private $matricule;
   private $mdp;
  

   public function __construct(){
    $this->matricule  ;
    $this->mdp ;
 
}
  

public function getMatricule(){
    return  $this->matricule;
  }  
public function getMdp(){
    return  $this->mdp;
  }  
         

public function setMatricule($matricule){
    $this->matricule = $matricule;
}
public function setMdp($mdp){
    $this->mdp  = $mdp;
}

  public function login(){
    $db=Connexion::getCx();
    $requete = "SELECT * FROM SCOLARITE WHERE MATRICULE = :mat AND MDP = :mdp";
    $st = $db->prepare($requete);
    $st->execute(array("mat" => $this->getMatricule(),
                       "mdp"=> $this->getMdp()));

    $res=$st->fetchAll();
    $st->closeCursor();
    return $res;

  }


  
}
?>