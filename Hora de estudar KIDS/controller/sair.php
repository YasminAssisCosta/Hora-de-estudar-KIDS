<?php
session_start(); 


if(isset($_SESSION['usuario'])) {
    
    session_unset();
    session_destroy();
    header("Location: ../index.html"); 
    exit(); 
} else {
    
     header("Location: ../index.html");
    exit();
}
?>




