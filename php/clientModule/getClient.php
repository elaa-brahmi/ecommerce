<?php
include "../connection.php";
$sql="select * from client";
try{
    $res=$pdo->query($sql);
    $tab=$res->fetchAll();
    if(!$tab){
        echo 'no clients are registered';
    }
    else{
        echo json_encode(['data'=>$tab]);

    }
}
catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
 }
?>