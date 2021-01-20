<?php



class Suivre
{

  private $etudiant;
  private $dip;
  private $semestre;
  private $filiere;
  private $parcours;
  private $code;
  private $matricule;
  private $mdp;
  private $inscription;
  private $ecolage;



  public function __construct()
  {
    $this->etudiant;
    $this->dip;
    $this->semestre;
    $this->filiere;
    $this->parcours;
    $this->code;
    $this->matricule;
    $this->mdp;
    $this->inscription;
    $this->ecolage;
  }

  public function getEtudiant()
  {
    return  $this->etudiant;
  }


  public function getDip()
  {
    return  $this->dip;
  }
  public function getSemestre()
  {
    return  $this->semestre;
  }
  public function getFiliere()
  {
    return  $this->filiere;
  }
  public function getParcours()
  {
    return  $this->parcours;
  }
  public function getCode()
  {
    return  $this->code;
  }
  public function getMatricule()
  {
    return  $this->matricule;
  }
  public function getMdp()
  {
    return  $this->mdp;
  }
  public function getInscription()
  {
    return  $this->inscription;
  }
  public function getEcolage()
  {
    return  $this->ecolage;
  }




  public function setEtudiant($etudiant)
  {
    $this->etudiant = $etudiant;
  }
  public function setDip($dip)
  {
    $this->dip = $dip;
  }
  public function setSemestre($semestre)
  {
    $this->semestre = $semestre;
  }
  public function setFiliere($filiere)
  {
    $this->filiere = $filiere;
  }
  public function setParcours($parcours)
  {
    $this->parcours = $parcours;
  }
  public function setCode($code)
  {
    $this->code = $code;
  }
  public function setMatricule($matricule)
  {
    $this->matricule = $matricule;
  }
  public function setMdp($mdp)
  {
    $this->mdp  = $mdp;
  }
  public function setEcolage($ecolage)
  {
    $this->ecolage = $ecolage;
  }
  public function setInscription($inscription)
  {
    $this->inscription = $inscription;
  }


  //select des nouveaux etudiants inscri en MBA

  public function NouveauxInscriMba()
  {

    $requete = "SELECT * FROM ETUDIANTS NATURAL JOIN SUIVRE WHERE DIPLOME = 'MASTER' AND FILIERE = 'MBA' AND CODE = 'CODE0'";
    $query = Connexion::getCxEtudiant()->query($requete);
    $res = $query->fetchAll();
    $query->closeCursor();
    return $res;
  }


  public function Valider()
  {
    $requete = "UPDATE SUIVRE set MATRICULE = :mat , MDP = :mdp , CODE = :vague , SEMESTRE = :semestre WHERE IDETUDIANTS = :ide";
    $query = Connexion::getCxEtudiant()->prepare($requete);
    $query->execute(array(
      "mat" => $this->getMatricule(),
      "mdp" => $this->getMdp(),
      "vague" => $this->getCode(),
      "semestre" => $this->getSemestre(),
      "ide" => $this->getEtudiant()

    ));
    $query->closeCursor();
  }
  public function readAllById($id)
  {
    $requete = "SELECT * FROM SUIVRE NATURAL JOIN ETUDIANTS WHERE IDETUDIANTS = :ide";
    $st = Connexion::getCxEtudiant()->prepare($requete);
    $st->execute(array("ide" => $id));

    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }


  public function verifymatricule()
  {
    $sql = "SELECT * FROM SUIVRE WHERE MATRICULE = :idm";
    $st = Connexion::getCxEtudiant()->prepare($sql);
    $st->execute(array(

      "idm" => $this->getMatricule()
    ));

    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }
}
?>
<?php ?>