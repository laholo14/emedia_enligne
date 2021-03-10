<?php

class Repecher{
    private $idEtudiant;
    private $idMatiere;
    private $semestre;
    private $montant;
    private $etat;

    public function __construct()
    {
        $this->idEtudiant;
        $this->idMatiere;
        $this->semestre;
        $this->montant;
        $this->etat;
    }

    public function setIdEtudiant($idEtudiant){
        $this->idEtudiant = $idEtudiant;
    }
    public function setIdMatiere($idMatiere){
      $this->idMatiere=$idMatiere;

    }
    public function setSemestre($semestre){
      $this->semestre=$semestre;

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
    public function getSemestre(){
      return $this->semestre;
    }
    public function getMontant(){
      return $this->montant;
    }
    public function getEtat(){
      return $this->etat;
    }
    

   public function create(){
      $db=Connexion::getCx();
       $requete = "INSERT INTO REPECHER VALUES(:idEtudiant , :idMatiere,:semestre, :montant, :etat)";
       $st = $db->prepare($requete);
       $st->execute(array(
           "idEtudiant" => $this->getIdEtudiant(),
           "idMatiere" => $this->getIdMatiere(),
           "semestre" => $this->getSemestre(),
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
 public function readEtudById()
 {
  $db=Connexion::getCx();
  $sql = "SELECT * FROM REPECHER NATURAL JOIN MATIERE WHERE IDETUDIANTS =:idEtudiant and SEMESTRE=:semestre";
  $st =$db->prepare($sql);
  $st->execute(array(
    "idEtudiant" => $this->getIdEtudiant(),
    "semestre" => $this->getSemestre()
  ));
  $res = $st->fetchAll();
  $st->closeCursor();
  return $res;

 }
 public function readTotal()
 {
  $db=Connexion::getCx();
  $sql = "SELECT sum(MONTANT) as MONTANTTOTAL FROM REPECHER NATURAL JOIN MATIERE WHERE IDETUDIANTS =:idEtudiant and SEMESTRE=:semestre";
  $st =$db->prepare($sql);
  $st->execute(array(
    "idEtudiant" => $this->getIdEtudiant(),
    "semestre" => $this->getSemestre()
  ));
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
           $requete = "SELECT * FROM REPECHER WHERE IDETUDIANTS = :idetudiant and SEMESTRE=:semestre";
           $st = $db->prepare($requete);
           $st->execute(array(
            "idetudiant" => $this->getIdEtudiant(),
            "semestre" => $this->getSemestre()
          ));
           $res = $st->fetchAll();
           $st->closeCursor();
           return $res;
       }
}
?>