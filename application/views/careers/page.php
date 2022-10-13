<style>
    .career-form{ background-color: #2a5aa9; border-radius: 5px; padding: 0 16px;} .career-form .form-control{ background-color: rgba(255, 255, 255, 0.2); border: 0; padding: 12px 15px; color: #fff;} .career-form .form-control::-webkit-input-placeholder{ color: #fff;} .career-form .form-control::-moz-placeholder{ color: #fff;} .career-form .form-control:-ms-input-placeholder{ color: #fff;} .career-form .form-control:-moz-placeholder{ color: #fff;} .career-form .custom-select{ background-color: rgba(255, 255, 255, 0.2); border: 0; padding: 12px 15px; width: 100%; border-radius: 5px; text-align: left; height: auto; background-image: none;} .career-form .custom-select:focus{ -webkit-box-shadow: none; box-shadow: none;} .career-form .select-container{ position: relative;} .career-form .select-container:before{ position: absolute; right: 15px; top: calc(50% - 14px); font-size: 18px;} .filter-result .job-box{ -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2); box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2); border-radius: 10px; padding: 10px 35px;} .custom-select{ appearance: menulist;} ul{ list-style: none;} .list-disk li{ list-style: none; margin-bottom: 12px;} .list-disk li:last-child{ margin-bottom: 0;} .job-box .img-holder{ height: 65px; width: 65px; background-color: #2a5aa9; background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd)); background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%); color: #fff; font-size: 22px; font-weight: 700; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-pack: center; -ms-flex-pack: center; justify-content: center; -webkit-box-align: center; -ms-flex-align: center; align-items: center; border-radius: 65px;} .career-title{ background-color: #2a5aa9; color: #fff; padding: 15px; text-align: center; border-radius: 10px 10px 0 0; background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd)); background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);} .job-overview{ -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2); box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2); border-radius: 10px;} @media (min-width: 992px){ .job-overview{ position: -webkit-sticky; position: sticky; top: 70px;}} .job-overview .job-detail ul{ margin-bottom: 28px;} .job-overview .job-detail ul li{ opacity: 0.75; font-weight: 600; margin-bottom: 15px;} .job-overview .job-detail ul li i{ font-size: 20px; position: relative; top: 1px;} .job-overview .overview-bottom, .job-overview .overview-top{ padding: 35px;} .job-content ul li{ font-weight: 600; opacity: 0.75; border-bottom: 1px solid #ccc; padding: 10px 5px;} @media (min-width: 768px){ .job-content ul li{ border-bottom: 0; padding: 0;}} .job-content ul li i{ font-size: 20px; position: relative; top: 1px;} .mb-30{ margin-bottom: 30px;} #pagination-demo{ display: inline-block; margin-bottom: 1.75em;} #pagination-demo li{ display: inline-block;} .page-content{ background: #eee; display: inline-block; padding: 10px; width: 100%; max-width: 660px;} .holder{ margin: 15px 0;} .holder a{ font-size: 12px; cursor: pointer; margin: 0 5px; color: #333;} .holder a:hover{ background-color: #222; color: #fff;} .holder a.jp-previous{ margin-right: 15px;} .holder a.jp-next{ margin-left: 15px;} .holder a.jp-current, a.jp-current:hover{ color: #FF4242; font-weight: bold;} .holder a.jp-disabled, a.jp-disabled:hover{ color: #bbb;} .holder a.jp-current, a.jp-current:hover, .holder a.jp-disabled, a.jp-disabled:hover{ cursor: default; background: none;} .holder span{ margin: 0 5px;} #ex1{ background:#1c4073}
</style>
<link href="front/css/animate.css" rel="stylesheet">


<script src="front/js/jpages.js"></script>
<script>
    $(function() {

        $(".holder").jPages({
            containerID: "itemContainer",
            perPage: 4,

        });

    });
</script>

<div class="container">
        <div class="row">
        <div class="col-lg-10 mx-auto mb-4">
                <?php $msg = $this->session->flashdata('msg');
	       			 if (!empty($msg['txt'])):?>
                <div class="alert alert-<?php echo $msg['type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $msg['txt']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php endif ?>
           
        </div>
    </div>
</div>

<section class="about-main lightskyblue py-5">
		    
		    <div class="sec-title text-center" style="margin-bottom: 30px">
				<h2>JOIN OUR TEAM</h2>
				<!--<span class="sub-title">Where our 'TRUST' stand for!!! </span>-->
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="med-text-wrapper">
							<div class="medi-content">
							<p>Explore the Opportunities to grow and help grow at Trust-in Hospital. At Trust-in Hospital, we don’t just work, we also learn as we do it and without a doubt have fun doing it! As a result of this, working at Trust-in is an experience one looks forward to rather than just a job one reports to every morning.</p>
							</div>
						</div>
					</div>
                    <div class="col-sm-12 text-left">
                        <h5>You can also contact us at :-</h5>
                        <p class="mt-0"><b>Name :</b> Human Resource</p>
                        <p class="mt-0"><b>Email :</b>  trustinhospital1@gmail.com</p>
                        <a type="button"  class="btn-style mt-2" href="#ex1" rel="modal:open" data-career="Nurse">Apply now</a>
                    </div>
				</div>
			</div>
            </div>
				
				
            <div class="col-md-10 col-sm-12 mx-auto">
                    <div class="sec-title text-center" style="margin-bottom: 30px">
                        <h2>WHY TRUST-IN?</h2>
                    </div>
			        <div class="med-text-wrapper">
						<div class="medi-content">
							<p>Trust-in Hospital has been conceived with the idea to bring high-quality and affordable medical care to your neighbourhood. We understand that effective treatment begins with compassionate doctors and right diagnosis followed by integrated approach, advanced facilities and personalised care. So, we have equipped the hospital to be a multidisciplinary facility with advanced medical equipment, modern infrastructure, specialised doctors, and cost-effective treatment enabling comprehensive treatment for both outpatient and inpatient.</p>
                            <p>The innovative design of the hospital ensures cleanliness, hygiene, and safety. The dedicated sterile room ensures all surgical equipment and materials are hygienically stored and disbursed. Our no-contact disposal system ensures complete protection from health risks associated with infection caused by improper handling of biomedical wastes.</p>
						</div>
					</div>
				</div>
			
			
		</section>




<!-- <div class="container">




    <div class="row">
        <div class="col-lg-10 mx-auto mb-4">
                <?php $msg = $this->session->flashdata('msg');
	       			 if (!empty($msg['txt'])):?>
                <div class="alert alert-<?php echo $msg['type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $msg['txt']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php endif ?>
            <div class="section-title text-center ">
                <h3 class="top-c-sep">Grow your career with us</h3>
                <p>Lorem ipsum dolor sit detudzdae amet, rcquisc adipiscing elit. Aenean socada commodo
                    ligaui egets dolor. Nullam quis ante tiam sit ame orci eget erovtiu faucid.</p>
            </div>
        </div>
    </div>

    <?php /* <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="career-search mb-60">

                <!-- <form action="#" class="career-form mb-60">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 my-3">
                            <div class="input-group position-relative">
                                <input type="text" class="form-control" placeholder="Enter Your Keywords" id="keywords">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 my-3">
                            <div class="select-container">
                                <select class="custom-select">
                                    <option selected="">Location</option>
                                    <option value="1">Jaipur</option>
                                    <option value="2">Pune</option>
                                    <option value="3">Bangalore</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 my-3">
                            <div class="select-container">
                                <select class="custom-select">
                                    <option selected="">Select Job Type</option>
                                    <option value="1">Ui designer</option>
                                    <option value="2">JS developer</option>
                                    <option value="3">Web developer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 my-3">
                            <button type="button" class="btn btn-lg btn-block btn-light btn-custom" id="contact-submit">
                                Search
                            </button>
                        </div>
                    </div>
                </form> */?>

                <div class="filter-result">
                    <p class="mb-30 ff-montserrat">Total Job Openings : 8</p>
                    <ul id="itemContainer">

                        <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                            <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                    NU
                                </div>
                                <div class="job-content">
                                    <h5 class="text-center text-md-left">Nurse</h5>
                                    <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-pin mr-2"></i> Cardiology Ward
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-money mr-2"></i> 2500-3500/pm
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-time mr-2"></i> Full Time
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="job-right my-4 flex-shrink-0">
                                <a type="button" class="btn d-block w-100 d-sm-inline-block btn-light career-btn" href="#ex1" rel="modal:open" data-career="Nurse">Apply now</a>
                            </div>
                        </div>

                        <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                            <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                    XT
                                </div>
                                <div class="job-content">
                                    <h5 class="text-center text-md-left">X-ray technician</h5>
                                    <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-pin mr-2"></i> X-Ray Room
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-money mr-2"></i> 2500-3500/pm
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-time mr-2"></i> Full Time
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="job-right my-4 flex-shrink-0">
                                <a type="button" class="btn d-block w-100 d-sm-inline-block btn-light career-btn" href="#ex1" rel="modal:open" data-career="X-ray technician">Apply now</a>
                            </div>
                        </div>

                        <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                            <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                    PA
                                </div>
                                <div class="job-content">
                                    <h5 class="text-center text-md-left">Physician assistant</h5>
                                    <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-pin mr-2"></i> General Medicine
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-money mr-2"></i> 2500-3500/pm
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-time mr-2"></i> Full Time
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="job-right my-4 flex-shrink-0">
                                <a type="button" class="btn d-block w-100 d-sm-inline-block btn-light career-btn" href="#ex1" rel="modal:open" data-career="Physician assistant">Apply now</a>
                            </div>
                        </div>

                        <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                            <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                    MC
                                </div>
                                <div class="job-content">
                                    <h5 class="text-center text-md-left">Medical records clerk</h5>
                                    <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-pin mr-2"></i> Hospital departments
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-money mr-2"></i> 2500-3500/pm
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-time mr-2"></i> Full Time
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="job-right my-4 flex-shrink-0">
                                <a type="button" class="btn d-block w-100 d-sm-inline-block btn-light career-btn" href="#ex1" rel="modal:open" data-career="Medical records clerk">Apply now</a>
                            </div>
                        </div>
                        <div class="job-box d-md-flex align-items-center justify-content-between mb-30 jp-hidden">
                            <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                    HR
                                </div>
                                <div class="job-content">
                                    <h5 class="text-center text-md-left">Human resources manager</h5>
                                    <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-pin mr-2"></i> Recruiting hospital staff
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-money mr-2"></i> 2500-3500/pm
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-time mr-2"></i> Full Time
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="job-right my-4 flex-shrink-0">
                                <a type="button" class="btn d-block w-100 d-sm-inline-block btn-light career-btn" href="#ex1" rel="modal:open" data-career="Human resources manager">Apply now</a>
                            </div>
                        </div>
                        <div class="job-box d-md-flex align-items-center justify-content-between mb-30 jp-hidden">
                            <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                    RR
                                </div>
                                <div class="job-content">
                                    <h5 class="text-center text-md-left">Receiptionist</h5>
                                    <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-pin mr-2"></i> Receiption
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-money mr-2"></i> 2500-3500/pm
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-time mr-2"></i> Full Time
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="job-right my-4 flex-shrink-0">
                                <a type="button" class="btn d-block w-100 d-sm-inline-block btn-light career-btn" href="#ex1" rel="modal:open" data-career="Receiptionist">Apply now</a>
                            </div>
                        </div>
                        <div class="job-box d-md-flex align-items-center justify-content-between mb-30 jp-hidden">
                            <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                    DD
                                </div>
                                <div class="job-content">
                                    <h5 class="text-center text-md-left">Dietitian</h5>
                                    <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-pin mr-2"></i> Diet Expert
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-money mr-2"></i> 2500-3500/pm
                                        </li>
                                        <li class="mr-md-4">
                                            <i class="zmdi zmdi-time mr-2"></i> Full Time
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="job-right my-4 flex-shrink-0">
                                <a type="button" class="btn d-block w-100 d-sm-inline-block btn-light career-btn" href="#ex1" rel="modal:open" data-career="Dietitian">Apply now</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>

         

            <ul class="holder d-flex justify-content-center"></ul>
          
        </div>
        
    </div>
</div> -->

<!-- Modal -->
<div id="ex1" class="modal" style="overflow-y: scroll">
    <div class="appoinment-form">

        <form method="post" action="index/career_apply" id="career-form" >
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                    <input type="text" name="name" placeholder="Your Name*" id="name">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                    <input type="text" name="phone" placeholder="Your Phone*" id="phone">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                    <input type="email" name="email" placeholder="Email Address*" id="email">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                    <input type="text" name="current_location" placeholder="Current Location*" id="current_location">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                    <input type="text" name="qualification" placeholder="Qualification*" id="qualification">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                    <input type="text" name="current_designation" placeholder="Current Designation*" id="current_designation">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                    <label class="text-white">Upload Resume</label>
                    <input type="file" name="resume" placeholder="Resume*" id="resume">
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                    <textarea name="message" placeholder="Message" id="message"></textarea>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                    <button class="small" type="submit" id="submit-form"><span class="btn-title">Submit</span></button>
                </div>
            </div>

        </form>
    </div>
</div>


<!-- <section class="experience-section">
    <div class="container">
        <div class="sec-title text-center">
            <h2>TRUST-IN JOBS BY CATEGORY</h2>
            <p>In our endeavour to provide you the best-in-class quality healthcare, we have strategically planned our infrastructure and approaches to make Trust-in a state-of-the-art hospital that is treatment-friendly and patient-friendly.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="feature-box">
                    <img src="uploads/specialities/specialt_icons/ico-General.png" class="icon-alarmclock" style="width: 80px; height: 80px;">
                    <h4>General Medicine</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="feature-box">
                    <img src="uploads/specialities/specialt_icons/ico-Oncology1.png" class="icon-alarmclock" style="width: 80px; height: 80px;">
                    <h4>Oncology Medical & Surgical</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="feature-box">
                    <img src="uploads/specialities/specialt_icons/Cardiology.png" class="icon-alarmclock" style="width: 80px; height: 80px;">
                    <h4>Cardiology </h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="feature-box">
                    <img src="uploads/specialities/specialt_icons/ico-Paediatrics.png" class="icon-alarmclock" style="width: 80px; height: 80px;">
                    <h4>Paediatrics</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="feature-box">
                    <img src="uploads/specialities/specialt_icons/Diabetology.png" class="icon-alarmclock" style="width: 80px; height: 80px;">
                    <h4>Diabetology </h4>
                </div>
            </div>

        </div>
    </div>
</section> -->


<script>
    $(".career-btn").on('click',function(){

        $("#job-career").val($(this).attr('data-career'))
    })
  
</script>