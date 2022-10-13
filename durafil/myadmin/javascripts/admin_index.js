$(document).ready(function () {
    $('#pagelist').DataTable( {
        "lengthMenu": [[100, 150, 200, -1], [100, 150, 200, "All"]]
    } );
    
     $('#datetimepicker1, #datetimepicker2').datetimepicker({
        /*defaultDate: "11-1-2013",
         disabledDates: [
         moment("12/25/2013"),
         new Date(2013, 11 - 1, 21),
         "11/22/2013 00:53"
         ],*/
        format: 'YYYY-MM-DD',
        sideBySide: true,
        //format: 'YYYY-MM-DD HH:MM',
    });
});