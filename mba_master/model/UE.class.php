<?php

class UE{
  
   private $idue;
   private $intituleue;

   public function __construct(){
    $this->idue  ;
    $this->intituleue ;
}
  

public function getIdue(){
    return  $this->idue;
  }  
public function getIntituleue(){
    return  $this->intituleue;
  }  
         

public function setIdue($idue){
    $this->idue = $idue;
}
public function setIntituleue($intituleue){
    $this->intituleue = $intituleue;
}

    public function create() {
        $db=Connexion::getCx();
        $requete = "INSERT INTO UE VALUES(null, :intituleue)";
        $st = $db->prepare($requete);
        $st->execute(array(
            "intituleue" => $this->getIntituleue()
        ));
        $st->closeCursor();
        return "Ajout reussi";
    }
    public function readById() {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM UE WHERE IDUE = :idue";
        $st = $db->prepare($requete);
        $st->execute(array(
            "ide" => $this->getIdue()
        ));
        $resultat = $st->fetchAll();
        $st->closeCursor();
        return $resultat;
    }
    public function readAll() {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM UE";
        $st = $db->prepare($requete);
        $st->execute(array());
        $resultat = $st->fetchAll();
        $st->closeCursor();
        return $resultat;
    }
    public function update() {
        $db=Connexion::getCx();
        $requete = "UPDATE UE SET intituleue = :intituleue WHERE idue = :idue";
        $st = $db->prepare($requete);
        $st->execute(array(
            "intituleue" => $this->getIntituleue(),
            "idue" => $this->getIdue()
        ));
        
    }
    public function delete() {
        $db=Connexion::getCx();
        $requete = "DELETE FROM UE WHERE idue = :idue";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idue" => $this->getIdue()
        ));
    }
}
?>