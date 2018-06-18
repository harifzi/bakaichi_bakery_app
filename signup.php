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
        <link rel="stylesheet" href="assets/css/signup.css">

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
        <!--End of Header Section -->

        <section id="signup_section" class="signup">
            <div class="container">
                
                <div class="row">                            
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight"  data-wow-duration="2s">
                        <div class="head_title text-center">
                            <h2>SIGN UP</h2>
                            <div class="separator"></div>
                        </div>

                        <div class="contact_adress">
                            <h3>Please make sure your data is correct. If don't, our team going to lost in the jungle ): </h3><br/>
                            <center><img class="img-responsive" src="assets/images/gorilla.png" width="30%" /></center>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft"  data-wow-duration="2s">
                        <div class="contact_message">
                            <form action="#" id="formid">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="">First Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required="">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Last Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required="">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label for="">Email</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label for="">Address</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" placeholder="Address" required="">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Zip Code</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="zip_code" placeholder="Zip Code" required="">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Fax Number</label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="fax_number" placeholder="Fax Number" required="">
                                    </div>
                                </div>

                               <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Username</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required="">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                    </div>
                                </div>

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="checkbox form-group">
                                      <label>
                                        <input type="checkbox" value="">
                                        I Agree to the <a href="terms_and_conditions.php" target="_blank">Terms &amp; Conditions</a>
                                      </label>
                                    </div>
                                </div>

                                <div class="message_btn text-center">
                                    <div class="btn_bg">
                                        <a href="" class="btn">Register</a>
                                    </div>
                                </div><br/><br/><br/><br/><br/><br/>
                            </form>
                        </div>
                    </div>

                    <p class="text-center"><small>Copyright 2016 &copy; by <a href="https://bootstrapthemes.co">bootstrapthemes.co</a></small></p>

                    
                </div>
                
            </div>
        </section>
        <!-- End of Signup Section -->

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