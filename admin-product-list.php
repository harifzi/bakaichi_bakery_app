
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/images/icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Bakaichi Bakery</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/admin-style.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    
    <?php include ('admin-sidebar.php'); ?>
    <!-- End of Sidebar -->

    <div class="main-panel">
        
        <?php include ('admin-nav.php'); ?>
        <!-- End of Navbar -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <center><h4 class="title">202 Awesome Stroke Icons</h4></center><br/>
                            </div>
                            
                            <div class="places-buttons">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-3">
                                        <button class="btn btn-default btn-block" onclick="demo.showNotification('bottom','left')">Bottom Left</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-default btn-block" onclick="demo.showNotification('bottom','center')">Bottom Center</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-default btn-block" onclick="demo.showNotification('bottom','right')">Bottom Right</button>
                                    </div>
                                </div>
                            </div>

                            <div class="content all-icons">
                                <div class="row">
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                    <div class="font-icon-detail"><i class="pe-7s-album"></i>
                                      <input type="text" value="pe-7s-album">
                                    </div>

                                  </div>
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                    <div class="font-icon-detail"><i class="pe-7s-arc"></i>
                                      <input type="text" value="pe-7s-arc">
                                    </div>

                                  </div>
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                    <div class="font-icon-detail"><i class="pe-7s-back-2"></i>
                                      <input type="text" value="pe-7s-back-2">
                                    </div>

                                  </div>
                                  <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                    <div class="font-icon-detail"><i class="pe-7s-bandaid"></i>
                                      <input type="text" value="pe-7s-bandaid">
                                    </div>

                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php include('admin-footer.php'); ?>
        <!-- End of Footer -->

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table main -->
    <!-- <script src="assets/js/admin-main.js"></script> -->
</html>