showShippingList(1);

// SHOW SHIPPING
function showShippingList(page)
{
    $('#page-title').html('Shipping List');
    
    $('#page-content').fadeOut('slow', function()
    {
        $('#page-content').load('shipping-read.php?page=' + page, function()
        {
            $('#page-content').fadeIn('slow');
            editShipping();
        });
    });
    
}

function previousButton()
{
    $('#back-button').click(function(){
        $('#page-content').fadeOut('slow', function(){ 
            showShippingList(1);
        });
    });
}

// Edit Shipping
function editShipping()
{
	$('#edit').click(function(){
		var whereis_shipping_id = $(this).parents('tr');
		$shipping_id = $(whereis_shipping_id).attr('shipping');
		$('#page-title').html('Update Status Shipping');
		console.log($shipping_id);
		
		$('#page-content').fadeOut('slow', function()
    	{
    		$('#page-content').load('shipping-status-update-form.php?shipping='+$shipping_id, function()
            {
            	$('#page-content').fadeIn('slow');
                
                previousButton();
                $('#update-product').submit(function()
                {
                    event.preventDefault();
                    var formData = {id : $shipping_id};
                    $.ajax({
                        type: "POST",
                        url: "product-update.php",
                        data: formData,
                        dataType: "text",
                        success : function(data){
                            $('#page-content').fadeOut('slow', function(){ 
								showShippingList(1);
                            });
                            console.log(data);
                        },
                        error: function(exception) {
                            console.log(exception);
                        }
                    });
                });
    	}
	});
}