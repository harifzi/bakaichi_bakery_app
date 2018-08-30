<?php
include_once 'config/database.php';
include_once 'objects/user.php';
include_once 'objects/invoice.php';

$database = new Database();
$database->getTimestamp();
$db = $database->getConnection();

$user = new User($db);
$invoice = new Invoice($db);

$user->user_id = $_GET['id'];
$user->readOne();
$invoice->user_id = $_GET['id'];
$invoice->now = date("Y-m-d H:i:s");
$invoice->readLatestInvoice();
?>

<section class="content-color" status="<?php ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft"  data-wow-duration="2s">
                <div class="head_title text-center">
                    <h2>Hello <?php echo htmlspecialchars($user->nama_depan, ENT_QUOTES); ?></h2><h3>What You Want To Do</h3>
                </div>

                <?php
                if(isset($invoice->invoice_id) && $invoice->gambar_payment_confirmation == '')
                {
                    echo '<div class="head_title text-center" style="padding-bottom:60px;"><br/><br/><br/>';
                    echo '<h3>Please make payment</h3>';
                    echo '<button type="button" class="btn btn-small btn-warning" id="confirm" inv="';
                    echo htmlspecialchars($invoice->invoice_id, ENT_QUOTES);
                    echo '">Click Here To Confirm Your Payment</button>';
                    echo '</div>';
                }
                ?>
                
            </div>

            <div class="main_profile_content text-center">
                
                <div class="col-md-3 col-sm-4 col-xs-12 text-center content_option" id="edit">
                    <div class="single_content wow fadeInDown"  data-wow-duration="1s">
                        <div class="single_content_img">
                            <img src="assets/images/resume.png" alt="" />
                        </div>
                        <h3>Edit My Profile</h3>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-4 col-xs-12 text-center content_option" id="list_invoice">
                    <div class="single_content wow fadeInDown"  data-wow-duration="1s">
                        <div class="single_content_img">
                            <img src="assets/images/profiles.png" alt="" />
                        </div>
                        <h3>View My Invoice</h3>
                    </div>
                </div>
               
                <div class="col-md-3 col-sm-4 col-xs-12 text-center content_option" id="chat_cs">
                    <div class="single_content wow fadeInDown"  data-wow-duration="1s">
                        <div class="single_content_img">
                            <img src="assets/images/conversation.png" alt="" />
                        </div>
                        <h3>Costumer Service</h3>
                    </div>
                </div>

                <div class="col-md-3 col-sm-4 col-xs-12 text-center content_option" id="rate_us">
                    <div class="single_content wow fadeInDown"  data-wow-duration="1s">
                        <div class="single_content_img">
                            <img src="assets/images/rating.png" alt="" />
                        </div>
                        <h3>Rate Us</h3>
                    </div>
                </div>

            </div><br/><br/><br/>
        </div>
    </div>
</section>