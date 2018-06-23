<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/kue.php';
 
// instantiate database class
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$kue = new Kue($db);
 
// set values
$kue->nama_kue=$_POST['nama_kue'];
$kue->harga_kue=$_POST['harga'];
$kue->jenis_kue_id=$_POST['jenis'];
$kue->gambar_kue='assets/images/lala.jpg';
$kue->deskripsi_kue=$_POST['deskripsi'];

$kue->create();
?>