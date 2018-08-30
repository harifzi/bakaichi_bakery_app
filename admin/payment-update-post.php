<?php
include_once '../config/database.php';
include_once '../objects/payment.php';
 
$database = new Database();
$database->getTimestamp();
$db = $database->getConnection();

$payment = new Payment($db);

$payment->payment_id=$_POST["id"];
$payment->status_payment=$_POST["val"];
$payment->verifyStatus();
?>