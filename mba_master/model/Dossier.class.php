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
        $db=Connexion::getCx();
        $requete = "INSERT INTO DOSSIER VALUES(:cat, :idm, :typ, :cont_mg, :cont_fr, NULL)";

        $st = $db->prepare($requete);

        $st->execute(array(
            "idm" => $this->getMatiere(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType(),
            "cont_mg" => $this->getContenu_mg(),
            "cont_fr" => $this->getContenu_fr()

        ));
        $st->closeCursor();
    }
}
