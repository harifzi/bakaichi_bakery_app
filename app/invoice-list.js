showInvoices(1);

// SHOW INVOICES
function showInvoices(page)
{
    $('#page-title').html('Read Invoice');
    
    $('#page-content').fadeOut('slow', function()
    {
        $('#page-content').load('invoice-read.php?page=' + page, function()
        {
            $('#page-content').fadeIn('slow');
        });
    });

}