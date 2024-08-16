<?php
session_start();
if(isset($_SESSION["role"])){
    unset($_SESSION["role"]);
    header("location:login.php");
}










?>