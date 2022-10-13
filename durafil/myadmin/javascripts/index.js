$(document).ready(function(){
$('#regenrateotp').validate({
        debug: false,       
        submitHandler: function () {
            $("#regenrateotp .spam-message").show();
			$("#loading_overlay").show();
            $.post("index/regenrateotp", $("#regenrateotp").serialize(), function (data) {                                    
                if (data == 1) {
                    $("#regenrateotp .spam-message").css('color', '#3F51B5');
                    $("#regenrateotp .spam-message").show();
                    $("#regenrateotp .spam-message").html('OTP has been resent successful').fadeOut(15000);
                    $("#newsletter_email").val('');
					$("#loading_overlay").hide();
                } else if (data == 2) {
                    $("#regenrateotp .spam-message").css('color', '#f57272');
                    $("#regenrateotp .spam-message").show();
                    $("#regenrateotp .spam-message").html('Oopps! Please try again').fadeOut(15000);
					$("#loading_overlay").hide();
                }else {
                    $("#regenrateotp .spam-message").css('color', '#f57272');
                    $("#regenrateotp .spam-message").show();
                    $("#regenrateotp .spam-message").html('Enter valid Email!').fadeOut(15000);
					$("#loading_overlay").hide();
                }
            });
        }

    });
});