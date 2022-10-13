$(document).ready(function() {
    $(".cboxElement").colorbox({iframe: false, width: "90%", height: "90%"});

    $("#page_title").change(function() {
        $.getJSON('ajax/getslug/Pages_model/page_slug/' + fixedEncodeURIComponent($(this).val()), function(data) {
            $("#" + data.field_id).val(data.field_val);
        });
    });
    function fixedEncodeURIComponent(str) {
        return str.replace(/[^\w\s]/gi, '').replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    }

    $("#type_id").change(function() {
        if ($(this).val() == 1) {
            $(".home-page-widgets").show();
        } else {
            $(".home-page-widgets").hide();
        }
    });

    if ($('#type_id').val() == 1) {
        $(".home-page-widgets").show();
    } else {
        $(".home-page-widgets").hide();
    }

    /*$("#template_id").change(function() {
        if ($(this).val() == 3) {
            $(".sidebarmenu").show();
            $(".widgets").show();
        } else {
            $(".sidebarmenu").hide();
            $(".widgets").hide();
        }
    });
    if ($('#template_id').val() == 3) {
     $(".sidebarmenu").show();
     $(".widgets").show();
     } else {
     $(".sidebarmenu").hide();
     $(".widgets").hide();
     }*/

})

//CKEDITOR START
var ckConfig_2 = {
    filebrowserBrowseUrl: '../includes/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '../includes/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: '../includes/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl: '../includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '../includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: '../includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
}

function reloadckeditor(newid) {
    //CKEDITOR START
    var currentInatance = newid; //$(this).attr('id');
    var editor = CKEDITOR.replace(currentInatance, ckConfig_2);
    CKFinder.setupCKEditor(editor, '../');
    //CKEDITOR END
}