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

      
    
       

}
