showInvoicesList(1);

function showInvoicesList(page)
{
    $('#page-content').fadeOut('slow', function()
    {
	    $('#page-title').html('Invoice List');
	    $('button#back').remove();
        $('#page-content').load('invoice-read.php?page=' + page, function()
        {
            $('#page-content').fadeIn('slow');
            checkDetailButton();
        });
    });

}

function checkDetailButton()
{
	$('button#detail').click(function(){
		var getInvoiceID = $(this).parents('tr');
		getInvoiceID = getInvoiceID.attr('invoice_id');
		// console.log(getInvoiceID);

		$('#page-content').fadeOut('slow', function()
	    {
	        $('#page-title').after('<button class="pull-right btn btn-warning btn-fill" id="back">INVOICE LIST</button>');
        	$('#page-content').load('invoice-read-detail.php?invoice_id=' + getInvoiceID, function()
	        {
	            $('#page-content').fadeIn('slow');
	            backAction();
	        });
	    });
	})
}

function backAction()
{
	$('button#back').click(function(){
		showInvoicesList(1);	
	})
}