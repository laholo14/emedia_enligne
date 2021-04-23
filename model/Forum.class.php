<?php

class Forum
{

    private $idetudiant;
    private $idreply;
    private $filiere;
    private $parcours;
    private $vague;
    private $contenu;
    private $date;

    public function __construct()
    {
        $this->idetudiant;
        $this->idreply;
        $this->filiere;
        $this->parcours;
        $this->vague;
        $this->contenu;
        $this->date;
    }
    public function setEtudiant($idetudiant)
    {
        $this->idetudiant = $idetudiant;
    }
    public function setReply($idreply)
    {
        $this->idreply = $idreply;
    }
    public function setfiliere($filiere)
    {
        $this->filiere = $filiere;
    }
    public function setParcours($parcours)
    {
        $this->parcours = $parcours;
    }
    public function setVague($vague)
    {
        $this->vague = $vague;
    }
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    

    public function getEtudiant()
    {
        return $this->idetudiant;
    }
    public function getReply()
    {
        return $this->idreply;
    }
    public function getFiliere()
    {
        return $this->filiere;
    }
    public function getParcours()
    {
        return $this->parcours;
    }
    public function getVague()
    {
        return $this->vague;
    }
    public function getContenu()
    {
        return $this->contenu;
    }
    public function getDate()
    {
        return $this->date;
    }




    public function insertForum()
    {
       
        $db=Connexion::getCx(); 
        $requete = "INSERT INTO FORUM VALUES(null , :idetud, :fil, :parc, :vag, :idreply, :cont, sysdate())";

        $st = $db->prepare($requete);

        $st->execute(array(
            "idetud" => $this->getEtudiant(),
            "idreply" => $this->getReply(),
            "fil" => $this->getFiliere(),
            "parc" => $this->getParcours(),
            "vag" => $this->getVague(),
            "cont" => $this->getContenu()
        ));

        $st->closeCursor();
        
    }

    public function forumetudaintL1L2M1()
    {
        $db=Connexion::getCx();

        $requete = "SELECT * FROM FORUM WHERE IDREPLY = 0 AND FILIERE = :fil AND VAGUE = :vag ORDER BY IDFORUM DESC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "fil" => $this->getFiliere(),
            "vag" => $this->getVague()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    public function forumetudaintL3M2()
    {
        $db=Connexion::getCx();

        $requete = "SELECT * FROM FORUM WHERE IDREPLY = 0 AND PARCOURS = :parc AND VAGUE = :vag ORDER BY IDFORUM DESC";
        $st = $db->prepare($requete);
        $st->execute(array(
            "parc" => $this->getParcours(),
            "vag" => $this->getVague()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }



    public function replyL1L2M1(){
        $db=Connexion::getCx();

        $requete = "SELECT * FROM FORUM WHERE IDREPLY = :idreply AND FILIERE = :fil AND VAGUE = :vag ";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idreply" => $this->getReply(),
            "fil" => $this->getFiliere(),
            "vag" => $this->getVague()
            
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    
    public function countreplyL1L2M1(){
        $db=Connexion::getCx();

        $requete = "SELECT COUNT(*) FROM FORUM WHERE IDREPLY = :idreply AND FILIERE = :fil AND VAGUE = :vag ";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idreply" => $this->getReply(),
            "fil" => $this->getFiliere(),
            "vag" => $this->getVague()
            
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function rowcountreplyL1L2M1(){
        $db=Connexion::getCx();

        $requete = "SELECT COUNT(*) FROM FORUM WHERE IDREPLY = :idreply AND FILIERE = :fil AND VAGUE = :vag ";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idreply" => $this->getReply(),
            "fil" => $this->getFiliere(),
            "vag" => $this->getVague()
            
        ));  
        $res = $st->rowCount();
        $st->closeCursor();
        return $res;
    }

    public function replyL3M2()
    {
        $db=Connexion::getCx();

        $requete = "SELECT * FROM FORUM WHERE IDREPLY = :idreply AND PARCOURS = :parc AND VAGUE = :vag ";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idreply" => $this->getReply(),
            "parc" => $this->getParcours(),
            "vag" => $this->getVague()

        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    

    public function countreplyL3M2()
    {
        $db=Connexion::getCx();

        $requete = "SELECT COUNT(*) FROM FORUM WHERE IDREPLY = :idreply AND PARCOURS = :parc AND VAGUE = :vag ";
        $st = $db->prepare($requete);
        $st->execute(array(
            "idreply" => $this->getReply(),
            "parc" => $this->getParcours(),
            "vag" => $this->getVague()

        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
    
}
