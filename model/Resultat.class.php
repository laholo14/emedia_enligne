<?php

class Resultat
{

    private $etudiant;
    private $sessiondexam;
    private $matiere;
    private $reponse;
    private $note;
    private $base;


    public function __construct(PDO $base)
    {
        $this->etudiant;
        $this->sessiondexam;
        $this->matiere;
        $this->reponse;
        $this->note;
        $this->setBase($base);
    }

    public function setBase($base)
    {
        $this->base = $base;
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
        $requete = "INSERT INTO RESULTAT VALUES(:idetudiant, :idsession, :idmat, NULL,NULL,NULL,sysdate())";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));
        $st->closeCursor();
    }


    public function insertResultatUpload()
    {
        $requete = "INSERT INTO RESULTAT VALUES(:idetudiant, :idsession, :idmat, :reponse, NULL, NULL, sysdate())";
        $st = $this->base->prepare($requete);
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
        $requete = "UPDATE RESULTAT SET REPONSE = :reponse WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $this->base->prepare($requete);
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
        $requete = "SELECT COUNT(*) FROM RESULTAT WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function Afficherlescopie(){
        $requete = "SELECT * FROM RESULTAT NATURAL JOIN MATIERE WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function Download($fil,$code,$session,$mat){
        $requete = "SELECT * FROM SUIVRE NATURAL JOIN RESULTAT NATURAL JOIN MATIERE WHERE FILIERE = :fil AND CODE = :code AND IDMATIERE = :mat AND IDSESSIONDEXAM = :sess";
        $st = $this->base->prepare($requete);
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


    public function Note(){
        $requete = "SELECT * FROM RESULTAT NATURAL JOIN SUIVRE WHERE IDETUDIANTS = :idetu AND IDMATIERE = :idmat AND IDSESSIONDEXAM = :idexam";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "idetu" => $this->getEtudiant(),
            "idmat" => $this->getMatiere(),
            "idexam" => $this->getSessiondexam()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function AffichageNote(){

        $requete = "SELECT * FROM RESULTAT  WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));


        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function Noter(){
        $requete = "UPDATE RESULTAT SET NOTE = :note WHERE IDETUDIANTS = :idetudiant AND IDSESSIONDEXAM = :idsession AND IDMATIERE = :idmat";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "note" => $this->getNote(),
            "idetudiant" => $this->getEtudiant(),
            "idsession" => $this->getSessiondexam(),
            "idmat" => $this->getMatiere()
        ));
        $st->closeCursor();
    }

    public function selectMoyenne(){
        $requete="SELECT avg(NOTE) AS 'MOYENNE' FROM RESULTAT where IDETUDIANTS=:idEtudiant and IDMATIERE=:idMatiere";
        $st = $this->base->prepare($requete);
       $st->execute(array(
           "idEtudiant" =>  $this->getEtudiant(),
           "idMatiere" => $this->getMatiere()
       ));
       $res=$st->fetchAll();
       $st->closeCursor();
       return $res;
       
    }

}
