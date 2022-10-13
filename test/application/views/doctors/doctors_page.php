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
<section class="appointment-section" id="appointment-form" style="background:#e0efef;">
		
	<div class="container">
		
		<div class="row">
			<div class="col-md-12 col-sm-12" >
				<div id="search-doctors" class="appoinment-form" style="background:none;">
					
						<div class="row clearfix">
						
							<div class="col-lg-6 col-md-6 col-sm-12 form-group">
								<select id="speciality" onchange="appointment(this.value);" required="">
									<option value="default" selected="" disabled="">Select Speciality</option>
									<?php foreach($specialities as $speciality){ ?>
									<option value="<?php echo $speciality->speciality_id; ?>"><?php echo $speciality->speciality_name; ?></option>
									<?php } ?>
									
								</select>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 form-group has-search">
								<span class="fa fa-search form-control-feedback"></span>
								<input type="text" name="search_doctor" class="icon-space" placeholder="Search Doctor" id="search_doctor">
							</div>

							
						</div>

				</div>
			</div>
			
		</div>
	</div>
</section>
		
		<!-- common content -->
		<section class="common-text-area" style="background:#fcfcfc;">
			<div class="container">
				<div class="row" id="list-doctors">
                <?php foreach($doctors as $doctor){ ?>
					<div class="team-block-two col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image-box">
							   <figure class="image"><a href="<?php echo 'doctors/'.$doctor->page_slug; ?>"><img src="<?php echo DOCTOR_IMAGE_PATH.$doctor->doctor_image; ?>" alt=""></a></figure>
								<ul class="social-links">
									<li><a target="_blank" href="<?php echo $doctor->facebook_link ; ?>"><span class="fab fa-facebook-f"></span></a></li>
									<li><a target="_blank" href="<?php echo $doctor->twitter_link ; ?>"><span class="fab fa-twitter"></span></a></li>
									<li><a target="_blank" href="<?php echo $doctor->instagram_link ; ?>"><span class="fab fa-instagram"></span></a></li>
									<li><a target="_blank" href="<?php echo $doctor->linkedin_link ; ?>"><span class="fab fa-linkedin-in"></span></a></li>
								</ul>
							</div>
							<div class="info-box">
								<h5 class="name"><a href="<?php echo 'doctors/'.$doctor->page_slug; ?>"><?php echo $doctor->doctor_name; ?></a></h5>
								<span class="designation"><b><?php echo $doctor->doctor_role; ?></b></span>
								<span class="designation"><?php echo $doctor->doctor_qualification; ?></span>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		