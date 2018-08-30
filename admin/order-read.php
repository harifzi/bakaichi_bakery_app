<?php
include_once '../config/core.php';

include_once '../config/database.php';
include_once '../objects/order_item.php';
 
$database = new Database();
$db = $database->getConnection();
 
$order = new OrderItem($db);

$total_rows=$order->countAll(); 
 
$stmt = $order->readAll($from_record_num, $records_per_page);
$record_num = $stmt->rowCount();
 
$page_url = "order-read.php?";
if($record_num > 0)
{
    // Read Invoice
    echo '<div class="content table-responsive table-full-width">';
    echo '<table class="table table-hover table-striped">';
    echo '<thead><th>#</th><th>Tanggal Transaksi</th><th>Kue</th><th>Jenis</th><th>Jumlah</th><th>Pembeli</th><th>Order ID</th></thead>';
    echo '<tbody>';
    
    $i=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
        extract($row);

            echo '<tr>';
            echo '<td>'."{$i}".'</td>';
            echo '<td>'."{$order_created_at}".'</td>';
            echo '<td>'."{$nama_kue}".'</td>';
            echo '<td>'."{$jenis_kue}".'</td>';
            echo '<td>'."{$total_order}".'</td>';
            echo '<td>'."{$nama_depan} {$nama_belakang}".'</td>';
            echo '<td>'."{$order_id}".'</td>';
            echo '</tr>';
        $i++;

        // var_dump($row);
        $catch[] = array(
            "order_item_id" => $order_item_id,
            "order_id" => $order_id,
            "nama_kue" => $nama_kue,
            "total_order" => $total_order,
            "order_created_at" =>  $order_created_at
            // "order_created_at" =>  date("M",strtotime($order_created_at))
        );

    }

    $catch = '{"record_of_order":' . json_encode($catch) . '}';
     
    echo '</table>';
    echo '</div><br/><br/><br/><br/><br/><br/><br/><br/>';

    // Pagination
        echo '<center><ul class="pagination pagination" id="pagination" style="cursor: pointer;">';
 
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

        echo '<script type="text/javascript">';
        echo 'var getrecords=';
        print_r($catch);
        echo ';';
        echo '</script>';

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