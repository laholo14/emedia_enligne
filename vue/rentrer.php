<?php 


require('head.html');

?>
<div class="container" style="margin-top:10% !important;">

    <div class="row align-center">

        <div class="col-lg-12 ">

            <img src="vue/image/logo E-media.png" class="img-fluid" style="width:50%;position:relative;left:25%;">


        </div>



    </div>


    <div class="row">

        <div class="col-lg-12 text-white">



            <h3 class="text-center text-dark maintenance">Bonjour <?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . ' ';
                                                                    ?></br>Rendez vous le 3 <?php echo $moisDenter; ?> 2021...</h3>

        </div>



    </div>

    <div class="row">

        <div class="col-lg-12">

            <h1 class="text-center maintenance"><a class="btn btn-primary" href="vue/logout.php">se déconnecter</a></h1>

        </div>



    </div>

    <div class="row">

        <div class="col-lg-12">

            <p class="text-center text-white">&copy; Copyright E-MEDIA 2020</p>

        </div>



    </div>

</div>