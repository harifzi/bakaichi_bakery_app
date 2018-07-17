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
					
					<div id="carousel-banner" class="carousel slide" data-ride="carousel">
					  	<!-- Indicators -->
					  	<ol class="carousel-indicators">
							<li data-target="#carousel-banner" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-banner" data-slide-to="1"></li>
							<li data-target="#carousel-banner" data-slide-to="2"></li>
					  	</ol>

					  	<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="assets/images/slider.jpg" alt="Carousel Header 1">
							</div>
							<div class="item">
								<img src="assets/images/slider2.jpg" alt="Carousel Header 2">
							</div>
							<div class="item">
								<img src="assets/images/slider3.jpg" alt="Carousel Header 3">
							</div>
						</div>
					<br/><br/><br/><br/><br/>
					</div>						
					
                </div>
            </div>
            </div>
        </section>
        <!-- End of Banner Section -->

        <section id="products_section" class="products">
            <div class="container">
                <div class="row">	
					<div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="head_title wow fadeInLeft"  data-wow-duration="2s">
                            <p>Sort By: Newest Product</p>
                        </div>
                    </div>
					
                </div>
            </div>
			
			<div class="main_products_content text-center">
				<div id="main_products"></div>
                
                <div class="col-sm-12 col-md-12 col-xs-12">
					<div class="btn_bg wow fadeInLeft"  data-wow-duration="3s">
						<a href="" class="btn">Load More</a>
					</div>
				</div>
			</div>
        </section>
        <!-- End of New Product Section -->

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
        $.ajax({ 
            type: 'GET', 
            url: 'api/kue.php', 
            data: { get_param: 'record_of_products' }, 
            dataType: 'json',
            success: function (data) { 
                var getrecords = data['record_of_products'];
                for($i in getrecords) {
                    $('#main_products').append('<div class="single_product_column col-md-3 col-sm-6 col-xs-12 wow fadeInLeft"  data-wow-duration="4s"><div class="single_product">'+'<img src="'+getrecords[$i].gambar+'" alt="" />'+'<div class="product_detail">'+getrecords[$i].nama+'<br/>Price: RP '+getrecords[$i].harga+'<br/></div>'+'</div></div>');
                }
            }
        });
        </script>
        
    </body>
</html>