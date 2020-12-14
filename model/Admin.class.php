<?php



class Admin{
  
   private $matricule;
   private $mdp;
   private $base;

   public function __construct(PDO $base){
    $this->matricule  ;
    $this->mdp ;
    $this->setBase($base);  
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
public function setBase($base){
  $this->base = $base;
}

  public function login(){
    $requete = "SELECT * FROM SCOLARITE WHERE MATRICULE = :mat AND MDP = :mdp";
    $st = $this->base->prepare($requete);
    $st->execute(array("mat" => $this->getMatricule(),
                       "mdp"=> $this->getMdp()));

    $res=$st->fetchAll();
    $st->closeCursor();
    return $res;

  }


  
}
?>