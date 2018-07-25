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

        <section id="banner_section" class="banner">
            <div class="banner_overlay">
            <div class="container">
                <div class="row">
                    <img src="assets/images/slider.jpg" alt="Carousel Header 1">
                </div>
            </div>
            </div><br/><br/><br/><br/><br/>
        </section>
        <!-- End of Banner Section -->

        <section class="product">
            <div class="container">
                <div id="main-cart"></div>

                <?php
                // $total_belanja=0;
                // $cart_counter=0;
                // foreach ($_SESSION["bakaichi_cart_item"] as $key)
                // {
                //     echo '<div class="row" id="cart_item" product='.$cart_counter.'><div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s">';
                //     echo '<div class="col-md-3 col-sm-3 col-xs-6">';
                //     echo '<img src="'.$key["gambar"].'" style="max-width:200px;max-height:200px;"/>';   
                //     echo '</div><div class="col-md-9 col-sm-9 col-xs-6">';
                //     echo '<p><b>'.$key["nama"].'</b></p>';
                //     echo '<p>'.$key["quantity"].' x Rp. '.$key["harga"].'</p>';
                //     echo '<button type="button" class="btn btn-default btn-xs remove_button" id="remove_item"><span class="glyphicon glyphicon-remove text-danger"></span> Remove</button>';
                //     echo '</div>';
                //     echo '</div></div>';
                //     $total_belanja+=$key["harga"]*$key["quantity"];   
                //     $cart_counter+=1;                 
                // }

                // echo '<div class="row"><div class="pull-right">';
                // echo '<p><b> Total = Rp. '.$total_belanja.'</b></p>';
                // echo '<button type="button" class="pull-right btn btn-default">Checkout</button>';
                // echo '</div></div>';
                ?>   

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
        var getrecords = <?php print_r(json_encode($_SESSION['bakaichi_cart_item'])); ?>;
        
        if(getrecords[0] == null)
        {
            $('#main-cart').append('<div class="row"><div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s"><h2>Sorry, you have no product in cart</h2></div></div>');
        }
        else
        {
            $total_belanja=0;
            for($i in getrecords) {
                $('#main-cart').append('<div class="row" id="cart_item" array_of='+$i+'><div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s"><div class="col-md-3 col-sm-3 col-xs-6"><img src="'+getrecords[$i].gambar+'" style="max-width:200px;max-height:200px;"/></div><div class="col-md-9 col-sm-9 col-xs-6"><p><b>'+getrecords[$i].nama+'</b></p><p>'+getrecords[$i].quantity+' x Rp. '+getrecords[$i].harga+'</p><button type="button" class="btn btn-default btn-xs remove_button" id="remove_item"><span class="glyphicon glyphicon-remove text-danger"></span> Remove</button></div></div></div>'); 
                $total_belanja+=parseInt(getrecords[$i].harga)*parseInt(getrecords[$i].quantity);
            }
            $('#main-cart').append('<div class="row"><div class="pull-right"><p><b> Total = Rp. '+$total_belanja+'</b></p><button type="button" id="jump_button" class="pull-right btn btn-default">Checkout</button></div></div>');
        }

        $('.remove_button').on('click', function(){
            var product = $(this).parents('#cart_item');
            $product_id = product.attr('array_of');

            var formData = {action: 'remove', kue_id: $product_id};
            $.ajax({
                type: 'POST', 
                url: 'cart-post.php', 
                data: formData, 
                dataType: 'text',
                success: function(data){
                    window.location = "cart.php"; 
                    console.log(data);
                },
                error: function(exception){
                    console.log(exception);
                }
            });
        });

        $('#jump_button').click(function(){
            window.location = "checkout.php";
        });

        </script>
        
    </body>
</html>