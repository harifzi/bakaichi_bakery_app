<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);
 
// set values
$product->name=$_POST['name'];
$product->description=$_POST['description'];
$product->price=$_POST['price'];
$product->id=$_POST['id'];
     
// update 
$product->update();
?>