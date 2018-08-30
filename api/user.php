<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
$stmt = $user->readAll();
$record_num = $stmt->rowCount();

$data="";
 
if($record_num > 0)
{
    	$x=1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
 
	        $data .= '{';
            $data .= '"id":"'  . $user_id . '",';
            $data .= '"nama_depan":"'   . $nama_depan . '",';
            $data .= '"nama_belakang":"'   . $nama_belakang . '",';
            $data .= '"telepon":"'   . $telepon . '",';
            $data .= '"alamat":"'   . $alamat_val . '",';
            $data .= '"kodepos":"' . $kodepos . '"';
	        $data .= '}';
	 
	        $data .= $x<$record_num ? ',' : '';
	 
	        $x++;
       	}
}

echo '{"record_of_user":[' . $data . ']}';
?>