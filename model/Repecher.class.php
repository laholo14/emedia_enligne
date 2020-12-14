<?php

class Repecher{
    private $idEtudiant;
    private $idMatiere;
    private $etat;
    private $base;

    public function __construct(PDO $base)
    {
        $this->idEtudiant;
        $this->idMatiere;
        $this->etat;
        $this->base;
        $this->setBase($base);
    }

    public function setBase($base)
    {
        $this->base = $base;
    }

    public function setIdEtudiant($idEtudiant){
        $this->idEtudiant = $idEtudiant;
    }
    public function setIdMatiere($idMatiere){
      $this->idMatiere=$idMatiere;

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
    public function getEtat(){
      return $this->etat;
    }
    

   public function create(){
       $requete = "INSERT INTO REPECHER VALUES(:idEtudiant , :idMatiere, :etat)";
       $st = $this->base->prepare($requete);
       $st->execute(array(
           "idEtudiant" => $this->getIdEtudiant(),
           "idMatiere" => $this->getIdMatiere(),
           "etat" => $this->getEtat()
       ));
       $st->closeCursor();
   }
   public function readEtudById($idEtudiant)
   {
    $sql = "SELECT * FROM REPECHER WHERE IDETUDIANTS ='".$idEtudiant."'";
    $st =$this->base->query($sql);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;

   }
   public function deleteMatById($idMatiere)
   {
    $sql = "DELETE FROM REPECHER WHERE IDMATIERE ='".$idMatiere."'";
    $st = $this->base->prepare($sql);
    $st->execute();
    $st->closeCursor();

   }
       public function readNbrEtudById($idEtudiant)
       {
        $sql = "SELECT COUNT(*) as 'nombreEtudiant' FROM REPECHER WHERE IDETUDIANTS ='".$idEtudiant."'";
        $st =$this->base->query($sql);
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;

       }
}
?>