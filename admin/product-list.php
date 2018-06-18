
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/images/icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Bakaichi Bakery</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>
    <link href="../assets/css/admin-style.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <style type="text/css">
    .display-none{
        display:none;
    }
    </style>

</head>
<body>

<div class="wrapper">
    
    <?php include ('../layouts/admin-sidebar.php'); ?>
    <!-- End of Sidebar -->

    <div class="main-panel">
        
        <?php include ('../layouts/admin-nav.php'); ?>
        <!-- End of Navbar -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            
                            <div class="row">
                                <div class="header">
                                    <center><h4 class="title" id="page-title"></h4></center><br/>
                                </div>
                                
                                <div class="places-buttons">
                                    <div class="col-md-offset-1 col-md-2 ">
                                        <button class="btn btn-primary btn-block" id="create-product">Create</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="content all-product">
                                    <div id='page-content'></div>                            
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php include('../layouts/admin-footer.php'); ?>
        <!-- End of Footer -->

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript -->
    <script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table main -->
    <!-- <script src="assets/js/admin-main.js"></script> -->

    <!-- app js script -->
    <script src="../app/product.js"></script>
</html>