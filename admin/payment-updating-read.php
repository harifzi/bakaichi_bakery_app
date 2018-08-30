<?php
include_once '../config/core.php';

include_once '../config/database.php';
include_once '../objects/order.php';
 
$database = new Database();
$database->getTimestamp();
$db = $database->getConnection();
 
$order = new Order($db);
 
$total_rows=$order->countAll(); 
$now=date("Y-m-d h:i:s");
 
$stmt = $order->readAllPaymentToVerify($from_record_num, $records_per_page, $now);
$record_num = $stmt->rowCount();

$page_url = "payment-updating-read.php?";  
if($record_num > 0)
{
    echo '<br/><br/>';
    echo '<div class="content table-responsive table-full-width">';
    echo '<table class="table table-hover table-striped">';
    echo '<thead><th>#</th><th>Invoice Id</th><th>Nama</th><th>Kontak</th><th>atas nama</th><th>nomor bank</th><th>Payment</th><th>Jumlah Transfer</th><th>tanggal transfer</th><th>bukti transfer</th><th></th></thead>';
    echo '<tbody>';
    
    $i=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        extract($row);
        echo '<tr id='."{$payment_id}".'>';
        echo '<td>'."{$i}".'</td>';
        echo '<td>'.wordwrap($invoice_id,15,"<br/>",TRUE).'</td>';
        echo '<td>'."{$nama_depan}"." "."{$nama_belakang}".'</td>';
        echo '<td>'."Telepon: {$telepon}<br/> Email: {$email}".'</td>';
        echo '<td>'."{$atas_nama}".'</td>';
        echo '<td>'."{$nomor_bank}".'</td>';
        echo '<td>'."{$total_payment}".'</td>';
        echo '<td>'."{$jumlah}".'</td>';
        echo '<td>'.date("d/m/Y",strtotime($tanggal_transaksi)).'</td>';

        echo '<td><a class="test-popup-link" href="../'."{$gambar_payment_confirmation}".'"><img src="../'."{$gambar_payment_confirmation}".'" width="80px" /></a></td>';
        echo '<td><button type="button" class="btn btn-primary" id="verify"><i class="fa fa-check"></i></button></td>';
        $i++;
    }

    echo '</table>';
    echo '</div><br/><br/><br/><br/><br/><br/><br/><br/>';

    // Pagination
        echo '<center><ul class="pagination pagination" id="pagination">';
 
        if($page > 1){
            echo '<li page="1"><a> First Page </li>';
        }
         
        $total_pages = ceil($total_rows / $records_per_page);
        $range = 2;
         
        $initial_num = $page - $range;
        $condition_limit_num = ($page + $range)  + 1;
         
        for ($x=$initial_num; $x<$condition_limit_num; $x++) {
         
            if (($x > 0) && ($x <= $total_pages)) {
         
                if ($x == $page) {
                    echo '<li class="active"><a> '.$x.' <span class="sr-only">(current)</span></a></li>';
                }
                else {
                    echo '<li page="'.$x.'"><a> '.$x.' </a></li>';
                }
            }
        }
         
        if($page < $total_pages){
            echo '<li page="'.$total_pages.'"><a> Last Page </a></li>';
        }
         
        echo "</ul>";

        echo '<script>';
        echo '$(".test-popup-link").magnificPopup({ type: "image" });';
        echo '</script>';

}
 
else
{
    echo '<br/><br/>';
    echo '<div class="content">';
    echo "<div class='alert alert-warning'>No records found.</div>";
    echo '</div>';
    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
}
?>