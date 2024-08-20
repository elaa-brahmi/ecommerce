<?php
include "../connection.php";
$id=$_GET["id"];
$sql="delete from client where idClient=?";
$sql1="delete from commande where idClient=?";
try {
    $stmt=$pdo->prepare($sql);
    $stmt->bindparam(1,$id);
    $stmt->execute();
    $stmt1=$pdo->prepare($sql1);
    $stmt1->bindparam(1,$id);
    $stmt1->execute();


    echo 'client deleted successfully';
    header("location:../../clients.php");
    exit();
}
catch(PDOException $e){
    echo 'error'.$e->getMessage();
}
?>