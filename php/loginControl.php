<?php
session_start();
include "connection.php";

$login = $_POST["login"];
$pass = $_POST["password"];
$req = "SELECT * FROM user WHERE login = ?";

try {
    $stmt = $pdo->prepare($req);
    $stmt->bindParam(1, $login);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row || !password_verify($pass, $row['password'])) {
        echo 'error';
    } else {
        if ($row["role"] == "admin") {
            $_SESSION["login"] = $row["login"];
            $_SESSION["id"] = $row["idUser"];
            $_SESSION["role"] = "admin";
            echo 'success_admin';
        } else {
            $req1 = "select c.idClient 
                     from client c 
                     join user u on c.idClient = u.id
                     where u.idUser = ?";
            $stmt1 = $pdo->prepare($req1);
            $stmt1->bindParam(1, $row["idUser"]);
            $stmt1->execute();
            $res = $stmt1->fetch(PDO::FETCH_ASSOC);

            if ($res) {
                $_SESSION["id"] = $res["idClient"];
                $_SESSION["role"] = "client";
                echo 'success_client';
            } else {
                echo 'error';
            }
        }
    }
} catch (PDOException $e) {
    echo 'error: ' . $e->getMessage(); 
}
?>
