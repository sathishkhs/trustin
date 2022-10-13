
<!-- Header Lower -->
<div class="header-lower">
	<div class="container-fluid">
		<!-- Main box -->
		<div class="main-box">
			<div class="logo-box">
				<div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo SETTINGS_UPLOAD_PATH . $settings->LOGO_IMAGE ?>" alt="" title=""></a></div>
			</div>
			<!--Nav Box-->
			<!--<div class="nav-outer">-->
				<nav class="nav main-menu">
					<ul class="navigation" id="navbar">
						<?php if (!empty($header_menu)) { ?>
							<?php foreach ($header_menu as $header) { ?>
								<?php if ($header->submenu == null || empty($header->submenu)) { ?>
									<li><a target="<?php echo $header->menuitem_target; ?>" href="<?php echo base_url() . $header->menuitem_link; ?>"><?php echo $header->menuitem_text; ?></a></li>
								<?php
								} ?>
								<?php if (!empty($header->submenu)) : ?>
									<li class="dropdown">
										<!--<a target="<?php echo $header->menuitem_target; ?>" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" role="menuitem">-->
											<span><?php echo $header->menuitem_text; ?></span>
										<!--</a>-->
                                        
										<ul <?php echo ($header->menuitem_text == 'Health Packages') ? "style='width:50%;'" : 'style' ?>>
											<?php foreach ($header->submenu as $submenu) : ?>
												<li class="dropdown">
													<a target="<?php echo $submenu->menuitem_target; ?>" href="<?php echo $submenu->menuitem_link; ?>" role="menuitem">
														<span><?php echo $submenu->menuitem_text; ?></span>
													</a>
													<?php if (!empty($submenu->submenu)) : ?>
														<ul>
															<?php foreach ($submenu->submenu as $submenu_2) : ?>
																<li class="dropdown"><a target="<?php echo $submenu_2->menuitem_target; ?>" href="<?php echo $submenu_2->menuitem_link ?>"><?php echo $submenu_2->menuitem_text ?></a></li>
															<?php endforeach; ?>
														</ul>
													<?php endif; ?>
												</li>
											<?php endforeach; ?>

										</ul>
									</li>
								<?php endif; ?>

							<?php } ?>
						<?php } ?>


	<li><a  href="<?php echo base_url() . 'events' ?>">Events</a></li>
	<li><a  href="<?php echo base_url() . 'contact-us' ?>">Contact Us</a></li>
								

<!-- 
						<li class="dropdown">
							<span>About Us</span>
							<ul>
								<li><a href="#">Services</a></li>
								<li><a href="#">Gallery</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<span>Our Specialities</span>
							<ul>
								<li><a href="#">Oncology Medical & Surgical</a></li>
								<li><a href="#">Obstetrics & Gynaecology</a></li>
								<li><a href="#">Gastroenterology</a></li>
								<li><a href="#">Orthopaedics</a></li>
								<li><a href="#">ENT</a></li>
								<li><a href="#">Paediatrics</a></li>
								<li><a href="#">Urology</a></li>
								<li><a href="#">Neurology & Neurosurgery</a></li>
							</ul>
						</li>

						<li class="dropdown"><a href="doctors/doctors_list">Our Doctors</a></li>
						<li class="dropdown">
							<span>Heath Packages</span>
							<ul>
								<li class="dropdown">
									<span>Diabetes Awareness</span>
									<ul>
										<li class="dropdown"><a href="#">Campaign 1</a></li>
										<li class="dropdown"><a href="#">Campaign 2</a></li>
									</ul>
								</li>
								<li><a href="#">Breast Cancer Awareness</a></li>
							</ul>
						</li>
						<li><a href="#">Contact</a></li> -->
					</ul>
				</nav>
				<!-- Main Menu End-->

				<div class="outer-box">
				   
			        <a href="#appointment-form" id="appointment-btn" class=""><span class="bt-title"></span></a>

					<button class="ambulance-box" type="button" title="    Call Us    " data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo $settings->TELEPHONE_NUM; ?>"></button>
					<a href="#appointment-form" id="appointment-btn"  class="btn-style" ><span class="btn-title">Appointment</span></a>
					<!--<a href="#appointment-modal" rel="modal:open"  class="btn-style" ><span class="btn-title">Appointment</span></a>-->
				</div>
				<!--</div>-->
		</div>
	</div>
</div>

<!-- Sticky Header  -->
<div class="sticky-header">
	<div class="container-fluid">
		<div class="main-box">
			<!--<div class="logo-box">-->
			<!--	<div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo SETTINGS_UPLOAD_PATH . $settings->LOGO_IMAGE ?>" alt="" title=""></a></div>-->
			<!--</div>-->
			
			<!--Keep This Empty / Menu will come through Javascript-->
		</div>
	</div>
