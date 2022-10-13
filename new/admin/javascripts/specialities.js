$(document).ready(function() {

    $("#speciality_name").change(function() {
        $.getJSON('ajax/getslug/specialities_model/speciality_slug/' + $(this).val(), function(data) {
            $("#" + data.field_id).val(data.field_val);
        });
    });
});


function addNewIcon() {
    var no_of_images = parseInt($("#no_of_images").val()) + 1;
    var form_html = '';
    form_html += '<div class="col-xs-2 col-sm-2 col-md-2"></div>';
    form_html += '<div class="form-group">';
    form_html += '<div class="col-xs-3 col-sm-3 col-md-3">';
    form_html += '<label for="">Icon Image ' + no_of_images + '</label>';
    form_html += '<input type="file" name="icon_image[]" id="icon_image" class="form-control" placeholder="Image" value="">';
    form_html += '<p class="custom-msg">Image size 100*80 px width and height</p>';
    form_html += '</div>';
    form_html += '<div class="col-xs-3 col-sm-3 col-md-3">';
    form_html += '<label for="">Icon Image link ' + no_of_images + '</label>';
    form_html += '<input type="text" name="icon_url[]" id="icon_url" class="form-control" placeholder="Image Link" value="">'
    form_html += '</div>';
    form_html += '<div class="col-xs-3 col-sm-3 col-md-3">';
    form_html += '<label for="">Icon Text ' + no_of_images + '</label>';
    form_html += '<input type="text" name="icon_text[]" id="icon_text" class="form-control" placeholder="Title" value="">';
    form_html += '</div>';
    form_html += '</div>';
    $(".image-gallery").append(form_html);
    $("#no_of_images").val(no_of_images);
    //$(".add-passport-details").html(traveller_form_html);
}