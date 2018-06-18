<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
 
// instantiate database class
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);
 
// set values
$product->name=$_POST['name'];
$product->description=$_POST['description'];
$product->price=$_POST['price'];
 
// set your default timezone
date_default_timezone_set('Asia/Manila');
$product->created = date('Y-m-d H:i:s');
         
// create product
$product->create();
?>