<?php

class Resultat
{

    private $etudiant;
    private $sessiondexam;
    private $matiere;
    private $reponse;
    private $note;


    public function __construct()
    {
        $this->etudiant;
        $this->sessiondexam;
        $this->matiere;
        $this->reponse;
        $this->note;
    }

    public function setEtudiant($etudiant)
    {
        $this->etudiant = $etudiant;
    }
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }

    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    }
    public function setSessiondexam($sessiondexam)
    {
        $this->sessiondexam = $sessiondexam;
    }
    public function setNote($note)
    {
        $this->note = $note;
    }


    public function getMatiere()
    {
        return $this->matiere;
    }

    public function getEtudiant()
    {
        return $this->etudiant;
    }

    public function getSessiondexam()
    {
        return $this->sessiondexam;
    }

    public function getReponse()
    {
        return $this->reponse;
    }

    public function getNote()
    {
        return $this->note;
    }



    public function insertResultat()
    {
        $db = Connexion::getCx();
        $requete = "INSERT INTO RESULTAT VALUES(:idetudiant, :idsession, :idmat, NULL,NULL,NULL,sysdate())";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));
        $st->closeCursor();
    }
    public function insertResultatMasterV7()
    {
        $db = Connexion::getCxEtudiant();
        $requete = "INSERT INTO RESULTAT VALUES(:idetudiant, :idsession, :idmat, NULL,NULL,NULL,sysdate())";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));
        $st->closeCursor();
    }

    public function insertResultatUpload()
    {
        $db = Connexion::getCx();
        $requete = "INSERT INTO RESULTAT VALUES(:idetudiant, :idsession, :idmat, :reponse, NULL, NULL, sysdate())";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "reponse" => $this->getReponse(),
            "idmat" => $this->getMatiere()
        ));
        $st->closeCursor();
    }

    public function InsertReponse()
    {
        $db = Connexion::getCx();
        $requete = "UPDATE RESULTAT SET REPONSE = :reponse WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $db->prepare($requete);
        $st->execute(array(
            "reponse" => $this->getReponse(),
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));
        $st->closeCursor();
    }

    public function InsertReponse_MASTER_V7()
    {
        $db = Connexion::getCxEtudiant();
        $requete = "UPDATE RESULTAT SET REPONSE = :reponse WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $db->prepare($requete);
        $st->execute(array(
            "reponse" => $this->getReponse(),
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));
        $st->closeCursor();
    }


    public function verify()
    {
        $db = Connexion::getCx();
        $requete = "SELECT COUNT(*) FROM RESULTAT WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function verifyMasterV7()
    {
        $db = Connexion::getCxEtudiant();
        $requete = "SELECT COUNT(*) FROM RESULTAT WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function Afficherlescopie()
    {
        $db = Connexion::getCx();
        $requete = "SELECT * FROM RESULTAT NATURAL JOIN MATIERE WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function Download($fil, $code, $session, $mat)
    {
        $db = Connexion::getCx();
        $requete = "SELECT * FROM SUIVRE NATURAL JOIN RESULTAT NATURAL JOIN MATIERE WHERE FILIERE = :fil AND CODE = :code AND IDMATIERE = :mat AND IDSESSIONDEXAM = :sess";
        $st = $db->prepare($requete);
        $st->execute(array(
            "fil" => $fil,
            "code" => $code,
            "mat" => $mat,
            "sess" => $session
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    public function Note()
    {
        $db = Connexion::getCx();
        $requete = "SELECT * FROM RESULTAT NATURAL JOIN SUIVRE WHERE IDETUDIANTS = :idetu AND IDMATIERE = :idmat AND IDSESSIONDEXAM = :idexam";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idetu" => $this->getEtudiant(),
            "idmat" => $this->getMatiere(),
            "idexam" => $this->getSessiondexam()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function AffichageNote()
    {

        $db = Connexion::getCx();
        $requete = "SELECT * FROM RESULTAT  WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));


        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function Noter()
    {
        $db = Connexion::getCx();
        $requete = "UPDATE RESULTAT SET NOTE = :note WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $db->prepare($requete);
        $st->execute(array(
            "note" => $this->getNote(),
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));
        $st->closeCursor();
    }

    public function selectMoyenne()
    {
        $db = Connexion::getCx();
        $requete = "SELECT avg(NOTE) AS 'MOYENNE' FROM RESULTAT where IDETUDIANTS=:idEtudiant and IDMATIERE=:idMatiere AND (IDSESSIONDEXAM=1 OR IDSESSIONDEXAM=2)";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idEtudiant" =>  $this->getEtudiant(),
            "idMatiere" => $this->getMatiere()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    public function selectMatiereARepecher($idUe)
    {
        $db = Connexion::getCx();
        $requete = "SELECT * FROM MATIERE NATURAL JOIN RESULTAT NATURAL JOIN ENSEIGNER where IDETUDIANTS=:idEtudiant and IDUE=:idUe and (SELECT avg(NOTE))<10 ORDER BY INTITULE";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idEtudiant" =>  $this->getEtudiant(),
            "idUe" => $idUe
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
}
