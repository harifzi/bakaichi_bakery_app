userDashboard();

function userDashboard()
{
	$('#page-content').fadeOut('slow', function()
	{
		$('#page-content').load('user-dashboard.php?id='+$user_id, function()
        {
            $('#page-content').fadeIn('slow');
        	confirmPayment($user_id);

			$('#edit').click(function(){
				console.log('edit');
			})

			$('#list_invoice').click(function(){
				console.log('invoice');
			})

			$('#chat_cs').click(function(){
				console.log('chat');
			})

			$('#rate_us').click(function(){
				console.log('rate');
			})
        });
	})
}

function confirmPayment(id)
{
	$('#confirm').click(function()
	{
		// console.log($('#confirm').attr('inv'));
		$('#page-content').fadeOut('slow', function()
		{
			$('#page-content').load('user-confirmpayment.php?id='+id+'&inv='+$('#confirm').attr('inv'), function()
	        {
	        	$('#page-content').fadeIn('slow');
	        	backtoHome();
	        	
	        	$('a#submit').click(function(){
		            $('#form_confirmpayment').trigger("submit");
		        });

	        	$('#form_confirmpayment').submit(function(e){
			    	var formData = new FormData(this);
				    e.preventDefault();
			    	$.ajax({
				        type: 'POST', 
				        url: 'user-confirmpayment-post.php', 
				        data: formData, 
				        dataType: 'text',
				        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data){ 
				            // console.log(data);
				            userDashboard();
				        },
				        error: function(exception){
				            console.log(exception);
				        }
				    });	
			    })
			    
	        })
        })
	})
}

function backtoHome()
{
	$('#back').click(function(){
		userDashboard();
	});
}