<?php 
require_once("../modele/Connexion.class.php");



class Parcours{
    private $reffiliere;
    private $parcours;
    private $nomparcours;

    public function __construct(){
        $this->reffiliere;
        $this->parcours;
        $this->nomparcours;
        $connexion = new Connexion();
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
        
        $db=Connexion::getCx();
        $sql="select * from parcours";
        $st=$db->prepare($sql);
        $st->execute();
        $res=$st->fetchAll();//maka anle valeur rehetra anaty bdd d aveo stokeny ao anaty le $res ny resultat rehetra.
        return $res;


    }
    function readByid($idM){

        $db=Connexion::getCx();
        $sql = "select * from parcours  where parcours = :par ";
        $st = $db->prepare($sql);
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