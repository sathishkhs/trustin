$(document).ready(function(){
    
$('#women_health_camp_form').validate({
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
          gender: "required",
          age: "required",
          
          
    },
    messages: {
        name: "Please enter your Name",
        gender: "Please select Gender",
       
        phone: {
          required: "Please enter Phone number",
          minlength: "Your Phone number must be at least 10 digits long",
          maxlength: "Your phone number must not exceed 12 digits including country code"
        },
        email: "Please enter a valid email address",
       
        age: "Please enter your age"
      },
      submitHandler: function() {
            women_health_camp_submit();
}
});
})

function women_health_camp_submit(){
    //   $('#appointment-form').submit(function(e){
    //     e.preventDefault();
        
        var actionURL = 'index/women_health_camp_save';
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var age = $('#age').val();
      
        var message = $('#message').val();
        var gender = $('#gender').val();
        var appointment_date = $('#appointment_date').val();

        $.ajax({
              url:actionURL,
              method:"POST",
              data:{name:name,email:email,phone:phone,message:message,gender:gender,appointment_date:appointment_date,age:age},
              success:function(data){
                      if(data == 1){
                    $('#women-health-camp-form').html('<h4 style="color:#d84d90">Thank you for Participating in Women Health Camp. For more information contact us.</h4>')
                          }else if(data == 0){
                            $('#women-health-camp-form').html('<h4 style="color:#d84d90">Sorry Registration failed. Please try again.</h4>')
                              }
                          }
                        });
                        // });
    }