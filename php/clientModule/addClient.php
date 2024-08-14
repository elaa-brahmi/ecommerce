<?php
include "../connection.php";
try{
    $pdo->beginTransaction();
$name = $_POST["name"];
$lname = $_POST["lastName"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$adress = $_POST["adress"];
$pass = $_POST["password"];
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
$sql = "insert into client (name, lastName, email, phone, adress, password) values (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $lname);
$stmt->bindParam(3, $email);
$stmt->bindParam(4, $phone);
$stmt->bindParam(5, $adress);
$stmt->bindParam(6, $hashedPassword);
$stmt->execute();
$idClient = $pdo->lastInsertId();
$reqUser = "INSERT INTO user (login, password, id, role) VALUES (?, ?, ?, 'client')";
    $stmtUser = $pdo->prepare($reqUser);
    $stmtUser->bindParam(1, $name);
    $stmtUser->bindParam(2, $hashedPassword);
    $stmtUser->bindParam(3, $idClient);
    $stmtUser->execute();

    // Commit the transaction
    $pdo->commit();
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
$stmt=null;

?>
