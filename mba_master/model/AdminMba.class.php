<?php

class AdminMba
{
    private $idadminmba;
    private $matricule;
    private $mdp;

    public function __construct()
    {
        $this->idadminmba = 0;
        $this->matricule = "";
        $this->mdp = "";
    }


    /**
     * Get the value of idadminmba
     */
    public function getIdadminmba()
    {
        return $this->idadminmba;
    }

    /**
     * Set the value of idadminmba
     *
     * @return  self
     */
    public function setIdadminmba($idadminmba)
    {
        $this->idadminmba = $idadminmba;
    }

    /**
     * Get the value of matricule
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * Get the value of mdp
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function login()
    {

        $requete = "SELECT * FROM ADMINMBA WHERE MATRICULE = :mat AND MDP = :mdp ";
        $query = Connexion::getCx()->prepare($requete);
        $query->execute(array(
            "mat" => $this->getMatricule(),
            "mdp" => $this->getMdp()
        ));
        $res = $query->fetchAll();
        $query->closeCursor();
        return $res;
    }
}

?>
<?php ?>