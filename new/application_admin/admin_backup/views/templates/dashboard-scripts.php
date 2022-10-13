<!-- js placed at the end of the document so the pages load faster -->
<!-- jQuery 2.2.3 -->
<script src="js/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- Sparkline -->
<script src="js/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="js/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="js/chartjs/Chart.min.js"></script>
<!-- Datatables 1.0.1 -->
<script src="js/datatables/datatables.min.js"></script>
<!--page specific plugin scripts-->
<script src="js/demo.js"></script>
<script src="js/ckeditor/ckeditor.js"></script>
  <script>
  	$(function(){
  		$('ul.sidebar-menu a').filter(function() {  			
	    return this.href == window.location.href;
		}).parents().addClass('active');
  	});
	  CKEDITOR.replace( '.ckeditor' );
  </script>