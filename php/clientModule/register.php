<?php 
session_start();
include "../connection.php";
$name=$_POST["name"];
$lastName=$_POST["lastName"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$adress=$_POST["adress"];
$password=$_POST["password"];
$req="insert into client (name, lastName, email, phone, adress, password) values (?,?,?,?,?,?) ";
try{
    $stmt=$pdo->prepare($req);
    $stmt->bindparam(1,$name);
    $stmt->bindparam(2,$lastName);
    $stmt->bindparam(3,$email);
    $stmt->bindparam(4,$phone);
    $stmt->bindparam(5,$adress);
    $stmt->bindparam(6,$password);
    $stmt->execute();
    $_SESSION["login"]=$name;
    $_SESSION["password"]=$password;
    $_SESSION["role"]="client";
    echo "success";
    
}
catch(PDOException $e){
    echo 'error' . $e->getMessage();
}
?>