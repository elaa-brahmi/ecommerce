<?php
session_start();
if(!isset($_SESSION["cart"])|| empty($_SESSION["cart"])){
    echo 'your cart is empty';
}
else{
    foreach($_SESSION["cart"] as $item){
        echo "Product ID: " . $item['idProduct'] . "<br>";
        echo "Product Name: " . $item['name'] . "<br>";
        echo "Price: " . $item['price'] . "<br>";
        echo "Quantity: " . $item['quantity'] . "<br><br>";
    }
    echo "<button onclick='confirmPurchase()'>Confirm Purchase</button>";
}
?>