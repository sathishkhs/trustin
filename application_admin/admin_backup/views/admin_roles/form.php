<section class="content">
  <section class="wrapper">  	
     <div class="row">
		<div class="col-md-12">
           <div class="box box-info">
	          <div class="box-header with-border">
            <form class="form-horizontal" action="admin-roles/save" method="post">
                <input name="role_id" type="hidden" value="<?php echo (!empty($query->role_id)) ? $query->role_id : ''; ?>"  />
                <div class="form-group">
                    <label class="control-label col-sm-2 col-md-2" for="form-field-1">Admin Roles Name<span class="error"><?php echo form_error('role_name'); ?></span> </label>
                    <div class="col-sm-10">
                        <input class="form-control" name="role_name" type="text"  value="<?php echo (!empty($query->role_name)) ? $query->role_name : ''; ?>"  />
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-sm-2 col-md-2" for="form-field-1">Admin Roles Display<span class="error"><?php echo form_error('admin_disp'); ?></span> </label>
                      <div class="col-sm-10 sol-md-10">
                        <span class="error"><?php echo form_error('admin_disp'); ?></span>
                        <input name="admin_disp" value="1" type="radio"  <?php echo (!empty($query->admin_disp)) ? 'checked' : ''; ?>/>
                        <span class="label label-success">Display</span>
                        &nbsp; &nbsp; &nbsp;&nbsp;
                        <input name="admin_disp" value="0" type="radio" <?php echo (empty($query->admin_disp)) ? 'checked' : ''; ?> />
                        <span class="label label-danger">Hide</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="form-field-1">Status</label>
                    <div class="col-sm-10 sol-md-10">
                        <span class="error"><?php echo form_error('status_ind'); ?></span>
                        <input name="status_ind" value="1" type="radio"  <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?>/>
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
                    <a href="admin-roles"> 
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