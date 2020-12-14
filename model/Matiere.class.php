<?php 

    class Matiere{
        
        private $id_matiere;
        private $intitule;
        private $base;
   

        public function __construct(PDO $base){
            $this->id_matiere;
            $this->intitule;
            $this->setBase($base);
           
        }

    
        public function setId_matiere($id_matiere){
            $this->id_matiere = $id_matiere;
        }
        public function setIntitule($intitule){
            $this->intitule = $intitule;
        }
        public function setBase($base){
            $this->base = $base;
        }


        
        public function getId_matiere(){
         return $this->id_matiere;
        }
        public function getIntitule(){
          return $this->intitule;
        }

      
    
       
        

       
   public function create(){
    $requete = "INSERT INTO MATIERE VALUES(NULL, :intitule)";
    
    $st = $this->base->prepare($requete);
    
    $st->execute(array("intitule"=> $this->getIntitule()
                                                        
                      ));
    $st->closeCursor();
    
    }
       
    public function listMatiere(){

        $requete = "SELECT * FROM MATIERE ORDER BY INTITULE ASC";
        $st = $this->base->query($requete);
        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;

        
    }

    public function search($search){

        $requete = "SELECT * FROM MATIERE WHERE INTITULE LIKE :search ORDER BY INTITULE ASC";
        $st = $this->base->prepare($requete);
        $st->execute(array("search"=> $search 
                                                        
        ));
        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;

        
    }


    public function listMatiere_id(){

        $requete = "SELECT * FROM MATIERE where IDMATIERE = :idm ORDER BY IDMATIERE ASC";

        $st = $this->base->prepare($requete);
        $st->execute(array("idm"=> $this->getId_matiere()
                                                        
        ));
        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;

        
    }


    public function update(){

        $requete = 'UPDATE MATIERE SET INTITULE = :intitule WHERE IDMATIERE = :idm';
        
        $st = $this->base->prepare($requete);
    
        $st->execute(array("intitule"=> $this->getIntitule(),
                            "idm" => $this->getId_matiere()
                                                            
                          ));
        $st->closeCursor();

    }

    public function verify(){
        $sql="SELECT COUNT(*) FROM MATIERE WHERE INTITULE = :idm";
        $st=$this->base->prepare($sql);
        $st->execute(array(

            "idm" => $this->getIntitule()
        ));

        $res=$st->fetchAll();
        $st->closeCursor();
        return $res;
    }
       public function readMatById($idMatiere)
       {
        $sql = "SELECT * FROM MATIERE WHERE IDMATIERE ='".$idMatiere."'";
        $st =$this->base->query($sql);
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;

       }
       public function readAllMatiere()
       {
        $sql = "SELECT * FROM MATIERE";
        $st =$this->base->query($sql);
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;

       }

}
