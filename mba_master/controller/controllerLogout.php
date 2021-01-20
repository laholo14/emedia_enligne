<?php 

ob_start();

session_start();

session_destroy();

header("location:../../Abm");

ob_flush();

?>