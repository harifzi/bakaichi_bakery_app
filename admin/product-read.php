<?php
include_once '../config/core.php';

// include database and object files
include_once '../config/database.php';
include_once '../objects/kue.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$kue = new Kue($db);
 
// count total rows
$total_rows=$kue->countAll(); 
 
// query products
$stmt = $kue->readAll($from_record_num, $records_per_page);
$record_num = $stmt->rowCount();

$page_url = "product-read.php?";
if($record_num > 0)
{
    // Read Product

        echo '<div class="row">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
            extract($row);
            echo '<div class="col-md-4 product" product='."{$kue_id}".'><div class="card">';
            echo '<div class="image"><img src="../'."{$gambar_kue}".'" alt=""/></div>';
            echo '<div class="content">';
            echo '<h4 class="title"><small> '."{$jenis_kue}".' </small><br/>'."{$nama_kue}".'<br/> '."{$harga_kue}".' IDR </h4><br/>';
            if ($deskripsi_kue == NULL)
            {
                echo '<p class="description"> Tidak ada deskripsi </p><br/>';
            }
            else
            {
                echo '<p class="description">';
                if (strlen($deskripsi_kue) > 20)
                {
                    $shorting = substr($deskripsi_kue, 0, 80);
                    $shorting = trim($shorting);
                    echo $shorting." ...";
                }
                else
                {
                    echo $deskripsi_kue;
                }
                echo '</p>';
            }
            echo '</div>';
            echo '<hr/>';
            echo '<div class="text-center"><button type="button" class="btn btn-info btn-fill" id="edit-product"><i class="fa fa-edit"></i></button> &nbsp; <button type="button" class="btn btn-danger btn-fill" id="delete-product"><i class="fa fa-trash"></i></label></button></div>';
            echo '<br/></div></div>';
            
        } 
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