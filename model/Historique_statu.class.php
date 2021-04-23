<?php

class Historique_statu
{

  private $idetudiants;
  private $codeclasse;
  private $inscription;
  private $ecolage;



  public function __construct()
  {
    $this->idetudiants;
    $this->codeclasse;
    $this->inscription;
    $this->ecolage;
  }

  public function getIdetudiants()
  {
    return  $this->idetudiants;
  }
  public function getCodeclasse()
  {
    return $this->codeclasse;
  }
  public function getInscription()
  {
    return  $this->inscription;
  }
  public function getEcolage()
  {
    return  $this->ecolage;
  }




  public function setEtudiants($idetudiants)
  {
    $this->idetudiants = $idetudiants;
  }
  public function setCodeclasse($codeclasse)
  {
    $this->codeclasse = $codeclasse;
  }
  public function setEcolage($ecolage)
  {
    $this->ecolage = $ecolage;
  }
  public function setInscription($inscription)
  {
    $this->inscription = $inscription;
  }

//historique_statu

public function createHistorique_statu()
  {

    $db=Connexion::getCx();
    $requete = "INSERT INTO historique_statu VALUES(:code, :ide, :ins, :eco)";

    $st = $db->prepare($requete);

    $st->execute(array(
      "code" => $this->getCodeclasse(),
      "ide" => $this->getIdetudiants(),
      "ins" => $this->getInscription(),
      "eco" => $this->getEcolage()
    ));
    $st->closeCursor();
  }

}
?>
