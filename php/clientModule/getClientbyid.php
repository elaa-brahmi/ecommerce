<?php
include "../connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

$sql="select * from client where idClient=?";
$stmt=$pdo->prepare($sql);
$stmt->bindparam(1,$id);
$stmt->execute();
$client=$stmt->fetch();
if($client){
    echo json_encode($client);
}
else {
    echo json_encode(["error" => "Client not found"]);
}


}
?>