<?php
include "../connection.php";
$sql="select 
    client.name, 
    client.lastName,
    client.email, 
    client.adress, 
   GROUP_CONCAT(DISTINCT commande.dateCommande SEPARATOR ' , ') as orderDates,
    ROUND(SUM(ligne_commande.price), 2) as totalPrice, 

    GROUP_CONCAT(products.name SEPARATOR ' , ' ) as productsOrdered
from 
    client
join 
    commande ON client.idClient = commande.idClient
join 
    ligne_commande ON commande.idCommande = ligne_commande.idCommande
join 
    products ON ligne_commande.idProduct = products.idProduct
group by
   client.idClient

";
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