<?php 

    class Matiere{
        
        private $id_matiere;
        private $intitule;
        private $idUe;
        private $credit;
   

        public function __construct(){
            $this->id_matiere;
            $this->intitule;
            $this->idUe;
            $this->credit;
           
        }

    
        public function setId_matiere($id_matiere){
            $this->id_matiere = $id_matiere;
        }
        public function setIntitule($intitule){
            $this->intitule = $intitule;
        }
        public function setIdUe($idUe){
            $this->idUe=$idUe;
        }
        public function setCredit($credit){
            $this->credit = $credit;
        }


        
        public function getId_matiere(){
         return $this->id_matiere;
        }
        public function getIntitule(){
          return $this->intitule;
        }
        public function getIdUe(){
            return $this->idUe;
        }
        public function getCredit(){
            return $this->credit;
        }

      
    
       
        

       
   public function create(){
        $db=Connexion::getCx();
        $requete = "INSERT INTO MATIERE VALUES(NULL, :intitule,3, :idue)";
        
        $st = $db->prepare($requete);
        
        $st->execute(array(
            "intitule"=> $this->getIntitule(),
            "idue" => $this->getIdue()                                   
        ));
        
    }
       
    public function listMatiere(){
        $db=Connexion::getCx();

        $requete = "SELECT * FROM MATIERE ORDER BY INTITULE ASC";
        $st = $db->query($requete);
        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;

        
    }

    public function search($search){
        $db=Connexion::getCx();

        $requete = "SELECT * FROM MATIERE WHERE INTITULE LIKE :search ORDER BY INTITULE ASC";
        $st = $db->prepare($requete);
        $st->execute(array("search"=> $search 
                                                        
        ));
        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;

        
    }


    public function listMatiere_id(){
        $db=Connexion::getCx();

        $requete = "SELECT * FROM MATIERE where IDMATIERE = :idm ORDER BY IDMATIERE ASC";

        $st = $db->prepare($requete);
        $st->execute(array("idm"=> $this->getId_matiere()
                                                        
        ));
        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;

        
    }

    public function listMatiere_id_MASTER_V7(){
        $db=Connexion::getCxEtudiant();

        $requete = "SELECT * FROM MATIERE where IDMATIERE = :idm ORDER BY IDMATIERE ASC";

        $st = $db->prepare($requete);
        $st->execute(array("idm"=> $this->getId_matiere()
                                                        
        ));
        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;

        
    }


    public function update(){
        $db=Connexion::getCx();

        $requete = 'UPDATE MATIERE SET INTITULE = :intitule, IDUE = :idue,CREDIT = :credit WHERE IDMATIERE = :idm';
        
        $st = $db->prepare($requete);
    
        $st->execute(array(
            "intitule"=> $this->getIntitule(),
            "idue" => $this->getIdue(),
            "idm" => $this->getId_matiere(),
            "credit" =>$this->getCredit()
                                                            
        ));
        $st->closeCursor();

    }

    public function verify(){
        $db=Connexion::getCx();
        $sql="SELECT COUNT(*) FROM MATIERE WHERE INTITULE = :idm";
        $st=$db->prepare($sql);
        $st->execute(array(

            "idm" => $this->getIntitule()
        ));

        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;
    }
       public function readMatById($idMatiere)
       {
        $db=Connexion::getCx();
        $sql = "SELECT * FROM MATIERE WHERE IDMATIERE ='".$idMatiere."'";
        $st =$db->query($sql);
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;

       }
       public function readAllMatiere()
       {
        $db=Connexion::getCx();
        $sql = "SELECT * FROM MATIERE";
        $st =$db->query($sql);
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;

       }
        public function readByUE() {
            $db=Connexion::getCx();
            $requete = "SELECT * FROM matiere WHERE idue = :idue";
            $st = $db->prepare($requete);
            $st->execute(array(
                "idue" => $this->getIdue()
            ));
            $resultat = $st->fetchAll();
            $st->closeCursor();
            return $resultat;
        }

}
