					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="video-wrapper clearfix">
							<div class="container">
								<h5>Take a look at Global English Programme</h5>
			            <div class="video-play-wrap video-blcok">
			            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
			            </div>
			            <p>ILA Global English courses are in line with international standards for levels of English proficiency. This makes it easy for learners to accurately measure progress, prepare for international exams, and study overseas.</p>
							</div>
						</div>
						<div class="age-categories">
						<?php
						  if(!empty($courses)) {
							  foreach($courses AS $rec) {
						 ?>
							<div class="age-cat-blcok">
								<div class="container">
									<h5><?php echo $rec->program_name;?></h5>
									<div clas="">
										<img src="<?php echo base_url(); ?>front/images/img-3to4year-kids.jpg" alt="<?php echo $rec->program_name;?>"/>
									</div>
									<div class="age-categories-container">
										<p>Starting from the pre-intermediate level, Global English courses are in line with IELTS, TOEFL, and TOEIC exams.</p>
										<div class="btn-common-wrapper">
											<a href="<?php echo base_url('global-english-levels/'.$rec->course_id.'/'.$rec->id); ?>" class="btn-blue btn-common">Know More</a>
											<a href="<?php echo base_url('schedules/'.$rec->course_id); ?>" class="btn-blue btn-common btn-black">View Schedule</a>
										</div>
									</div>
								</div>
							</div>
						<?php } } ?>
						</div>
						<div class="ila-areas-video welfare-video video-bg-green clearfix">
								<div class="container">
									<h5>Take a look at our training &amp; <span>study metierials for adults</span></h5>
				            <div class="video-play-wrap video-blcok">
				            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
				            </div>
				            <p>ILA teachers focus on encouraging students to communicate using fun yet effective activities.</p>
								</div>
							</div>
							<div class="ila-areas-video customer-services-video video-bg-yellow clearfix">
								<div class="container">
									<h5>Meet our Adult Students</h5>
				            <div class="video-play-wrap video-blcok">
				            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
				            </div>
				            <p>Parents of baby Truong Nguyen Quynh Tram - Jumpstart Level - Three</p>
								</div>
								<div class="align-center"><a href="<?php echo base_url('stories'); ?>" class="see-more">See All Testimonials</a></div>
							</div>
						<!-- Why Choose ILA Section-->
						<?php
						  $this->load->view('why_choose_ila');
						 ?>
					</div>