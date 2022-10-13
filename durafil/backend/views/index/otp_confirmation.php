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
                <p class="login-box-msg text-center">Authenticate</p>
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
                        <label>Enter OTP</label>
                        <?php echo form_error('otplogin'); ?>
                        <input type="text" name="otplogin" id="otplogin" class="form-control" placeholder="Enter OTP">
                    </div>
                    <div class="checkbox">
                        <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 btn-login" onclick="javascript:$('#loading_overlay').show();">Submit</button>
                </form>
                <form id="regenrateotp" method="post" novalidate="novalidate">
                    <p class="spam-message" style="display: none; margin-bottom: 0rem; color: #3F51B5; padding: 10px; font-size: 14px;font-weight: bold; text-align: center;"></p>
                    <div class="checkbox" style="display: flow-root;">
                        <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <label class="pull-right">
                            <button  class="btn btn-warning" style="text-transform: initial; font-size: 13px;padding: 3px 11px;" ><span>Resend OTP</span></button>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



