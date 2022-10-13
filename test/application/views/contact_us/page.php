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
			<div class="appoinment-form contact-form" style="background: #5c93a6">
			   
				<form method="post" action="index/contact" id="contactform">
					<div class="row clearfix">
						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="text" name="name" placeholder="Your Name"  id="yourname">
						</div>
						
						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="email" name="email" placeholder="Email Address" id="youremail">
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<textarea name="message" placeholder="Message" id="yourmessage"></textarea>
						</div>
						
						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<button class="small" type="submit" id="submit-form"><span class="btn-title">Submit</span></button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>