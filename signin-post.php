<?php
include_once 'config/database.php';
include_once 'objects/user.php';
 
$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->username_or_email=$_POST['username_or_email'];
$user->password=$_POST['password'];
$user->Signin();
?>