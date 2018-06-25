<?php
// include_once '../config/database.php';
// include_once '../objects/product.php';
 
// $database = new Database();
// $db = $database->getConnection();
 
// $product = new Product($db);
 
// $product->name=$_POST['name'];
// $product->description=$_POST['description'];
// $product->price=$_POST['price'];
// $product->id=$_POST['id'];
     
// $product->update();

if($_FILES['image']['name'])
{
	if(!$_FILES['image']['error'])
	{
		$new_file_name = strtolower($_FILES['image']['tmp_name']);
	
		if($_FILES['image']['size'] > (1024000))
		{
			$valid_file = false;
			$message = 'Oops! Your file\'s size is to large.';
		}

		if($valid_file)
		{
			move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$new_file_name);
			$message = 'Congratulations! Your file was accepted.';
		}
	}

	else
	{
		$message = 'Ooops! Your upload triggered the following error: '.$_FILES['image']['error'];
	}
}

$_FILES['field_name']['name']
$_FILES['field_name']['size']
$_FILES['field_name']['type']
$_FILES['field_name']['tmp_name']
?>