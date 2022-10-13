<!-- jQuery 2.2.3 -->

<script src="js/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->

<script src="js/bootstrap.min.js"></script>

<!-- iCheck -->

<script src="js/iCheck/icheck.min.js"></script>
<script src="js/ckeditor/ckeditor.js"></script>

<script>

  $(function () {

    $('input').iCheck({

      checkboxClass: 'icheckbox_square-blue',

      radioClass: 'iradio_square-blue',

      increaseArea: '20%' // optional

    });

  });
  CKEDITOR.replace( '.ckeditor' );

</script>