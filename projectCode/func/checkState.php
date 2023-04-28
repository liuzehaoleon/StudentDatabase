<?php 
session_start();
if (!$_SESSION['logged'])
    header("Location: " . "func/logIn.php");
?>