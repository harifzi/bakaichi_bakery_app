<?php
include_once 'config/database.php';
include_once 'objects/kue.php';

$database = new Database();
$db = $database->getConnection();

$kue = new Kue($db);

$kue->kue_id = $_POST["kue_id"];
$kue->readOne();

session_start();
if($_POST["action"] == 'add')
{
	$product_arr = array(
	    "id" =>  $kue->kue_id,
	    "nama" => $kue->nama_kue,
	    "jenis_kue" => $kue->jenis_kue,
	    "harga" => $kue->harga_kue,
	    "gambar" => $kue->gambar_kue,
	    "quantity" => $_POST["quantity"],
	);

	if(!empty($_SESSION["bakaichi_cart_item"]))
	{
		$cart_no_exist_count = 0;
		$cart_item = 0;
		foreach ($_SESSION["bakaichi_cart_item"] as $key) {
			if($product_arr["id"] == $key)
			{
				$_SESSION["bakaichi_cart_item"][$key] = $product_arr;
			}
			else
			{
				$cart_no_exist_count++;
			}
			$cart_item++;
		}
		if($cart_no_exist_count == $cart_item)
		{
			$_SESSION["bakaichi_cart_item"][$cart_item] = $product_arr;
		}
	}
	else
	{
		$_SESSION["bakaichi_cart_item"][0] = $product_arr;
	}

	// if(!empty($_SESSION["bakaichi_cart_item"]))
	// {
	// 	if(in_array($kue->kue_id,array_keys($_SESSION["bakaichi_cart_item"])))
	// 	{
	// 		foreach($_SESSION["bakaichi_cart_item"] as $key)
	// 		{
	// 			if($product_arr["id"] == $key)
	// 			{
	// 				if(empty($_SESSION["bakaichi_cart_item"][$key]["quantity"]))
	// 				{
	// 					$_SESSION["bakaichi_cart_item"][$key]["quantity"] = 0;
	// 				}
	// 				$_SESSION["bakaichi_cart_item"][$key]["quantity"] += $_POST["quantity"];
	// 			}
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$_SESSION["bakaichi_cart_item"] = array_merge($_SESSION["bakaichi_cart_item"],$product_arr);
	// 	}
	// }
	// else
	// {
	// 	$_SESSION["bakaichi_cart_item"] = $product_arr;
	// }
}
else if($_POST["action"] == 'remove')
{
	$remove_id=$_POST["kue_id"];
	unset($_SESSION["bakaichi_cart_item"][$remove_id]);
	// $i=0;
	// foreach ($_SESSION["bakaichi_cart_item"] as $key)
	// {
	// 	if($_POST["kue_id"] == $key["id"])
	// 	{
	// 		unset($_SESSION["bakaichi_cart_item"][$i]);
	// 	}
	// 	$i++;
	// }
}
?>