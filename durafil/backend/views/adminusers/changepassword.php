<section class="content">
    <div class="row">
        <div class="box box-info">
            <div class="overlay" id="loading_overlay" style="display:none;">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
            <div class="container">			
			 <?php
            $msg = $this->session->flashdata('msg');
            if (!empty($msg['txt'])):
                ?>
                <div class="alert alert-block alert-<?php echo $msg['type']; ?>">
                    <button type="button" class="close" data-dismiss="alert"> X
                        <i class="icon-remove"></i>
                    </button>
                    <i class="<?php echo $msg['icon']; ?>"></i>
                    <?php echo $msg['txt']; ?>
                </div>
            <?php endif ?>
                <!-- Horizontal Form -->
                <form class="form-horizontals" method="post" id="user_form" name="user_form" action="<?php echo $this->class_name; ?>/changepassword/<?php echo $query->user_id; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="<?php echo (!empty($query->user_id)) ? $query->user_id : "" ?>"/>
                    <div class="container">
                        <div class="row centered-form">
                            <div class="col-xs-11 col-sm-11 col-md-11 col-sm-offset-2 col-md-offset-0">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h3>
										
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-3">
                                                <div class="form-group">
                                                    <label for="first_name">User Name</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-5">
                                                <div class="form-group">
                                                    <p><?php echo $query->username; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-3">
                                                <div class="form-group required">
                                                    <label for="first_name">Old Password</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-5">
                                                <div class="form-group">
                                                    <?php echo form_error('old_password'); ?>
                                                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password" value="<?php echo (!empty($query->old_password)) ? $query->old_password : '' ?>">
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-3">
                                                <div class="form-group required">
                                                    <label for="last_name">New Password</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-5">
                                                <div class="form-group">
                                                    <?php echo form_error('new_password'); ?>
                                                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" value="<?php echo (!empty($query->new_password)) ? $query->new_password : '' ?>">
													<span style="font-size: 11px; color: blueviolet;">The New Password field must be at least 6 characters in length.</span>
                                                </div>
                                            </div>
                                        </div>										
										<div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-3">
                                                <div class="form-group required">
                                                    <label for="last_name">Confirm New Password</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-5">
                                                <div class="form-group">
                                                    <?php echo form_error('confirm_new_password'); ?>
                                                    <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password" value="<?php echo (!empty($query->confirm_new_password)) ? $query->confirm_new_password : '' ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <a href="<?php echo $this->class_name; ?>" class="btn btn-warning">Cancel / Back</a>
                                        <button type="submit" class="btn btn-info pull-right" onclick="javascript:$('#loading_overlay').show();">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
