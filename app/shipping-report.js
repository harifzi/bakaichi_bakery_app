showShippingReport(1);

function showShippingReport(page)
{
    $('#page-content').fadeOut('slow', function()
    {
        $('#page-title').html('Shipping Report');
        $('#back-button').remove();
        $('#page-title').after('<button class="pull-right btn btn-warning btn-fill" id="header-sidebutton">UPDATE SHIPPING STATUS</button>');
    
        $('#page-content').load('shipping-read.php?page=' + page, function()
        {
            $('#page-content').fadeIn('slow');
            verifyShipping(page);
            updateShipping();
        });
    });
}

function verifyShipping(page)
{
    $('#header-sidebutton').click(function(){
        $('#page-content').fadeOut('slow', function()
        {
            $('#page-title').html('Update Shipping Status');
            $('#header-sidebutton').remove();
            $('#page-title').after('<button class="pull-right btn btn-warning btn-fill" id="back-button">SHIPPING STATUS REPORT</button>');

            $('#page-content').load('shipping-updating-read.php?page=' + page, function()
            {
                $('#page-content').fadeIn('slow');
                previousButton();

                $('button#check').click(function(e){
                    var whereis_id = $(this).parents('tr');
                    $id = $(whereis_id).attr('id');

                    e.preventDefault();
                    var formData = {id: $id, val: '1'};
                    $.ajax({
                        type: "POST",
                        url: "shipping-update-post.php",
                        data: formData,
                        dataType: "text",
                        success : function(data){
                            $('#page-content').fadeOut('slow', function(){ 
                                showShippingReport(1);
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
            showShippingReport(1);
        });
    });
}

function updateShipping()
{
	$('button#update-shipping').click(function(){
		var whereis_id = $(this).parents('tr');
		$id = $(whereis_id).attr('id');
        
		$('#header-sidebutton').remove();
        $('#page-title').html('Update Status Shipping');		
		$('#page-content').fadeOut('slow', function()
    	{
    		$('#page-content').load('shipping-update-form.php?id='+$id, function()
            {
            	$('#page-content').fadeIn('slow');
                
                previousButton();
                $('button#update-button').click(function(){
                    $val = $('#status-shipping').val();
                    $id = $('input[name="shipping_id"]').val();

                    var formData = {id : $id, val : $val};
                    $.ajax({
                        type: "POST",
                        url: "shipping-update-post.php",
                        data: formData,
                        dataType: "text",
                        success : function(data){
                            $('#page-content').fadeOut('slow', function(){ 
                                showShippingReport(1);
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