<section class="content">
  <section class="wrapper">
    <div class="row">
        <div class="col-sm-12 col-md-12">
        	<div class="box box-info">
	          <div class="box-header with-border">
        	<div class="content-panel">
            <?php
            $msg = $this->session->flashdata('msg');
            if (!empty($msg['txt'])):
                ?>
                <div class="alert alert-block alert-<?php echo $msg['type']; ?>">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="icon-remove"></i>
                    </button>
                    <i class="<?php echo $msg['icon']; ?>"></i>
                    <?php echo $msg['txt']; ?>
                </div>
            <?php endif ?>
            <form class="form-horizontal" action="profile" method="post">
                <input name="user_id" type="hidden" value="<?php echo (!empty($query->user_id)) ? $query->user_id : ''; ?>"  />
                <br/>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="form-field-1">First Name <span class="eror"><?php echo form_error('first_name'); ?></span></label>
                    <div class="col-sm-10">
                    	<input class="form-control" name="first_name" type="text"  value="<?php echo (!empty($query->first_name)) ? $query->first_name : ''; ?>"  />
                    </div>
                 </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="form-field-2">Last Name<span class="eror"><?php echo form_error('last_name'); ?></span></label>
                    <div class="col-sm-10">
                        <input class="form-control" name="last_name" type="text" value="<?php echo (!empty($query->last_name)) ? $query->last_name : ''; ?>"  />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Email<span class="eror"><?php echo form_error('email'); ?></span></label>
                    <div class="col-sm-10">
                        <input class="form-control" name="email" type="text"  value="<?php echo (!empty($query->email)) ? $query->email : ''; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="form-field-1">User Name<span class="eror"><?php echo form_error('username'); ?></span></label>
                    <div class="col-sm-10">
                        <input class="form-control" name="username" type="text"  value="<?php echo (!empty($query->username)) ? $query->username : ''; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Password<span class="eror"><?php echo form_error('password'); ?></span></label>
                    <div class="col-sm-10">
                        <input class="form-control" name="password" type="password"  value="<?php echo (!empty($query->password)) ? $query->password : ''; ?>"  />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Confirm Password<span class="eror"><?php echo form_error('confirm_password'); ?></span></label>
                    <div class="col-sm-10">
                        <input class="form-control" name="confirm_password" type="password" placeholder="Confirm Password"   />
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
                </div>
            </form>
           		</div> 
             </div>
        	</div>
           <div class="hr"></div>
        </div><!--PAGE CONTENT ENDS-->
    </div><!--/.span-->
</section>
</section>