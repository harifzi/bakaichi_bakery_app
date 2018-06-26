<?php
include_once '../config/database.php';
include_once '../objects/kue.php';
 
$database = new Database();
$db = $database->getConnection();

$kue = new Kue($db);
 
$kue->kue_id=$_POST['id'];
$kue->gambar=$_POST['gambar'];
$kue->delete();
?>