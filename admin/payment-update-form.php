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
    <div class="col-md-6 col-sm-6 col-xs-12">
       <div class="col-md-4">
            <p>Nama :</p>
            <p>Alamat :</p>
            <p><br/>Email :</p>
            <p>Telepon :</p>
            <p>Kurir :</p><br/>
            <p>Status :</p>
            <p>Biaya Transaksi :</p>
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
            <p><?php echo htmlspecialchars($invoice->kurir, ENT_QUOTES);?></p><br/>
            <p>Awaiting Payment</p>
            <p>Rp. <?php echo htmlspecialchars($invoice->total_payment, ENT_QUOTES);?></p>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <form id="update" method="post" border='0'>
            <input type="hidden" name="payment_id" value="<?php echo htmlspecialchars($invoice->payment_id, ENT_QUOTES);?>">
            <div class="form-group">
                <label for="status-payment">Status Payment</label>
                <select class="form-control" name="status_payment" id="status-payment">
                    <option value="0">Diskonfirmasi</option>
                    <option value="1">Konfirmasi</option>
                </select>
            </div>
        </form> 
        <div class="col-md-4">

            <?php
            if($invoice->gambar_payment_confirmation != NULL || $invoice->gambar_payment_confirmation != "")
            {
                echo '<br/><br/><p>Nomor Bank :</p>';
                echo '<p>Atas Nama :</p>';
                echo '<p>Tanggal :</p>';
                echo '<p>Jumlah :</p><br/><br/>';
            }
            ?>
            
        </div>
        <div class="col-md-8">
            <?php
            if($invoice->gambar_payment_confirmation != NULL || $invoice->gambar_payment_confirmation != "")
            {
                echo '<br/><br/><p>'.htmlspecialchars($invoice->nomor_bank, ENT_QUOTES).'</p>';
                echo '<p>'.htmlspecialchars($invoice->atas_nama, ENT_QUOTES).'</p>';
                echo '<p>'.htmlspecialchars($invoice->tanggal_transaksi, ENT_QUOTES).'</p>';
                echo '<p>'.htmlspecialchars($invoice->jumlah, ENT_QUOTES).'</p><br/><br/>';
            }
            else
            {
                echo '<br/><br/><p>Belum ada konfirmasi</p><br/><br/>';
            }
            ?>
        </div>
        <?php
        if ($invoice->gambar_payment_confirmation != NULL || $invoice->gambar_payment_confirmation != "")
        {
            echo '<a class="test-popup-link" href="../'."{$invoice->gambar_payment_confirmation}".'"><img src="../'."{$invoice->gambar_payment_confirmation}".'" width="100px" /></a>';

            echo '<script>';
            echo '$(".test-popup-link").magnificPopup({ type: "image" });';
            echo '</script>';
        }
        ?>        
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
    $value = <?php echo htmlspecialchars($invoice->status_payment, ENT_QUOTES); ?>;
    $('#status-payment').val($value);
</script>