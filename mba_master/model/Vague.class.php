<?php

class Vague
{

    public function CountVague()
    {
        $requete = Connexion::getCxEtudiant()->query("SELECT * FROM CODECLASSE WHERE CODE != 'CODE0' ");
        $res = $requete->fetchAll();
        $requete->closeCursor();
        return $res;
    }
}

?>
<?php ?>