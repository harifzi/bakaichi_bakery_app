<?php
include_once '../config/core.php';

// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);
 
// count total rows
$total_rows=$product->countAll(); 
 
// query products
$stmt = $product->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num > 0)
{
        // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
             
            echo '<div class="col-md-3 col-sm-6 col-xs-12"><div class="thumbnail"><img src="../assets/gallery/tora_tiramisu.jpg" alt="" width="100%" /><div class="caption"><p><strong>Nama: </strong>'."{$nama_kue}".'<br/><strong>Harga: </strong>'."{$harga_kue}".'</p></div></div></div>';
        }         
}
 
// tell the user if no records found
else
{
    echo "<div class='alert alert-info'>No records found.</div>";
}

include_once "product-pagination.php"; 
?>