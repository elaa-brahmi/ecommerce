<?php
session_start();
include "connection.php";
$login=$_POST["login"];
$pass=$_POST["password"];
$req="select * from user where login=? and password=?";
try{
    $stmt=$pdo->prepare($req);
    $stmt->bindparam(1,$login);
    $stmt->bindparam(2,$pass);
    $stmt->execute();
    $row=$stmt->fetch();
    if(!$row){
        echo 'error';
    }
    else {
        if($row["role"]=="admin"){
            $_SESSION["login"]=$row["login"];
            $_SESSION["id"]=$row["idUser"];
            $_SESSION["role"]="admin";
            echo 'success_admin'; // the response
        }
        else{
            echo 'success_client'; // this is the response
        }
    }
}
catch(PDOException $e){
         echo 'error';
    }
?>