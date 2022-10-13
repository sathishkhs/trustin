<section class="content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <form class="form-horizontal" action="specialities/save" method="post" enctype="multipart/form-data">
                            <input name="speciality_id" type="hidden" value="<?php echo (!empty($query->speciality_id)) ? $query->speciality_id : ''; ?>" />
                            <br />
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Speciality Name </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('speciality_name'); ?></span>
                                    <input name="speciality_name" id="speciality_name" type="text" class="form-control" value="<?php echo (!empty($query->speciality_name)) ? $query->speciality_name : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-3">Speciality Image</label>
                                <div class="col-sm-<?php echo !empty($query->image_path) ? 8 : 10 ?>">
                                    <span class="eror"><?php echo form_error('image_path'); ?></span>
                                    <input name="image_path" type="file" class="form-control" value="" />
                                    <p class="custom-msg">Image size Should be 1350px width and 300px height</p>
                                </div>
                                <?php if (!empty($query->image_path)) { ?>
                                    <div class="col-sm-2">
                                        <img src="<?php echo SPECIALITIES_UPLOAD_PATH_THUMB . $query->image_path; ?>" width="80px" height="80px">
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-5">Speciality Content</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('speciality_content'); ?></span>
                                    <textarea name="speciality_content" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->speciality_content)) ? $query->speciality_content : ''; ?>  </textarea>
                                </div>
                            </div>
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Facilities<span class="eror"><?php echo form_error('speciality_id'); ?></span></label>
								<div class="col-sm-10">
									<select class="form-control" name="facilities_id[]" id="facilities_id" multiple>
										<option value="">Select Facility</option>
										<?php foreach ($facilities as $row) : ?>
                                            <option value="<?php echo $row->facilities_id; ?>" <?php echo (!empty($query->facilities_id) && in_array($row->facilities_id, $query->facilities_id)) ? 'selected' : ''; ?>><?php echo $row->facility_name; ?></option>
                                        <?php endforeach ?>
									</select>
								</div>
							</div>

                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-6">Speciality Slug</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('speciality_slug'); ?></span>
                                    <input name="speciality_slug" id="speciality_slug" type="text" class="form-control" value="<?php echo (!empty($query->speciality_slug)) ? $query->speciality_slug : ''; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-8">Status</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('status_ind'); ?></span>
                                    <input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
                                    <span class="label label-success">Publish</span>
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    <input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                                    <span class="label label-danger">Unpublish</span>
                                </div>
                            </div>
                            <hr>
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
                                <a href="specialities">
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