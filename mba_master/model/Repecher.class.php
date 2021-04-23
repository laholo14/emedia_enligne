<?php

class Repecher
{
  private $idEtudiant;
  private $idMatiere;
  private $etat;

  public function __construct()
  {
    $this->idEtudiant;
    $this->idMatiere;
    $this->etat;
  }

  public function setIdEtudiant($idEtudiant)
  {
    $this->idEtudiant = $idEtudiant;
  }
  public function setIdMatiere($idMatiere)
  {
    $this->idMatiere = $idMatiere;
  }

  public function setEtat($etat)
  {
    $this->etat = $etat;
  }
  public function getIdEtudiant()
  {
    return $this->idEtudiant;
  }
  public function getIdMatiere()
  {
    return $this->idMatiere;
  }
  public function getEtat()
  {
    return $this->etat;
  }


  public function create()
  {
    $db = Connexion::getCx();
    $requete = "INSERT INTO REPECHER VALUES(:idEtudiant , :idMatiere, :etat)";
    $st = $db->prepare($requete);
    $st->execute(array(
      "idEtudiant" => $this->getIdEtudiant(),
      "idMatiere" => $this->getIdMatiere(),
      "etat" => $this->getEtat()
    ));
    $st->closeCursor();
  }
  public function readEtudById($idEtudiant)
  {
    $db = Connexion::getCx();
    $sql = "SELECT * FROM REPECHER WHERE IDETUDIANTS ='" . $idEtudiant . "'";
    $st = $db->query($sql);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }
  public function deleteMatById($idMatiere)
  {
    $db = Connexion::getCx();
    $sql = "DELETE FROM REPECHER WHERE IDMATIERE ='" . $idMatiere . "'";
    $st = $db->prepare($sql);
    $st->execute();
    $st->closeCursor();
  }
  public function readNbrEtudById($idEtudiant)
  {
    $db = Connexion::getCx();
    $sql = "SELECT COUNT(*) as 'nombreEtudiant' FROM REPECHER WHERE IDETUDIANTS ='" . $idEtudiant . "'";
    $st = $db->query($sql);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }
}

?>

<?php ?>