<?php
include_once '../config/core.php';

include_once '../config/database.php';
include_once '../objects/shipping.php';
 
$database = new Database();
$db = $database->getConnection();
 
$shipping = new Shipping($db);
 
$total_rows=$shipping->countAll(); 
 
$stmt = $shipping->readAll($from_record_num, $records_per_page);
$record_num = $stmt->rowCount();

$page_url = "shipping-read.php?";  
if($record_num > 0)
{
    echo '<br/><br/>';
    echo '<div class="content table-responsive table-full-width">';
    echo '<table class="table table-hover table-striped">';
    echo '<thead><th>#</th><th>Invoice Id</th><th>Nama</th><th>Alamat</th><th>Kontak</th><th>Tanggal</th><th>Kurir</th><th>Status</th><th></th></thead>';
    echo '<tbody>';
    
    $i=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        extract($row);

        echo '<tr id='."{$invoice_id}".'>';
        echo '<td>'."{$i}".'</td>';
        echo '<td>'.wordwrap($invoice_id,15,"<br>\n",TRUE).'</td>';
        echo '<td>'."{$nama_depan}"." "."{$nama_belakang}".'</td>';
        echo '<td>'."{$alamat_val}"." "."<br/>Kodepos: {$kodepos}".'</td>';
        echo '<td>'."Telepon: {$telepon}<br/> Email: {$email}".'</td>';
        echo '<td>'.date("d/m/Y",strtotime($order_created_at)).'</td>';
        echo '<td>'."{$kurir}".'</td>';
        if($status_payment == 1 && $status_shipping == 1){
            echo '<td class="text-success">'.'Success'.'</td>';
        }
        else if($status_payment == 1 && $status_shipping == 0) {
            echo '<td class="text-success">'.'Ready'.'</td>';
        }
        else if($status_payment == 0 && strtotime(date('Y-m-d G:i:s')) < strtotime($payment_expired_at))
        {
            echo '<td class="text-info">'.'Awaiting Payment'.'</td>';
        }
        else if($status_payment == 0 && strtotime(date('Y-m-d G:i:s')) >= strtotime("$payment_expired_at")){
            echo '<td class="text-danger">'.'Dibatalkan'.'</td>';
        }
        echo '<td><button type="button" class="btn btn-primary" id="update-shipping"><i class="fa fa-edit"></i></button></td>';
        echo '</tr>';
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

}
 
else
{
    echo '<br/><br/>';
    echo '<div class="content">';
    echo "<div class='alert alert-danger'>No records found.</div>";
    echo '</div>';
    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
}
?>