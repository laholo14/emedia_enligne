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
    private $base;

    public function __construct(PDO $base)
    {
        $this->IDMESSAGE = 0;
        $this->MESSAGE = "";
        $this->REPONSE = "";
        $this->IDETUDIANT = 0;
        $this->DIPLOME = "";
        $this->FILIERE = "";
        $this->VAGUE = "";
        $this->setBase($base);
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
    public function setBase($base)
    {
        $this->base = $base;
    }

    public function Insert()
    {

        $query = $this->base->prepare("INSERT INTO MESSAGE VALUES(null,:message,:reponse,:idetudiant,:diplome,:filiere,:vague,sysdate())");
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

        $query = $this->base->prepare("SELECT * FROM MESSAGE ORDER BY DATY DESC");
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }


    function AfficheMessage($id)
    {

        $query = $this->base->prepare("SELECT * FROM MESSAGE WHERE IDETUDIANT= :id");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }


    function AfficheIdOne($id)
    {

        $query = $this->base->prepare("SELECT * FROM MESSAGE WHERE IDMESSAGE= :id");
        $query->execute(array(
            'id' => $id
        ));
        $res = $query->fetchAll();
        return $res;
    }


    function update($reponse, $idM)
    {

        $query = $this->base->prepare("UPDATE  MESSAGE SET REPONSE=:reponse  WHERE IDMESSAGE=:idM");
        $query->execute(array(
            'reponse' => $reponse,
            'idM' => $idM
        ));
    }
}
