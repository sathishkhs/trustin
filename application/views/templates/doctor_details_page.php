<!DOCTYPE html>
<html lang="en">

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<?php $this->load->view('templates/includes/head'); ?>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTXWB7N"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<div class="page-wrapper">
		<header class="main-header header-style-one">
			<?php $this->load->view('templates/includes/topbar'); ?>
			<?php $this->load->view('templates/includes/navbar'); ?>
		
		</header>
		<?php $this->load->view($view_path); ?>
		
		<?php $this->load->view('templates/includes/appointment'); ?>
		<?php $this->load->view('templates/includes/footer'); ?>
	</div>
	<!--/wrapper-->

	<?php $this->load->view('templates/includes/scripts'); ?>
	 <?php if (!empty($scripts) && count($scripts) > 0) : ?>
			<?php foreach ($scripts as $script) : ?>
				<script src="<?php echo $script; ?>"></script>
			<?php endforeach ?>
		<?php endif ?> 
</body>
</html>