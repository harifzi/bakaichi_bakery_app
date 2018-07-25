<?php
include_once 'config/database.php';
include_once 'objects/invoice.php';
include_once 'objects/payment.php';
include_once 'objects/order.php';
include_once 'objects/order_item.php';
include_once 'objects/shipping.php';

$database = new Database();
$db = $database->getConnection();

$invoice = new Invoice($db);
$payment = new Payment($db);
$order = new Order($db);
$shipping = new Shipping($db);
$order_item = new OrderItem($db);

$user_id=$_POST["user_id"];
$catatan=$_POST["catatan"];
$kurir_id=intval($_POST["kurir_id"]);
$total_payment=intval($_POST["grand_total"]);
$cart_item=$_POST["session_item"]["record_of_session"];

$invoice_id="inv".md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
$payment_id="pay".md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
$expiry=strtotime("+2 Weeks");
$order_id="odr".md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
$shipping_id="shp".md5(uniqid(rand(), true)).md5(uniqid(rand(), true));

// Invoice
$invoice->invoice_id=$invoice_id;
$invoice->user_id=$user_id;
$invoice->invoice_created_at="";
$invoice->Create();

// Payment
$payment->payment_id=$payment_id;
$payment->user_id=$user_id;
$payment->total_payment=$total_payment;
$payment->status_payment=0;
$payment->payment_expired_at=date("Y-m-d h:i:s",$expiry);
$payment->Create();

// Order
$order->order_id=$order_id;
$order->payment_id=$payment_id;
$order->user_id=$user_id;
$order->invoice_id=$invoice_id;
$order->Create();

// Shipping
$shipping->shipping_id=$shipping_id;
$shipping->kurir_id=$kurir_id;
$shipping->invoice_id=$invoice_id;
$shipping->order_id=$order_id;
$shipping->status_shipping=0;
$shipping->catatan=$catatan;
$shipping->Create();

// Order Item
foreach ($cart_item as $key) {
	$order_item->order_item_id="odrit".md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
    $order_item->order_id=$order_id;
    $order_item->kue_id=$key["id"];
    $order_item->total_order=$key["quantity"];
    $order_item->Create();
}
?>