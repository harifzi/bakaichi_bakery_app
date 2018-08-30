<?php
include_once '../config/database.php';
include_once '../objects/shipping.php';
 
$database = new Database();
$database->getTimestamp();
$db = $database->getConnection();

$shipping = new Shipping($db);

$shipping->shipping_id=$_POST["id"];
$shipping->status_shipping=$_POST["val"];
$shipping->verifyStatus();
?>