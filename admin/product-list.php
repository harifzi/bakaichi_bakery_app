<?php
    // session_start();

    // if(!isset($_SESSION['bakaichi_signedIn']))
    // {
    //     header('Location:signin.php');
    //     exit();
    // }


    include_once '../config/database.php';
    include_once '../objects/jenis-kue.php';

    $database = new Database();
    $db = $database->getConnection();

    $jenis_kue = new JenisKue($db);

?>
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
    
    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <style type="text/css">
    .display-none {
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" id="page-title">Edit Profile</h4>
                            </div>
                            
                            <div class="content">    
                                
                                <!-- Create: Product -->
                                <form id='create-product-form' action='#' method='post' border='0'>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Nama Kue</label>
                                                        <input type="text" class="form-control" placeholder="Company" value="Creative Code Inc.">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Harga</label>
                                                        <input type="text" class="form-control" placeholder="Username" value="michael23">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Jenis Kue</label>
                                                       
                                                        <?php
                                                        // Jenis Kue
                                                        $stmt = $jenis_kue->read();

                                                        echo "<select class='form-control' name='category_id'>";
                                                            echo "<option>Jenis Kue...</option>";

                                                            while ($row_jenis_kue = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                                extract($row_jenis_kue);
                                                                echo "<option value='{$jenis_kue_id}'>{$jenis_kue}</option>";
                                                            }

                                                        echo "</select>";
                                                        ?>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Deskripsi Kue</label>
                                                        <textarea rows="5" class="form-control" placeholder="Here can be your description">Ya itu rasanya enak sekaly</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Gambar Kue</label>
                                                    <img src="../assets/images/470x470.png" id="preview-frame" style="max-width:300px;max-height:300px;float:left;" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="btn btn-info btn-fill btn-file"> Browse <input type="file" id="picframe" name="image" value="media" style="display: none;" required/> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-10 col-md-2">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button class="btn btn-danger btn-fill btn-file">&lt;</button>
                                            <button class="btn btn-info btn-fill btn-file">Create</button>
                                        </div>
                                    </div>
                                </form>

                                <br/><hr/><br/>

                                <!-- Read: Product -->
                                <div id="page-content"></div>
                                
                                <br/><hr/><br/>

                                <!-- Form: Create -->
                                <form id='create-product-form' action='#' method='post' border='0'>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Nama Kue</label>
                                                        <input type="text" class="form-control" placeholder="Company" value="Creative Code Inc.">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Harga</label>
                                                        <input type="text" class="form-control" placeholder="Username" value="michael23">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Jenis Kue</label>
                                                       
                                                        <?php
                                                        // Jenis Kue
                                                        $stmt = $jenis_kue->read();

                                                        echo "<select class='form-control' name='category_id'>";
                                                            echo "<option>Jenis Kue...</option>";

                                                            while ($row_jenis_kue = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                                extract($row_jenis_kue);
                                                                echo "<option value='{$jenis_kue_id}'>{$jenis_kue}</option>";
                                                            }

                                                        echo "</select>";
                                                        ?>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Deskripsi Kue</label>
                                                        <textarea rows="5" class="form-control" placeholder="Here can be your description">Ya itu rasanya enak sekaly</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Gambar Kue</label>
                                                    <img src="../assets/images/470x470.png" id="preview-frame" style="max-width:300px;max-height:300px;float:left;" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="btn btn-info btn-fill btn-file"> Browse <input type="file" id="picframe" name="image" value="media" style="display: none;" required/> </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-10 col-md-2">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button class="btn btn-danger btn-fill btn-file">&lt;</button>
                                            <button class="btn btn-info btn-fill btn-file">Create</button>
                                        </div>
                                    </div>
                                </form>
                                
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
    <script src="../app/product-list.js"></script>

    <script type="text/javascript">

    function readURL(input){
      if (input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function (e){
            $('#preview-frame').attr('src',e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    };

    $("#picframe").change(function(){
        $('#preview-frame').attr('src','http://via.placeholder.com/350x350');    
        readURL(this);
    });

    </script>

</html>