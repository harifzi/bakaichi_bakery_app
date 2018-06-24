<?php
include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 
$product->name=$_POST['name'];
$product->description=$_POST['description'];
$product->price=$_POST['price'];
$product->id=$_POST['id'];
     
$product->update();
?>