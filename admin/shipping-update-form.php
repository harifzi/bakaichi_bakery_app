<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
else
{
    header("Location: index.php");
    die();
}

include_once '../config/database.php';
include_once '../objects/invoice.php';
include_once '../objects/order_item.php';

$database = new Database();
$db = $database->getConnection();

$invoice = new Invoice($db);
$order_item = new OrderItem($db);

$invoice->invoice_id = $id;
$invoice->readOneDetail();
$order_item->order_id = $invoice->order_id;
$stmt = $order_item->readByOrder();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $itemOrder[] = array(
        "order_item_id" =>  $order_item_id,
        "order_id" =>  $order_id,
        "invoice_id" => $invoice_id,
        "nama_kue" => $nama_kue,
        "jenis_kue" => $jenis_kue,
        "harga_kue" => $harga_kue,
        "total_order" => $total_order,
        "order_created_at" => $order_created_at
    );
}
?>

<div class="content" style="padding-top: 30px;">
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="col-md-4">
            <p>Nama :</p>
            <p>Email :</p>
            <p>Telepon :</p>
            
        </div>
        <div class="col-md-8">            
            <?php
            echo '<p>'.htmlspecialchars($invoice->nama_depan, ENT_QUOTES).' '.htmlspecialchars($invoice->nama_belakang, ENT_QUOTES);            
            echo '<p>'.htmlspecialchars($invoice->email, ENT_QUOTES).'</p>';
            echo '<p>'.htmlspecialchars($invoice->telepon, ENT_QUOTES).'</p>';
            ?>            
        </div>
        <div class="col-md-12">
            <br/><p>Order List :</p>
            <?php
            foreach ($itemOrder as $key) {
                echo '<p>'.$key["nama_kue"].' x '.$key["total_order"].'<br/>Rp. '.$key["harga_kue"].'</p>';
            }
            echo '<hr/>';
            echo '<p>Total : '.$invoice->total_payment.'</p>';
            ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <form id="update" method="post" border='0'>
            <input type="hidden" name="shipping_id" value="<?php echo htmlspecialchars($invoice->shipping_id, ENT_QUOTES);?>">
            <div class="form-group">
                <label for="status-payment">Status Shipping</label>
                <select class="form-control" name="status_shipping" id="status-shipping">
                    <option value="0">Diskonfirmasi</option>
                    <option value="1">Konfirmasi</option>
                </select>
            </div>
        </form> 
        <div class="col-md-4">
            <br/><br/><p>Status :</p>
            <p>Alamat :</p>  
            <br/><p>Kurir :</p>    
        </div>
        <div class="col-md-8">
            <br/><br/>
            <?php
            if($invoice->status_payment == 1 && $invoice->status_shipping == 1){
                echo '<p class="text-success">'.'Success'.'</p>';
            }
            else if($invoice->status_payment == 1 && $invoice->status_shipping == 0) {
                echo '<p class="text-success">'.'Ready'.'</p>';
            }
            else if($invoice->status_payment == 0 && strtotime(date('Y-m-d G:i:s')) < strtotime($invoice->payment_expired_at))
            {
                echo '<p class="text-info">'.'Awaiting Payment'.'</p>';
            }
            else if($invoice->status_payment == 0 && strtotime(date('Y-m-d G:i:s')) >= strtotime("$invoice->payment_expired_at")){
                echo '<p class="text-danger">'.'Dibatalkan'.'</p>';
            }

            echo '<p>'.htmlspecialchars($invoice->alamat_val, ENT_QUOTES).'<br/>'.htmlspecialchars($invoice->kodepos, ENT_QUOTES);
            echo '<br/><p>'.htmlspecialchars($invoice->kurir, ENT_QUOTES).'</p>';          
            ?>
        </div>  
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <button type="button" class="btn btn-danger btn-fill" id="back-button">&lt;</button>
        <button type="button" class="btn btn-warning btn-fill" id="update-button">Update</button>
    </div>
</div>
</div>

<script type="text/javascript">
    $value = <?php echo htmlspecialchars($invoice->status_shipping, ENT_QUOTES); ?>;
    $('#status-shipping').val($value);
</script>