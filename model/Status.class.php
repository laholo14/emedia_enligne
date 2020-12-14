<?php
    
    class Status
    {
        
      
        private $lastactivity;
        private $type;
        private $base;

        public function __construct(PDO $base){
           
            
            $this->lastactivity;
            $this->type;
            $this->setBase($base);  

            }

        

        
        public function getLastactivity(){
            return  $this->lastactivity;
        }  
        public function getType(){
            return  $this->type;
        }  
                
        
        
        public function setLastactivity($lastactivity){
            $this->lastactivity = $lastactivity;
        }
        public function setType($type){
            $this->type  = $type;
        }
        public function setBase($base){
        $this->base = $base;
        }



        function fetch_user_last_activity($idetudiant,$mat ,$fil)
       {
            $requete = " SELECT * FROM LOGIN_DETAILS WHERE IDUSERSTATUS = :idetu AND MATRICULESTATUS = :mat AND FILIERE = :filiere ORDER BY LAST_ACTIVITY DESC LIMIT 1";
            $st = $this->base->prepare($requete);
            $st->execute(array(
                "idetu" => $idetudiant,
                "mat" => $mat,
                "filiere" => $fil
                            ));

            $res = $st->fetchAll();
            foreach($res as $row)
            {
                return $row['LAST_ACTIVITY'];
            }
            $st->closeCursor();
            
       }

      

       function update_last_activity($id_details)
       {
            $requete = "UPDATE LOGIN_DETAILS SET LAST_ACTIVITY = now() WHERE LOGIN_DETAILS_ID = :id " ;
            $st = $this->base->prepare($requete);
            $st->execute(array(
                "id" => $id_details,
                            ));
            $st->closeCursor();
           
       }

    }
?>