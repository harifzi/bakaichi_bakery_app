// change page title
function changePageTitle(page_title){
    // change page title
    $('#page-title').text(page_title);

    // change title tag
    document.title=page_title;
}

showProducts(1);
changePageTitle('Read Products');


function showProducts(page){
 
    // change page title
    changePageTitle('Read Products');
    
    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('product-read.php?page=' + page, function(){
           
            $('#page-content').fadeIn('slow');

        });

        // $.ajax({ 
        //     type: 'GET', 
        //     url: 'product-read.php', 
        //     data: { get_param: 'records' }, 
        //     dataType: 'json',
        //     success: function (data) { 
        //         console.log('success');
        //         $records = data;        

        //         $('#page-content').html(data);
        //     },
        //     error: function (exception) {
        //         console.log(exception);
        //     }
        // });
     
    });    
    
}