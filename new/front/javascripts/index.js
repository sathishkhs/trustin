$(document).ready(function(){
    
    $('.doctors-carousels').owlCarousel({
				nav:false,
				margin:30,
				//loop:true,
				slideBy:'page',
				rewind:false,
				responsive:{
					0:{items:1},
					480:{items:2},
					600:{items:3},
					1000:{items:4}
				},
				smartSpeed:70,
			});

 
$('#appointmentform').validate({
    rules: {
        name : "required",
        phone : {
            required : true,
            minlength: 10,
            maxlength: 12
        },
        email: {
            required: true,
            // Specify that email should be validated
            // by the built-in "email" rule
            email: true
          },
          speciality_id: "required",
          doctors_id : "required"
    },
    messages: {
        name: "Please enter your Name",
        email: "Please enter your Email",
        speciality_id: "Please select Speciality",
        doctors_id: "Please select Doctor",
        email: "Please enter your Email",
        phone: {
          required: "Please enter Phone number",
          minlength: "Your Phone number must be at least 10 digits long",
          maxlength: "Your phone number must not exceed 12 digits including country code"
        },
        email: "Please enter a valid email address"
      },
      submitHandler: function() {
            form_submit()
}
});

$('#contactform').validate({
    rules: {
        name : "required",
       
        email: {
            required: true,
            // Specify that email should be validated
            // by the built-in "email" rule
            email: true
          },
    },
    messages: {
        name: "Please enter your Name",
        email: "Please enter your Email",
        email: "Please enter a valid email address"
      },
      submitHandler: function() {
            contact_submit()
}
});


                });
                
                function form_submit(){
                    //   $('#appointment-form').submit(function(e){
                    //     e.preventDefault();
                        
                        var actionURL = 'index/appointment';
                        var name = $('#name').val();
                        var email = $('#email').val();
                        var phone = $('#phone').val();
                        var appointment_date = $('#appointment_date').val();
                        var appointment_time = $('#appointment_time').val();
                        var message = $('#message').val();
                        var speciality_id = $('#speciality_id').val();
                        var doctors_id = $('#doctors_id').val();
                
                        $.ajax({
                              url:actionURL,
                              method:"POST",
                              data:{name:name,email:email,phone:phone,appointment_date:appointment_date,appointment_time:appointment_time,message:message,speciality_id:speciality_id,doctors_id:doctors_id},
                              success:function(data){
                                      if(data == 1){
                                    $('.appoinment-form').html('<h4 style="color:white">Form submission successful. Our support team will get in touch with you please be patience.</h4>')
                                          }else if(data == 0){
                                            $('.appoinment-form').html('<h4 style="color:white">Sorry Form submission failed. Please try again.</h4>')
                                              }
                                          }
                                        });
                                        // });
                    }
                    
                  
    function contact_submit(){
    //   $('#appointment-form').submit(function(e){
    //     e.preventDefault();
        
        var actionURL = 'index/contact';
        var name = $('#yourname').val();
        var email = $('#youremail').val();
     
        var message = $('#yourmessage').val();

        $.ajax({
              url:actionURL,
              method:"POST",
              data:{name:name,email:email,message:message},
              success:function(data){
                      if(data == 1){
                    $('.contact-form').html('<h4 style="color:white">Form submission successful. Our support team will get in touch with you please be patience.</h4>')
                      }else if(data == 0){
                        $('.contact-form').html('<h4 style="color:white">Sorry Form submission failed. Please try again.</h4>')
                      }
                          }
                        });
                        // });
    }
    
                    
    function appointment(val){
        $.getJSON('index/get_doctors/'+val,function(data){
            $('#doctors_id').html(data);
        })
    }