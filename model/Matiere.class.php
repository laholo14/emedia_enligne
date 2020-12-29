<?php 

    class Matiere{
        
        private $id_matiere;
        private $intitule;
   

        public function __construct(){
            $this->id_matiere;
            $this->intitule;
           
        }

    
        public function setId_matiere($id_matiere){
            $this->id_matiere = $id_matiere;
        }
        public function setIntitule($intitule){
            $this->intitule = $intitule;
        }


        
        public function getId_matiere(){
         return $this->id_matiere;
        }
        public function getIntitule(){
          return $this->intitule;
        }

      
    
       
        

       
   public function create(){
        $db=Connexion::getCx();
        $requete = "INSERT INTO MATIERE VALUES(NULL, :intitule)";
        
        $st = $db->prepare($requete);
        
        $st->execute(array("intitule"=> $this->getIntitule()
                                                            
                          ));
        $st->closeCursor();
    
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


    public function update(){
        $db=Connexion::getCx();

        $requete = 'UPDATE MATIERE SET INTITULE = :intitule WHERE IDMATIERE = :idm';
        
        $st = $db->prepare($requete);
    
        $st->execute(array("intitule"=> $this->getIntitule(),
                            "idm" => $this->getId_matiere()
                                                            
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

}
