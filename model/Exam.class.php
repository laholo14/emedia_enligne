
<?php

class Exam
{

    private $matiere;
    private $sessiondexam;
    private $typedexam;
    private $sujet;
    private $durre;
    private $qcm;
    private $base;

    public function __construct(PDO $base)
    {
        $this->matiere;
        $this->sessiondexam;
        $this->typedexam;
        $this->sujet;
        $this->durre;
        $this->qcm;
        $this->setBase($base);
    }

    public function setBase($base)
    {
        $this->base = $base;
    }

    public function setQcm($qcm)
    {
        $this->qcm = $qcm;
    }

    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    }
    public function setSessiondexam($sessiondexam)
    {
        $this->sessiondexam = $sessiondexam;
    }

    public function setTypedexam($typedexam)
    {
        $this->typedexam = $typedexam;
    }

    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    }

    public function setDurre($durre)
    {
        $this->durre = $durre;
    }

    public function getMatiere()
    {
        return $this->matiere;
    }

    public function getQcm()
    {
        return $this->qcm;
    }


    public function getSessiondexam()
    {
        return $this->sessiondexam;
    }

    public function getTypedexam()
    {
        return $this->typedexam;
    }

    public function getSujet()
    {
        return $this->sujet;
    }

    public function getDurre()
    {
        return $this->durre;
    }

    public function insertExam()
    {
        $requete = "INSERT INTO EXAM VALUES(:idmat, :sessiond, :idtypedexam, :sujet, :durre, :qcm)";

        $st = $this->base->prepare($requete);

        $st->execute(array(
            "idmat" => $this->getMatiere(),
            "sessiond" => $this->getSessiondexam(),
            "idtypedexam" => $this->getTypedexam(),
            "sujet" => $this->getSujet(),
            "durre" => $this->getDurre(),
            "qcm"  => $this->getQcm()


        ));

        $st->closeCursor();
    }

    public function listexam()
    {
        $requete = "SELECT * FROM EXAM NATURAL JOIN MATIERE NATURAL JOIN TYPEDEXAM NATURAL JOIN SESSIONDEXAM WHERE IDSESSIONDEXAM = :idsessiondexam ORDER BY INTITULE ASC";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "idsessiondexam" => $this->getSessiondexam()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }



    public function listexam_format()
    {
        $requete = "SELECT * FROM EXAM NATURAL JOIN MATIERE NATURAL JOIN TYPEDEXAM NATURAL JOIN SESSIONDEXAM WHERE IDSESSIONDEXAM = :idsessiondexam AND IDMATIERE = :idmat AND IDTYPEDEXAM = :idtype ORDER BY INTITULE ASC";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "idsessiondexam" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere(),
            "idtype" => $this->getTypedexam()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    public function update()
    {

        $requete = "UPDATE EXAM SET SUJET = :sujet, DURRE = :durre, QCM = :qcm WHERE IDSESSIONDEXAM = :idsessiondexam AND IDMATIERE = :idmat AND IDTYPEDEXAM = :idtype";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "sujet" => $this->getSujet(),
            "durre" => $this->getDurre(),
            "qcm" => $this->getQcm(),
            "idsessiondexam" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere(),
            "idtype" => $this->getTypedexam()
        ));

        $st->closeCursor();
    }


    public function search($search)
    {

        $requete = "SELECT * FROM EXAM NATURAL JOIN MATIERE NATURAL JOIN TYPEDEXAM NATURAL JOIN SESSIONDEXAM WHERE IDSESSIONDEXAM = :idsessiondexam AND INTITULE LIKE :mat ORDER BY INTITULE ASC ";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "idsessiondexam" => $this->getSessiondexam(),
            "mat" => $search

        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

   
}

?>