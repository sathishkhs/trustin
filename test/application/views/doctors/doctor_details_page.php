		<section class="hero-about-area" style="background-image: url(<?php echo (!empty($page_items->banner_image)) ? (BANNER_IMAGE_PATH.$page_items->banner_image) : 'front/images/inner-banner.jpg'; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="hero-about-text text-left">
							<h2><?php echo $page_items->page_title; ?></h2>
							<h4><span><a href="">Home</a> - </span><?php echo $doctor->doctor_name; ?></h4>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- common content -->
		<section class="common-text-area" style="background:#fff;">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 order-first order-md-last">
						<div class="doctors-fl">
							<div class="doctor-containt">
								<h1><?php echo $doctor->doctor_name; ?></h1>
								<h6><?php echo $doctor->doctor_qualification; ?></h6>
								<h3><?php echo $doctor->doctor_role; ?></h3>
								<p><?php echo $doctor->about_doctor; ?></p>
								<div class="outer-box mt-4">
                				
                					<a href="#appointment-form" class="btn-style"><span class="btn-title">Book An Appointment</span></a>
                					<!--<a href="#appointment-modal" rel="modal:open"  class="btn-style" ><span class="btn-title">Appointment</span></a>-->
                				</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3">
						<div class="doctors-img">
							<img src="<?php echo DOCTOR_IMAGE_PATH.$doctor->doctor_image; ?>" alt="">
						</div>
					</div>
				</div>		
			</div>
			<div class="work-tab-area" id="doctors_worktab">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="work-tab">
								<ul class="nav nav-pills d-tab" id="pills-tab" role="tablist">
								    <?php if(!empty( $doctor->areas_of_expertise_text)){ ?>
									<li class="nav-item">
										<a class="nav-link active" id="pills-Expertise-tab" data-toggle="pill" href="#pills-Expertise" role="tab" aria-controls="pills-Expertise" aria-selected="true">Areas of Expertise</a>
									</li>
									<?php } if(!empty($doctor->work_expertise_text)){ ?>
									<li class="nav-item">
										<a class="nav-link" id="pills-work-tab" data-toggle="pill" href="#pills-work" role="tab" aria-controls="pills-Expertise" aria-selected="false">Work Expertise</a>
									</li>
									<?php } if(!empty($doctor->qualification_text)){ ?>
									<li class="nav-item">
										<a class="nav-link" id="pills-Qualification-tab" data-toggle="pill" href="#pills-Qualification" role="tab" aria-controls="pills-Qualification" aria-selected="false">Qualification</a>
									</li>
									<?php } if(!empty($doctor->honours_text)){ ?>
									<li class="nav-item">
										<a class="nav-link" id="pills-Honours-tab" data-toggle="pill" href="#pills-Honours" role="tab" aria-controls="pills-Honours" aria-selected="false">Honours</a>
									</li>
									<?php } if(!empty($doctor->membership_text)){ ?>
									<li class="nav-item">
										<a class="nav-link" id="pills-Membership-tab" data-toggle="pill" href="#pills-Membership" role="tab" aria-controls="pills-Membership" aria-selected="false">Membership</a>
									</li>
									<?php } if(!empty($doctor->presentations_text)){ ?>
									<li class="nav-item">
										<a class="nav-link" id="pills-presentations-tab" data-toggle="pill" href="#pills-presentations" role="tab" aria-controls="pills-presentations" aria-selected="false">Presentations</a>
									</li>
									<?php } if(!empty($doctor->publications_text)){ ?>
									<li class="nav-item">
										<a class="nav-link" id="pills-Publications-tab" data-toggle="pill" href="#pills-Publications" role="tab" aria-controls="pills-Publications" aria-selected="false">Publications</a>
									</li>
									<?php } ?>
								</ul>
								<div class="tab-content d-tab-txt" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-Expertise" role="tabpanel" aria-labelledby="pills-Expertise-tab">
										<div class="work-tab-text">
											
											<?php echo $doctor->areas_of_expertise_text; ?>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-work" role="tabpanel" aria-labelledby="pills-work-tab">
										<div class="work-tab-text">
											
											<?php echo $doctor->work_expertise_text; ?>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-Qualification" role="tabpanel" aria-labelledby="pills-Qualification-tab">
										<div class="work-tab-text">
											
											<?php echo $doctor->qualification_text; ?>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-Honours" role="tabpanel" aria-labelledby="pills-Honours-tab">
										<div class="work-tab-text">
											
											<?php echo $doctor->honours_text; ?>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-Membership" role="tabpanel" aria-labelledby="pills-Membership-tab">
										<div class="work-tab-text">
											
											<?php echo $doctor->membership_text; ?>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-presentations" role="tabpanel" aria-labelledby="pills-presentations-tab">
										<div class="work-tab-text">
											
											<?php echo $doctor->presentations_text; ?>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-Publications" role="tabpanel" aria-labelledby="pills-Publications-tab">
										<div class="work-tab-text">
											
											<?php echo $doctor->publications_text; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
