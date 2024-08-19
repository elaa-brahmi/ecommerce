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
    </div></nav>
    <?php if (!isset($_SESSION["role"])) { ?>
        <a href="login.php"><img src="img/login-avatar.png" style="width:30px; height:30px; position:absolute; top:40px; right:30px;"></a>
    <?php } ?>
    
    <br><br>
<img src="img/makeup.avif">

<div class="div2">
    <strong>Is your bathroom brimming with legions of barely-used lotions</strong> and potions that neither delight nor deliver? Are<br> you bewildered by the marketing hyperbole (and unpronounceable ingredients) you come across while browsing<br> never-ending beauty aisles?
    <br><br><br>
    Cult Beauty was born when two skin care obsessives grew frustrated by the all-too-often condescending<br> messaging (and underwhelming offerings) they came across throughout the beauty industry. Having invested in<br> innumerable ineffective creams and disappointing serums, Jess and Lex both vowed to boycott bathroom<br> cabinets full of hollow promises (and wasted pounds).
</div>
















</body></html>