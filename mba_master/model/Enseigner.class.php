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



  


}
