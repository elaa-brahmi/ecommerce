<?php
include "../connection.php";
$name=$_POST["name"];
$description=$_POST["description"];
$price=$_POST["price"];
$quantity=$_POST["quantity"];
$etat=$_POST["etat"];
$picture=$_POST["picture"];
$sql="insert into products (name,description,price,quantity,etat,picture) values(?,?,?,?,?,?)";
try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $description);
    $stmt->bindParam(3, $price);
    $stmt->bindParam(4, $quantity);
    $stmt->bindParam(5, $etat);
    $stmt->bindParam(6, $picture);
    $stmt->execute();

    echo "Product added successfully!";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}





















?>