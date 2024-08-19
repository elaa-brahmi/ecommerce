<!doctype html>
<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css?<? time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body style="background-color: #eeebe8;">
<nav style="border-radius:20px; width:700px; margin:auto; color:black; margin-top:25px; background-color: #D8C3A5;">
    <div class="nav-wrapper" style="font-weight:bold; font-size:35px; color:black;">
        <a href="#" class="brand-logo"><img src="img/logo.png" style="width:85px; margin-top:-10px;"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="index.php" style="color:black !important;">Home</a></li>
            <li><a href="about.php" style="color:black !important;">About</a></li>
            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") { ?>
                <li><a href="clients.php" style="color:black !important;">See Clients</a></li>
                <li><a href="seeCommands.php" style="color:black !important;">See list of commands </a></li>
            <?php } ?>
            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "client") { ?>
                <li><a href="profile.php" style="color:black !important;">Profile</a></li>
               
            <?php } ?>
            <?php if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") { ?>
                <li><a href="panier.php" style="color:black !important;">Cart</a></li>
            <?php } ?>

            <?php if (isset($_SESSION["role"])) { ?>
                <li><a href="logOut.php" style="color:black !important;">Log Out</a></li>
            <?php } ?>
        </ul>    
    </div>
    <?php if (!isset($_SESSION["role"])) { ?>
        <a href="login.php"><img src="img/login-avatar.png" style="width:30px; height:30px; position:absolute; top:40px; right:30px;"></a>
    <?php } ?>
</nav>
<?php

if(!isset($_SESSION["role"])){
    header("location:login.php");
    exit();
}
?>
<br><br>
<div class="container" style="margin:auto; text-align:center;">
    <h3>Your Cart</h3>
    <div id="cartItems"></div>
    <button id="confirmOrder" class="btn">Confirm Order</button>
    <button id="clearCart" class="btn red">Clear Cart</button>
</div>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        function displayCartItems() {
            var cart = JSON.parse(localStorage.getItem("cart")) || {};
            console.log(cart);
            var displayCart = $("#cartItems");
            displayCart.html('');

            if (Object.keys(cart).length == 0) {
                displayCart.html('<p>Your cart is empty</p>');
                return;
            } else {
                var dataToDisplay = "";
                for (var idProduct in cart) {
                    var product = cart[idProduct];
                    dataToDisplay += '<p>' + product.name + ' - Quantity: ' + product.quantity + ' - Total Price: $' + product.price + '</p>';
                }
                displayCart.html(dataToDisplay);
            }
        }

        $("#clearCart").on("click", function(){
            localStorage.removeItem("cart");
            console.log('Cart is cleared');
            displayCartItems();
            alert("Cart is now empty");
        });

        $("#confirmOrder").on("click", function(){
            var cart = JSON.parse(localStorage.getItem('cart')) || {};

            if (Object.keys(cart).length === 0) {
                alert("Your cart is empty!");
                return;
            }
            $.ajax({
                url: "./php/commandeModule/addcommand.php",
                type: "POST",
                data: { cart: cart },
                success: function(response) {
                    console.log(response);
                    if(response === 'success') {
                        alert("Order confirmed successfully");
                        localStorage.removeItem('cart');
                        displayCartItems();
                    } else {
                        alert("There was an error confirming your order.");
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error: ' + error);
                }
            });
        });

        displayCartItems();
    });
</script>
