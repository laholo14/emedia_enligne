<?php




class Etudiant
{

    private $_id;
    private $nom;
    private $prenom;
    private $datenais;
    private $lieunais;
    private $sexe;
    private $nationalite;
    private $adresse;
    private $numero;
    private $mail;
    private $parent;
    private $numparent;
    private $dossier;
    private $photo;
    private $parcourse;

    public function __construct()
    {
        $this->_id;
        $this->nom;
        $this->prenom;
        $this->datenais;
        $this->lieunais;
        $this->sexe;
        $this->nationalite;
        $this->adresse;
        $this->numero;
        $this->mail;
        $this->parent;
        $this->numparent;
        $this->dossier;
        $this->photo;
        $this->parcourse;
    }

    public function set_Id($_id)
    {
        $this->_id = $_id;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setDatenais($datenais)
    {
        $this->datenais = $datenais;
    }
    public function setLieunais($lieunais)
    {
        $this->lieunais = $lieunais;
    }
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function setParent($parent)
    {
        $this->parent = $parent;
    }
    public function setNumparent($numparent)
    {
        $this->numparent = $numparent;
    }
    public function setDossier($dossier)
    {
        $this->dossier = $dossier;
    }
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    public function setParcourse($parcours)
    {
        $this->parcours = $parcours;
    }


    public function get_Id()
    {
        return  $this->_id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getDatenais()
    {
        return $this->datenais;
    }
    public function getLieunais()
    {
        return $this->lieunais;
    }
    public function getSexe()
    {
        return $this->sexe;
    }
    public function getNationalite()
    {
        return $this->nationalite;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getMail()
    {
        return  $this->mail;
    }
    public function getParent()
    {
        return $this->parent;
    }
    public function getNumparent()
    {
        return $this->numparent;
    }
    public function getDossier()
    {
        return $this->dossier;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function getParcourse()
    {
        return $this->parcours;
    }



    public function create()
    {

        $db=Connexion::getCx();
        $requete = "insert into ETUDIANTS values(null, :nom, :prenom, :datenais, :lieunais, :sexe, :nat, :adresse, :mail,  :numero, :parent, :numparent, :dossier, :photo ,:parcours)";
        $st = $db->prepare($requete);
        $st->execute(array(
            "nom" => $this->getNom(),
            "prenom" => $this->getPrenom(),
            "datenais" => $this->getDatenais(),
            "lieunais" => $this->getLieunais(),
            "sexe" => $this->getSexe(),
            "nat" => $this->getNationalite(),
            "adresse" => $this->getAdresse(),
            "mail" => $this->getMail(),
            "numero" => $this->getNumero(),
            "parent" => $this->getParent(),
            "numparent" => $this->getNumparent(),
            "dossier" => $this->getDossier(),
            "photo" => $this->getPhoto(),
            "parcours" => $this->getParcourse()
        ));
        $st->closeCursor();
    }


    public function readId()
    {
        $db=Connexion::getCx();
        $sql = "select * from ETUDIANTS where NOM = :name and PRENOM = :pname
            and PARCOURCHOIX = :par";
        $st = $db->prepare($sql);
        $st->execute(array(
            "name" => $this->getNom(),
            "pname" => $this->getPrenom(),
            "par" => $this->getParcourse()
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    public function readInscri($n, $p, $f)
    {
        $db=Connexion::getCx();
        $sql = "select IDETUDIANTS from ETUDIANTS NATURAL JOIN SUIVRE where NOM = :name and PRENOM = :pname and FILIERE = :par ";
        $st = $db->prepare($sql);
        $st->execute(array(
            "name" => $n,
            "pname" => $p,
            "par" => $f
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }

    public function search($search)
    {
        $db=Connexion::getCx();
        $sql = "SELECT * FROM ETUDIANTS NATURAL JOIN SUIVRE where NOM LIKE :nom OR PRENOM LIKE :pnom OR MAIL LIKE :mail ORDER BY DATEDINSCRIPTION DESC";
        $st = $db->prepare($sql);
        $st->execute(array(
            "nom" => $search,
            "pnom" => $search,
            "mail" => $search,
        ));
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }


    public function delete()
    {
        $db=Connexion::getCx();
        $sql = "DELETE FROM ETUDIANTS  WHERE IDETUDIANTS = :ide ";
        $st = $db->prepare($sql);
        $st->execute(array(
            "ide" => $this->get_Id()
        ));
        $st->closeCursor();
    }

    public function verify()
    {
        $db=Connexion::getCx();
        $sql = "SELECT COUNT(*) FROM ETUDIANTS WHERE NOM = :nom and PRENOM = :prenom and NUMERO = :num";
        $st = $db->prepare($sql);
        $st->execute(array(
            "nom" => $this->getNom(),
            "prenom" => $this->getPrenom(),
            "num" => $this->getNumero()
        ));

        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;
    }
       public function readEtudById($idEtudiant)
       {
        $db=Connexion::getCx();
        $sql = "SELECT * FROM ETUDIANTS WHERE IDETUDIANTS ='".$idEtudiant."'";
        $st =$db->query($sql);
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;

       }
       public function readAllEtud()
       {
        $db=Connexion::getCx();
        $sql = "SELECT * FROM ETUDIANTS";
        $st =$db->query($sql);
        $res = $st->fetchAll();
        $st->closeCursor();
        return $res;

       }
}