</div><!-- End Sticky Menu -->

<!-- Mobile Header -->
<div class="mobile-header">
	<div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo SETTINGS_UPLOAD_PATH . $settings->LOGO_IMAGE ?>" alt="" title=""></a></div>

	<!--Nav Box-->
	<div class="nav-outer clearfix">

		<div class="outer-box">
			<!-- Search Btn
						<div class="search-box">
							<button class="search-btn mobile-search-btn"><i class="flaticon-magnifying-glass"></i></button>
						</div> -->
			<div class="ambulance-box" type="button" title="    Call Us    " data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo $settings->TELEPHONE_NUM; ?>"></div>
			<a href="#appointment-form" id="appointment-btn" class="btn-style"><span class="btn-title">Appointment</span></a>
			<a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="fa fa-bars"></span></a>
		</div>
	</div>
</div>

<!-- Mobile Nav -->
<div id="nav-mobile"></div>

<!--End Main Header -->




	<!-- Modal -->

	<!-- Appointment Section -->

			
		
			
	<!--					<div class="appoinment-form modal" id="appointment-modal">-->
	<!--						<form method="post" action="index/appointment" id="appointmentform">-->
	<!--							<div class="row clearfix">-->
	<!--								<div class="col-lg-6 col-md-6 col-sm-12 form-group">-->
	<!--									<input type="text" name="name" placeholder="Your Name" required="" id="name">-->
	<!--								</div>-->
									
	<!--								<div class="col-lg-6 col-md-6 col-sm-12 form-group">-->
	<!--									<input type="text" name="phone" placeholder="Your Phone" required="" id="phone">-->
	<!--								</div>-->

	<!--								<div class="col-lg-6 col-md-6 col-sm-12 form-group">-->
	<!--									<input type="email" name="email" placeholder="Email Address" required="" id="email">-->
	<!--								</div>-->

	<!--								<div class="col-lg-6 col-md-6 col-sm-12 form-group">-->
	<!--									<select name="speciality" id="speciality" onchange="appointment();" required="">-->
	<!--										<option value="default" selected="" disabled="">Select Speciality</option>-->
	<!--										<option value="Oncology">Oncology Medical & Surgical</option>-->
	<!--										<option value="Obstetrics">Obstetrics & Gynaecology</option>-->
	<!--										<option value="Urology">Urology</option>-->
	<!--										<option value="Gastroenterology">Gastroenterology</option>-->
	<!--										<option value="Orthopaedics">Orthopaedics</option>-->
	<!--										<option value="ENT">ENT</option>-->
	<!--										<option value="Paediatrics">Paediatrics</option>-->
	<!--										<option value="Neurology">Neurology & Neurosurgery</option>-->
	<!--									</select>-->
	<!--								</div>-->

	<!--								<div class="col-lg-6 col-md-6 col-sm-12 form-group">-->
	<!--									<input type="date" name="appointment_date" placeholder="Select Date" required="" id="appointment_date">-->
	<!--								</div>-->

	<!--								<div class="col-lg-6 col-md-6 col-sm-12 form-group">-->
	<!--									<input type="time" name="appointment_time" placeholder="Select Time" required="" id="appointment_time">-->

										<!-- <select name="appointment_time" required="" id="timing">
	<!--										<option value="" selected="" disabled="">Select Time</option>-->
	<!--										<option value="10:00AM - 12:00AM">10:00AM - 12:00AM</option>-->
	<!--										<option value="12:00AM - 02:00AM">12:00AM - 02:00PM</option>-->
	<!--										<option value="02:00PM - 04:00PM">02:00PM - 04:00PM</option>-->
	<!--										<option value="04:00PM - 06:00PM">04:00PM - 06:00PM</option>-->
	<!--										<option value="06:00PM - 08:00PM">06:00PM - 08:00PM</option>-->
	<!--									</select> -->
	<!--								</div>-->
									
	<!--								<div class="col-lg-12 col-md-12 col-sm-12 form-group">-->
	<!--									<textarea name="message" placeholder="Message" required="" id="message"></textarea>-->
	<!--								</div>-->
									
	<!--								<div class="col-lg-12 col-md-12 col-sm-12 form-group">-->
	<!--									<button class="small" type="submit" id="submit-form"><span class="btn-title">GET APPOINTMENT</span></button>-->
	<!--								</div>-->
	<!--							</div>-->

	<!--						</form>-->
					
	<!--		</div>-->

