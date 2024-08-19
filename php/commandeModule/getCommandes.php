<?php
include "../connection.php";
$sql="select client.name, client.lastName, client.email, client.adress,commande.dateCommande, ligne_commande.idProduct, ligne_commande.quantity, ligne_commande.price from client,commande,ligne_commande where client.idClient=commande.idClient and commande.idCommande=ligne_commande.idCommande";
try{
    $stmt=$pdo->query($sql);
    $tab=$stmt->fetchAll();
    if(!$tab){
        echo 'no commandes yet';
    }
    else{
        echo json_encode(['data'=>$tab]);
    }
}
catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
 }
?>