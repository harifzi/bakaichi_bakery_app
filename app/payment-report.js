showPaymentReport(1);

function showPaymentReport(page)
{
    $('#page-content').fadeOut('slow', function()
    {
        $('#page-title').html('Payment Report');
        $('#back-button').remove();
        $('#page-title').after('<button class="pull-right btn btn-warning btn-fill" id="header-sidebutton">VERIFIKASI PAYMENT</button>');
    
        $('#page-content').load('payment-read.php?page=' + page, function()
        {
            $('#page-content').fadeIn('slow');
            editPayment();
            verifyPayment(page);
        });
    });
}

function editPayment()
{
    $('button#update-payment').click(function(){
        var id = $(this).parents('tr');
        $id = $(id).attr('id');
        $('#page-content').fadeOut('slow', function()
        {
            $('#page-title').html('Update Payment');
            $('#header-sidebutton').remove();
            $('#page-title').after('<i>&nbsp;</i>');
            $('#page-content').load('payment-update-form.php?id=' + $id, function()
            {
                $('#page-content').fadeIn('slow');
                previousButton();
                
                $('button#update-button').click(function(){
                    $val = $('#status-payment').val();
                    $id = $('input[name="payment_id"]').val();

                    var formData = {id : $id,val : $val};
                    $.ajax({
                        type: "POST",
                        url: "payment-update-post.php",
                        data: formData,
                        dataType: "text",
                        success : function(data){
                            $('#page-content').fadeOut('slow', function(){ 
                                showPaymentReport(1);
                            });
                            console.log(data);
                        },
                        error: function(exception) {
                            console.log(exception);
                        }
                    });
                })
            });
        });
    });
}

function verifyPayment(page)
{
    $('#header-sidebutton').click(function(){
        $('#page-content').fadeOut('slow', function()
        {
            $('#page-title').html('Verify Payment Status');
            $('#header-sidebutton').remove();
            $('#page-title').after('<button class="pull-right btn btn-warning btn-fill" id="back-button">PAYMENT STATUS REPORT</button>');

            $('#page-content').load('payment-updating-read.php?page=' + page, function()
            {
                $('#page-content').fadeIn('slow');

                previousButton();
                
                $('button#verify').click(function(){
                    var id = $(this).parents('tr');
                    $id = $(id).attr('id');
                    
                    var formData = {id : $id, val : '1'};
                    $.ajax({
                        type: "POST",
                        url: "payment-update-post.php",
                        data: formData,
                        dataType: "text",
                        success : function(data){
                            $('#page-content').fadeOut('slow', function(){ 
                                showPaymentReport(1);
                            });
                            console.log(data);
                        },
                        error: function(exception) {
                            console.log(exception);
                        }
                    });

                });

            });
        });
    });
}

function previousButton()
{
    $('button#back-button').click(function(){
        $('#page-content').fadeOut('slow', function(){ 
            showPaymentReport(1);
        });
    });
}