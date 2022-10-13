$(document).ready(function () {
    /*Submenu active and who when you are that page code beging here*/
    $(".menu-item-has-children.active").addClass('show');
    $(".menu-item-has-children.active .dropdown-menu").addClass('show');
    /*Submenu active and who when you are that page code end here*/
});

/* Dropdown multi select code end here*/
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function isPhoneNumber(evt)
{
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode;

    if (iKeyCode != 32 && iKeyCode != 45 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}
function isFloat(evt)
{
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode;
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}
$(document).ready(function () {
    $(".cboxElement").colorbox({rel: 'cboxElement'});
    $(document).on('click', 'button[title="Delete"]', function () {
        return confirm('Are you sure to delete?');
    })

    $(document).on('click', 'a[title="Delete"]', function () {
        return confirm('Are you sure to delete?');
    });

    //CKEDITOR START
    var ckConfig = {
        filebrowserBrowseUrl: '../includes/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '../includes/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: '../includes/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: '../includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '../includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '../includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    }
    
    // Load from the 'pastefromword' plugin 'filter' sub folder (custom.js file) using a path relative to the CKEditor installation folder.
CKEDITOR.config.pasteFromWordCleanupFile = '../includes/ckfinder/plugins/pastefromword/filter/custom.js';

// Load from the 'pastefromword' plugin 'filter' sub folder (custom.js file) using a full path (including the CKEditor installation folder).
//CKEDITOR.config.pasteFromWordCleanupFile = '/ckeditor/plugins/pastefromword/filter/custom.js';

// Load custom.js file from the 'customFilters' folder (located in server's root) using the full URL.
//CKEDITOR.config.pasteFromWordCleanupFile = 'http://my.example.com/customFilters/custom.js';

    $('.ckeditor').each(function () {
        var currentInatance = $(this).attr('id');
        var editor = CKEDITOR.replace(currentInatance, ckConfig);
        CKFinder.setupCKEditor(editor, '../');
    });
    //CKEDITOR END*/

});
