$(document).ready( function () {

    $('#doctors_table').DataTable({
        columns: [
            { title: "Name" },
            { title: "Position" },
            { title: "Office" },
            { title: "Extn." },
            { title: "Start date" },
            { title: "Salary" }
        ] 
    });
    
} );
   function getslug(val){
        $.getJSON('ajax/getslug/doctors_model/page_slug/' + val, function(data) {
            $("#" + data.field_id).val(data.field_val);
        });
    }