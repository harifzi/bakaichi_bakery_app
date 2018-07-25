$('#shopping_finished').hide();
$('.step0').html('<strong>Shipping Information</strong>');
$user_id=$('.checkout_section').attr('user');
$total_belanja=$('.total_belanja').html();
$grand_total=parseInt($total_belanja);

$('form').on('change',function(){
    $kurir_biaya = $('input[name="kurir"]:checked').attr('biaya');
    // console.log($kurir_val);
    $('.kurir_biaya').html($kurir_biaya);
    $grand_total=$dummy;
    $grand_total+=parseInt($kurir_biaya);
    $('.grand_total').html($grand_total);
});

$.ajax({ 
    type: 'GET', 
    url: 'api/kurir.php', 
    data: { get_param: 'record_of_kurir' }, 
    dataType: 'json',
    success: function (data) { 
        var getrecords = data['record_of_kurir'];
        for($i in getrecords)
        {
            $('#kurir_radio').append('<div class="radio"><label><input type="radio" name="kurir" value="'+getrecords[$i].id+'" biaya='+getrecords[$i].biaya+'><strong style="font-size: 20px;">'+getrecords[$i].kurir+'</strong> <br/> Rp. '+getrecords[$i].biaya+'</label></div>');
        }
        $('input[value="0"]').prop("checked", true);
        $kurir_biaya = $('input[name="kurir"]:checked').attr('biaya');
        $('.kurir_biaya').html($kurir_biaya);
        $dummy=$grand_total;
        $grand_total+=parseInt($kurir_biaya);
        $('.grand_total').html($grand_total);
    }
});       

$.ajax({ 
    type: 'GET', 
    url: 'api/user-detailed.php?user_id='+$user_id, 
    data: { get_param: 'record_of_user' }, 
    dataType: 'json',
    success: function (data) { 
        var getrecords = data['record_of_user'];
        // console.log(getrecords);
        $('textarea#shipping_adress').html(getrecords[0].alamat+', '+getrecords[0].kode_pos);
    }
});

$('#jump_button').click(function(){
    var note=$('textarea[name="note"]').val();
    if(note == ''){
        note='Tidak ada catatan';
    }
    var shipping_service=$('input[name="kurir"]:checked').val();
    var item=$catch;

    var formData = {catatan: note, kurir_id: shipping_service, user_id: $user_id, total_belanja: $total_belanja, grand_total: $grand_total, session_item: $catch};
    $.ajax({
        type: 'POST', 
        url: 'checkout-post.php', 
        data: formData, 
        dataType: 'text',
        success: function(data){ 
            console.log(data);
        },
        error: function(exception){
            console.log(exception);
        }
    });

    $('.step0').html('Shipping Information');
    $('.step1').html('<strong>Shopping Finished</strong>');
    $('#shipping_information').hide();
    $('#shopping_finished').show();
});