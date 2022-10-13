
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



        <section class="about-main lightskyblue py-5">
		    <div class="container">
		    <div class="sec-title text-center" style="margin-bottom: 30px">
				<h2>National Accreditation Board for Hospitals & Healthcare Providers</h2>
				<!--<span class="sub-title">Where our 'TRUST' stand for!!! </span>-->
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="med-text-wrapper">
							<div class="medi-content">
							<p>Quality Indicators are the backbone on which quality assurance programme of a hospital relies. NABH ( National Accreditation Board for Hospitals & Healthcare Providers. Accreditation expects hospitals to calculate several quality indicators and use it for monitoring the quality of care. </p>
							</div>
						</div>
					</div>

                    <div class="col-sm-12">
                        <img src="front/images/nabh.jpeg" alt="nabh">
                    <!--<iframe src="https://trustinhospital.com/front/SKM_C55822080213060.pdf" width="100%" height="600">-->
                    </div>
                    
				</div>
			</div>
            </div>
            </div>
        </section>