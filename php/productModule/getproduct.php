<?php
include "./connection.php";
$req="select idProduct,name,description,price,picture,etat from products";
try{
    $res=$pdo->query($req);
    $table=$res->fetchAll();
    $pdo=null;
    header('Content-Type: application/json');
    echo json_encode(['data' => $table]);


}
catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
 }





















?>