	<!-- Top Features -->
  <section class="top-features">
			<div class="auto-container">
				<div class="row">
					<!-- Feature Block -->
					<div class="feature-block col-lg-4 col-md-6 col-sm-12">
					<a href="doctors">
						<div class="inner-box inner-box-appointment">
							<span class="icon"><img src="front/images/calander.png"></span>
							<h4>BOOK APPOINTMENT</h4>
							<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>-->
						</div>
					</a>
					</div>

					<!-- Feature Block -->
					<div class="feature-block col-lg-4 col-md-6 col-sm-12">
					<a href="#appointment-form">
						<div class="inner-box inner-box-inagural">
							<span class="icon"><img src="front/images/inagural.png"></span>
							<h4>INAGURAL OFFER</h4>
							<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>-->
						</div>
					</a>
					</div>
					

					<!-- Feature Block -->
					<div class="feature-block col-lg-4 col-md-6 col-sm-12">
					<a href="contact-us/#contact-us-page">
						<div class="inner-box inner-box-health">
							<span class="icon"><img src="front/images/health.png"></span>
							<h4>HEALTH PACKAGE</h4>
							<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>-->
						</div>
					</a>
					</div>
				</div>
			</div>
		</section>
		<!-- End Features Section -->

		<!-- About Section -->
		<section class="about-section">
			<div class="auto-container">
			<div class="row">
					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
						<div class="inner-column">
							<div class="sec-title">
								<h2>TRUST-IN HOSPITAL</h2>
								<span class="sub-title">Committed to Complete Healthcare</span>
								<span class="divider"><img src="front/images/title-bg.png"></span>
								<p>Trust-in Hospital has been conceived with the idea to bring high-quality and affordable medical care to your neighbourhood. We understand that effective treatment begins with compassionate doctors and right diagnosis followed by integrated approach, advanced facilities and personalised care. So, we have equipped the hospital to be a multidisciplinary facility 
with advanced medical equipment, modern infrastructure, specialised doctors, and cost-effective treatment enabling comprehensive treatment for both outpatient and inpatient. </p>
							</div>
						</div>
						<div class="row mission-vision">
							<div class="col-md-12">
								<div class="mission-box">
									<div class="image-block-wrapper">
										<div class="image-block col-4">
											<div class="image-block-bg bg-image" style="background-image: url(front/images/mission-pic.jpg);"></div>
										</div>
										<div class="container-fluid">
											<div class="row">
												<div class="col-8 offset-4">
													<div class="box d-flex">
														<div class="align-self-center">
															<h4 class="mb-15">Our Mission</h4>
															<p>We are a patient-centric healthcare facility providing consistent and reliable treatment and medical care to all our patients.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mission-box">
									<div class="image-block-wrapper">
										<div class="image-block col-4">
											<div class="image-block-bg bg-image" style="background-image: url(front/images/vission-pic.jpg);"></div>
										</div>
										<div class="container-fluid">
											<div class="row">
												<div class="col-8 offset-4">
													<div class="box d-flex">
														<div class="align-self-center">
															<h4 class="mb-15">Our Vision</h4>
															<p>To provide highest quality healthcare to patients on a large scale and at an affordable cost while also creating sustainable value for all our stakeholders.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Images Column -->
					<div class="images-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="video-link">
								<a href="<?php echo $settings->YOUTUBE_LINK; ?>" class="play-btn lightbox-image" data-fancybox="images"><i class="fas fa-play"></i></a>
							</div>
							<figure class="image-1"><img src="front/images/abt-p1.png" alt=""></figure>
							<figure class="image-2"><img src="front/images/abt-p2.png" alt=""></figure>
							<figure class="image-3"><img src="front/images/abt-p3.png" alt=""></figure>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!--<section class="team-section core-value" style="margin-bottom: 30px;">-->
		<!--	<div class="sec-title text-center">-->
		<!--		<h2>OUR CORE VALUES</h2>-->
		<!--		<span class="sub-title">Where our 'TRUST' stand for!!! </span>-->
		<!--	</div>-->
		<!--	<div class="container">-->
		<!--		<div class="row">-->
		<!--			<div class="col-md-12 text-left">-->
		<!--				<ul>-->
		<!--					<li><strong>Transparency: </strong> Practice transparency, integrity and accountability towards our patients, team members, and investors.</li>-->
		<!--					<li><strong>Respectfulness: </strong> Uphold the rights and dignity of every patient as well as recognise and respect the contribution of every team member.</li>-->
		<!--					<li><strong>Unique: </strong>Incorporate innovative approach to continuously reduce the cost of delivering high quality healthcare and expand our reach.</li>-->
		<!--					<li><strong>Synergy: </strong>Work in unison to ensure excellence in our service and interaction with all stakeholders as well as bring in a culture of diversity and inclusion.</li>-->
		<!--					<li><strong>Tenacity: </strong> Treat every adversity as a challenge with an ingrained ‘Never give up on a patient’ attitude and do everything possible to enhance the quality of their life.</li>-->
		<!--				</ul>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</section>-->
		<section class="departments-area">
			<div class="auto-container">
				<div class="row">
					<div class="col-md-12">
						<div class="sec-title">
							<h2>Our Specialities</h2>
							<span class="sub-title text-center">Committed to provide complete healthcare</span>
							<p class="text-center">At Trust-in Hospital, we are committed to providing you the best of healthcare facility by integrating advanced medical technology, modern infrastructure, specialised doctors, and cost-effective treatment. We adopt a multidisciplinary approach to provide comprehensive treatment for both outpatient and inpatient. Our dedicated medical and non-medical staff goes the extra mile to make Trust-in the most reliable multispecialty hospital in your neighbourhood.</p>
						</div>
						<div class="departments-box">
						   
						    <?php foreach($specialities as $speciality){ ?>
							<a href="<?php echo 'specialities/'.$speciality->speciality_slug; ?>" class="per-box">
								<img src="<?php echo SPECIALITIES_ICON_UPLOAD_PATH.$speciality->icon_path; ?>" alt="<?php echo $speciality->speciality_name; ?>">
								<h3><?php echo $speciality->speciality_name; ?></h3>
							</a>
							<?php } ?>
						
						</div>
					</div>
				</div>
			</div>
		</section>
