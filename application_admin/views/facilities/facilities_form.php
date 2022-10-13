<section class="content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <form class="form-horizontal" method="post" id="facility_form" name="facility_form" action="facilities/save" enctype="multipart/form-data">
                            <input type="hidden" name="facilities_id" value="<?php echo (!empty($query->facilities_id)) ? $query->facilities_id : "" ?>" />

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-2">Facility Name <span class="eror"><?php echo form_error('doctor_qualification'); ?></span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="facility_name" id="facility_name" class="form-control" placeholder="Facility Name" value="<?php echo (!empty($query->facility_name)) ? $query->facility_name : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-3">Facility icon (jpg, png, jpeg)<span class="eror"><?php echo form_error('icon_image'); ?></span></label>
                                <div class="col-sm-<?php echo !empty($query->icon_image) ? 8 : 10 ?>">
                                    <input name="icon_image" type="file" class="form-control" value="" />
                                </div>
                                <?php if (!empty($query->icon_image)) { ?>
                                    <div class="col-sm-2">
                                        <img src="<?php echo FACILITIES_ICON_UPLOAD_PATH . $query->icon_image; ?>" width="80px" height="80px">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-2">Display Order <span class="eror"><?php echo form_error('display_order'); ?></span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="display_order" id="display_order" class="form-control" placeholder="Display Order" value="<?php echo (!empty($query->display_order)) ? $query->display_order : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-8">Status<span class="eror"><?php echo form_error('status_ind'); ?></span></label>
                                <div class="col-sm-10">
                                    <input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
                                    <span class="label label-success">Publish</span>
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    <input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                                    <span class="label label-danger">Unpublish</span>
                                </div>
                            </div>
                            <div class="form-actions form-btns">
                                <button class="btn btn-round btn-success" type="submit">
                                    <i class="fa fa-check"></i>
                                    Save
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button class="btn btn-round btn-default" type="reset">
                                    <i class="fa fa-refresh"></i>
                                    Reset
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <a href="facilities">
                                    <button class="btn btn-warning btn-round" type="button">
                                        <i class="fa fa-times"></i>
                                        Back
                                    </button></a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</section>