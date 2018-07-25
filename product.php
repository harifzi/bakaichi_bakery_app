<?php
if(isset($_GET['kue']) & isset($_GET['detail']))
{
	$kue_id=$_GET['kue'];
	$nama_kue=$_GET['detail'];
}
else
{
	die('ERROR: Product not found.');
}

include_once 'config/database.php';
include_once 'objects/kue.php';

$database = new Database();
$db = $database->getConnection();

$kue = new Kue($db);

$kue->kue_id = $kue_id;
$kue->readOne();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bakaichi Bakery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="assets/images/icon.png">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!--<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>-->
        <link rel="stylesheet" href="assets/css/fonticons.css">
        <link rel="stylesheet" href="assets/fonts/stylesheet.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->

        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        
        <?php include('layouts/header.php'); ?>
        <!--End of Header -->

        <section class="product">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft jump" data-wow-duration="2s">
                        <div class="head_title text-center">
                            <img src="<?php echo htmlspecialchars($kue->gambar_kue, ENT_QUOTES); ?>" style="max-width:400px;max-height:400px;"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" style="margin-top: -50px;" data-wow-duration="2s">
                        <div class="head_title_rigth">
                            <h2><?php echo htmlspecialchars($kue->nama_kue, ENT_QUOTES); ?>&nbsp;<h4>Rp. <?php echo htmlspecialchars($kue->harga_kue, ENT_QUOTES); ?> &nbsp; <p><?php echo htmlspecialchars($kue->jenis_kue, ENT_QUOTES); ?></p></h4></h2>
                            <p><?php echo htmlspecialchars($kue->deskripsi_kue, ENT_QUOTES); ?></p>
                            <div class="form-group">
                        		<label name="quantity">Quantity</label><br/>
	                            <input type="number" name="quantity" min="1" class="quantity" value="1"/><br/>
	                        </div>
	                        <button type="button" class="btn btn-large btn-default" id="add_to_cart">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Features Section -->


        <?php include ('layouts/footer.php'); ?>
        <!-- End of Footer -->

        <!-- STRAT SCROLL TO TOP -->
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/vendor/isotope.min.js"></script>

        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/jquery.mixitup.min.js"></script>
        
            
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/signout-post.js"></script>

        <script type="text/javascript">
        $('#add_to_cart').click(function(){
            $nama='+<?php echo htmlspecialchars($kue->nama_kue, ENT_QUOTES); ?>+';
            $id=<?php echo htmlspecialchars($kue->kue_id, ENT_QUOTES); ?>;
        	var formData = {action: 'add',quantity: $('input[name="quantity"]').val(), kue_id: <?php echo htmlspecialchars($kue->kue_id, ENT_QUOTES); ?>};
        	$.ajax({
        		type: 'POST', 
			    url: 'cart-post.php', 
			    data: formData, 
			    dataType: 'text',
			    success: function(data){ 
			    	console.log(data);
                    window.location = 'shop.php';
			    },
			    error: function(exception){
			    	console.log(exception);
			    }
			});
        });
        </script>
        
    </body>
</html>