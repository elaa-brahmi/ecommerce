<?php
include "connection.php";

$req="select * from client";
try{
$rows=$pdo->query($req);
$results = $rows->fetchAll(PDO::FETCH_ASSOC);
// Close the database connection
$pdo = null;
// Output the JSON data
header('Content-Type: application/json');
echo json_encode(['data' => $results]); // Wrapping the results in a 'data' object
}
catch(PDOException $e){
    $msg=$e->getMessage();
    die($msg);
}










?>