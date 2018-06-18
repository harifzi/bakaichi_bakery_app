<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);
 
$product->id=$_POST['id'];
$product->delete();
?>