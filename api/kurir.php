<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/kurir.php';
 
$database = new Database();
$db = $database->getConnection();
 
$kurir = new Kurir($db);
 
$stmt = $kurir->read();
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
            $data .= '"id":"'  . $kurir_id . '",';
            $data .= '"kurir":"'   . $kurir . '",';
            $data .= '"biaya":"' . $biaya_kurir . '"';
            $data .= '}';
     
            $data .= $x<$record_num ? ',' : '';
     
            $x++;
        }
}

echo '{"record_of_kurir":[' . $data . ']}';
?>