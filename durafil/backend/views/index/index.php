<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <p style="font-weight: bold; color: #7d5111;"><?php echo SITE_TITLE; ?></p>
            </div>
            <div class="overlay" id="loading_overlay" style="display:none;">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
            <div class="login-form">
                <p class="login-box-msg text-center">Sign In</p>
                <?php
                $msg = $this->session->flashdata('msg');
                if (!empty($msg['txt'])):
                    ?>
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <?php echo $msg['txt']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Email address</label>
                        <?php echo form_error("username"); ?>
                        <input type="text" name="username" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <?php echo form_error('password'); ?>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input  type="checkbox" name="remember"> Remember Me
                        </label>
                        <label class="pull-right">
                            <a href="forgot-password">Forgotten Password?</a>
                        </label>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 btn-login" onclick="javascript:$('#loading_overlay').show();">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>


