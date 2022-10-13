<div class="sufee-login d-flex align-content-center flex-wrap" style="min-height:480px;">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <p style="font-weight: bold; color: #7d5111;"><?php echo SITE_TITLE; ?></p>
            </div>
            <div class="overlay" id="loading_overlay" style="display:none;">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
            <div class="login-form">
                <p class="login-box-msg text-center">Forgot Password</p>
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
                <?php echo form_open_multipart(''); ?>
                <div class="form-group">
                    <label>Enter Email Address</label>
                    <?php echo form_error('email_address'); ?>
                    <input type="text" name="email_address" class="form-control" placeholder="Enter Email Address">
                </div>
                <div class="checkbox">
                    <label class="pull-right">
                        <a href="">Login</a>
                    </label>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                </div>
                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 btn-login" onclick="javascript:$('#loading_overlay').show();">Submit</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>



