<!-- <?php if (!empty($page_items->display_image) && $page_items->display_image == 1) { ?>
    <section class="hero-about-area">
        <img src="<?php echo (!empty($page_items->banner_image)) ? (BANNER_IMAGE_PATH . $page_items->banner_image) : 'front/images/inner-banner.jpg'; ?>" class="w-100 img-responsive" alt="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-about-text text-center">
                        <h2><?php echo $page_heading; ?></h2>
                        <h4><?php echo $breadcrumb; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?> -->





<?php if (!empty($page_items->display_image) && $page_items->display_image == 1) { ?>
<section class="hero-about-area" style="background-image: url(<?php echo (!empty($page_items->banner_image)) ? (BANNER_IMAGE_PATH.$page_items->banner_image) : 'front/images/inner-banner.jpg'; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="hero-about-text text-left">
							<h2><?php echo $page_items->page_title; ?></h2>
							<h4><span><a href="">Home</a> - </span><?php echo $page_items->page_title; ?></h4>
						</div>
					</div>
				</div>
			</div>
		</section>
        <?php } ?>