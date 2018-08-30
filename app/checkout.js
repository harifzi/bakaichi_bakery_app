$('#shopping_finished').hide();
$('.step0').html('<strong>Shipping Information</strong>');
$total_belanja=$('.total_belanja').html();
$grand_total=parseInt($total_belanja);
$kurir_biaya = $('input[name="kurir"]:checked').attr('biaya');
$('.kurir_biaya').html($kurir_biaya);
$dummy=$grand_total;
$grand_total+=parseInt($kurir_biaya);
$('.grand_total').html($grand_total);

$('form').on('change',function(){
    $kurir_biaya = $('input[name="kurir"]:checked').attr('biaya');
    // console.log($kurir_val);
    $('.kurir_biaya').html($kurir_biaya);
    $grand_total=$dummy;
    $grand_total+=parseInt($kurir_biaya);
    $('.grand_total').html($grand_total);
});

$('#confirmed').click(function(){
    var $note=$('textarea[name="note"]').val();
    if($note == ''){
        $note='Tidak ada catatan';
    }
    $alamat_id=$('select[name="alamat"]').val();
    $shipping_service_id=$('input[name="kurir"]:checked').val();
    $shipping_service=$('input[name="kurir"]:checked').attr('kurir');
    $user_id = $('.user_id').html();
    $invoice_id = $('.invoice_id').html();
    $alamat=$('select[name="alamat"]').children('option').attr('alamat');
    $kodepos=$('select[name="alamat"]').children('option').attr('kodepos');

    $('.step0').html('Shipping Information');
    $('.step1').html('<strong>Shopping Finished</strong>');
    $('.kurir_service').html($shipping_service);
    $('.kodepos').html($kodepos);
    $('.address').html($alamat);
    $('#shipping_information').hide();
    $('#shopping_finished').show();

    var formData = {invoice_id: $invoice_id, alamat_id: $alamat_id, catatan: $note, kurir_id: $shipping_service_id, user_id: $user_id, total_belanja: $total_belanja, grand_total: $grand_total, session_item: $catch};
    $.ajax({
        type: 'POST', 
        url: 'checkout-post.php', 
        data: formData, 
        dataType: 'text',
        success: function(data){ 
            console.log(data);
            // $('.invoice_id').html(data);
        },
        error: function(exception){
            console.log(exception);
        }
    });
});