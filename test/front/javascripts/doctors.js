$(document).ready(function () {
    $( "#search_doctor" ).autocomplete({
        
        source: function( request, response ) {
          
            $.ajax({
                url: "doctors/search_doctor/"+request.term,
                type: "POST",
                dataType: "json",
                success: function( data ) {
                    response( data );
                }
            });
        },
        minLength:3,
        select : function(event,ui){
            window.location = 'doctors/'+ui.item.value;
        }
    });
    $("#search_doctor").autocomplete({
        source: "doctors/search_doctor",
        
    });
})



function appointment(val) {
    $.ajax({
        url: 'doctors/filter_doctors/' + val,
        type: 'POST',
        data: {
            speciality_id: val
        },
        // beforeSend:function(){
        //     $('#list-doctors').html("<span>Loading....</span>");
        // },
        success: function (data) {
            $("#list-doctors").html(data)
        }
    })
}

