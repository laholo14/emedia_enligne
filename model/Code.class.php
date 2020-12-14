<?php

class Code
{
    private  $code;
    private $datedentrer;
    private $base;

    public function __construct(PDO $base)
    {
        $this->code;
        $this->datedentrer;
        $this->base;
        $this->setBase($base);
    }

    public function setBase($base)
    {
        $this->base = $base;
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
        $requete = "INSERT INTO CODECLASSE VALUES(:code , NULL)";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "code" => $this->getCode()
        ));
        $st->closeCursor();
    }

    public function listVague()
    {
        $requete = "SELECT * FROM CODECLASSE WHERE CODE != 'CODE0'";
        $st = $this->base->query($requete);
        $res = $st->fetchAll();
        return $res;
        $st->closeCursor();
    }

    public function search($search)
    {
        $requete = "SELECT * FROM CODECLASSE WHERE CODE != 'CODE0' AND CODE LIKE :code";
        $st = $this->base->prepare($requete);
        $st->execute(array(
            "code" => $search
        ));
        $res = $st->fetchAll();
        return $res;
        $st->closeCursor();
    }

    public function update()
    {
        $requete = "UPDATE CODECLASSE SET DATEDENTER = :enter WHERE CODE = :code";
        $st = $this->base->prepare($requete);
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