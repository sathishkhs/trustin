$(document).ready(function(){
    
$('#eventsform').validate({
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
          tshirt : "required"
    },
    messages: {
        name: "Please enter your Name",
        gender: "Please select Gender",
        tshirt: "Please select T-shirt Size",
        phone: {
          required: "Please enter Phone number",
          minlength: "Your Phone number must be at least 10 digits long",
          maxlength: "Your phone number must not exceed 12 digits including country code"
        },
        email: "Please enter a valid email address"
      },
      submitHandler: function() {
            pinkathon_submit()
}
});
})

function pinkathon_submit(){
    //   $('#appointment-form').submit(function(e){
    //     e.preventDefault();
        
          $('#pinkathon-form').html('<h4 style="color:#d84d90">Sorry registrations has been closed. For any queries or added information, please call us at 080 45174949.</h4>')
        
        
        // var actionURL = 'index/marathon_save';
        // var name = $('#name').val();
        // var email = $('#email').val();
        // var phone = $('#phone').val();
        // var age = $('#age').val();
      
        // var address = $('#address').val();
        // var gender = $('#gender').val();
        // var tshirt = $('#tshirt').val();

        // $.ajax({
        //       url:actionURL,
        //       method:"POST",
        //       data:{name:name,email:email,phone:phone,address:address,gender:gender,tshirt:tshirt,age:age},
        //       success:function(data){
        //               if(data == 1){
        //             $('#pinkathon-form').html('<h4 style="color:#d84d90">Thank you for registering for Trust-in run. Your participation will certainly help in creating awareness about breast cancer. We look forward to running together on Sunday, 14th November 2021 at 7:00 a.m. Together, let’s make a difference! For any queries or added information, please call us at 080 45174949.</h4>')
        //                   }else if(data == 0){
        //                     $('.appoinment-form').html('<h4 style="color:#d84d90">Sorry Registration failed. Please try again.</h4>')
        //                       }
        //                   }
        //                 });
                      
    }