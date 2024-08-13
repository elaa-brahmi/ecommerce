<?php
include "../connection.php";
$name = $_POST["name"];
$lname = $_POST["lastName"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$adress = $_POST["adress"];
$idClient = $_POST["idClient"]; // Assuming you're sending the client ID with the POST request
$sql = "UPDATE client SET name = ?, lastName = ?, email = ?, phone = ?, adress = ? WHERE idClient = ?";
try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $lname);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $phone);
    $stmt->bindParam(5, $adress);
    $stmt->bindParam(6, $idClient); 
    $stmt->execute();
    echo 'Client modified';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
