<?php

class Dossier
{

    private $matiere;
    private $categorie;
    private $type;
    private $contenu_mg;
    private $contenu_fr;
    private $couverture;

    public function __construct()
    {
        $this->matiere;
        $this->categorie;
        $this->type;
        $this->contenu_mg;
        $this->contenu_fr;
        $this->couverture;
    }


    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    }
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function setContenu_mg($contenu_mg)
    {
        $this->contenu_mg = $contenu_mg;
    }
    public function setContenu_fr($contenu_fr)
    {
        $this->contenu_fr = $contenu_fr;
    }

    public function setCouverture($couverture)
    {
        $this->couverture = $couverture;
    }



    public function getMatiere()
    {
        return $this->matiere;
    }
    public function getCategorie()
    {
        return $this->categorie;
    }
    public function getType()
    {
        return $this->type;
    }

    public function getContenu_mg()
    {
        return $this->contenu_mg;
    }

    public function getContenu_fr()
    {
        return $this->contenu_fr;
    }

    public function getCouverture()
    {
        return $this->couverture;
    }

    public function create()
    {
        $requete = "INSERT INTO DOSSIER VALUES(:idcat, :idmat, :idtype, :contenu_fr, :contenu_mg, NULL)";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
           "idcat" => $this->getCategorie(),
           "idmat" => $this->getMatiere(),
           "idtype" => $this->getType(),
           "contenu_fr" => $this->getContenu_fr(),
           "contenu_mg" => $this->getContenu_mg()
        ));
        $query->closeCursor();
        return 1;
    }
}
