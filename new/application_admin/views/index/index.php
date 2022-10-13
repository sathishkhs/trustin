<div class="login-box">

  <div class="login-logo">

    <b>Trustin Hospital</b>

  </div>

  <!-- /.login-logo -->

  <div class="login-box-body">

    <p class="login-box-msg">LOGIN</p>



    <?php echo form_open();?>

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="User Name" name="username" value="<?php echo $this->input->cookie('username'); ?>" id="username" autofocus>

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" name="password" value="<?php echo $this->input->cookie('password'); ?>" placeholder="Password">

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <div class="row">

        <div class="col-xs-8">

          <div class="checkbox icheck">

            <label>

              <input type="checkbox" name="remember" value="1"> Remember Me

            </label>

          </div>

        </div>

        <!-- /.col -->

        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>

        <!-- /.col -->

      </div>

    </form>
  </div>

  <!-- /.login-box-body -->

</div>

<!-- /.login-box -->