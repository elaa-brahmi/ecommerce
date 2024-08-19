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
<div class="div1">
    <h1>SHOP ALL</h1>
    <p>Clean, vegan, cruelty-free skincare</p>
</div>
<div class="div2">
    <h3 style="text-align:center;">Best Sellers</h3>
    <table id="tabproduct" style="width:1000px; margin:auto; font-size:17px;">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Available Quantity</th>
                <th>Desired Quantity</th>
                <th>Description</th>
                <th>Price</th>
                <th>Picture</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") { ?>
        <a href="addProduct.php" class="btn btn-primary">Add a Product</a>
    <?php } ?>
</div>

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#tabproduct').DataTable({
            "ajax": {
                "url": "./php/productModule/getproduct.php",
                "type": "POST",
                "dataType": "json"
            },
            "columns": [
                {"data": "idProduct"},
                {"data": "name"},
                {"data": "quantity"},
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return '<input type="number" class="desired-quantity" value="1" min="1" max="' + row.quantity + '">';
                    }},
                {"data": "description"},
                {"data": "price"},
                {
                    "data": "picture",
                    "render": function(data, type, row) {
                        return "<div class='product-image-wrapper'><img src='img/" + data + "' class='product-image'></div>";
                    }
                },
                {
                    "data": "etat",
                    "render": function(data, type, row) {
                        <?php if ( isset($_SESSION["role"]) && $_SESSION["role"] == "client" || !isset($_SESSION["role"])) { ?>
                            if (data == "add to bag") {
                                return "<button class='add-to-bag'>Add to Bag</button>";
                            }
                            else {
                                return "Coming Soon";
                            }
                        <?php } else { ?>
                            return data;
                        <?php } ?>
                    }
                }
            ]
        });
        $('#tabproduct').on('click', '.add-to-bag', function() {
        var button = $(this); 

        $.ajax({
            url: './php/clientModule/check_session.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response === "true") {
                    
                    var idProduct = button.closest('tr').find('td:first').text();
                    var name = button.closest('tr').find('td:eq(1)').text();
                    var desiredQuantity = parseInt(button.closest('tr').find('.desired-quantity').val());
                    var price = button.closest('tr').find('td:eq(5)').text().trim();
                    price = parseFloat(price.replace('$', ''));
                    
                    var cart = JSON.parse(localStorage.getItem('cart')) || {};

                    if (cart[idProduct]) {
                        cart[idProduct].quantity += desiredQuantity;
                    } else {
                        var p = price * desiredQuantity;
                        
                        cart[idProduct] = {
                            idProduct: idProduct,
                            name: name,
                            quantity: desiredQuantity,
                            price: p
                        };
                    }

                    localStorage.setItem('cart', JSON.stringify(cart));
                    alert("Added to cart successfully");
                } else {
                  
                    window.location.href = 'login.php';
                }
            },
            error: function() {
                alert('An error occurred while checking session status.');
            }
        });
    });
        });
        $('#tabproduct').on('mouseover', '.product-image', function() {
            $(this).css({
                transform: 'scale(1.4)'
            });
        });
        $('#tabproduct').on('mouseout', '.product-image', function() {
            $(this).css({
                transform: 'scale(1)'
            });
        });
    
</script>
</body>
</html>
