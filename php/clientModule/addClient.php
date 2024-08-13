<?php
include "../connection.php";
try{

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
echo 'hfhfhhh';
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
$stmt=null;

?>
