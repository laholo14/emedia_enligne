<?php

class Resultat
{

    private $etudiant;
    private $sessiondexam;
    private $matiere;
    private $reponse;
    private $note;


    public function __construct()
    {
        $this->etudiant;
        $this->sessiondexam;
        $this->matiere;
        $this->reponse;
        $this->note;
    }

    public function setEtudiant($etudiant)
    {
        $this->etudiant = $etudiant;
    }
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }

    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    }
    public function setSessiondexam($sessiondexam)
    {
        $this->sessiondexam = $sessiondexam;
    }
    public function setNote($note)
    {
        $this->note = $note;
    }


    public function getMatiere()
    {
        return $this->matiere;
    }

    public function getEtudiant()
    {
        return $this->etudiant;
    }

    public function getSessiondexam()
    {
        return $this->sessiondexam;
    }

    public function getReponse()
    {
        return $this->reponse;
    }

    public function getNote()
    {
        return $this->note;
    }
	
	public function readFileExamen($idEtud,$idsessiondexam,$idmatiere){
  
		$requete = "SELECT * FROM RESULTAT WHERE IDETUDIANTS = :idEtud AND IDSESSIONDEXAM = :idsessiondexam AND IDMATIERE= :idmatiere";
		$query = Connexion::getCx()->prepare($requete);
		
		$query->execute(array(
		  "idEtud" => $idEtud,
		  "idsessiondexam" => $idsessiondexam,
		  "idmatiere" => $idmatiere
		));
		$res = $query->fetchAll();
		
		return $res;
  }
 
}
?>

<?php ?>