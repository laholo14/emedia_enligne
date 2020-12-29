<?php

class Formation
{

    private $intitule;
    private $semestre;
    private $mois;
    private $filiere;
    private $parcours;
    private $categorie;
    private $type;

    public function __construct()
    {
        $this->intitule;
        $this->semestre;
        $this->mois;
        $this->filiere;
        $this->parcours;
        $this->categorie;
        $this->type;
    }
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }
    public function setSemetre($semestre)
    {
        $this->semestre = $semestre;
    }
    public function setMois($mois)
    {
        $this->mois = $mois;
    }
    public function setFiliere($filiere)
    {
        $this->filiere = $filiere;
    }
    public function setParcours($parcours)
    {
        $this->parcours = $parcours;
    }
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getIntitule()
    {
        return $this->intitule;
    }
    public function getSemestre()
    {
        return $this->semestre;
    }
    public function getMois()
    {
        return $this->mois;
    }
    public function getFiliere()
    {
        return $this->filiere;
    }
    public function getParcours()
    {
        return $this->parcours;
    }
    public function getCategorie()
    {
        return $this->categorie;
    }
    public function getType()
    {
        return $this->type;
    }


    public function formationL1L2M1()
    {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :fil AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere(),
            "mois" => $this->getMois(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function formationAncienL1L2M1()
    {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN SEMESTRE NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE num <= :sem AND FILIERE = :fil  AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }



    public function formationExamenMensuel()
    {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :fil AND MOIS = :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere(),
            "mois" => $this->getMois(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    public function formationL3M2()
    {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND PARCOURS = :par AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "par" => $this->getParcours(),
            "mois" => $this->getMois(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function formationAncienL3M2()
    {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN SEMESTRE NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE num < :sem AND PARCOURS = :par AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "par" => $this->getParcours(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    
    public function listMatSemestriel()
    {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :par AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "par" => $this->getFiliere(),
            "mois" => $this->getMois(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }




    public function listmat(){
        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN PARCOURS  WHERE SEMESTRE = :sem AND FILIERE = :fil ORDER BY MOIS,INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
}

?>