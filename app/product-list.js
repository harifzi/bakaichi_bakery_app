showProducts(1);

// SHOW PRODUCT
function showProducts(page){
 
    $('#page-title').html('Read Products');
    $('#page-title').append('&nbsp; <button type="button" class="btn btn btn-info btn-fill" id="create-product">Create</button></div>');
    
    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('product-read.php?page=' + page, function(){
           
            $('#page-content').fadeIn('slow');

        });

        // FORM: CREATE PRODUCT
        $('#create-product').click(function(){
            $('#page-title').html('Create Products');
            
            $('#page-content').fadeOut('slow', function(){
                $('#page-content').load('product-create-form.php', function(){

                    $('#page-content').fadeIn('slow');

                    // BACK
                    $('#back-button').click(function(){
                       
                        $('#page-content').fadeOut('slow', function(){ 
                            showProducts(1);
                        });
                       
                    });
                
                });
            });
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