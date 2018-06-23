showProducts(1);

// SHOW PRODUCT
function showProducts(page){
 
    $('#page-title').html('Read Products');
    $('#page-title').append('&nbsp; <button type="button" class="btn btn btn-info btn-fill" id="create-product">Create</button></div>');
    
    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('product-read.php?page=' + page, function(){
           
            $('#page-content').fadeIn('slow');

            $(document).ready(function(){

                $('#edit-product').click(function(){

                    console.log('hai');

                });

                $('#delete-product').click(function(){

                    console.log('hai');

                });
            
            });

        });

        createProduct();
    
    });

}

// PREVIOUS BUTTON
function previousButton(){

    $('#back-button').click(function(){
                   
        $('#page-content').fadeOut('slow', function(){ 
            showProducts(1);
        });
       
    });

}

// CREATE PRODUCT
function createProduct(){

    $('#create-product').click(function(){
        $('#page-title').html('Create Products');
        
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('product-create-form.php', function(){

                $('#page-content').fadeIn('slow');
                
                previousButton()  

                // CREATE BUTTON ===============================================

                $('#create-product').submit(function(){

                    event.preventDefault();
                    var create_data = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "product-create.php",
                        data: create_data,
                        dataType: "json",
                        success: function(data) {
                            $('#page-content').fadeOut('slow', function(){ 
                                showProducts(1);
                            });
                        },
                        error: function(exception) {
                            console.log(exception);
                        }
                    });

                    // $.post('product-create.php', $(this).serialize())
                    // .done(function(data){

                        // $('#page-content').fadeOut('slow', function(){ 
                        //     console.log('lala');
                        //     showProducts(1);
                        // });

                    // });


                    // return false;

                });
               
            // END OF CREATE BUTTON ==========================================
            
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

    // END OF FORM:CREATE PRODUCT ================================================= 

}