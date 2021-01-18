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

  public function NouveauxInscriMba(){

    $requete = "SELECT * FROM ETUDIANTS NATURAL JOIN SUIVRE WHERE DIPLOME = 'MASTER' AND FILIERE = 'MBA' AND CODE = 'CODE0'";
    $query = Connexion::getCxEtudiant()->query($requete);
    $res = $query->fetchAll();
    $query->closeCursor();
    return $res;
  }



}
?>
<?php ?>