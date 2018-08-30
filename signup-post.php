<?php
include_once 'config/database.php';
include_once 'objects/user.php';
include_once 'objects/alamat.php';
 
$database = new Database();
$database->getTimestamp();
$db = $database->getConnection();

$user = new User($db);
$alamat = new Alamat($db);

$user_id=md5(uniqid(rand(), true));

$user->user_id=$user_id;
$user->username=$_POST['username'];
$user->email=$_POST['email'];
$user->password=$_POST['password'];
$user->nama_depan=$_POST['nama_depan'];
$user->nama_belakang=$_POST['nama_belakang'];
$user->telepon=$_POST['telepon'];
$user->role=0;
$user->user_updated_at=date('Y-m-d h:i:s');
$user->SignUp();

$alamat->alamat_id=md5(uniqid(rand(), true));
$alamat->user_id=$user_id;
$alamat->alamat=$_POST['alamat'];
$alamat->kode_pos=$_POST['kode_pos'];
$alamat->userSignUp();
?>