<div class="container my-5" id="contact-us-page">
    <div class="row">
        <div class="col-sm-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.2470264677527!2d77.65396291383087!3d13.019935017340945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae113b730a09bd%3A0x507a08d8bd7a615b!2sTRUST-IN%20HOSPITAL!5e0!3m2!1sen!2sin!4v1625033753098!5m2!1sen!2sin" width="1100" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        
    </div>
</div>
<div class="container">
	<div class="row">
		
		<div class="col-lg-6 col-md-12">
		      <div class="common-text-area">
			        <h1>Contact Info</h1>
			    </div>
			    <div class="container">
			        <div class="row">
			            <div class="col-1">
			                <i class="fa fa-map-marked text-info pt-2">
			                </i>
			            </div>
			            <div class="col-11">
			                <b class="line-hieght-25"><?php echo $settings->OFFICE_ADDRESS; ?></b>
			            </div>
			            <div class="col-1">
			                <i class="fa fa-envelope text-info pt-2">
			                </i>
			            </div>
			            <div class="col-11">
			                <b class="line-hieght-25"><?php echo $settings->EMAIL; ?></b>
			            </div>
			            <div class="col-1">
			                <i class="fa fa-phone text-info pt-2">
			                </i>
			            </div>
			            <div class="col-11">
			                <b class="line-hieght-25"><?php echo $settings->TELEPHONE_NUM; ?></b>
			            </div>
			        </div>
			    </div>
		</div>
		<div class="col-md-6 col-sm-12">
		     <div class="common-text-area">
			        <h1>Get In Touch</h1>
			    </div>
			<div class="appoinment-form">
			   
				<form method="post" action="index/appointment" id="appointment-form">
					<div class="row clearfix">
						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="text" name="name" placeholder="Your Name"  id="name">
						</div>
						
						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="text" name="phone" placeholder="Your Phone" id="phone">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="email" name="email" placeholder="Email Address" id="email">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<select name="speciality_id" id="departments" onchange="" >
								<option >Select Speciality</option>
								<!--<?php foreach($this-data['specialities'] as $speciality){ ?>-->
								<!--<option value="<?php echo $speciality->speciality_id; ?>"><?php echo $speciality->speciality_name; ?></option>-->
								<!--<?php } ?>-->
								<option value="1">Oncology & Medical & Surgical</option>
								<option value="2">Obstetrics &amp; Gynaecology</option>
								<option value="3">Urology</option>
								<option value="4">Gastroenterology</option>
								<option value="5">Orthopaedics</option>
								<option value="6">ENT</option>
								<option value="7">Paediatrics</option>
								<option value="8">Neurology &amp; Neurosurgery</option>
							</select>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="date" name="appointment_date" placeholder="Select Date"  id="appointment_date">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="time" name="appointment_time" placeholder="Select Time"  id="appointment_time">

							<!-- <select name="appointment_time" required="" id="timing">
								<option value="" selected="" disabled="">Select Time</option>
								<option value="10:00AM - 12:00AM">10:00AM - 12:00AM</option>
								<option value="12:00AM - 02:00AM">12:00AM - 02:00PM</option>
								<option value="02:00PM - 04:00PM">02:00PM - 04:00PM</option>
								<option value="04:00PM - 06:00PM">04:00PM - 06:00PM</option>
								<option value="06:00PM - 08:00PM">06:00PM - 08:00PM</option>
							</select> -->
						</div>
						
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<textarea name="message" placeholder="Message" id="message"></textarea>
						</div>
						
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<button class="small" type="submit" id="submit-form"><span class="btn-title">GET APPOINTMENT</span></button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>