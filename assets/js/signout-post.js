$('#signout').click(function(){
	$.ajax({
        type: "POST",
        url: "signout-post.php",
        success: function(data){
            // window.location = "signin.php";
            console.log(data);
        },
        error: function(exception) {
            console.log(exception);
        }
    });
});