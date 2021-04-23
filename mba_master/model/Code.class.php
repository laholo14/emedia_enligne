<?php

class Code
{
    private  $code;
    private $datedentrer;

    public function __construct()
    {
        $this->code;
        $this->datedentrer;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setDatedentrer($date)
    {
        $this->datedentrer = $date;
    }

    public function getCode()
    {
        return $this->code;
    }
    public function getDatedentrer()
    {
        return $this->datedentrer;
    }


    public function create()
    {
        $db=Connexion::getCxEtudiant();
        $requete = "INSERT INTO CODECLASSE VALUES(:code , NULL)";
        $st = $db->prepare($requete);
        $st->execute(array(
            "code" => $this->getCode()
        ));
        $st->closeCursor();
    }

    public function listVague()
    {
        $db=Connexion::getCxEtudiant();
        $requete = "SELECT * FROM CODECLASSE WHERE CODE != 'CODE0'";
        $st = $db->query($requete);
        $res = $st->fetchAll();
        return $res;
        $st->closeCursor();
    }

    public function search($search)
    {
        $db=Connexion::getCxEtudiant();
        $requete = "SELECT * FROM CODECLASSE WHERE CODE != 'CODE0' AND CODE LIKE :code";
        $st = $db->prepare($requete);
        $st->execute(array(
            "code" => $search
        ));
        $res = $st->fetchAll();
        return $res;
        $st->closeCursor();
    }

    public function update()
    {
        $db=Connexion::getCxEtudiant();
        $requete = "UPDATE CODECLASSE SET DATEDENTER = :enter WHERE CODE = :code";
        $st = $db->prepare($requete);
        $st->execute(array(
            "enter" => $this->getDatedentrer(),
            "code" => $this->getCode()
        ));
        $st->closeCursor();
    }
}
?>
<?php

?>