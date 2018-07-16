<?php
include_once 'config/database.php';
include_once 'objects/user.php';
 
$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->username=$_POST['username'];
$user->email=$_POST['email'];
$user->password=$_POST['password'];
$user->nama_depan=$_POST['nama_depan'];
$user->nama_belakang=$_POST['nama_belakang'];
$user->telepon=$_POST['telepon'];
$user->alamat=$_POST['alamat'];
$user->role=0;
$user->kode_pos=$_POST['kode_pos'];
$user->SignUp();
?>