<?php 
/*session_start();
if(!isset($_SESSION['matriculemba'])){
    header('Content-Type:text/html ; charset=utf-8');
    header('location: ../../Abm');
}else{
    include_once("../model/Connexion.class.php");
}*/
$currentPage='cours';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cours</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jgthms/minireset.css@master/minireset.min.css">
    <link rel="stylesheet" href="gen/main.css" type="text/css">
</head>
<body>
<div class="bar-navigation">
            <div class="container-item">
                <div class="brand">
                    <img src="image/logoE-media.png" alt="e-media"/>    
                </div>
            </div>
            <div class="container-item d-flex justify-content-end px-5">
                <div class="setting align-self-center">
                    <i class="fas fa-cog fa-1x"></i>
                </div>
                
            </div>
            
        </div>
<div id="body" class="d-flex">
    <nav >
        
        <div class="container-navigation">
            <ul>
                <li><a href="inscription.php"> <i class="fas fa-user-plus"></i><span>Inscriptions</span> </a></li>
                <li><a href="etudiants.php"> <i class="fas fa-graduation-cap"></i><span>Etudiants</span></a></li>
                <li><a href="admission.php"> <i class="fas fa-book"></i><span>Admissions</span> </a></li>
                
                <li><a href="#" class="active"><i class="fas fa-pen"></i><span>Cours</span></a></li>
                <li><a href="examens.php"><i class="fas fa-university"></i><span>Examen</span></a></li>
                <li><a href="status.php"> <i class="fas fa-users"></i><span>Status</span></a></li>
                <li><a href="message.php"> <i class="fas fa-envelope"></i><span>Message</span></a></li>
            </ul>
        </div>
    </nav>

    <section>
        <!--
        manatsofoka unite d'enseignement 
-->
        <form action="#" >
            <div class="form-group">
            <label>Ajouter une unité d'enseignement</label>
            <input  type="text" placeholder="unite d'enseignement"/>
            <input type="button" value="creez" />
            <div>

        </form>
        <form action="#">
        
        </form>
    </section>
</div>
    
    <div class="dropdown">
        <ul>
            <li><a href="#">Deconnexion</a></li>
            <li><a href="#">Paramètre</a></li>
        <ul>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>