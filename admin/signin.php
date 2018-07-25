<?php
session_start();

if(isset($_SESSION['session_bakaichi_bakery_level']))
{
    if($_SESSION['session_bakaichi_bakery_level'] == '1')
    {
        header("Location: index.php");
    }
    else
    {
        header("Location: ../index.php");
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Bakaichi Bakery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable = no">
        <link rel="shortcut icon" href="../assets/images/icon.png">
        <!-- google font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <!-- Login style -->
         <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/admin-signin.css">
        <!-- Login style -->
        <!--[if IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="login-wrapper" style="background: #FAD000;">
   
    <div>
        <div class="container">

        	<div class="login-pan">

        		<div class="login-box-pan">
                     <div class="logopan"><a href="index.php"><img src="../assets/images/logo-hed-1.png"></a></div>
        			<div class="login-box">
        				<h3>Sign In</h3>
        				<form id="form_signin">
        					<input type="text" name="username_or_email" placeholder="Username or Email" class="form-control"></input>
        					<input type="password" name="password" placeholder="Password" class="form-control"></input>
                            <div class="check-pass">
								<div class="checkbox">
									<input id="checkbox" class="styled" type="checkbox">
									<label for="checkbox">Remember me</label>
								</div>
	        					<a href="#" class="for-pass">Forget password</a>
        					</div>
        					<input type="submit" value="Login" class="button-submit"></input>
        				</form>
        			</div>
        		</div>
        	</div>
        </div>
    </div>

    <!-- script -->
    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/icheck.min.js" type="text/javascript"></script>
    <script src="../assets/js/admin-signin-main.js" type="text/javascript"></script>
    <script type="text/javascript">
    $('#form_signin').submit(function(){
        event.preventDefault();
        var formData = $('#form_signin').serialize();
        $.ajax({
            type: "POST",
            url: "signin-post.php",
            data: formData,
            dataType: "text",
            success: function(data){
                if(data === 'fuckoff!'){
                    window.location = "../index.php";
                }
                else
                {
                    window.location = "index.php";   
                }
            },
            error: function(exception) {
                console.log("error: "+exception);
            }
        });
    });
    </script>
      
    </body>
</html>
