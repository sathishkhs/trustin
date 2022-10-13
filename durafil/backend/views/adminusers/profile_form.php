<div class="card">
    <div class="overlay" id="loading_overlay" style="display:none;">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
    <?php $role_id = $this->session->userdata('role_id') ?>
    <?php
    $msg = $this->session->flashdata('msg');
    if (!empty($msg['txt'])):
        ?>
        <div class="sufee-alert alert with-close alert-<?php echo $msg['type']; ?> alert-dismissible fade show">
            <?php echo $msg['txt']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>
    <div class="card-header">
        <strong><?php echo $page_heading; ?></strong> Form
    </div>
    <div class="card-body card-block">
        <div class="container">
            <!-- Horizontal Form -->
            <form class="form-horizontals" method="post" id="user_form" name="user_form" action="<?php echo $this->class_name; ?>/save/<?php echo $this->session->userdata('user_id'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo (!empty($this->session->userdata('user_id'))) ? $this->session->userdata('user_id') : "" ?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="container">
                    <div class="row centered-form">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group required">
                                                <label for="company" class=" form-control-label">Full Name</label>
                                                <?php echo form_error('first_name'); ?>
                                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Full Name" value="<?php echo (!empty($query->first_name)) ? $query->first_name : '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group required">
                                                <label for="company" class=" form-control-label">Email Id (User Id)</label>
                                                <?php echo form_error('email'); ?>
                                                <input type="text" name="email" id="email" class="form-control" placeholder="Email Id" value="<?php echo (!empty($query->email)) ? $query->email : '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Phone Number</label>
                                                <?php echo form_error('mobile'); ?>
                                                <input onkeypress="return isPhoneNumber(event)" type="text" class="form-control" name="mobile" id="mobile" placeholder="Contact No" value="<?php echo (!empty($query->mobile)) ? $query->mobile : '' ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group required">
                                                <label for="company" class="form-control-label">User Role</label>
                                                <?php echo form_error('role_id'); ?>
                                                <select  name="role_id" id="role_id" class="form-control" <?php echo ($role_id == 1) ? '' : 'readonly' ?>>
                                                    <?php if ($role_id == 1) { ?>
                                                        <option value="">-- User Type --</option>
                                                    <?php } ?>
                                                    <?php foreach ($roles as $row): ?>
                                                        <?php if ($role_id > 1 && $role_id == $row->role_id) { ?>
                                                            <option value="<?php echo $row->role_id ?>" <?php echo (!empty($query->role_id) && $query->role_id == $row->role_id) ? 'selected' : '' ?>><?php echo $row->role_name ?></option>
                                                        <?php } elseif ($role_id == 1) { ?>
                                                            <option value="<?php echo $row->role_id ?>" <?php echo (!empty($query->role_id) && $query->role_id == $row->role_id) ? 'selected' : '' ?>><?php echo $row->role_name ?></option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group required">
                                                <label for="company" class=" form-control-label">Password</label>
                                                <?php echo form_error('password'); ?>
                                                <input type="password" class="form-control"  name="password" id="password" rows="3" placeholder="Enter Password...">
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group required">
                                                <label for="company" class=" form-control-label">Confirm Password</label>
                                                <?php echo form_error('confirm_password'); ?>
                                                <input type="password" class="form-control"  name="confirm_password" id="confirm_password" rows="3" placeholder="Enter Confirm Password...">
                                            </div>
                                        </div>
                                        <p style="margin-top: -14px; padding: 0px 16px; line-height: 14px;">
                                            <span style="font-size: 11px; color: blueviolet;">Password should contain (6 to 12 character which should include at one lowercase, one uppercase one numeric character and special character).</span></p>
                                    </div>
                                    <div class="row">
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Address</label>
                                                <?php echo form_error('address'); ?>
                                                <textarea class="form-control"  name="address" id="address" rows="2" placeholder="Enter Address..."><?php echo (!empty($query->address)) ? $query->address : '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Status</label><br>
                                                <label><input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
                                                    <span class="lbl">Active</span></label>
                                                &nbsp; &nbsp; &nbsp;&nbsp;
                                                <label><input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?>  <?php echo ($role_id == 1) ? '' : 'disabled' ?>/>
                                                    <span class="lbl">In Active</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right" onclick="javascript:$('#loading_overlay').show();">Save</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>