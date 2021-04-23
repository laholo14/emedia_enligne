<?php


class Filiere
{

    private $filiere;
    private $nomfiliere;
    private $diplome;

    public function __construct()
    {
        $this->filiere;
        $this->nomfiliere;
        $this->diplome;
    }

    public function getFiliere()
    {
        return $this->filiere;
    }
    public function getNomfiliere()
    {
        return $this->nomfiliere;
    }
    public function getDiplome()
    {
        return $this->diplome;
    }

    public function setFiliere($filiere)
    {
        $this->filiere = $filiere;
    }

    public function setNomfiliere($nomfiliere)
    {
        $this->nomfiliere = $nomfiliere;
    }

    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;
    }
    public function read()
    {

        $db = Connexion::getCx();
        $requete = "SELECT * FROM FILIERE  WHERE DIPLOME = :dip ";
        $st = $db->prepare($requete);

        $st->execute(array(
            "dip" => $this->getDiplome()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function readP()
    {
        $db = Connexion::getCx();

        $requete = "SELECT * FROM PARCOURS  WHERE FILIERE = :fil ";
        $st = $db->prepare($requete);

        $st->execute(array(
            "fil" => $this->getFiliere()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
}
