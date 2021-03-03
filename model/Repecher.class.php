<?php

class Repecher{
    private $idEtudiant;
    private $idMatiere;
    private $montant;
    private $etat;

    public function __construct()
    {
        $this->idEtudiant;
        $this->idMatiere;
        $this->montant;
        $this->etat;
    }

    public function setIdEtudiant($idEtudiant){
        $this->idEtudiant = $idEtudiant;
    }
    public function setIdMatiere($idMatiere){
      $this->idMatiere=$idMatiere;

    }
    public function setMontant($montant){
      $this->montant=$montant;

    }

    public function setEtat($etat){
      $this->etat=$etat;

    }
    public function getIdEtudiant(){
        return $this->idEtudiant;
    }
    public function getIdMatiere(){
      return $this->idMatiere;
    }
    public function getMontant(){
      return $this->montant;
    }
    public function getEtat(){
      return $this->etat;
    }
    

   public function create(){
      $db=Connexion::getCx();
       $requete = "INSERT INTO REPECHER VALUES(:idEtudiant , :idMatiere, :montant, :etat)";
       $st = $db->prepare($requete);
       $st->execute(array(
           "idEtudiant" => $this->getIdEtudiant(),
           "idMatiere" => $this->getIdMatiere(),
           "montant" => $this->getMontant(),
           "etat" => $this->getEtat()
       ));
       $st->closeCursor();
   }public function delete(){
    $db=Connexion::getCx();
     $requete = "DELETE FROM REPECHER WHERE IDETUDIANTS=:idEtudiant and IDMATIERE=:idMatiere";
     $st = $db->prepare($requete);
     $st->execute(array(
         "idEtudiant" => $this->getIdEtudiant(),
         "idMatiere" => $this->getIdMatiere()
     ));
     $st->closeCursor();
 }
 public function readEtudById($idEtudiant)
 {
  $db=Connexion::getCx();
  $sql = "SELECT * FROM REPECHER NATURAL JOIN MATIERE WHERE IDETUDIANTS ='".$idEtudiant."'";
  $st =$db->query($sql);
  $res = $st->fetchAll();
  $st->closeCursor();
  return $res;

 }
 public function readTotal($idEtudiant)
 {
  $db=Connexion::getCx();
  $sql = "SELECT sum(MONTANT) as MONTANT FROM REPECHER NATURAL JOIN MATIERE WHERE IDETUDIANTS ='".$idEtudiant."'";
  $st =$db->query($sql);
  $res = $st->fetchAll();
  $st->closeCursor();
  return $res;

 }
   public function deleteMatById($idMatiere)
   {
        $db=Connexion::getCx();
    $sql = "DELETE FROM REPECHER WHERE IDMATIERE ='".$idMatiere."'";
    $st = $db->prepare($sql);
    $st->execute();
    $st->closeCursor();

   }
       public function readNbrEtudById($idEtudiant)
       {
        $db=Connexion::getCx();
        $sql = "SELECT COUNT(*) as 'nombreEtudiant' FROM REPECHER WHERE IDETUDIANTS ='".$idEtudiant."'";
        $st =$db->query($sql);
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;

       }
       public function verify()
       {
           $db=Connexion::getCx();
           $requete = "SELECT * FROM REPECHER WHERE IDETUDIANTS = :idetudiant  AND IDMATIERE = :idmat";
           $st = $db->prepare($requete);
           $st->execute(array(
               "idetudiant" => $this->getIdEtudiant(),
               "idmat" => $this->getIdMatiere()
           ));
   
           $res = $st->fetchAll();
           $st->closeCursor();
           return $res;
       }
       public function verifyEtudiant()
       {
           $db=Connexion::getCx();
           $requete = "SELECT * FROM REPECHER WHERE IDETUDIANTS = :idetudiant";
           $st = $db->prepare($requete);
           $st->execute(array("idetudiant" => $this->getIdEtudiant()));
           $res = $st->fetchAll();
           $st->closeCursor();
           return $res;
       }
}
?>