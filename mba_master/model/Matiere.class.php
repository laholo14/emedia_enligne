<?php

class Matiere
{

    private $id_matiere;
    private $intitule;


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


    public function create()
    {

        $requete = "INSERT INTO MATIERE VALUES(NULL,:idue,:intitule)";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
            "idue" => $this->getId_matiere(),
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

    public function readAll()
    {
        $requete = "SELECT * FROM MATIERE NATURAL JOIN ENSEIGNER WHERE PARCOURS = 'FCM' OR PARCOURS = 'CIM' OR PARCOURS = 'ADAM'";
        $query = Connexion::getCx()->query($requete);
        $res = $query->fetchAll();
        return $res;
    }
}
