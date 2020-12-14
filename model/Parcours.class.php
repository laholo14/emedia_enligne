<?php 
require_once("../modele/Connexion.class.php");



class Parcours{
    private $reffiliere;
    private $parcours;
    private $nomparcours;
    private $base;

    public function __construct(){
        $this->reffiliere;
        $this->parcours;
        $this->nomparcours;
        $connexion = new Connexion();
		$this->base = $connexion->getCx();
    }

    public function getReffiliere(){
        return $this->reffiliere;
    }
    public function getParcours(){
        return $this->parcours;
    }
    public function getNomparcours(){
        return $this->nomfiliere;
    }

    public function setReffiliere($reffiliere){
        $this->reffiliere = $reffiliere;
    }
    public function setParcours($Parcours){
        $this->parcours = $Parcours;
    }
    public function setNomparcours($nomparcours){
        $this->nomparcours = $nomparcours;
    }
    
    function read(){
		$sql="select * from parcours";
		$st=$this->base->prepare($sql);
		$st->execute();
		$res=$st->fetchAll();//maka anle valeur rehetra anaty bdd d aveo stokeny ao anaty le $res ny resultat rehetra.
		return $res;


    }
    function readByid($idM){
        $sql = "select * from parcours  where parcours = :par ";
        $st = $this->base->prepare($sql);
        $st->bindValue(':par',$idM);
        $st->execute();
        $res=$st->fetchAll();
        return $res;
        /*$st->execute(array("par"=> $idM));
        while($d = $st->fetch()){
            echo $d['NOMPARCOURS'];
        }*/
     }
}


?>