<div class="container" id="doctors-accordian">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-group accordian-tabs" id="accordion" role="tablist" aria-multiselectable="true">
                     <?php if(!empty( $doctor->areas_of_expertise_text)){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#areas_of_expertise_text" aria-expanded="true" aria-controls="collapseOne">
                                    Areas of Expertise
                                </a>
                            </h4>
                        </div>
                       
                        <div id="areas_of_expertise_text" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                               	<?php echo $doctor->areas_of_expertise_text; ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                    <?php if(!empty($doctor->work_expertise_text)){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="work_expertise_text_head">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#work_expertise_text" aria-expanded="false" aria-controls="collapseTwo">
                                    Work Expertise
                                </a>
                            </h4>
                        </div>
                        <div id="work_expertise_text" class="panel-collapse collapse" role="tabpanel" aria-labelledby="work_expertise_text_head">
                            <div class="panel-body">
                               	<?php echo $doctor->work_expertise_text; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    <?php if(!empty($doctor->qualification_text)){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="qualification_text_head">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#qualification_text" aria-expanded="false" aria-controls="collapseTwo">
                                   Qualification
                                </a>
                            </h4>
                        </div>
                        <div id="qualification_text" class="panel-collapse collapse" role="tabpanel" aria-labelledby="qualification_text_head">
                            <div class="panel-body">
                               	<?php echo $doctor->qualification_text; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    <?php if(!empty($doctor->honours_text)){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="honours_text_head">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#honours_text" aria-expanded="false" aria-controls="collapseTwo">
                                   Honours
                                </a>
                            </h4>
                        </div>
                        <div id="honours_text" class="panel-collapse collapse" role="tabpanel" aria-labelledby="honours_text_head">
                            <div class="panel-body">
                               	<?php echo $doctor->honours_text; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    <?php if(!empty($doctor->membership_text)){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="membership_text_head">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#membership_text" aria-expanded="false" aria-controls="collapseTwo">
                                   Membership
                                </a>
                            </h4>
                        </div>
                        <div id="membership_text" class="panel-collapse collapse" role="tabpanel" aria-labelledby="membership_text_head">
                            <div class="panel-body">
                               	<?php echo $doctor->membership_text; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    <?php if(!empty($doctor->presentations_text)){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="presentations_text_head">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#presentations_text" aria-expanded="false" aria-controls="collapseTwo">
                                   Presentations
                                </a>
                            </h4>
                        </div>
                        <div id="presentations_text" class="panel-collapse collapse" role="tabpanel" aria-labelledby="presentations_text_head">
                            <div class="panel-body">
                               	<?php echo $doctor->presentations_text; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    <?php if(!empty($doctor->publications_text)){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="publications_text_head">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#publications_text" aria-expanded="false" aria-controls="collapseTwo">
                                   Publications
                                </a>
                            </h4>
                        </div>
                        <div id="publications_text" class="panel-collapse collapse" role="tabpanel" aria-labelledby="publications_text_head">
                            <div class="panel-body">
                               	<?php echo $doctor->publications_text; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
               
            </div>
        </div>
    </div>
</div>
			
			
		</section>
		
		
