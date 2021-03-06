<?php
session_start();
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

        <section id="signin_section" class="content-color form">
            <div class="container">
                <div class="row">
                   
                	<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12 wow fadeInRight"  data-wow-duration="2s">
						<div class="head_title text-center">
							<h2>SIGN IN</h2>
							<div class="separator"></div>
						</div><br/><br/><br/>
					</div>
                    
                    <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12 wow fadeInLeft"  data-wow-duration="2s">
						<form action="#" id="form_signin" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" class="form-control" name="username_or_email" placeholder="Username or Email">
							</div>
							
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>

							<div class="message_btn text-center">
                                <div class="btn_bg">
                                    <a id="submit" class="btn">Sign In</a>
                                </div>
                                <input type="submit" style="display: none;" />
							</div>
							<br/><br/><p class="text-center"><small>Not registered? <a href="signup.php">Create an account</a></small></p><br/><br/><br/><p class="text-center"><small>Copyright 2016 &copy; by <a href="https://bootstrapthemes.co">bootstrapthemes.co</a></small></p>
						</form>
					</div>

                </div>
            </div>
        </section>
        <!-- End of Signin Section -->

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/vendor/isotope.min.js"></script>

        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/jquery.mixitup.min.js"></script>
        
            
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        <script type="text/javascript">
        $('#submit').click(function(){
            $('#form_signin').trigger("submit");
        });

        $('#form_signin').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            // var formData = $('#form_signin').serialize();
            $.ajax({
                type: "POST",
                url: "signin-post.php",
                data: formData,
                dataType: "text",
                cache:false,
                contentType: false,
                processData: false,
                success: function(data){
                    window.location = "index.php";
                    // console.log(data);
                },
                error: function(exception) {
                    console.log(exception);
                }
            });
        });
        </script>
        
    </body>
</html>