<?php if(!empty($doctors)){ ?>
		<!-- Team Section -->
		<section class="team-section">
		    <div class="container">
				<div class="sec-title text-center">
					<h2>OUR SPECIALIST DOCTORS</h2>
					<span class="sub-title">Highly Experienced Specialist</span>
					<p>Our team of highly experienced specialist doctors use advanced diagnostic and therapeutic technology to offer you complete treatment and care. By understanding your medical history and current health conditions, they curate treatment that will suit you the best.</p>
				</div>
				</div>
				
				<div class="owl-carousel owl-theme doctors-carousel">
				    <?php foreach($doctors as $row){ ?>
				    <a href="doctors/<?php echo $row->page_slug; ?>">
					<div class="item">
						<div class="doc-block">
							<div class="doc-box">
								<img src="<?php echo DOCTOR_IMAGE_PATH.$row->doctor_image; ?>">
								<div class="doc-name-block">
									<h3><?php echo $row->doctor_name; ?></h3>
									<p><b><?php echo $row->doctor_role; ?></b></p>
									<p><?php echo $row->doctor_qualification; ?></p>
								</div>
							</div>
						</div>
					</div>
					</a>
					<?php } ?>
				</div>
				<!-- <div class="sec-bottom-text">Don’t hesitate, contact us for better help and services <a href="#">Explore all Dr. Team</a></div> -->			
		</section>
		<?php } ?>
<?php if(!empty($facilities)){ ?>
		<!-- TRUST-IN EXPERIENCE-->
		<section class="experience-section">
			<div class="container">
				<div class="sec-title text-center">
					<h2>TRUST-IN EXPERIENCE</h2>
					<p>In our endeavour to provide you the best-in-class quality healthcare, we have strategically planned our infrastructure and approaches to make Trust-in a state-of-the-art hospital that is treatment-friendly and patient-friendly.</p>
				</div>
				<div class="row">
				     <?php foreach($facilities as $key => $row){  if($key >= 15){}else{ ?>
					<div class="col-lg-3 col-sm-6">
						<div class="feature-box">
							<img src="<?php echo FACILITIES_ICON_UPLOAD_PATH.$row->icon_image; ?>" class="icon-alarmclock" style="width: 80px; height: 80px;"></i>
							<h4><?php echo $row->facility_name; ?></h4>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
		</section>
		<?php } ?>
		
		<!-- foto Section -->
		<section class="foto-section">
			<div class="sponsors-outer">
				<ul class="clients-carousel owl-carousel owl-theme">
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_1.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_2.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_3.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_4.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_5.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/foto-6.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_6.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_7.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/foto-8.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_8.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_9.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_10.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_11.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_12.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_13.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_14.jpg" alt=""></a> </li>
					<li class="slide-item"> <a href="#"><img src="front/images/Photo_15.jpg" alt=""></a> </li>
				</ul>
			</div>
		</section>
		
		
	
