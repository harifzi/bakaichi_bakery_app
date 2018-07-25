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
 
if($record_num > 0)
{
    // Read Invoice
    echo '<div class="content table-responsive table-full-width">';
    echo '<table class="table table-hover table-striped">';
    echo '<thead><th>#</th><th>Tanggal Transaksi</th><th>Kue</th><th>Jenis</th><th>Jumlah</th><th>Pembeli</th></thead>';
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