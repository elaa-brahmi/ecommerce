<?php
include "../connection.php";
$req="select idProduct,name,description,quantity,price,picture,etat from products";

try{
    $res=$pdo->query($req);
    $table=$res->fetchAll();
    $pdo=null;
  
    echo json_encode(['data' => $table]);


}
catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
 }





















?>