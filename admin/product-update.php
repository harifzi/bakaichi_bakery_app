<?php
include_once '../config/database.php';
include_once '../objects/kue.php';
 
$database = new Database();
$db = $database->getConnection();
 
$kue = new Kue($db);

$pic = $_FILES['gambar'];
$pic_name  = $pic['name'];
$pic_tmp   = $pic['tmp_name'];
$pic_size  = $pic['size'];
$pic_error = $pic['error'];
$pic_name_destination = $_POST['oldpic'];

if($pic['name'] != NULL && $pic['tmp_name'] != NULL && $pic['size'] != NULL && $pic['error'] == 0){
	
	$pic_ext   = explode('.', $pic_name);
	$pic_fname = explode('.', $pic_name);

	$pic_fname = strtolower(current($pic_fname));
	$pic_ext   = strtolower(end($pic_ext));
	$allowed    = array('png','jpg','jpeg');
	
	if (in_array($pic_ext,$allowed)) {

	    if ($pic_error === 0) {
	        if ($pic_size <= 5000000) {
	            $pic_name_new     =  $pic_fname . uniqid('',true) . '.' . $pic_ext;
	            $pic_name_new    =  uniqid('',true) . '.' . $pic_ext;
	            $pic_destination =  '../assets/gallery/' . $pic_name_new;
	            $pic_name_destination = 'assets/gallery/' . $pic_name_new;

	            // $old_pic_destination = $_POST['oldpic'];
	            // unlink('../'.$old_pic_destination);

	            if (move_uploaded_file($pic_tmp, $pic_destination)) {
	                
	                $kue->gambar_kue=$pic_name_destination;
	                $kue->nama_kue=$_POST['nama_kue'];
	                $kue->harga_kue=$_POST['harga'];
	                $kue->jenis_kue_id=$_POST['jenis'];
	                $kue->deskripsi_kue=$_POST['deskripsi'];
	                $kue->kue_id=$_POST['kue_id'];
    				$kue->update();
	            }
	            else
	            {
	                echo "Error: ".mysql_error();
	            }

	        }
	        
	        else
	        {
	            // file < 5MB;
	        }
	    }

	}

	else {
		// file rejected
	}

}

else
{
	$kue->kue_id=$_POST['kue_id'];
    $kue->nama_kue=$_POST['nama_kue'];
    $kue->harga_kue=$_POST['harga'];
    $kue->jenis_kue_id=$_POST['jenis'];
    $kue->deskripsi_kue=$_POST['deskripsi'];
	$kue->gambar_kue=$pic_name_destination;
    $kue->update();
}
?>