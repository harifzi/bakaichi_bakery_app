<?php
if(isset($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
}

include_once '../config/database.php';
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->user_id = $user_id;
$user->readOne();

$user_arr[] = array(
    "id" =>  $user->user_id,
    "nama_depan" => $user->nama_depan,
    "nama_belakang" => $user->nama_belakang,
    "email" => $user->email,
    "telepon" => $user->telepon,
    "alamat" => $user->alamat,
    "kodepos" => $user->kode_pos
);

print_r('{"record_of_user":'.json_encode($user_arr).'}');
?>