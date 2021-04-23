<?php

class Matiere
{

    private $id_matiere;
    private $intitule;
    private $credit;


    public function __construct()
    {
        $this->id_matiere;
        $this->intitule;
    }


    public function setId_matiere($id_matiere)
    {
        $this->id_matiere = $id_matiere;
    }
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }



    public function getId_matiere()
    {
        return $this->id_matiere;
    }
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Get the value of credit
     */ 
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set the value of credit
     *
     * @return  self
     */ 
    public function setCredit($credit)
    {
        $this->credit = $credit;

    
    }

    public function create()
    {

        $requete = "INSERT INTO MATIERE VALUES(NULL,:idue,:credit,:intitule)";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
            "idue" => $this->getId_matiere(),
            "credit"=>$this->getCredit(),
            "intitule" => $this->getIntitule()
        ));
        $query->closeCursor();
    }

    public function readByIntitule()
    {
        $requete = "SELECT * FROM MATIERE WHERE INTITULE = :int";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
            "int" => $this->getIntitule()
        ));
        $res = $query->fetchAll();
        $query->closeCursor();
        return $res;
    }

    public function readById()
    {
        $requete = "SELECT * FROM MATIERE WHERE IDMATIERE = :idmat";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
            "idmat" => $this->getId_matiere()
        ));
        $res = $query->fetchAll();
        $query->closeCursor();
        return $res;
    }
	
	public function readMatById($id)
    {
        $requete = "SELECT * FROM MATIERE WHERE IDMATIERE = :idmat";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
            "idmat" => $id
        ));
        $res = $query->fetchAll();
        $query->closeCursor();
        return $res;
    }

    public function readAll()
    {
        $requete = "SELECT * FROM MATIERE NATURAL JOIN ENSEIGNER WHERE PARCOURS = 'FCM' OR PARCOURS = 'CIM' OR PARCOURS = 'ADAM'";
        $query = Connexion::getCx()->query($requete);
        $res = $query->fetchAll();
        return $res;
    }

    public function readAllNOTMBA()
    {
        $requete = "SELECT * FROM MATIERE NATURAL JOIN ENSEIGNER WHERE PARCOURS != 'FCM' AND PARCOURS != 'CIM' AND PARCOURS != 'ADAM'";
        $query = Connexion::getCx()->query($requete);
        $res = $query->fetchAll();
        return $res;
    }

    //wheree id != requete
    public function readMatExamMBolatsisysujet($session)
    {
        $requete = "SELECT * FROM MATIERE NATURAL JOIN ENSEIGNER WHERE (PARCOURS = 'FCM' OR PARCOURS = 'CIM' OR PARCOURS = 'ADAM') AND  IDMATIERE != (SELECT IDMATIERE FROM EXAM WHERE IDSESSIONDEXAM = :session)";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute((array(
            "session" => $session
        )));
        $res = $query->fetchAll();
        $query->closeCursor();
        return $res;
    }

}
