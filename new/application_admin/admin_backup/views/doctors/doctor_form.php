<section class="content">
	<section class="wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<form class="form-horizontal" action="doctors/save" method="post" enctype="multipart/form-data">
							<input name="doctors_id" type="hidden" value="<?php echo (!empty($query->doctors_id)) ? $query->doctors_id : ''; ?>" />
							<br />
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-1">Doctor Name <span class="eror"><?php echo form_error('doctor_name'); ?></span></label>
								<div class="col-sm-10">
									<input name="doctor_name" id="doctor_name" type="text" class="form-control" onkeyup="getslug(this.value)" value="<?php echo (!empty($query->doctor_name)) ? $query->doctor_name : ''; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-2">Doctor Qualification <span class="eror"><?php echo form_error('doctor_qualification'); ?></span></label>
								<div class="col-sm-10">
									<input name="doctor_qualification" type="text" class="form-control" value="<?php echo (!empty($query->doctor_qualification)) ? $query->doctor_qualification : ''; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-3">Doctor Job<span class="eror"><?php echo form_error('doctor_role'); ?></span></label>
								<div class="col-sm-10">
									<input name="doctor_role" type="text" class="form-control" value="<?php echo (!empty($query->doctor_role)) ? $query->doctor_role : ''; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-5">About Doctor<span class="eror"><?php echo form_error('about_doctor'); ?></span></label>
								<div class="col-sm-10">
									<textarea name="about_doctor" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->about_doctor)) ? $query->about_doctor : ''; ?>  </textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-3">Doctor Image<span class="eror"><?php echo form_error('doctor_image'); ?></span></label>
								<div class="col-sm-<?php echo !empty($query->doctor_image) ? 8 : 10 ?>">
									<input name="doctor_image" type="file" class="form-control" value="" />
								</div>
								<?php if (!empty($query->doctor_image)) { ?>
									<div class="col-sm-2">
										<img src="<?php echo DOCTOR_IMAGE_PATH . $query->doctor_image; ?>" width="80px" height="80px">
									</div>
								<?php } ?>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-3">Display Image<span class="eror"><?php echo form_error('banner_image'); ?></span></label>
								<div class="col-sm-<?php echo !empty($query->banner_image) ? 8 : 10 ?>">
									<input name="banner_image" type="file" class="form-control" value="" />
								</div>
								<?php if (!empty($query->banner_image)) { ?>
									<div class="col-sm-2">
										<img src="<?php echo BANNER_IMAGE_PATH . $query->banner_image; ?>" width="80px" height="80px">
									</div>
								<?php } ?>
							</div>

							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-5">Areas of expertise<span class="eror"><?php echo form_error('areas_of_expertise_text'); ?></span></label>
								<div class="col-sm-10">
									<textarea name="areas_of_expertise_text" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->areas_of_expertise_text)) ? $query->areas_of_expertise_text : ''; ?>  </textarea>
									<small style="color:red">Note: For &lt;ul&gt; tag use 'lister' class. </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-5">Work Expertise<span class="eror"><?php echo form_error('areas_of_expertise_text'); ?></span></label>
								<div class="col-sm-10">
									<textarea name="work_expertise_text" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->work_expertise_text)) ? $query->work_expertise_text : ''; ?>  </textarea>
									<small style="color:red">Note: For &lt;ul&gt; tag use 'lister' class. </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-5">Qualification <span class="eror"><?php echo form_error('qualification_text'); ?></span></label>
								<div class="col-sm-10">
									<textarea name="qualification_text" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->qualification_text)) ? $query->qualification_text : ''; ?>  </textarea>
									<small style="color:red">Note: For &lt;ul&gt; tag use 'lister' class. </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-5">Honours<span class="eror"><?php echo form_error('honours_text'); ?></span></label>
								<div class="col-sm-10">
									<textarea name="honours_text" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->honours_text)) ? $query->honours_text : ''; ?>  </textarea>
									<small style="color:red">Note: For &lt;ul&gt; tag use 'lister' class. </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-5">Membership<span class="eror"><?php echo form_error('membership_text'); ?></span></label>
								<div class="col-sm-10">
									<textarea name="membership_text" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->membership_text)) ? $query->membership_text : ''; ?>  </textarea>
									<small style="color:red">Note: For &lt;ul&gt; tag use 'lister' class. </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-5">Paper, Poster & Video Presentations<span class="eror"><?php echo form_error('presentations_text'); ?></span></label>
								<div class="col-sm-10">
									<textarea name="presentations_text" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->presentations_text)) ? $query->presentations_text : ''; ?>  </textarea>
									<small style="color:red">Note: For &lt;ul&gt; tag use 'lister' class. </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-5">Publications<span class="eror"><?php echo form_error('publications_text'); ?></span></label>
								<div class="col-sm-10">
									<textarea name="publications_text" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->publications_text)) ? $query->publications_text : ''; ?>  </textarea>
									<small style="color:red">Note: For &lt;ul&gt; tag use 'lister' class. </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Specialities<span class="eror"><?php echo form_error('speciality_id'); ?></span></label>
								<div class="col-sm-10">
									<select class="form-control" name="speciality_id" id="speciality_id">
										<option value="">Select Speciality</option>
										<!-- <option value='1' <?php echo !empty($query->speciality_id) && $query->speciality_id == 1 ? 'selected' : ''; ?>> Oncology</option> >
										<option value='2' <?php echo !empty($query->speciality_id) && $query->speciality_id == 2 ? 'selected' : ''; ?>> Dermatology</option> > -->
										<?php foreach ($specialities as $row) : ?>
                                <option value="<?php echo $row->speciality_id; ?>" <?php echo (!empty($query->speciality_id) && $row->speciality_id == $query->speciality_id) ? 'selected' : ''; ?>><?php echo $row->speciality_name; ?></option>
                                <?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Page Type<span class="eror"><?php echo form_error('speciality_id'); ?></span></label>
								<div class="col-sm-10">
									<select class="form-control" name="type_id" id="type_id">
										<option value="">-- Page Type --</option>
										<?php foreach ($page_type as $row) : ?>
											<option value="<?php echo $row->type_id; ?>" <?php echo (!empty($query->type_id) && $row->type_id == $query->type_id) ? 'selected' : ''; ?>><?php echo $row->type_name; ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Template<span class="eror"><?php echo form_error('speciality_id'); ?></span></label>
								<div class="col-sm-10">
								<select name="template_id" id="template_id" class="form-control" data-validation="required" required>
                                            <option value="">-- Template Type --</option>
                                            <?php foreach ($templates as $row) : ?>
                                                <option value="<?php echo $row->template_id; ?>" <?php echo (!empty($query->template_id) && $row->template_id == $query->template_id) ? 'selected' : ''; ?>><?php echo $row->template_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-6">Page Slug<span class="eror"><?php echo form_error('page_slug'); ?></span></label>
								<div class="col-sm-10">
									<input name="page_slug" id="page_slug" type="text" class="form-control" value="<?php echo (!empty($query->page_slug)) ? $query->page_slug : ''; ?>" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-1">Facebook Link<span class="eror"><?php echo form_error('facebook_link'); ?></span></label>
								<div class="col-sm-10">
									<input name="facebook_link" type="text" class="form-control" placeholder="Doctor's Facebook Profile Link" value="<?php echo (!empty($query->facebook_link)) ? $query->facebook_link : ''; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-1">Twitter Link<span class="eror"><?php echo form_error('twitter_link'); ?></span></label>
								<div class="col-sm-10">
									<input name="twitter_link" type="text" class="form-control" placeholder="Doctor's Twitter Profile Link" value="<?php echo (!empty($query->twitter_link)) ? $query->twitter_link : ''; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-1">Linkedin Link<span class="eror"><?php echo form_error('linkedin_link'); ?></span></label>
								<div class="col-sm-10">
									<input name="linkedin_link" type="text" class="form-control" placeholder="Doctor's Linkedin Profile Link" value="<?php echo (!empty($query->linkedin_link)) ? $query->linkedin_link : ''; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-1">Instagram Link<span class="eror"><?php echo form_error('instagram_link'); ?></span></label>
								<div class="col-sm-10">
									<input name="instagram_link" type="text" class="form-control" placeholder="Doctor's Instagram Profile Link" value="<?php echo (!empty($query->instagram_link)) ? $query->instagram_link : ''; ?>" />
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
								<a href="admin-users">
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