showProducts(1);

// SHOW PRODUCT
function showProducts(page){
 
    $('#page-title').html('Read Products');
    $('#page-title').append('&nbsp; <button type="button" class="btn btn btn-info btn-fill" id="create-product">Create</button></div>');
    
    $('#page-content').fadeOut('slow', function(){
        
        // $.ajax({ 
        //     type: 'GET', 
        //     url: '../coba.php', 
        //     data: { get_param: 'record_of_products' }, 
        //     dataType: 'json',
        //     success: function (data) { 
        //         var getrecords = data['record_of_products'];
        //         $('#page-content').append('<div class="row" id="product_list">');
        //         for($i in getrecords) {
        //             $('#page-content').before('<div class="col-md-4 product" product='+getrecords[$i].id+'><div class="card"><div class="image"><img src="../'+getrecords[$i].gambar+'" width="20%" alt=""/></div><div class="content"><h4 class="title"><small>'+getrecords[$i].jenis+'</small><br/>'+getrecords[$i].nama+'<br/> RP '+getrecords[$i].harga+'</h4><br/> <p class="description"> Tidak ada deskripsi </p></div>'+'<hr/><div class="text-center"><button type="button" class="btn btn-info btn-fill" id="edit-product"><i class="fa fa-edit"></i></button> &nbsp; <button type="button" class="btn btn-danger btn-fill" id="delete-product"><i class="fa fa-trash"></i></label></button></div><br/></div></div>');
        //             // $('#page-content').append('<div class="single_product_column col-md-3 col-sm-6 col-xs-12 wow fadeInLeft"  data-wow-duration="4s"><div class="single_product">'+'<img src="'+getrecords[$i].gambar+'" alt="" />'+'<div class="product_detail">'+getrecords[$i].nama+'<br/>Price: RP '+getrecords[$i].harga+'<br/></div>'+'</div></div>');
        //         }
        //         $('#page-content').append('</div>');
        //         $('#page-content').fadeIn('slow');
        //         $(document).ready(function(){
        //             editProduct();
        //             deleteProduct();
        //         });
        //     },
        //     error: function (exception) {
        //         console.log(exception);
        //     }
        // });

        $('#page-content').load('product-read.php?page=' + page, function(){
           
            $('#page-content').fadeIn('slow');

            $(document).ready(function(){

                editProduct();
                deleteProduct();
            
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

                    var formData = new FormData(this);
                    $.ajax({
                        type: "POST",
                        url: "product-create.php",
                        data: formData,
                        dataType: "text",
                        cache:false,
                        contentType: false,
                        processData: false,
                        complete: function(xhr) {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 201) {
                                    $('#page-content').fadeOut('slow', function(){ 
                                        showProducts(1);
                                    });
                                }
                            } else {
                                // error
                            }
                        },
                        success: function(data){
                            $('#page-content').fadeOut('slow', function(){ 
                                showProducts(1);
                            });
                            // console.log(data);
                        },
                        error: function(exception) {
                            console.log(exception);
                        }
                    });


                });
               
                // END OF CREATE BUTTON ==========================================
            
            });
        });
    });

}

// EDIT BUTTON
function editProduct(){

    $('button#edit-product').click(function(){

        var product = $(this).parents('.product');
        $product_id = product.attr('product');
        $('#page-title').html('Update Products');
        // $('.product').html('');
        
        $('#page-content').fadeOut('slow', function(){
            
            // $.ajax({ 
            //     type: 'GET', 
            //     url: '../coba1.php?product_id='+$product_id, 
            //     data: { get_param: 'record_of_product' }, 
            //     dataType: 'json',
            //     success: function (data) { 
            //         var getrecord = data['record_of_product'][0];
            //         console.log(getrecord);
            //     },
            //     error: function (exception) {
            //         console.log(exception);
            //     }
            // });
            
            $('#page-content').load('product-update-form.php?product_id='+$product_id, function(){

                $('#page-content').fadeIn('slow');
                
                previousButton()  

            //     // UPDATE BUTTON ===============================================

                $('#update-product').submit(function(){
                    event.preventDefault();

                    var formData = new FormData(this);
                    $.ajax({
                        type: "POST",
                        url: "product-update.php",
                        data: formData,
                        dataType: "text",
                        cache: false,
                        contentType: false,
                        processData: false,
                        complete: function(xhr) {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 201) {
                                    $('#page-content').fadeOut('slow', function(){ 
                                        showProducts(1);
                                    });
                                }
                            } else {
                                // error
                            }
                        },
                        success : function(data){
                            $('#page-content').fadeOut('slow', function(){ 
                                showProducts(1);
                            });
                            // console.log(data);
                        },
                        error: function(exception) {
                            console.log(exception);
                        }
                    });
                });
               
            //     // END OF CREATE BUTTON ==========================================
            
            });
        });

    });

}

// DELETE BUTTON
function deleteProduct(){

    $('button#delete-product').click(function(){

        var product = $(this).parents('.product');
        $product_id = product.attr('product');
        $pic_src = product.find('img').attr('src');
        // console.log($pic_src);

        var deleteProduct = {'gambar_kue':$pic_src,'id_kue':$product_id};

        $.ajax({
            type : "POST",
            url : "product-delete.php",
            data : deleteProduct,  
            complete: function(xhr) {
                if (xhr.readyState == 4) {
                    if (xhr.status == 201) {
                        $('#page-content').fadeOut('slow', function(){ 
                            showProducts(1);
                        });
                    }
                } else {
                    // error
                }
            },
            success : function(data){
                $('#page-content').fadeOut('slow', function(){ 
                    showProducts(1);
                });
                // console.log(data);
            },
            error: function(exception) {
                console.log(exception);
            }
        });

    });

}