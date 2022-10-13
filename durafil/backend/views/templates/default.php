<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href='<?php echo base_url(); ?>'>
    <?php /* ?><link rel="stylesheet" href="includes/assets/css/normalize.min.css"><?php */ ?>
    <link rel="stylesheet" href="includes/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/assets/css/style.css?v=<?php echo $this->randoms; ?>">
    <script  src="includes/assets/js/jquery-3.4.1.min.js"></script>
<div class="row1" style="background-color: #ffc500;">
<div class="container">
    <div class="logo"><a href="<?php echo base_url(); ?>" title="<?php echo SITE_TITLE; ?>"><img src="includes/images/logo.png" width="250" alt="<?php echo SITE_TITLE; ?>"></a></div><!-- Logo -->
 </div>
 </div>
<body class="hold-transition login-page" style="background: #e8f0fe;">
<?php $this->load->view($view); ?>
    
<footer class="wrapp-footer" style="background-color: #000; min-height: 40px;">  
    <div class="footer-box-02">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="includes/assets/js/popper.min.js"></script>
<script src="includes/assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="javascripts/index.js?v=<?php echo $this->randoms; ?>"></script>
</body>
</html>
