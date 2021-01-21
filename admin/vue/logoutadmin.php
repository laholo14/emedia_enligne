<?php 

ob_start();

session_start();

session_destroy();

header("location:../../Succes");

ob_end_flush();
?>