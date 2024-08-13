<?php
include "../connection.php";
session_start();
if(isset($_SESSION["id"])){
    $idClient=$_SESSION["id"];
}
else{
    echo 'the client is not logged in';
}
$idProduct=$_POST["idProduct"];
$price=$_POST["price"];
$quantity=$_POST["quantity"];
try{
    $pdo->beginTransaction();
    $req="insert into commande (idClient,dateCommande) values (?,NOW())";
    $stmt=$pdo->prepare($req);
    $stmt->bindparam(1,$idClient);
    $stmt->execute();
    $idCommande=$pdo->lastInsertId();
    $sql="insert into ligne_commande(idProduct,idCommande,price,quantity) values (?,?,?,1)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindparam(1,$idProduct);
    $stmt->bindparam(2,$idCommande);
    $stmt->bindparam(3,$price);
    
    $stmt->execute();
    $req2='update products set quantity=quantity-1 where idProduct=?';
    $stmt = $pdo->prepare($req2);
    $stmt->bindParam(1, $idProduct);
    $stmt->execute();
    $pdo->commit();

    echo "Order placed successfully!";
}
catch (Exception $e) {
    // Rollback the transaction if something went wrong
    $pdo->rollBack();
    echo "Failed to place the order: " . $e->getMessage();
}
?>