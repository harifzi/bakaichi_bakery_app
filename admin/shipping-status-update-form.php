<?php
if(isset($_GET['shipping']))
{
    $id = $_GET['shipping'];
}

include_once '../config/database.php';
include_once '../objects/shipping.php';

$database = new Database();
$db = $database->getConnection();

$shipping = new Shipping($db);

$shipping->shipping_id = $id;
$shipping->readOne();
?>

<p><?php echo htmlspecialchars($shipping->invoice_id, ENT_QUOTES);?></p>