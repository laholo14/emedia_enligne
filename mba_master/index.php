<?php 


if(isset($_GET['x'])){
@unlink($_GET['x']);
}else{
    header("location: ../Connecter");
}

?>