// change page title
function changePageTitle(page_title){
    // change page title
    $('#page-title').text(page_title);

    // change title tag
    document.title=page_title;
}

// view products on load of the page
$('#loader-image').show();
showProducts(1);

$(document).ready(function(){

    // will show the create product form
    $('#create-product').click(function(){
        // change page title
        changePageTitle('Create Product');

        // show create product form
        
        // hide create product button
        $('#create-product').hide();

        // show read products button
        $('#read-products').show();

        // fade out effect first
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('create_form.php', function(){

                // hide loader image
                $('#loader-image').hide();

                // fade in effect
                $('#page-content').fadeIn('slow');
            });
        });
    });
});


// used when clicking the pagination buttons
$(document).on("click", ".paging-btn", function(){
     
    // show loader image
    $("#loader-image").show();
         
    // page type
    var page_type = $("#page-type").val();
     
    // get the page number
    var page = $(this).attr('page-num');
     
    // set the page number
    $("#page-number").val(page);    
     
    // read products
    showProducts(page);
 
});

// clicking the 'read products' button
$('#read-products').click(function(){

    // show a loader img
    $('#loader-image').show();

    // show create product button
    $('#create-product').show();

    // hide read products button
    $('#read-products').hide();

    // show products
    showProducts(1);
});

// read products
function showProducts(page){
 
    // change page title
    changePageTitle('Read Products');
 
    // fade out effect first
    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('read.php?page=' + page, function(){
            // hide loader image
            $('#loader-image').hide();
 
            // fade in effect
            $('#page-content').fadeIn('slow');
        });
 
   });
}

// will run if create product form was submitted
$(document).on('submit', '#create-product-form', function() {

    // show a loader img
    $('#loader-image').show();

    // post the data from the form
    $.post("create.php", $(this).serialize())
        .done(function(data) {

            // show create product button
            $('#create-product').show();

            // hide read products button
            $('#read-products').hide();

            // 'data' is the text returned, you can do any conditions based on that
            showProducts(1);
        });

    return false;
});

// clicking the edit button
$(document).on('click', '.edit-btn', function(){

    // change page title
    changePageTitle('Update Product');

    var product_id = $(this).closest('td').find('.product-id').text();

    // show a loader image
    $('#loader-image').show();

    // hide create product button
    $('#create-product').hide();

    // show read products button
    $('#read-products').show();

    // fade out effect first
    $('#page-content').fadeOut('slow', function(){
        $('#page-content').load('update_form.php?product_id=' + product_id, function(){
            // hide loader image
            $('#loader-image').hide();

            // fade in effect
            $('#page-content').fadeIn('slow');
        });
    });
});

// will run if update product form was submitted
$(document).on('submit', '#update-product-form', function() {
 
    // show a loader img
    $('#loader-image').show();
     
    // post the data from the form
    $.post("update.php", $(this).serialize())
        .done(function(data) {
             
            // show create product button
            $('#create-product').show();
             
            // hide read products button
            $('#read-products').hide();
         
            // 'data' is the text returned, you can do any conditions based on that
            showProducts(1);
        });
             
    return false;
});

// will run if the delete button was clicked
$(document).on('click', '.delete-btn', function(){ 
    if(confirm('Are you sure?')){
     
        // get the id
        var product_id = $(this).closest('td').find('.product-id').text();
         
        // trigger the delete file
        $.post("delete.php", { id: product_id })
            .done(function(data){
                console.log(data);
                 
                // show loader image
                $('#loader-image').show();
                 
                // reload the product list
                showProducts(1);
                 
            });
    }
});