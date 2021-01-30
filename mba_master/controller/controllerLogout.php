<?php 

ob_start();

session_start();
if (!isset($_SESSION['matriculemba'])) {
    header("location: ../../Abm");
} else {
    session_destroy();

    header("location:../../Abm");
     
}

ob_flush();

?>