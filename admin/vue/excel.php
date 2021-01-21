<?php 

ob_start();

session_start();

function loadclass($class)
{

    require "../../model/" . $class . '.class.php';
}

spl_autoload_register("loadclass");

$db = new Connexion();

$suivre = new Suivre();
/*
if(isset($_POST['eport_exceltic'])){

    if(isset($_POST['licence']) and isset($_POST['fil']) and isset($_POST['vague'])){

    extract($_POST);

    $table ='<div class="table-responsive mt-3"> 
<table class="table table-border-danger table-striped" border="1">
    <thead>
        <tr>
        <th>Matricule </th>
        <th>Semestre</th>
        <th>Vague</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Sexe</th>
        <th>Diplome En</th>
        <th>Filière</th>
        <th>Contact</th> 
        <th>Mail</th>
        <th>Nationalité</th>
        <th>Date de naissance</th>
        <th>Lieu de naissance</th>
        
        </tr>
    </thead>';
    
    $suivre->setDip($licence);
    $suivre->setFiliere($fil);
    $suivre->setCode($vague);
    
    $res = $suivre->ListEtudiant();

    foreach($res as $resultat){
        
        $table .='<tbody>
<tr class="">
    <td>'.$resultat['MATRICULE'].'</td>
    <td>'.$resultat['SEMESTRE'].'</td>
    <td>'.$resultat['CODE'].'</td>
    <td>'.$resultat['NOM'].'</td>
    <td>'.$resultat['PRENOM'].'</td>
    <td>'.$resultat['SEXE'].'</td>
    <td>'.$resultat['DIPLOME'].'</td>
    <td>'.$resultat['FILIERE'].'</td>
    <td>'.$resultat['NUMERO'].'</td>
    <td>'.$resultat['MAIL'].'</td>
    <td>'.$resultat['NATIONALITE'].'</td>
    <td>'.$resultat['DATENAIS'].'</td>
    <td>'.$resultat['LIEUNAISS'].'</td>
   
</tr>
</tbody>';
    }

    $table.='</table></div>'; 
    header("Content-Type: application/xls");
    header("Content-Disposition: attachement; filename=".$fil.'_'.$vague.'.xls');
    echo $table;

    }

} 


if(isset($_POST['eport_excelcan'])){

    if(isset($_POST['licence']) and isset($_POST['fil']) and isset($_POST['vague'])){

    extract($_POST);

    $table ='<div class="table-responsive mt-3"> 
<table class="table table-border-danger table-striped" border="1">
    <thead>
        <tr>
        <th>Matricule </th>
        <th>Semestre</th>
        <th>Vague</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Sexe</th>
        <th>Diplome En</th>
        <th>Filière</th>
        <th>Contact</th> 
        <th>Mail</th>
        <th>Nationalité</th>
        <th>Date de naissance</th>
        <th>Lieu de naissance</th>
        
        </tr>
    </thead>';
    
    $suivre->setDip($licence);
    $suivre->setFiliere($fil);
    $suivre->setCode($vague);
    
    $res = $suivre->ListEtudiant();

    foreach($res as $resultat){
        
        $table .='<tbody>
<tr class="">
    <td>'.$resultat['MATRICULE'].'</td>
    <td>'.$resultat['SEMESTRE'].'</td>
    <td>'.$resultat['CODE'].'</td>
    <td>'.$resultat['NOM'].'</td>
    <td>'.$resultat['PRENOM'].'</td>
    <td>'.$resultat['SEXE'].'</td>
    <td>'.$resultat['DIPLOME'].'</td>
    <td>'.$resultat['FILIERE'].'</td>
    <td>'.$resultat['NUMERO'].'</td>
    <td>'.$resultat['MAIL'].'</td>
    <td>'.$resultat['NATIONALITE'].'</td>
    <td>'.$resultat['DATENAIS'].'</td>
    <td>'.$resultat['LIEUNAISS'].'</td>
   
</tr>
</tbody>';
    }

    $table.='</table></div>'; 
    header("Content-Type: application/xls");
    header("Content-Disposition: attachement; filename=".$fil.'_'.$vague.'.xls');
    echo $table;

    }

}

*/
if(isset($_POST['eport_excel'])){

    if(isset($_POST['dip']) and isset($_POST['fil']) and isset($_POST['vague'])){

    extract($_POST);

    $table ='<div class="table-responsive mt-3"> 
<table class="table table-border-danger table-striped" border="1">
    <thead>
        <tr>
        <th>Matricule </th>
        <th>Semestre</th>
        <th>Vague</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Sexe</th>
        <th>Diplome En</th>
        <th>Filiere</th>
        <th>Contact</th> 
        <th>Mail</th>
        <th>Nationalite</th>
        <th>Date de naissance</th>
        <th>Lieu de naissance</th>
        
        </tr>
    </thead>';
    
    $suivre->setDip($dip);
    $suivre->setFiliere($fil);
    $suivre->setCode($vague);
    
    $res = $suivre->ListEtudiant();

    foreach($res as $resultat){
        
        $table .='<tbody>
<tr class="">
    <td>'.$resultat['MATRICULE'].'</td>
    <td>'.$resultat['SEMESTRE'].'</td>
    <td>'.$resultat['CODE'].'</td>
    <td>'.$resultat['NOM'].'</td>
    <td>'.$resultat['PRENOM'].'</td>
    <td>'.$resultat['SEXE'].'</td>
    <td>'.$resultat['DIPLOME'].'</td>
    <td>'.$resultat['FILIERE'].'</td>
    <td>'.$resultat['NUMERO'].'</td>
    <td>'.$resultat['MAIL'].'</td>
    <td>'.$resultat['NATIONALITE'].'</td>
    <td>'.$resultat['DATENAIS'].'</td>
    <td>'.$resultat['LIEUNAISS'].'</td>
   
</tr>
</tbody>';
    }

    $table.='</table></div>'; 
    header("Content-Type: aapplication/vnd.ms-excel");
    header("Content-Disposition: attachement; filename=".$fil.'_'.$vague.'.xls');
    echo $table;

    }

}


ob_end_flush();

?>