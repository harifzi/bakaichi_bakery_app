<?php
include_once 'config/database.php';
include_once 'objects/user.php';
include_once 'objects/invoice.php';
include_once 'objects/order_item.php';

$database = new Database();
$database->getTimestamp();
$db = $database->getConnection();

$user = new User($db);
$invoice = new Invoice($db);
$order_item = new OrderItem($db);

$user->user_id=$_GET['id'];
$user->readOne();

$invoice->invoice_id=$_GET['inv'];
$invoice->readOneDetail();

$order_item->order_id=$invoice->order_id;
$stmt = $order_item->readByOrder();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $result = $row;
    extract($row);

    $item[] = array(
        "nama_kue" =>  $nama_kue,
        "harga_kue" => $harga_kue,
        "jenis_kue" => $jenis_kue,
        "total_order" => $total_order
    );
}
?>