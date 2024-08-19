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
            <li><a href="index.php" style="color:black !important; text-decoration:none;">Home</a></li>
            <li><a href="about.php" style="color:black !important; text-decoration:none;">About</a></li>
            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") { ?>
                <li><a href="clients.php" style="color:black !important; text-decoration:none;">See Clients</a></li>
                <li><a href="seeCommands.php" style="color:black !important; text-decoration:none;">See list of commands </a></li>
            <?php } ?>
            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "client") { ?>
                <li><a href="profile.php" style="color:black !important; text-decoration:none;">Profile</a></li>
               
            <?php } ?>
            <?php if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") { ?>
                <li><a href="panier.php" style="color:black !important; text-decoration:none;">Cart</a></li>
            <?php } ?>

            <?php if (isset($_SESSION["role"])) { ?>
                <li><a href="logOut.php" style="color:black !important; text-decoration:none;">Log Out</a></li>
            <?php } ?>
        </ul>    
    </div>
    <?php if (!isset($_SESSION["role"])) { ?>
        <a href="login.php"><img src="img/login-avatar.png" style="width:30px; height:30px; position:absolute; top:40px; right:30px;"></a>
    <?php } ?>
</nav> 
 <?php

if(isset($_SESSION["role"])){
    $idClient=$_SESSION["id"];
}
?>
<!doctype html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
        <body>
            <form method="POST" id="clientform" class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-6">
            <input type="hidden" class="form-control" id="idClient" value="<?php echo $idClient; ?>">
            </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" >
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="adress" >
                </div>
                
            </div>
        </div>
    </form>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            var idClient=document.getElementById("idClient").value;
            console.log(idClient);
            $.ajax({
                url:"./php/clientModule/getClientbyid.php?id="+idClient,
                type:"GET",
                
                success: function(data){
                        var client=JSON.parse(data);
                        if (client) {
                            $('#name').val(client.name);
                            $('#lname').val(client.lastName);
                            $('#email').val(client.email);
                            $('#phone').val(client.phone);
                            $('#adress').val(client.adress);
                        } else {
                            alert('Client not found');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }

            });

        });





    </script>