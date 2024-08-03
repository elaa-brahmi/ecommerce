<?php
define('server','localhost');
define('dbname','ecommerce');
define('login','root');
define('pass','0000');
$dns="mysql:host=".server.";dbname=".dbname;
try{
    $pdo=new PDO($dns,$login,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    $msg=$e->getMessage();
    die($msg);
}

?>