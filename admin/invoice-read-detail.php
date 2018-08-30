<?php
if(isset($_GET['invoice_id']))
{
    $invoice_id = $_GET['invoice_id'];
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

$invoice->invoice_id = $invoice_id;
$invoice->readOneDetail();
$order_item->order_id = $invoice->order_id;
$stmt = $order_item->readByOrder();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	extract($row);
	$orderitem[] = array(
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
        <div class="col-md-12">
        	<div class="col-md-6">
            	<h4>KODE INVOICE:<br/><p class="category"><?php echo htmlspecialchars($invoice->invoice_id, ENT_QUOTES);?></p></h4><br/>
            </div>
            <div class="col-md-6">
            	<h4 class="pull-right"><?php echo date("d/m/Y",strtotime($invoice->invoice_created_at));?></h4>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-4">
                <p>Nama :</p>
                <p>Alamat :</p>
                <p><br/>Email :</p>
                <p>Telepon :</p>
                <p>Kurir :</p>
            </div>
            <div class="col-md-8">
                <p>
                	<?php
                	echo htmlspecialchars($invoice->nama_depan, ENT_QUOTES);
                	echo ' ';
                	echo htmlspecialchars($invoice->nama_belakang, ENT_QUOTES);
                	?>
            	</p>
                <p>
                	<?php
                	echo htmlspecialchars($invoice->alamat_val, ENT_QUOTES);
                	echo '<br/>';
                	echo htmlspecialchars($invoice->kodepos, ENT_QUOTES);
                	?>
                </p>
                <p><?php echo htmlspecialchars($invoice->email, ENT_QUOTES);?></p>
                <p><?php echo htmlspecialchars($invoice->telepon, ENT_QUOTES);?></p>
            	<p><?php echo htmlspecialchars($invoice->kurir, ENT_QUOTES);?></p>
            </div>
            
        </div>
        <div class="col-md-6" style="padding-top: 20px;">
            <div class="col-md-12">
                <p>Order List :</p>
            </div>
            <div class="col-md-6">
            	<?php
            	foreach ($orderitem as $key) {
                	echo '<p>'.$key["nama_kue"].' &nbsp;x&nbsp; '.$key["total_order"].'</p>';
            	}
            	?>
            </div>
            <div class="col-md-6">
                <?php
            	foreach ($orderitem as $key) {
                	echo '<p>Rp. '.$key["harga_kue"].'</p>';
            	}
            	?>
            	<br/>
            </div>

            <div class="col-md-6">
                <p>Total Biaya Transaksi</p>
            </div>
            <div class="col-md-6">
                <p>Rp. <?php echo htmlspecialchars($invoice->total_payment, ENT_QUOTES);?></p>
            </div>
        </div>
        <div class="col-md-6" style="padding-top: 50px;">
        	<div class="col-md-4">
                <p>Status :</p>
            </div>
            <div class="col-md-8">
                <?php
            	if($invoice->status_payment == 0 && strtotime(date('Y-m-d G:i:s')) >= strtotime("$invoice->payment_expired_at"))
            	{
            		echo '<p class="text-danger">Dibatalkan</p>';
            	}
            	else
            	{
            		if($invoice->status_payment == 0 && $invoice->gambar_payment_confirmation != "")
                	{
                		echo '<p class="text-danger">Awaiting Payment <br/>(Menunggu Verifikasi)</p>';
                	}
                    else if($invoice->status_payment == 0 && $invoice->gambar_payment_confirmation == "")
                    {
                        echo '<p>Awaiting Payment</p>';
                    }
                	else if($invoice->status_payment == 1 && $invoice->status_shipping == 0)
                	{
                		echo '<p class="text-info">Payment Sudah Dilakukan</p>';
                        echo '<p class="text-danger">Pengiriman Belum Dilakukan</p>';
                	}
                    else if($invoice->status_payment == 1 && $invoice->status_shipping == 1)
                    {
                        echo '<p class="text-info">Sukses<br/>Pengiriman Sudah Dilakukan</p>';
                    }
            	}
            	?>
        	</div>
        </div>
        <?php
        if($invoice->gambar_payment_confirmation!="" || $invoice->gambar_payment_confirmation!=NULL)
        {
            echo '<div class="col-md-12" style="padding-top: 50px;">';
            echo '<div class="col-md-4">';
            echo '<p>Bukti Pembayaran</p>';
            echo '<p>Atas Nama :</p>';
            echo '<p>Tanggal Transaksi :</p>';
            echo '<p>Nomor Rekening :</p>';
            echo '<p>Jumlah :</p>';
            echo '</div>';
            echo '<div class="col-md-8">';
            echo '<br/><p>'.htmlspecialchars($invoice->atas_nama, ENT_QUOTES).'</p>';
            echo '<p>'.htmlspecialchars($invoice->tanggal_transaksi, ENT_QUOTES).'</p>';
            echo '<?php echo htmlspecialchars($invoice->nomor_bank, ENT_QUOTES)'.'</p>';
            echo '<p><?php echo htmlspecialchars($invoice->jumlah, ENT_QUOTES)'.'</p>';
            echo '</div>';
            echo '<div class="col-md-12">';
            echo '<br/><center><img src="../'.htmlspecialchars($invoice->gambar_payment_confirmation, ENT_QUOTES).'" width="400px;"/></center>';
            echo '</div>';
            echo '</div>';
        }
        ?>     
    </div>
</div>