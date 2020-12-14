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
  private $base;



  public function __construct(PDO $base)
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
    $this->setBase($base);
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
  public function setBase($base)
  {
    $this->base = $base;
  }


  public function createSuivre()
  {

    $requete = "INSERT INTO SUIVRE VALUES(:ide, :dip, :fil, :par, :S0, :CODE0, NULL , NULL , :ins , :eco , :examen , :sout , :certi ,  sysdate())";

    $st = $this->base->prepare($requete);

    $st->execute(array(
      "ide" => $this->getEtudiant(),
      "dip" => $this->getDip(),
      "fil" => $this->getFiliere(),
      "par" => $this->getParcours(),
      "S0" => 'S0',
      "CODE0" => 'CODE0',
      "ins" => 0,
      "eco" => 0,
      "examen" => 0,
      "sout" => 0,
      "certi" => 0
    ));
    $st->closeCursor();
  }


  public function readNombreNewInsri()
  {
    $requete = "SELECT COUNT(*) FROM SUIVRE WHERE CODE = 'CODE0'";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function readAllNewInscri()
  {
    $requete = "SELECT * FROM SUIVRE NATURAL JOIN ETUDIANTS WHERE CODE = 'CODE0'";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }


  public function NbrInsMaster()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'MASTER' and CODE = 'CODE0'";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function InsriMaster()
  {
    $requete = "SELECT * FROM SUIVRE NATURAL JOIN ETUDIANTS WHERE DIPLOME = 'MASTER' and CODE = 'CODE0'";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }


  public function NbrInsMasterTicm()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'MASTER' and CODE = 'CODE0' and FILIERE = 'TICM' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }


  public function NbrInsMasterAc()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'MASTER' and CODE = 'CODE0' and FILIERE = 'AC' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function NbrInsMasterMpjm()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'MASTER' and CODE = 'CODE0' and FILIERE = 'MPJM' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function NbrInsMasterMba()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'MASTER' and CODE = 'CODE0' and FILIERE = 'MBA' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function NbrInsMasterDrtm()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'MASTER' and CODE = 'CODE0' and FILIERE = 'DRTM' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }


  public function NbrInsLicence()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'LICENCE' and CODE = 'CODE0'";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  //liste inscri voaloany na licence na master
  public function InsriLicence()
  {
    $requete = "SELECT * FROM SUIVRE NATURAL JOIN ETUDIANTS  WHERE DIPLOME = :dip and CODE = 'CODE0' and  FILIERE = :tic  ORDER BY DATEDINSCRIPTION ASC";

    $st = $this->base->prepare($requete);
    $st->execute(array(
      "dip" => $this->getDip(),
      "tic" => $this->getFiliere()
    ));

    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }


  //liste efa pianatra 
  public function ListEtudiant()
  {
    $requete = "SELECT * FROM SUIVRE NATURAL JOIN ETUDIANTS WHERE DIPLOME = :dip and CODE = :vague and  FILIERE = :tic ORDER BY MATRICULE ASC";

    $st = $this->base->prepare($requete);
    $st->execute(array(
      "dip" => $this->getDip(),
      "vague" => $this->getCode(),
      "tic" => $this->getFiliere()
    ));

    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function ListEtudiantExam($mat, $session)
  {
    $requete = "SELECT * FROM RESULTAT  NATURAL JOIN SUIVRE NATURAL JOIN ETUDIANTS NATURAL JOIN MATIERE  WHERE DIPLOME = :dip and CODE = :vague and  FILIERE = :tic and IDMATIERE = :mat AND IDSESSIONDEXAM = :sess ORDER BY MATRICULE ASC";

    $st = $this->base->prepare($requete);
    $st->execute(array(
      "dip" => $this->getDip(),
      "vague" => $this->getCode(),
      "tic" => $this->getFiliere(),
      "mat" => $mat,
      "sess" => $session
    ));

    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  /*SELECT * FROM SUIVRE NATURAL JOIN ETUDIANTS LEFT OUTER JOIN resultat  ON resultat.IDETUDIANTS = SUIVRE.IDETUDIANTS WHERE SUIVRE.DIPLOME = 'LICENCE' AND SUIVRE.CODE = 'V1' AND SUIVRE.FILIERE = 'TIC' AND resultat.IDMATIERE = 1*/
  public function NbrInsLicenceTic()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'LICENCE' and CODE = 'CODE0' and FILIERE = 'TIC' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }
  public function NbrInsLicenceCan()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'LICENCE' and CODE = 'CODE0' and FILIERE = 'CAN' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }


  public function NbrInsLicenceMpj()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'LICENCE' and CODE = 'CODE0' and FILIERE = 'MPJ' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function NbrInsLicenceMgt()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'LICENCE' and CODE = 'CODE0' and FILIERE = 'MGT' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function NbrInsLicenceDrt()
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'LICENCE' and CODE = 'CODE0' and FILIERE = 'DRT' ";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function readAllById($id)
  {
    $requete = "SELECT * FROM SUIVRE NATURAL JOIN ETUDIANTS WHERE IDETUDIANTS = :ide";
    $st = $this->base->prepare($requete);
    $st->execute(array("ide" => $id));

    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function readId($mat)
  {
    $requete = "SELECT * FROM SUIVRE NATURAL JOIN ETUDIANTS WHERE MATRICULE = :mat";
    $st = $this->base->prepare($requete);
    $st->execute(array("mat" => $mat));

    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }



  public function ajoutLogin()
  {
    $requete = "UPDATE SUIVRE SET SEMESTRE = :sem , CODE = :code , MATRICULE = :mat , MDP = :mdp , DATEDINSCRIPTION = sysdate() WHERE IDETUDIANTS = :ide";
    $st = $this->base->prepare($requete);
    $st->execute(array(
      "sem" => $this->getSemestre(),
      "code" => $this->getCode(),
      "mat" => $this->getMatricule(),
      "mdp" => $this->getMdp(),
      "ide" => $this->getEtudiant()
    ));
    $st->closeCursor();
  }


  public function login()
  {
    $requete = "SELECT * FROM SUIVRE NATURAL JOIN ETUDIANTS NATURAL JOIN FILIERE NATURAL JOIN PARCOURS WHERE MATRICULE = :mat and MDP = :mdp";
    $st = $this->base->prepare($requete);
    $st->execute(array(
      "mat" => $this->getMatricule(),
      "mdp" => $this->getMdp()
    ));

    $res = $st->fetchAll();
    return $res;
    $st->closeCursor();
  }

  public function Vague()
  {
    $requete = "SELECT * from CODECLASSE WHERE CODE != 'CODE0'";
    $st = $this->base->query($requete);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function NbrEtLicence($vague, $fil)
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'LICENCE' and CODE = :V and FILIERE = :fil ";
    $st = $this->base->prepare($requete);
    $st->execute(array(
      "V" => $vague,
      "fil" => $fil
    ));
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }

  public function NbrEtMaster($vague, $fil)
  {
    $requete = "SELECT COUNT(*) from SUIVRE WHERE  DIPLOME = 'MASTER' and CODE = :V and FILIERE = :fil ";
    $st = $this->base->prepare($requete);
    $st->execute(array(
      "V" => $vague,
      "fil" => $fil
    ));
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }



  public function updateSemestre()
  {
    $requete = "UPDATE SUIVRE SET SEMESTRE = :sem  WHERE MATRICULE = :matricule";
    $st = $this->base->prepare($requete);
    $st->execute(array(
      "sem" => $this->getSemestre(),
      "matricule" => $this->getMatricule()
    ));
    $st->closeCursor();
  }


  public function delete()
  {
    $sql = "DELETE FROM SUIVRE  WHERE IDETUDIANTS = :ide ";
    $st = $this->base->prepare($sql);
    $st->execute(array(
      "ide" => $this->getEtudiant()
    ));
    $st->closeCursor();
  }



  public function verifymatricule()
  {
    $sql = "SELECT COUNT(*) FROM SUIVRE WHERE MATRICULE = :idm";
    $st = $this->base->prepare($sql);
    $st->execute(array(

      "idm" => $this->getMatricule()
    ));

    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }
  public function readAllSemestre()
  {
    $sql="select * from SEMESTRE";
    $st = $this->base->prepare($sql);
    $st->execute();
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
  }
  public function readAllEtudiant($matricule)
  {
    $sql = "SELECT * FROM SUIVRE WHERE MATRICULE LIKE '".$matricule."%'";
    $st =$this->base->query($sql);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
    
  }
  public function readAllEtudiants($matricule,$vague)
  {
    $sql = "SELECT * FROM SUIVRE WHERE MATRICULE LIKE '$matricule%' AND CODE='$vague'";
    $st =$this->base->query($sql);
    $res = $st->fetchAll();
    $st->closeCursor();
    return $res;
    
  }
   
  public function updateMdp(){
    $requete = "UPDATE SUIVRE SET MDP = :mdp WHERE IDETUDIANTS = :ide";
    $st = $this->base->prepare($requete);
    $st->execute(array(
      "mdp" => $this->getMdp(),
      "ide" => $this->getEtudiant()
    ));
    $st->closeCursor();
  }
}
