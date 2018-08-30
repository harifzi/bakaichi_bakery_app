<header id="main_menu" class="header">
    <div class="main_menu_bg navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="nave_menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbar-collapse-1">

                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">bakaichi bakery</a></li>
                                </ul>

                                <ul class="nav navbar-nav navbar-right">
									<li><a href="index.php">Home</a></li>
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <?php
                                    if(isset($_SESSION['session_bakaichi_bakery']))
                                    {
                                        echo'<li><a href="myprofile.php">My Profile</a></li><li><a href="javascript:void(0)" id="signout">Sign Out</a></li>';
                                    }
                                    else
                                    {
                                        echo '<li><a href="signin.php">Sign In</a></li>';    
                                    }
                                    ?>
                                    <li>
                                        <a href="javascript:void(0)" id="cart-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="glyphicon glyphicon-shopping-cart"></span> </a>
                                        <ul class="dropdown-menu" aria-labelledby="cart-dropdown">
                                            <?php
                                            if(!empty($_SESSION["bakaichi_cart_item"]))
                                            {
                                                foreach ($_SESSION["bakaichi_cart_item"] as $key)
                                                {
                                                    echo '<li><a href="javascript:void(0)">'.$key["nama"].'<br/><small>'.$key["quantity"].' x Rp. '.$key["harga"].'</small></a></li><br/>';
                                                }
                                            }
                                            else
                                            {
                                                echo '<li><a href="javascript:void(0)">No product in the cart</a></li><br/>';
                                            }
                                            echo '<hr/><li><a href="cart.php">Cart</a></li>';
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>	
            </div>

        </div>

    </div>
</header>