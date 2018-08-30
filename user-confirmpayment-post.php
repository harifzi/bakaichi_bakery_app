<?php
include_once 'config/database.php';
include_once 'objects/payment_confirmation.php';

$database = new Database();
$database->getTimestamp();
$db = $database->getConnection();
$now=date("Y-m-d h:i:s");

$payment_confirmation = new PaymentConfirmation($db);

$pic = $_FILES['bukti_transfer'];
$pic_name  = $pic['name'];
$pic_tmp   = $pic['tmp_name'];
$pic_size  = $pic['size'];
$pic_error = $pic['error'];

$pic_ext   = explode('.', $pic_name);
$pic_fname = explode('.', $pic_name);

$pic_fname = strtolower(current($pic_fname));
$pic_ext   = strtolower(end($pic_ext));
$allowed    = array('png','jpg','jpeg');

print_r($_POST);

if (in_array($pic_ext,$allowed)) {

    if ($pic_error === 0) {
        if ($pic_size <= 5000000) {
            $pic_name_new     =  $pic_fname . uniqid('',true) . '.' . $pic_ext;
            $pic_name_new    =  uniqid('',true) . '.' . $pic_ext;
            $pic_destination =  'assets/receipt_transactions/' . $pic_name_new;
            $pic_name_destination = 'assets/receipt_transactions/' . $pic_name_new;
            
            if (move_uploaded_file($pic_tmp, $pic_destination)) {
                $payment_confirmation->payment_confirmation_id=$_POST["payment_confirmation_id"];
				$payment_confirmation->tanggal_transaksi=$_POST["tanggal_transfer"];
				$payment_confirmation->nomor_bank=$_POST["req_akun"];
				$payment_confirmation->atas_nama=$_POST["atas_nama"];
				$payment_confirmation->jumlah=$_POST["amount"];
				$payment_confirmation->gambar_payment_confirmation=$pic_name_destination;
				$payment_confirmation->payment_confirmation_created_at=$_POST["past"];
				$payment_confirmation->payment_confirmation_updated_at=$now;
                $payment_confirmation->Update();
            }
            else
            {
                echo "Error: ".mysql_error();
            }

        }
        
        else
        {
            // file < 5MB
        }
    }

}

else
{
    // file rejected
}
?>