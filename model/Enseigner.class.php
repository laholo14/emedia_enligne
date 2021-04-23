<?php

class Enseigner
{

    private $parcours;
    private $semestre;
    private $matiere;
    private $prof;
    private $mois;

    public function __construct()
    {
        $this->parcours;
        $this->semestre;
        $this->matiere;
        $this->prof;
        $this->mois;
    }

    public function setParcours($parcours)
    {
        $this->parcours = $parcours;
    }
    public function setSemestre($semestre)
    {
        $this->semestre = $semestre;
    }
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
    }
    public function setProf($prof)
    {
        $this->prof = $prof;
    }
    public function setMois($mois)
    {
        $this->mois = $mois;
    }


    public function getParcours()
    {
        return $this->parcours;
    }
    public function getSemestre()
    {
        return $this->semestre;
    }
    public function getMatiere()
    {
        return $this->matiere;
    }
    public function getProf()
    {
        return $this->prof;
    }
    public function getMois()
    {
        return $this->mois;
    }



  

    public function create()
    {
        $db=Connexion::getCx();
        $requete = "INSERT INTO ENSEIGNER VALUES(:idpa, :sem, :mat, :mois ,:idprof)";

        $st = $db->prepare($requete);

        $st->execute(array(
            "idpa" => $this->getParcours(),
            "sem" => $this->getSemestre(),
            "mat" => $this->getMatiere(),
            "mois" => $this->getMois(),
            "idprof" => $this->getProf()
        ));
        $st->closeCursor();
    }
    
   /* public function verify(){
        $db=Connexion::getCx();
        $sql="SELECT COUNT(*) FROM ENSEIGNER WHERE IDMATIERE = :idm";
        $st=$db->prepare($sql);
        $st->execute(array(

            "idm" => $this->getMatiere()
        ));

        
     $res = $st->fetchAll();
     $st->closeCursor();
     return $res;
    
    }*/
    public function listEnseigner($search)
    {

        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN PARCOURS NATURAL JOIN MATIERE NATURAL JOIN PROF WHERE FILIERE= :fil AND INTITULE LIKE :mat ORDER BY MOIS ASC";
        $st = $db->prepare($requete);

        $st->execute(array(
            "fil" => $this->getParcours(),
            "mat" => $search
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
   
    public function listMatiere_enseigner(){
        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN PARCOURS NATURAL JOIN MATIERE NATURAL JOIN PROF WHERE FILIERE= :fil AND SEMESTRE = :sem ORDER BY MOIS ASC";
        $st = $db->prepare($requete);

        $st->execute(array(
            "fil" => $this->getParcours(),
            "sem" => $this->getSemestre()
            
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    public function listEnseigner_ID($idm,$idp,$ids)
    {

        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN PARCOURS NATURAL JOIN MATIERE NATURAL JOIN PROF WHERE IDMATIERE = :idm AND PARCOURS = :idp AND SEMESTRE = :sem";
        $st = $db->prepare($requete);

        $st->execute(array(
                "idm" => $idm,
                "idp" => $idp,
                "sem" => $ids
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }



    public function update()
    {
        $db=Connexion::getCx();
        $requete = "UPDATE  ENSEIGNER SET  SEMESTRE = :sem  ,  MOIS = :mois ,IDPROF = :idprof   WHERE IDMATIERE = :idm AND PARCOURS = :idpa";

        $st = $db->prepare($requete);

        $st->execute(array(
            
            "sem" => $this->getSemestre(),
            "mois" => $this->getMois(),
            "idprof" => $this->getProf(),
            "idm" => $this->getMatiere(),
            "idpa" => $this->getParcours()
        ));
        $st->closeCursor();
    }
    
    public function search($search)
    {
        $db=Connexion::getCx();
        $requete = "SELECT * FROM ENSEIGNER NATURAL JOIN PROF NATURAL JOIN MATIERE NATURAL JOIN PARCOURS WHERE INTITULE  LIKE :mat";
        $st = $db->prepare($requete);
        $st->execute(array(
           
            "mat" => $search

        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function delete(){
        $db=Connexion::getCx();
        $sql="DELETE FROM ENSEIGNER  WHERE IDMATIERE = :idm AND PARCOURS = :par ANS SEMESTRE = :sem ";
        $st=$db->prepare($sql);
        $st->execute(array(
                          "idm" => $this->getMatiere(),
                          "par" =>$this->getParcours(),
                          "sem" =>$this->getSemestre() 
                          ));
        $st->closeCursor();
        
    }
    

    //SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS NATURAL JOIN FILIERE NATURAL JOIN SUIVRE NATURAL JOIN codeclasse WHERE DATEDENTER = '2020/06/15';
    public function formation(){
        $sql="SELECT * FROM ENSEIGNER NATURAL JOIN MATIERE NATURAL JOIN DOSSIER NATURAL JOIN PARCOURS NATURAL JOIN FILIERE";
    }
    


}
