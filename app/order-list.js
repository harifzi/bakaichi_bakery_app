showOrder(1);

// SHOW ORDER
function showOrder(page)
{
    $('#page-title').html('Order');
    $('#page-content').fadeOut('slow', function()
    {
        $('#page-content').load('order-read.php?page=' + page, function()
        {
            $('#page-content').fadeIn('slow');
        });
    });

}