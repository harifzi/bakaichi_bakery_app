<?php
include_once 'user-confirmpayment-get.php';
?>
<section class="content-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft"  data-wow-duration="2s">
                <div class="head_title text-center">
                    <h3> <span class="content_option" id="back">Dashboard</span> <i class="fa fa-angle-right"></i> Payment Confirmation </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 70px;">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft" data-wow-duration="2s">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <br/><p><strong>Invoice </strong><br/><span class="invoice_id"><?php echo wordwrap($_GET['inv'],55,"<br>\n",TRUE);?></span></p><br/>
                    <p><strong>Ship To</strong></p>
                    <p>Name: <span class="pull-right"><?php echo htmlspecialchars($invoice->nama_depan, ENT_QUOTES); echo ' '; echo htmlspecialchars($invoice->nama_belakang, ENT_QUOTES);?></span></p>
                    <p>Alamat: <span class="pull-right address"><?php echo htmlspecialchars($invoice->alamat_val, ENT_QUOTES);?></span></p>
                    <p>Kodepos: <span class="pull-right kodepos"><?php echo htmlspecialchars($invoice->kodepos, ENT_QUOTES);?></span></p>
                    <p>Shipping Service: <span class="pull-right kurir_service"><?php echo htmlspecialchars($invoice->kurir, ENT_QUOTES);?></span></p><br/><br/>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <p><span class="pull-right"><?php echo htmlspecialchars($invoice->invoice_created_at, ENT_QUOTES);?></span></p>
                    <br/><p><strong>Order Item</strong></p><br/>
                    <?php
                    $total_belanja=0;
                    foreach ($item as $key) {
                        echo '<p>';
                        echo '<span style="text-indent:20px;">'.$key['nama_kue'].' x '.$key['total_order'].'<br/><small>'.$key['jenis_kue'].'</small></span>';
                        echo '</p>';
                        $total_belanja+=intval($key["harga_kue"])*intval($key["total_order"]);
                    }
                    echo '<br/>';
                    ?>
                    <p><strong>Total <span class="pull-right">Rp. <?php echo $total_belanja;?></span></strong></p>
                    <p><strong>Shipping Cost <span class="pull-right">Rp. <?php echo htmlspecialchars($invoice->biaya_kurir, ENT_QUOTES);?></span></strong></p>
                    <p><strong>Grand Total <span class="pull-right">Rp. <?php echo htmlspecialchars($invoice->total_payment, ENT_QUOTES);?></span></strong></p>
                </div>
            </div>
            <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="2s" style="margin-top: -100px;">

                <div class="contact_message form">
                    <form id="form_confirmpayment" enctype="multipart/form-data">
                        <input type="hidden" name="payment_confirmation_id" value="<?php echo htmlspecialchars($invoice->payment_confirmation_id, ENT_QUOTES);?>">
                        <input type="hidden" name="past" value="<?php echo htmlspecialchars($invoice->invoice_created_at, ENT_QUOTES);?>"/>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="">Receipt Transfer Date</label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="tanggal_transfer" placeholder="Receipt Transaction Date" required="">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="">Bank Account Number</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="req_akun" placeholder="Your Bank Account Number" required="">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="">Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="atas_nama" placeholder="Your Name" required="">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="">Amount</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="amount" placeholder="Amount" required="">
                            </div>
                        </div>

                        
                        <div class="col-md-12">
                            <center><label class="btn btn-warning btn-fill btn-file"> Upload Receipt Transaction <input type="file" name="bukti_transfer" style="display: none;"/> </label></center>
                        </div>
                        
                        <div class="message_btn text-center">
                            <div class="btn_bg">
                                <a id="submit" class="btn">Send</a>
                                <input type="submit" style="" name="">
                            </div>
                            <input type="submit" style="display: none;" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>