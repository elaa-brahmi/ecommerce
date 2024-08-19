<?php
session_start();
include "../connection.php";
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "client" || !isset($_SESSION["id"])) {
    echo 'error';
    exit();
}
$idClient = $_SESSION["id"];
$cart = $_POST['cart'];
try {
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("insert into commande (idClient, dateCommande) values (?, NOW())");
    $stmt->execute([$idClient]);
    $idCommande = $pdo->lastInsertId(); 
    $stmtLigne = $pdo->prepare("insert into ligne_commande (idCommande, idProduct, quantity, price) values (?, ?, ?, ?)");
    foreach ($cart as $item) {
        $stmtLigne->execute([$idCommande, $item['idProduct'], $item['quantity'], $item['price']]);
    }
    $pdo->commit();
    echo 'success';
}
 catch (Exception $e) {
    $pdo->rollBack();
    echo 'error';
}
?>
