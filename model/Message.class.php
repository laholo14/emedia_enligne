<?php

class Message
{
    private $IDMESSAGE;
    private $MESSAGE;
    private $REPONSE;
    private $IDETUDIANT;
    private $DIPLOME;
    private $FILIERE;
    private $VAGUE;

    public function __construct()
    {
        $this->IDMESSAGE = 0;
        $this->MESSAGE = "";
        $this->REPONSE = "";
        $this->IDETUDIANT = 0;
        $this->DIPLOME = "";
        $this->FILIERE = "";
        $this->VAGUE = "";
    }
    public function getIDMESSAGE()
    {
        return $this->IDMESSAGE;
    }
    public function setIDMESSAGE($IDMESSAGE)
    {
        $this->IDMESSAGE = $IDMESSAGE;
    }
    public function getMESSAGE()
    {
        return $this->MESSAGE;
    }
    public function setMESSAGE($MESSAGE)
    {
        $this->MESSAGE = $MESSAGE;
    }
    public function getREPONSE()
    {
        return $this->REPONSE;
    }
    public function setREPONSE($REPONSE)
    {
        $this->REPONSE = $REPONSE;
    }
    public function getIDETUDIANT()
    {
        return $this->IDETUDIANT;
    }
    public function setIDETUDIANT($IDETUDIANT)
    {
        $this->IDETUDIANT = $IDETUDIANT;
    }
    public function getDIPLOME()
    {
        return $this->DIPLOME;
    }
    public function setDIPLOME($DIPLOME)
    {
        $this->DIPLOME = $DIPLOME;
    }
    public function getFILIERE()
    {
        return $this->FILIERE;
    }
    public function setFILIERE($FILIERE)
    {
        $this->FILIERE = $FILIERE;
    }
    public function getVAGUE()
    {
        return $this->VAGUE;
    }
    public function setVAGUE($VAGUE)
    {
        $this->VAGUE = $VAGUE;
    }
    public function Insert()
    {
        $db=Connexion::getCx();

        $query = $db->prepare("INSERT INTO MESSAGE VALUES(null,:message,:reponse,:idetudiant,:diplome,:filiere,:vague,sysdate())");
        $query->execute(array(
            'message' => $this->getMESSAGE(),
            'reponse' => $this->getREPONSE(),
            'idetudiant' => $this->getIDETUDIANT(),
            'diplome' => $this->getDIPLOME(),
            'filiere' => $this->getFILIERE(),
            'vague' => $this->getVAGUE()
        ));
    }



    function Affiche()
    {
        $db=Connexion::getCx();

        $query = $db->prepare("SELECT * FROM MESSAGE ORDER BY DATY DESC");
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }


    function AfficheMessage($id)
    {
        $db=Connexion::getCx();

        $query = $db->prepare("SELECT * FROM MESSAGE WHERE IDETUDIANT= :id");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }


    function AfficheIdOne($id)
    {
        $db=Connexion::getCx();

        $query = $db->prepare("SELECT * FROM MESSAGE WHERE IDMESSAGE= :id");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }


    function update($reponse, $idM)
    {
        $db=Connexion::getCx();

        $query = $db->prepare("UPDATE  MESSAGE SET REPONSE=:reponse  WHERE IDMESSAGE=:idM");
        $query->execute(array(
            'reponse' => $reponse,
            'idM' => $idM
        ));
    }
}
