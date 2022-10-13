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
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-3">Speciality Icon</label>
                                <div class="col-sm-<?php echo !empty($query->icon_path) ? 8 : 10 ?>">
                                    <span class="eror"><?php echo form_error('icon_path'); ?></span>
                                    <input name="icon_path" type="file" class="form-control" value="" />
                                    <p class="custom-msg">Image size Should be 85px width and 85px height</p>
                                </div>
                                <?php if (!empty($query->icon_path)) { ?>
                                    <div class="col-sm-2">
                                        <img src="<?php echo SPECIALITIES_ICON_UPLOAD_PATH . $query->icon_path; ?>" width="80px" height="80px">
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-3">Speciality Baanner Image</label>
                                <div class="col-sm-<?php echo !empty($query->image_path) ? 8 : 10 ?>">
                                    <span class="eror"><?php echo form_error('image_path'); ?></span>
                                    <input name="image_path" type="file" class="form-control" value="" />
                                    <p class="custom-msg">Image size Should be 1350px width and 300px height</p>
                                </div>
                                <?php if (!empty($query->image_path)) { ?>
                                    <div class="col-sm-2">
                                        <img src="<?php echo SPECIALITIES_UPLOAD_PATH . $query->image_path; ?>" width="80px" height="80px">
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
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Facilities</label>
								<div class="col-sm-10">
								    <span class="eror"><?php echo form_error('speciality_id'); ?></span>
									<select class="form-control" name="facilities_id[]" id="facilities_id" multiple style="height: 280px">
										<option value="">Select Facility</option>
										<?php foreach ($facilities as $row) : ?>
                                            <option value="<?php echo $row->facilities_id; ?>" <?php echo (!empty($query->facilities_id) && in_array($row->facilities_id, $query->facilities_id)) ? 'selected' : ''; ?>><?php echo $row->facility_name; ?></option>
                                        <?php endforeach ?>
									</select>
								</div>
							</div>

                            <hr>
                            
                             <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Meta Title</label>
								<div class="col-sm-10">
									<input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="<?php echo (!empty($query->meta_title)) ? $query->meta_title : '' ?>">
								</div>
							</div>
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Meta Description</label>
								<div class="col-sm-10">
									<textarea type="text" name="meta_description" id="meta_description" class="form-control" placeholder="Meta Description"><?php echo (!empty($query->meta_description)) ? $query->meta_description : '' ?></textarea>
								</div>
							</div>
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Meta Keywords</label>
								<div class="col-sm-10">
									<input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Meta Keywords" value="<?php echo (!empty($query->meta_keywords)) ? $query->meta_keywords : '' ?>">
								</div>
							</div>
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Other Meta Tags</label>
								<div class="col-sm-10">
									<input type="text" name="other_meta_tags" id="other_meta_tags" class="form-control" placeholder="Other Meta Tags" value="<?php echo (!empty($query->other_meta_tags)) ? $query->other_meta_tags : '' ?>">
								</div>
							</div>
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">No Follow Tag</label>
								<div class="col-sm-10">
									<label class="radiobuttons"><input name="nofollow_ind" value="1" type="radio" <?php echo (!empty($query->nofollow_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">Yes</span></label>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <label class="radiobuttons"><input name="nofollow_ind" value="0" type="radio" <?php echo (empty($query->nofollow_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">No</span></label>
								</div>
							</div>
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">No Index Tag</label>
								<div class="col-sm-10">
								  <label class="radiobuttons"><input name="noindex_ind" value="1" type="radio" <?php echo (!empty($query->noindex_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">Yes</span></label>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <label class="radiobuttons"><input name="noindex_ind" value="0" type="radio" <?php echo (empty($query->noindex_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">No</span></label>
								</div>
							</div>
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Add Canonical URL</label>
								<div class="col-sm-10">
									<input type="text" name="canonical_url" id="canonical_url" class="form-control" placeholder="Add Canonical URL" value="<?php echo (!empty($query->canonical_url)) ? $query->canonical_url : '' ?>">
								</div>
							</div>
                            
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Redirection Link</label>
								<div class="col-sm-10">
									<input type="text" name="redirection_link" id="redirection_link" class="form-control" placeholder="Redirection Link" value="<?php echo (!empty($query->redirection_link)) ? $query->redirection_link : '' ?>">
								</div>
							</div>
                
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