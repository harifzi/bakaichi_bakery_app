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
 
if($record_num > 0)
{
    // Read Invoice
    echo '<div class="content table-responsive table-full-width">';
    echo '<table class="table table-hover table-striped">';
    echo '<thead><th>#</th><th>Nama</th><th>Alamat</th><th>Kontak</th><th>Kurir</th><th>Status</th><th></th>
            </thead>';
    echo '<tbody>';
    
    $i=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        extract($row);

            echo '<tr shipping='."{$shipping_id}".'>';
            echo '<td>'."{$i}".'</td>';
            echo '<td>'."{$nama_depan}"." "."{$nama_belakang}".'</td>';
            echo '<td>'."{$alamat}"." "."<br/>Kodepos: {$kode_pos}".'</td>';
            echo '<td>'."Telepon: {$telepon}<br/> Email: {$email}".'</td>';
            echo '<td>'."{$kurir}".'</td>';
            // echo '<td>'."{$invoice_created_at}".'</td>';
            if($status_payment == 1 && $status_shipping == 1){
                echo '<td class="text-success">'.'Selesai'.'</td>';
            }
            else if($status_payment == 1 && $status_shipping == 0) {
                echo '<td class="text-danger">'.'Lakukan Pengiriman'.'</td>';
                echo '<td><button type="button" class="btn btn-primary" id="edit"><i class="fa fa-edit"></i></button></td>';
            }
            else if($status_payment == 0 && strtotime(date('Y-m-d G:i:s')) < strtotime($payment_expired_at))
            {
                echo '<td class="text-info">'.'Menunggu Pembayaran'.'</td>';
            }
            else if($status_payment == 0 && strtotime(date('Y-m-d G:i:s')) >= strtotime("$payment_expired_at")){
                echo '<td class="text-danger">'.'Order Dibatalkan'.'</td>';
            }
            echo '</tr>';
        $i++;

    } 
    
    echo '</table>';
    echo '</div><br/><br/><br/><br/><br/><br/><br/><br/>';

    // Pagination
        echo '<center><ul class="pagination pagination">';
       
        if($page > 1)
        {
            $previous_page = $page-1;
            echo '<li><a href="javascript::void();" page-num="{$previous_page}">&lt;</li>';
        }

        $total_pages = ceil($total_rows/$records_per_page);
        $range = 1;

        $initial_num = $page - $range;
        $condition_limit_num = ($page+$range)+1;

        for($x = $initial_num; $x < $condition_limit_num; $x++)
        {
            if (($x > 0) && ($x <= $total_pages))
            {
                if ($x == $page)
                {
                    echo '<li><a href="javascript::void();">'."{$x}".'</li>';
                }

                else 
                {
                    echo '<li><a href="javascript::void();" page-num='."{$x}".'>'."{$x}".'</li>';
                }
            }
        }

        if ($page < $total_pages)
        {
            $next_page = $page + 1;
            echo '<li><a href="javascript::void();" page-num='."{$next_page}".'>&gt;</li>';
        }

        echo '</center></ul>';

}
 
else
{
    echo "<div class='alert alert-danger'>No records found.</div>";
    echo '<br/><br/><br/><br/><br/><br/>';
}
?>