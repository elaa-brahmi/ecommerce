<?php 
session_start();
include "../connection.php";

$name = $_POST["name"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$adress = $_POST["adress"];
$password = $_POST["password"];

try {
    // Start a transaction
    $pdo->beginTransaction();
    // Insert into client table
    $reqClient = "INSERT INTO client (name, lastName, email, phone, adress, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmtClient = $pdo->prepare($reqClient);
    $stmtClient->bindParam(1, $name);
    $stmtClient->bindParam(2, $lastName);
    $stmtClient->bindParam(3, $email);
    $stmtClient->bindParam(4, $phone);
    $stmtClient->bindParam(5, $adress);
    $stmtClient->bindParam(6, $password);
    $stmtClient->execute();
    // Get the auto-incremented idClient
    $idClient = $pdo->lastInsertId();
    // Insert into user table
    $reqUser = "INSERT INTO user (login, password, id, role) VALUES (?, ?, ?, 'client')";
    $stmtUser = $pdo->prepare($reqUser);
    $stmtUser->bindParam(1, $name);
    $stmtUser->bindParam(2, $password);
    $stmtUser->bindParam(3, $idClient);
    $stmtUser->execute();

    // Commit the transaction
    $pdo->commit();

    $_SESSION["login"] = $name;
    $_SESSION["password"] = $password;
    $_SESSION["role"] = "client";

    echo "success";
} catch (PDOException $e) {
    // Rollback the transaction if there's an error
    $pdo->rollBack();
    echo 'error: ' . $e->getMessage();
}
?>
