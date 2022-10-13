<?php error_reporting(0); ?>
<head>
	<meta charset="utf-8">
    <title><?php echo $page_items->meta_title; ?></title>
    <meta name="title" content="<?php echo $page_items->meta_title; ?>"/>
    <meta name="keywords" content="<?php echo $page_items->meta_keywords; ?>"/>
    <meta name="description" content="<?php echo $page_items->meta_description; ?>"/>
    <base href="<?php echo base_url(); ?>"/>
    <?php $parts = $this->uri->segment(1); ?>
    <?php if (!empty($page_url) && $page_url > 1) {
        ?>   <link rel="canonical" href="<?php echo base_url() . $parts . '/' . $page_url; ?>"/>
    <?php } else if (!empty($page_items->canonical_url)) { ?>
        <link rel="canonical" href="<?php echo $page_items->canonical_url; ?>"/>
        <?php
    } if (!empty($page_items->redirection_link)) {
        header('Location:' . $page_items->redirection_link);
    }
    ?>
    <?php echo $page_items->other_meta_tags; ?>
    <?php
    $robots = array();
    if (!empty($page_items->nofollow_ind)) {
        $robots[] = 'NOINDEX';
    }
    if (!empty($page_items->noindex_ind)) {
        $robots[] = 'NOFOLLOW';
    }
    if (count($robots) > 0):
        ?>
        <META NAME="ROBOTS" CONTENT="<?php echo implode(', ', $robots); ?>" />
    <?php endif ?>

    <meta name="author" content="Creative-Yogi">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!--<link rel="shortcut icon" href="<?php echo $settings->FAVICON_IMAGE ?>" type="image/x-icon">-->
	<link rel="icon" href="<?php echo SETTINGS_UPLOAD_PATH.$settings->FAVICON_IMAGE ?>" type="image/png">
	<!-- Stylesheets -->
	<link href="front/css/bootstrap.css" rel="stylesheet">
	<link href="front/css/style.css" rel="stylesheet">
	<link href="front/css/open-sans-font.css" rel="stylesheet">
	<link href="front/css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
	<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
	

    
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MTXWB7N');</script>
<!-- End Google Tag Manager -->
      <script src="front/js/jquery.js"></script> 
  <script type="text/javascript" src="https://www.jqueryscript.net/demo/youtube-video-fullscreen-background/jquery.youtube-background.js?v=1.0.7"></script>
</head>

