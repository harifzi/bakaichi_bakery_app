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

        <section class="checkout_section" user="<?php print_r($_SESSION["session_bakaichi_bakery"]);?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s">
                        <h5 class="pull-left"><span class="step0">Shipping Information</span> &gt; <span class="step1">Shopping Finished</span> </h5><br/><br/><br/>

                        <div id="shipping_information">
                        <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="2s">
                            <form>
                                <label for=""><strong>Shipping Adress</strong></label>
                                <div class="form-group">
                                    <textarea id="shipping_adress" class="form-control" rows="4" placeholder="Fill your shipping adress" readonly></textarea><br/>
                                </div>
                                <label for=""><strong>Note</strong></label>
                                <div class="form-group">
                                    <textarea class="form-control" name="note" rows="6" placeholder="This is maybe usefull ^^"></textarea><br/>
                                </div>
                                <div class="form-group">
                                    <p><strong>Shipping Service</strong></p>
                                    <div id="kurir_radio"></div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="2s">
                            <p><strong>Shopping Cart</strong></p>
                            
                            <?php
                            $catch = "";
                            $x=0;
                            $y=1;
                            $total_belanja=0;
                            $cart_counter=0;
                            foreach ($_SESSION["bakaichi_cart_item"] as $key)
                            {
                                // variable catch
                                $catch .= '{';
                                $catch .= '"id":"'.$key['id'].'",';
                                $catch .= '"nama":"'.$key['nama'].'",';
                                $catch .= '"jenis_kue":"'.$key['jenis_kue'].'",';
                                $catch .= '"gambar":"'.$key['gambar'].'",';
                                $catch .= '"harga":"'.$key['harga'].'",';
                                $catch .= '"quantity":"'.$key['quantity'].'"';
                                $catch .= '}';
                                $catch .= $x<$y ? ',' : '';
                                $x++;

                                echo '<div class="col-md-12 col-sm-12 col-xs-12">';
                                echo '<div class="col-md-2 col-sm-2 col-xs-6">';
                                echo '<img src="'.$key['gambar'].'" style="max-width:70px;max-height:70px;"/>';
                                echo '</div>';
                                echo '<div class="col-md-10 col-sm-10 col-xs-6">';
                                echo '<span class="pull-left"><p><strong>'.$key['nama'].'</strong> x '.$key['quantity'].'<br/><small>'.$key['jenis_kue'].'</small></p></span>';
                                echo '<span class="pull-right"><p>Rp. '.$key['harga'].'</p></span>';
                                echo '</div>';
                                echo '</div>';
                                $total_belanja+=intval($key["harga"])*intval($key["quantity"]);

                            }
                            $catch = '{"record_of_session":[' . $catch . ']}';
                            ?>

                            <div class="col-md-12 col-sm-12 col-xs-12"><br/>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <p class="pull-left"><strong>Total</strong></p>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-6">
                                    <p class="pull-right"><strong>Rp. <?php echo $total_belanja; ?></strong></p><br/><br/><br/>
                                </div>
                            </div>
                            
                            <p><strong>Cost Summary</strong></p>
                            <div class="col-md-12 col-sm-12 col-xs-12"><br/>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <span class="pull-left"><p><strong>Subtotal</strong></p><p><strong>Shipping Cost</strong></p><p><strong>Grand Total</strong></p></span>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-6">
                                    <span class="pull-right"><p><strong>Rp. <span class="total_belanja"><?php echo $total_belanja;?> </span></strong></p><p><strong>Rp. <span class="kurir_biaya"> </span></strong></p><p><strong>Rp. <span class="grand_total"> </span></strong></p><br/></span>
                                </div>

                                <span class="pull-right">
                                    <img src="assets/images/logo-hed-1.png" style="max-width:100px;max-height:100px;"/>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <img src="https://seeklogo.com/images/T/Tiki_JNE-logo-09BD368D04-seeklogo.com.png" style="max-width:100px;max-height:100px;"/>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/0/00/Pos-Indonesia.svg/320px-Pos-Indonesia.svg.png" style="max-width:100px;max-height:100px;"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                </span>
                            </div>
                        </div>
                        
                        <div class="pull-right">
                            <br/><br/><button type="button" id="jump_button" class="pull-right btn btn-default">Next</button>
                        </div>
                        </div>
                        <!-- shipping_information -->

                        <div id="shopping_finished">
                        <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h2>Please Make Payment</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <p><strong>Client</strong></p>
                                <p>Order Date: <span class="pull-right order_date">24 July 2018 10:16:52</span></p>
                                <p>Client ID: <span class="pull-right user_id">0c5ea8d884533461731461caed5e38a4</span></p>
                                <p>Name: <span class="pull-right user_id">Erwin Santoso</span></p>
                                <p>Status: <span class="pull-right status"><b>Awaiting Payment</b></span></p>
                                <p>Email: <span class="pull-right status"><b>erwindanjo@gmail.com</b></span></p><br/><br/>

                                <p><strong>Ship To</strong></p>
                                <p>Name: <span class="pull-right user_id">Erwin Santoso</span></p>
                                <p>Alamat: <span class="pull-right order_date">Jl. Sukorejo Indramayu / 12</span></p>
                                <p>Kodepos: <span class="pull-right user_id">60534</span></p>
                                <p>Shipping Service: <span class="pull-right status">JNE</span></p><br/><br/>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s">
                            <h4>INVOICE: INV0c5ea8d884533461731461caed5e38a4</h4>
                            <?php
                            $total_belanja=0;
                            $cart_counter=0;
                            foreach ($_SESSION['bakaichi_cart_item'] as $key)
                            {
                                echo '<div class="col-md-12 col-sm-12 col-xs-12">';
                                echo '<span class="pull-left"><p><strong>'.$key['nama'].'</strong> x '.$key['quantity'].'<br/><small>'.$key['jenis_kue'].'</small></p></span>';
                                echo '<span class="pull-right"><p>Rp. '.$key['harga'].'</p></span>';
                                echo '</div>';
                                $total_belanja+=intval($key["harga"])*intval($key["quantity"]);
                            }
                            ?>
                            <hr/>
                            <div class="col-md-12 col-sm-12 col-xs-12"><br/>
                                <p><strong>Total <span class="pull-right">Rp. <?php echo $total_belanja; ?></span></strong></p><br/><br/><br/>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <span class="pull-left"><p><strong>Subtotal</strong></p><p><strong>Shipping Cost</strong></p><p><strong>Grand Total</strong></p></span>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-6">
                                <span class="pull-right"><p><strong>Rp. <span class="total_belanja"><?php echo $total_belanja;?> </span></strong></p><p><strong>Rp. <span class="kurir_biaya"> </span></strong></p><p><strong>Rp. <span class="grand_total"> </span></strong></p><br/></span>
                            </div>
                        </div>
                        </div>
                        <!-- shopping_finished -->

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
            $catch = <?php print_r($catch);?>;
        </script>
        <script type="text/javascript" src="app/checkout.js"></script>
        
    </body>
</html>