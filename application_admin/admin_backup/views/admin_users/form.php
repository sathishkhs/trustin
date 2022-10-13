<section class="content">
  <section class="wrapper">  	
     <div class="row">
		<div class="col-md-12">
           <div class="box box-info">
	          <div class="box-header with-border">
            	<form class="form-horizontal" action="admin-users/save" method="post" enctype="multipart/form-data">
            		<input name="user_id" type="hidden" value="<?php echo (!empty($query->user_id)) ? $query->user_id : ''; ?>"  />
                	<br/>
		                <div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" for="form-field-1">First Name <span class="eror"><?php echo form_error('first_name'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		<input name="first_name" type="text" class="form-control" value="<?php echo (!empty($query->first_name)) ? $query->first_name : ''; ?>"  />
		  						</div>
		               	</div>
		               	<div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" for="form-field-2">Last Name <span class="eror"><?php echo form_error('last_name'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		<input name="last_name" type="text" class="form-control" value="<?php echo (!empty($query->last_name)) ? $query->last_name : ''; ?>"  />
		  						</div>
		               	</div>
		               	<div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" for="form-field-3">Email<span class="eror"><?php echo form_error('email'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		<input name="email" type="text"  class="form-control" value="<?php echo (!empty($query->email)) ? $query->email : ''; ?>"  />
		  						</div>
		               	</div>
		               	<div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" for="form-field-4">User Role<span class="eror"><?php echo form_error('role_id'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		 <select class="form-control" name="role_id" id="role_id" >
		                        	<option value="" >Select User Role</option>
                            		<?php foreach ($usersrole as $row): ?>
                                	<option value="<?php echo $row->role_id; ?>" <?php echo (!empty($query->role_id) && $row->role_id == $query->role_id) ? 'selected' : ''; ?>><?php echo $row->role_name; ?></option>
                            		<?php endforeach ?>
                       				 </select>
		  						</div>
		               	</div>
		               	<div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" for="form-field-5">User Name<span class="eror"><?php echo form_error('username'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		 <input name="username" type="text"  class="form-control" value="<?php echo (!empty($query->username)) ? $query->username : ''; ?>"  />
		  						</div>
		               	</div>
		               	<div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" for="form-field-6">Password<span class="eror"><?php echo form_error('password'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		<input name="password" type="text"  class="form-control" value="<?php echo (!empty($query->password)) ? $query->password : ''; ?>"  />
		  						</div>
		               	</div>
		               	<div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" for="form-field-7">Confirm Password<span class="eror"><?php echo form_error('password'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		 <input name="confirm_password" type="text"  class="form-control" value="<?php echo (!empty($query->password)) ? $query->password : ''; ?>"  />
		  						</div>
		               	</div>
		               	<div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" for="form-field-8">Status<span class="eror"><?php echo form_error('status_ind'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		<input name="status_ind"  value="1" type="radio"  <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?>/>
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