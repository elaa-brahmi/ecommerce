<?php
session_start();
if(isset($_SESSION["id"])){
    $idClient=$_SESSION["id"];
    $idProduct=$_POST["idProduct"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $name=$_POST["name"];
    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"]=[];
    }
    $_SESSION['cart'][]=[
        'idProduct'=> $idProduct,
        'name'=>$name,
        'price'=>$price,
        'quantity'=>$quantity
    ];
    echo "product added to cart";
    print_r($_SESSION['cart']);
}
else{
    echo 'the client is not logged in';
}
?>