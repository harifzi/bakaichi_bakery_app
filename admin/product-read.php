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
 
// check if more than 0 record found
if($record_num > 0)
{
    // Read Product

        echo '<div class="row">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
            extract($row);
            echo '<div class="col-md-4 product" product='."{$kue_id}".'><div class="card">';
            if ($deskripsi_kue == NULL)
            {
                echo '<div class="image"><img src="../'."{$gambar_kue}".'" alt=""/></div><div class="content"><h4 class="title"><small> '."{$jenis_kue}".' </small><br/>'."{$nama_kue}".'<br/> '."{$harga_kue}".' IDR </h4><br/> <p class="description"> Tidak ada deskripsi </p></div>';
            }
            else
            {
                echo '<div class="image"><img src="../'."{$gambar_kue}".'" alt=""/></div><div class="content"><h4 class="title"><small> '."{$jenis_kue}".' </small><br/>'."{$nama_kue}".'<br/> '."{$harga_kue}".' IDR </h4><br/> <p class="description"> '."{$deskripsi_kue}".' </p></div>';
            }
            echo '<hr/>';
            echo '<div class="text-center"><button type="button" class="btn btn-info btn-fill" id="edit-product"><i class="fa fa-edit"></i></button> &nbsp; <button type="button" class="btn btn-danger btn-fill" id="delete-product"><i class="fa fa-trash"></i></label></button></div>';
            echo '<br/></div></div>';
            
        } 
        echo '</div>';

    // Pagination

        echo '<center><ul class="pagination pagination">';
       
        // previous pages
        if($page > 1)
        {
            $previous_page = $page-1;
            echo '<li><a href="javascript::void();" page-num="{$previous_page}">&lt;</li>';
        }

        // number pages
        $total_pages = ceil($total_rows/$records_per_page);
        // checking total pages
        $range = 1;
        // range of num links pages

        $initial_num = $page - $range;
        $condition_limit_num = ($page+$range)+1;
        // range of pages around current page

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

        // next pages
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