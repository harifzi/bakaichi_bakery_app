<?php
include_once 'config/database.php';
include_once 'objects/user.php';
include_once 'objects/kurir.php';
include_once 'objects/alamat.php';

$database = new Database();
$database->getTimestamp();
$db = $database->getConnection();

$user = new User($db);
$alamat = new Alamat($db);
$kurir = new Kurir($db);

$user->user_id = $_SESSION["session_bakaichi_bakery"];
$user->readOne();

$user_arr[] = array(
    "id" =>  $user->user_id,
    "nama_depan" => $user->nama_depan,
    "nama_belakang" => $user->nama_belakang,
    "email" => $user->email,
    "telepon" => $user->telepon
);

$alamat->user_id=$_SESSION["session_bakaichi_bakery"];
$stmt = $alamat->readAll();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $result = $row;
    extract($row);

    $alamat_user_arr[] = array(
        "id" =>  $alamat_id,
        "alamat" => $alamat_val,
        "kodepos" => $kodepos
    );
}

$stmt = $kurir->readAll();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $result = $row;
    extract($row);

     $kurir_arr[] = array(
        "id" =>  $kurir_id,
        "kurir" => $kurir,
        "biaya" => $biaya_kurir
    );
}
?>