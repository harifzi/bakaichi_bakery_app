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
        <link rel="stylesheet" href="assets/css/contact.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <!-- Header Section -->
        <?php include('header.php'); ?>
        <!--End of Header Section -->

        <!-- Banner Section -->
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

        <!-- Contact Section -->
		<section id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="main_contact">
                        
                        <div class="contact_content">

                            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft"  data-wow-duration="2s">
								<div class="contact_message">
									<form action="#" id="formid">
										<label for="">Name</label>
										<div class="form-group">
											<input type="text" class="form-control" name="name" placeholder="Name" required="">
										</div>
										
										<label for="">Email</label>
										<div class="form-group">
											<input type="email" class="form-control" name="email" placeholder="Email" required="">
										</div>

										<label for="">Message</label>
										<div class="form-group">
											<textarea class="form-control" name="message" rows="8" placeholder="Message"></textarea>
										</div>

										<div class="message_btn text-center">
											<div class="btn_bg">
												<a href="" class="btn">Send</a>
											</div>
										</div>
									</form>
								</div>
							</div>

                            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight"  data-wow-duration="2s">
								<div class="contact_socail_bookmark_area">
									<div class="head_title text-center">
										<h2>GET IN TOUCH</h2>
										<div class="separator"></div>
									</div>

									<div class="contact_adress">
										<p>Fill out the form and Bakaichi Bakery team will contact you</p>
										<h3>Maps</h3>
									</div>
								
								</div>
							</div>

                        </div>
                    </div>
                </div>
				
				
            </div>
        </section>
        <!-- End of Contact With Map Section -->

        <!-- Contact Section -->
        <?php include ('footer.php'); ?>
        <!-- End of Contact Section -->


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
        
    </body>
</html>