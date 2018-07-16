<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/kue.php';
 
$database = new Database();
$db = $database->getConnection();
 
$kue = new Kue($db); 
$total_rows=$kue->countAll(); 
 
$stmt = $kue->readAll($from_record_num, $records_per_page);
$record_num = $stmt->rowCount();

$result="";
$data="";
 
if($record_num > 0)
{
    	$x=1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result = $row;
        	extract($row);
 
	        $data .= '{';
            $data .= '"id":"'  . $kue_id . '",';
            $data .= '"nama":"'   . $nama_kue . '",';
            $data .= '"jenis":"'   . $jenis_kue . '",';
            $data .= '"deskripsi":"'   . html_entity_decode($deskripsi_kue) . '",';
            $data .= '"gambar":"'   . $gambar_kue . '",';
            $data .= '"harga":"' . $harga_kue . '"';
	        $data .= '}';
	 
	        $data .= $x<$record_num ? ',' : '';
	 
	        $x++;
       	}
}

echo '{"record_of_products":[' . $data . ']}';
?>