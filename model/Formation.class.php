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
    private $idmatiere;

    public function __construct()
    {
        $this->intitule;
        $this->semestre;
        $this->mois;
        $this->filiere;
        $this->parcours;
        $this->categorie;
        $this->type;
        $this->idmatiere;
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
    /**
     * Get the value of idmatiere
     */
    public function getIdmatiere()
    {
        return $this->idmatiere;
    }

    /**
     * Set the value of idmatiere
     *
     * @return  self
     */
    public function setIdmatiere($idmatiere)
    {
        $this->idmatiere = $idmatiere;
    }


    //mpianatra V7 mba surtout
    public function formationMBAV7()
    {

        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN emediam_highschool.PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :fil AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCxEtudiant()->prepare($requete);
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

    public function formationMBAV7Video()
    {

        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN emediam_highschool.PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :fil AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ AND IDMATIERE = :idmat ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCxEtudiant()->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere(),
            "mois" => $this->getMois(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType(),
            "idmat" => $this->getIdmatiere()

        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    //mpianatra mba V1-V6 MBA sy licence vague rehetra
    public function formationL1L2M1()
    {

        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :fil AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCx()->prepare($requete);
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

    public function formationL1L2M1Video()
    {
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :fil AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ AND IDMATIERE = :idmat ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCx()->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere(),
            "mois" => $this->getMois(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType(),
            "idmat" => $this->getIdmatiere()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    //mba v7
    public function formationMASTERM2()
    {

        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN emediam_highschool.PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND PARCOURS = :par AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCxEtudiant()->prepare($requete);
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

    //tsy mba v7
    public function formationL3M2()
    {

        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND PARCOURS = :par AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCx()->prepare($requete);
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

    public function formationL3M2Video()
    {

        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND PARCOURS = :par AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ AND IDMATIERE = :idmat ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCx()->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "par" => $this->getParcours(),
            "mois" => $this->getMois(),
            "cat" => $this->getCategorie(),
            "typ" => $this->getType(),
            "idmat" => $this->getIdmatiere()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function MoyenneParUe($idue, $idEtud)
    {
        $db = Connexion::getCx();
        $requete = "SELECT ROUND(avg(NOTE),2) as MOYENNEFINALE FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN RESULTAT NATURAL JOIN PARCOURS NATURAL JOIN UE WHERE SEMESTRE = :sem AND FILIERE = :fil and IDUE=:idue AND IDETUDIANTS=:idEtud";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere(),
            "idue" => $idue,
            "idEtud" => $idEtud
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function listmat()
    {
        $db = Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN PARCOURS NATURAL JOIN UE  WHERE SEMESTRE = :sem AND FILIERE = :fil ORDER BY IDUE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function listmatMasterV7()
    {
        $db = Connexion::getCxEtudiant();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN emediam_highschool.PARCOURS NATURAL JOIN UE  WHERE SEMESTRE = :sem AND FILIERE = :fil ORDER BY IDUE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function countUe($ue)
    {
        $db = Connexion::getCx();
        $requete = "SELECT count(INTITULE) as ROWSPAN FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN PARCOURS NATURAL JOIN UE  WHERE SEMESTRE = :sem AND FILIERE = :fil AND INTITULEUE=:ue ORDER BY IDUE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere(),
            "ue" => $ue
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function totalCredit($ue)
    {
        $db = Connexion::getCx();
        $requete = "SELECT sum(CREDIT) as TOTALCREDIT FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN PARCOURS NATURAL JOIN UE  WHERE SEMESTRE = :sem AND FILIERE = :fil AND INTITULEUE=:ue ORDER BY IDUE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sem" => $this->getSemestre(),
            "fil" => $this->getFiliere(),
            "ue" => $ue
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function selectNumSemestre($sem)
    {
        $requete = "SELECT NUM FROM SEMESTRE WHERE SEMESTRE = :sem";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
            "sem" => $sem
        ));
        return $query->fetchAll();
    }
    public function listliensemestre($num)
    {
        $requete = "SELECT * FROM SEMESTRE WHERE NUM <= :num AND NUM != 0  ORDER BY NUM DESC";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
            "num" => $num
        ));
        return $query->fetchAll();
    }

    public function listliensemestreMaster($num)
    {
        $requete = "SELECT * FROM SEMESTRE WHERE NUM <= :num AND NUM != 0 AND NUM >=7  ORDER BY NUM DESC";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
            "num" => $num
        ));
        return $query->fetchAll();
    }
    public function formationExamenMensuel()
    {
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :fil AND MOIS = :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCx()->prepare($requete);
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

    public function formationExamenMensuelV7MASTER()
    {
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN emediam_highschool.PARCOURS NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :fil AND MOIS = :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCxEtudiant()->prepare($requete);
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
    public function listMatSemestriel()
    {
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :par AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCx()->prepare($requete);
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

    public function listMatSemestrielV7MASTER()
    {
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN emediam_highschool.PARCOURS  NATURAL JOIN CATEGORIE NATURAL JOIN TYPECOURS WHERE SEMESTRE = :sem AND FILIERE = :par AND MOIS <= :mois AND IDCATEGORIE = :cat AND IDTYPE = :typ ORDER BY MOIS,INTITULE ASC";
        $st = Connexion::getCxEtudiant()->prepare($requete);
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
}

?> 
<?php ?>