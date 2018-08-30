<?php
include_once 'config/database.php';
include_once 'objects/invoice.php';
include_once 'objects/payment.php';
include_once 'objects/payment_confirmation.php';
include_once 'objects/order.php';
include_once 'objects/order_item.php';
include_once 'objects/shipping.php';

$database = new Database();
$database->getTimestamp();
$db = $database->getConnection();

$invoice = new Invoice($db);
$payment = new Payment($db);
$paymentconfirm = new PaymentConfirmation($db);
$order = new Order($db);
$shipping = new Shipping($db);
$order_item = new OrderItem($db);

$invoice_id=$_POST["invoice_id"];
$alamat_id=$_POST["alamat_id"];
$user_id=$_POST["user_id"];
$catatan=$_POST["catatan"];
$kurir_id=intval($_POST["kurir_id"]);
$total_payment=intval($_POST["grand_total"]);
$cart_item=$_POST["session_item"]["record_of_session"];

$payment_id="pay".md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
$expiry=strtotime("+2 Weeks");
$order_id="odr".md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
$shipping_id="shp".md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
$payment_confirmation_id="paycrm".md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
$now=date("Y-m-d h:i:s");

// Invoice
$invoice->invoice_id=$invoice_id;
$invoice->user_id=$user_id;
$invoice->Create();

// Payment
$payment->payment_id=$payment_id;
$payment->user_id=$user_id;
$payment->total_payment=$total_payment;
$payment->status_payment=0;
$payment->payment_expired_at=date("Y-m-d h:i:s",$expiry);
$payment->Create();

// Payment Confirmation
$paymentconfirm->payment_confirmation_id=$payment_confirmation_id;
$paymentconfirm->user_id=$user_id;
$paymentconfirm->tanggal_transaksi="";
$paymentconfirm->nomor_bank="";
$paymentconfirm->atas_nama="";
$paymentconfirm->jumlah="";
$paymentconfirm->gambar_payment_confirmation="";
$paymentconfirm->payment_confirmation_created_at=$now;
$paymentconfirm->payment_confirmation_updated_at=$now;
$paymentconfirm->Create();        

// Order
$order->order_id=$order_id;
$order->payment_id=$payment_id;
$order->alamat_id=$alamat_id;
$order->user_id=$user_id;
$order->invoice_id=$invoice_id;
$order->payment_confirmation_id=$payment_confirmation_id;
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