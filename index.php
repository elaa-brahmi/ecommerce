<!doctype html>
<?php
session_start();
?>
<html>
<head>
    <style>
        .product-image-wrapper {
            position: relative;
            width: 180px;
            height: 160px;
            overflow: hidden;
        }
        .product-image {
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body style="background-color: #eeebe8;">
<nav style="border-radius:20px; width:700px; margin:auto; margin-top:25px; background-color: #D8C3A5;">
    <div class="nav-wrapper" style="font-weight:bold; font-size:35px; color:black;">
        <a href="#" class="brand-logo"><img src="img/logo.png" style="width:85px; margin-top:-10px;"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") { ?>
                <li><a href="clients.php">See Clients</a></li>
            <?php } ?>
            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "client") { ?>
                <li><a href="profile.php">Profile</a></li>
            <?php } ?>
            <li><a href="panier.php">Cart</a></li>
            <?php if (isset($_SESSION["role"])) { ?>
                <li><a href="logOut.php">Log Out</a></li>
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
                <th>Quantity</th>
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
                        <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "client") { ?>
                            if (data == "add to bag") {
                                return "<button class='add-to-bag'>Add to Bag</button>";
                            } else {
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
            var idProduct = $(this).closest('tr').find('td:first').text();
            var name = $(this).closest('tr').find('td:eq(1)').text();
            var quantity = $(this).closest('tr').find('td:eq(2)').text();
            var price = $(this).closest('tr').find('td:eq(4)').text();
            $.ajax({
                url: "./php/commandeModule/addtopanier.php",
                type: "POST",
                data: {
                    name: name,
                    idProduct: idProduct,
                    price: price,
                    quantity: quantity
                },
                success: function(response) {
                    console.log(response);
                    alert("Added to cart successfully");
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error: ' + error);
                }
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
    });
</script>
</body>
</html>
