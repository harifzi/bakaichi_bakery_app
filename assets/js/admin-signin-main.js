  jQuery(document).ready(function($) {


$('.re-passowrd').length && 
	$('.re-passowrd').hide();
	$(".sign-toggle").click(function(){
		$(".re-passowrd").toggle(500);
		
		 if ($('.button-submit,.signin-submit').val() == "Login") {
            $('.button-submit,.signin-submit').val("Create account");
        } 
        else
        {
        	$('.button-submit,.signin-submit').val("Login");

        }

       if ($('.accounttext span').text() == "Don’t have account?") {
            $('.accounttext span').text("Already have account?");
        } 
        else
        {
        	$('.accounttext span').text("Don’t have account?");
        	
        }



        if ($('.sign-toggle').val() == "Register") {
            $('.sign-toggle').val("Login");
        } 
        else
        {
        	$('.sign-toggle').val("Register");
        	
        }

	    if ($(".login-box h3").text() == 'Register') {
	         $(".login-box h3").text('Login');
			
	    }
	    else {
	        $(".login-box h3").text('Register');
	    }

	

});

$('.checkbox').length && $('input').iCheck();


});



