<?php
include "../connection.php";
$id=$_GET["id"];
$sql="delete from client where idClient=?";
try{
    $stmt=$pdo->prepare($sql);
    $stmt->bindparam(1,$id);
    $stmt->execute();
    echo 'client deleted successfully';
    header("location:../../clients.php");
    exit();
}
catch(PDOException $e){
    echo 'error'.$e->getMessage();
}
?>