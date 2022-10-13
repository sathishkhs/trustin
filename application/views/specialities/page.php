	<section class="hero-about-area" style="background-image: url(<?php echo (!empty($specialities->image_path)) ? SPECIALITIES_UPLOAD_PATH . $specialities->image_path : 'front/images/inner-banner.jpg'; ?>);">
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
		
		
		<!-- common content -->
		<section class="common-text-area" style="background:#fcfcfc;">
			<div class="container">
				<div class="rows">
				    
			
				    
					
		<div class="col-lg-12 col-md-12" style="margin-bottom: 40px">
			<div class="med-text-wrapper">
				<div class="medi-content">
					<?php echo $specialities->speciality_content; ?>
				</div>
			</div>
		</div>
		
			<!-- Team Section -->
					<!--<section class="team-section innerpage" style="background:transparent;">-->
					<!--	<div class="sec-title text-center">-->
					<!--		<h2><?php echo strtoupper($page_items->page_title); ?> SPECIALIST DOCTORS</h2>-->
					<!--	</div>-->
						
					<!--	    <?php if(empty($speciality_doctors)){ ?>-->
						       
					<!--	            <p class="text-center mb-4">No Doctors found in this speciality.</p>-->
						        
					<!--	    <?php } else{ ?> -->
						    
					<!--	<div class="owl-carousel owl-theme mhn-slide" style="text-align:center;margin:0 auto;">-->
					<!--	    <?php foreach($speciality_doctors as $doctor){ ?>-->
					<!--	    <a href="doctors/<?php echo $doctor->page_slug; ?>">-->
					<!--		<div class="mhn-item">-->
					<!--			<div class="doc-block">-->
					<!--				<div class="doc-box">-->
					<!--					<img src="<?php echo DOCTOR_IMAGE_PATH.$doctor->doctor_image; ?>">-->
					<!--					<div class="doc-name-block">-->
					<!--						<h3><?php echo $doctor->doctor_name; ?></h3>-->
					<!--						<p><b><?php echo $doctor->doctor_role; ?></b></p>-->
					<!--						<p><?php echo $doctor->doctor_qualification; ?></p>-->
					<!--					</div>-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</div>-->
					<!--		</a>-->
					<!--		<?php } ?> -->
					<!--	</div>	-->
							
					<!--	<?php	} ?>-->
					<!--</section>	-->
				
					
		<?php if(!empty($facilities)){ ?>
		<!-- TRUST-IN EXPERIENCE-->
		<section class="experience-section-2">
			<div class="container">
				<div class="sec-title text-center">
					<h2>Available Facilities:</h2>
				</div>
				<div class="row">
				     <?php foreach($facilities as $facility){ ?>
					<div class="col-lg-3 col-sm-6">
						<div class="feature-box">
							<img src="<?php echo FACILITIES_ICON_UPLOAD_PATH.$facility->icon_image ?>" class="icon-alarmclock"></i>
							<h4><?php echo $facility->facility_name ?></h4>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php } ?>
		
					
				</div>
			</div>
		</section>
		