<?php


class Filiere
{

    private $filiere;
    private $nomfiliere;
    private $base;
    private $diplome;

    public function __construct(PDO $base)
    {
        $this->filiere;
        $this->nomfiliere;
        $this->diplome;
        $this->setBase($base);
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

    public function setBase($base)
    {
        $this->base = $base;
    }

    public function read()
    {

        $requete = "SELECT * FROM FILIERE  WHERE DIPLOME = :dip ";
        $st = $this->base->prepare($requete);

        $st->execute(array(
            "dip" => $this->getDiplome()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function readP()
    {

        $requete = "SELECT * FROM PARCOURS  WHERE FILIERE = :fil ";
        $st = $this->base->prepare($requete);

        $st->execute(array(
            "fil" => $this->getFiliere()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

}
