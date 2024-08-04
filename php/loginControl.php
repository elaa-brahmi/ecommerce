<?php
session_start();
include "connection.php";
$login=$_POST["login"];
$pass=$_POST["password"];
$req="select * from client where password=?";
$req1="select * from admin where login=? and password=? ";
try{
    $stmt1=$pdo->prepare($req1);
    $stmt1->bindparam(1,$login);
    $stmt1->bindparam(2,$pass);
    $stmt1->execute();
    $row1=$stmt1->fetch();

    $stmt=$pdo->prepare($req);
    $stmt->bindparam(1,$pass);
    $stmt->execute();
    $row=$stmt->fetch();
if (!$row && !$row1){
    echo 'error';

}
else{
    if(isset($row['idClient'])){

        $_SESSION['id'] = $row['idClient'];
    }
    if(isset($row['password'])){
        $_SESSION['password'] = $row['password'];
    }
    else{
        $_SESSION['password'] = $row1['password']
    }
    $_SESSION["username"]=$login;
    echo 'success';
}
}
catch(PDOException $e){
    echo 'error';
}

?>