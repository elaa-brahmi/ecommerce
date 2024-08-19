<?php
session_start();
$response="true";
if(!isset($_SESSION["role"])){
    $response="false";
}
echo json_encode($response);
?>