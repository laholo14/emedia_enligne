<?php

class Datyfidirana
{
        private $iddatyfidirana;
        private $datyfidirana;
        private $code;
        private $diplome;

        public function __construct()
        {
                $this->iddatyfidirana = 0;
                $this->datyfidirana = null;
                $this->code = "";
                $this->diplome = "";
        }

        /**
         * Get the value of iddatyfidirana
         */
        public function getIddatyfidirana()
        {
                return $this->iddatyfidirana;
        }

        /**
         * Set the value of iddatyfidirana
         *
         * @return  self
         */
        public function setIddatyfidirana($iddatyfidirana)
        {
                $this->iddatyfidirana = $iddatyfidirana;
        }

        /**
         * Get the value of datyfidirana
         */
        public function getDatyfidirana()
        {
                return $this->datyfidirana;
        }

        /**
         * Set the value of datyfidirana
         *
         * @return  self
         */
        public function setDatyfidirana($datyfidirana)
        {
                $this->datyfidirana = $datyfidirana;
        }

        /**
         * Get the value of code
         */
        public function getCode()
        {
                return $this->code;
        }

        /**
         * Set the value of code
         *
         * @return  self
         */
        public function setCode($code)
        {
                $this->code = $code;
        }


        /**
         * Get the value of diplome
         */
        public function getDiplome()
        {
                return $this->diplome;
        }

        /**
         * Set the value of diplome
         *
         * @return  self
         */
        public function setDiplome($diplome)
        {
                $this->diplome = $diplome;
        }

        public function create()
        {
                $requete = "INSERT INTO DATYFIDIRANA VALUES(NULL,NULL,:code,:diplome)";
                $query = Connexion::getCxEtudiant()->prepare($requete);
                $query->execute(array(
                        "code" => $this->getCode(),
                        "diplome" => $this->getDiplome()
                ));
                $query->closeCursor();
        }

        public function read_mba()
        {
                $requete = "SELECT * FROM DATYFIDIRANA WHERE DIPLOME = 'MASTER'";
                $query = Connexion::getCxEtudiant()->query($requete);
                return $query->fetchAll();
        }
}


?>
<?php ?>