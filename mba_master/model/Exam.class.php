<?php

class Exam
{

    private $idmatiere;
    private $idsessiondexam;
    private $idtypedexam;
    private $code;
    private $sujet;
    private $durre;
    private $qcm;

    public function __construct()
    {
        $this->idmatiere;
        $this->idsessiondexam;
        $this->idtypedexam;
        $this->code;
        $this->sujet;
        $this->durre;
        $this->qcm;
    }


    public function getIdmatiere()
    {
        return  $this->idmatiere;
    }
    public function getIdsessiondexam()
    {
        return  $this->idsessiondexam;
    }

    public function getIdtypedexam()
    {
        return $this->idtypedexam;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getSujet()
    {
        return $this->sujet;
    }
    public function getDurre()
    {
        return $this->durre;
    }
    public function getQcm()
    {
        return $this->qcm;
    }

    public function setIdmatiere($idmatiere)
    {
        $this->idmatiere = $idmatiere;
    }
    public function setIdsessiondexam($idsessiondexam)
    {
        $this->idsessiondexam = $idsessiondexam;
    }
    public function setIdtypedexam($idtypedexam)
    {
        $this->idtypedexam = $idtypedexam;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    }
    public function setDurre($durre)
    {
        $this->durre = $durre;
    }
    public function setQcm($qcm)
    {
        $this->qcm = $qcm;
    }

    public function insertExam()
    {
        $db = Connexion::getCx();
        $requete = "INSERT INTO EXAM VALUES(:idmatiere, :idsessiondexam, :idtypedexam, :code, :sujet, :durre, :qcm)";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idmatiere" => $this->getIdmatiere(),
            "idsessiondexam" => $this->getIdsessiondexam(),
            "idtypedexam" => $this->getIdtypedexam(),
            "code" => $this->getCode(),
            "sujet" => $this->getSujet(),
            "durre" => $this->getDurre(),
            "qcm" => $this->getQcm()
        ));
        $st->closeCursor();
    }
    public function listexam()
    {
        $db = Connexion::getCx();
        $requete = "SELECT * FROM EXAM NATURAL JOIN MATIERE NATURAL JOIN TYPEDEXAM NATURAL JOIN SESSIONDEXAM WHERE IDSESSIONDEXAM = :idsessiondexam ORDER BY INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idsessiondexam" => $this->getIdsessiondexam()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function listexam_format()
    {
        $db = Connexion::getCx();
        $requete = "SELECT * FROM EXAM NATURAL JOIN MATIERE NATURAL JOIN TYPEDEXAM NATURAL JOIN SESSIONDEXAM WHERE IDSESSIONDEXAM = :idsessiondexam AND IDMATIERE = :idmat AND IDTYPEDEXAM = :idtype ORDER BY INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idsessiondexam" => $this->getIdsessiondexam(),
            "idmat" => $this->getIdmatiere(),
            "idtype" => $this->getIdtypedexam()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function update()
    {
        $db = Connexion::getCx();

        $requete = "UPDATE EXAM SET SUJET = :sujet, DURRE = :durre, QCM = :qcm, CODE = :code  WHERE IDSESSIONDEXAM = :idsessiondexam AND IDMATIERE = :idmat AND IDTYPEDEXAM = :idtype";
        $st = $db->prepare($requete);
        $st->execute(array(
            "sujet" => $this->getSujet(),
            "durre" => $this->getDurre(),
            "qcm" => $this->getQcm(),
            "code" => $this->getCode(),
            "idsessiondexam" => $this->getIdsessiondexam(),
            "idmat" => $this->getIdmatiere(),
            "idtype" => $this->getIdtypedexam()
        ));

        $st->closeCursor();
    }


    public function search($search)
    {
        $db = Connexion::getCx();

        $requete = "SELECT * FROM EXAM NATURAL JOIN MATIERE NATURAL JOIN TYPEDEXAM NATURAL JOIN SESSIONDEXAM WHERE IDSESSIONDEXAM = :idsessiondexam AND INTITULE LIKE :mat ORDER BY INTITULE ASC ";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idsessiondexam" => $this->getIdsessiondexam(),
            "mat" => $search

        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function readVague()
    {
        $db = Connexion::getCx();
        $requete = "SELECT * FROM EXAM NATURAL JOIN MATIERE NATURAL JOIN TYPEDEXAM NATURAL JOIN SESSIONDEXAM WHERE IDSESSIONDEXAM = :idsessiondexam AND IDMATIERE = :idmatiere AND IDTYPEDEXAM = :idtypedexam AND CODE = :code";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idsessiondexam" => $this->getIdsessiondexam(),
            "idmatiere" => $this->getIdmatiere(),
            "idtypedexam" => $this->getIdtypedexam(),
            "code" => $this->getCode()
        ));
    }
}
?>
<?php ?>