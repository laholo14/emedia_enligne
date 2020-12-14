<?php

class Dossier
{

    private $matiere;
    private $categorie;
    private $type;
    private $contenu_mg;
    private $contenu_fr;
    private $couverture;
    private $base;

    public function __construct(PDO $base)
    {
        $this->matiere;
        $this->categorie;
        $this->type;
        $this->contenu_mg;
        $this->contenu_fr;
        $this->couverture;
        $this->setBase($base);
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
    public function setBase($base)
    {
        $this->base = $base;
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
        $requete = "INSERT INTO DOSSIER VALUES(:idm, :cat, :typ, :cont_mg, :cont_fr, NULL)";

        $st = $this->base->prepare($requete);

        $st->execute(array(
            "idm" => $this->getMatiere(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType(),
            "cont_mg" => $this->getContenu_mg(),
            "cont_fr" => $this->getContenu_fr()

        ));
        $st->closeCursor();
    }

    public function listDossier()
    {

        $requete = "SELECT * FROM DOSSIER NATURAL JOIN MATIERE NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS ORDER BY INTITULE ASC";
        $st = $this->base->query($requete);
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function listDossier_ID($idm, $idc, $idt)
    {

        $requete = "SELECT * FROM DOSSIER NATURAL JOIN MATIERE NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE IDMATIERE = :idm and IDCATEGORIE = :idc and IDTYPE = :idt";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "idm" => $idm,
            "idc" => $idc,
            "idt" => $idt

        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function search($search)
    {

        $requete = "SELECT * FROM DOSSIER NATURAL JOIN MATIERE NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE INTITULE LIKE :mat ORDER BY INTITULE ASC ";
        $st = $this->base->prepare($requete);
        $st->execute(array(

            "mat" => $search

        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    public  function update()
    {

        $requete = "UPDATE DOSSIER SET CONTENU_MG = :contm , CONTENU_FR = :contf  WHERE IDMATIERE = :idm AND IDCATEGORIE = :idc AND IDTYPE = :idt";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "contm" => $this->getContenu_mg(),
            "contf" => $this->getContenu_fr(),
            "idm" => $this->getMatiere(),
            "idc" => $this->getCategorie(),
            "idt" => $this->getType()
        ));
        $st->closeCursor();
    }
}
