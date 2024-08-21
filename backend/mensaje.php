<?php
    session_start();
    if(isset($_SESSION['mensaje'])) 
    {
        echo "<script>alert('" . $_SESSION['mensaje'] . "');</script>";
        unset($_SESSION['mensaje']);
    }
?>