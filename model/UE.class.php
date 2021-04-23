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
    }
    public function search($search){
        $db=Connexion::getCx();

        $requete = "SELECT * FROM UE WHERE INTITULEUE LIKE :search ORDER BY INTITULEUE ASC";
        $st = $db->prepare($requete);
        $st->execute(array("search"=> $search 
                                                        
        ));
        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;

        
    }
    public function verify(){
        $db=Connexion::getCx();
        $sql="SELECT COUNT(*) FROM UE WHERE INTITULEUE = :idue";
        $st=$db->prepare($sql);
        $st->execute(array(

            "idue" => $this->getIdue()
        ));

        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function readById() {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM UE WHERE IDUE = :idue";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idue" => $this->getIdue()
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
    public function readIdUe($nom) {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM UE WHERE INTITULEUE = :intitule";
        $st = $db->prepare($requete);
        $st->execute(array(
            "intitule" => $nom
        ));
        $resultat = $st->fetchAll();
        $st->closeCursor();
        return $resultat;
    }
    public function listUe_id(){
        $db=Connexion::getCx();

        $requete = "SELECT * FROM UE where IDUE = :idue ORDER BY IDUE ASC";

        $st = $db->prepare($requete);
        $st->execute(array("idue"=> $this->getIdue()
                                                        
        ));
        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;

        
    }

}
?>