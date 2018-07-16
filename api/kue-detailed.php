<?php
if(isset($_GET['product_id']))
{
    $product_id = $_GET['product_id'];
}

else
{
    die('ERROR: Product ID not found.');
}

include_once '../config/database.php';
include_once '../objects/kue.php';

$database = new Database();
$db = $database->getConnection();

$kue = new Kue($db);

$kue->kue_id = $product_id;
$kue->readOne();

$product_arr[] = array(
    "id" =>  $kue->kue_id,
    "nama" => $kue->nama_kue,
    "gambar" => $kue->gambar_kue,
    "jenis_kue_id" => $kue->jenis_kue_id,
    "jenis_kue" => $kue->jenis_kue,
    "deskripsi" => $kue->deskripsi_kue,
    "harga" => $kue->harga_kue
);

print_r('{"record_of_product":'.json_encode($product_arr).'}');
?>