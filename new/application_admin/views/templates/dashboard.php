<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('templates/head'); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  	 <!--<section id="container" >-->
	 <?php if (empty($popup_view)): ?>
	 	<?php $this->load->view('templates/dashboard-navbar'); ?>
	 <?php endif ?>
 
	  <?php if (empty($popup_view)): ?>
		<a class="menu-toggler" id="menu-toggler" href="#">
		    <span class="menu-text"></span>
		</a>
		<?php $this->load->view('templates/dashboard-sidebar'); ?>
	  <?php endif ?>
  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <?php $this->load->view('templates/dashboard-breadcrumbs'); ?>
            
      <?php $this->load->view($view); ?>
      
      <?php if (empty($popup_view)): ?>
      	<?php //$this->load->view('templates/dashboard-setting'); ?>
      <?php endif ?>
    </div>
      <?php $this->load->view('templates/footer'); ?>
      <?php $this->load->view('templates/controlsidebar');?>
</div>
<!-- ./wrapper -->		
  <?php $this->load->view('templates/dashboard-scripts'); ?>
        <!-- scripts related to this page -->
        <?php if (count($scripts) > 0): ?>
            <?php foreach ($scripts as $script): ?>
                <script src="<?php echo $script; ?>"></script>
            <?php endforeach ?>
        <?php endif ?> 
    <!-- </section>-->
  </body>
</html>
