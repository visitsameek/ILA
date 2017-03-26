					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="video-wrapper clearfix">
							<div class="container">
								<h5>Take a look at our Smart Teen Class</h5>
			            <div class="video-play-wrap video-blcok">
			            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
			            </div>
			            <p>ILA Smart Teens courses are designed to give teenagers the language and skills they need to interact with the English-speaking world in the 21st century.</p>
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
										<p>ILA Smart Teens courses are designed to give teenagers the language and skills they need to interact with the English-speaking world in the 21st century.</p>
										<div class="btn-common-wrapper">
											<a href="<?php echo base_url('smart-teens-levels/'.$rec->course_id.'/'.$rec->id); ?>" class="btn-blue btn-common">Know More</a>
											<a href="<?php echo base_url('schedules/'.$rec->course_id); ?>" class="btn-blue btn-common btn-black">View Schedule</a>
										</div>
									</div>
								</div>
							</div>
						<?php } } ?>
						</div>
						<div class="ila-areas-video welfare-video video-bg-green clearfix">
								<div class="container">
									<h5>Smart Teens Class Virtual Tour</h5>
				            <div class="video-play-wrap video-blcok">
				            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
				            </div>
				            <p>ILA teachers focus on encouraging students to communicate using fun yet effective activities.</p>
								</div>
							</div>
							<div class="ila-areas-video customer-services-video video-bg-yellow clearfix">
								<div class="container">
									<h5>Meet Smart Teen Students</h5>
				            <div class="video-play-wrap video-blcok">
				            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
				            </div>
				            <p>Truong Nguyen Quynh Smart Teen Level - Beginner</p>
								</div>
								<div class="align-center"><a href="<?php echo base_url('stories'); ?>" class="see-more">See All Testimonials</a></div>
							</div>
						<!-- Why Choose ILA Section-->
						<?php
						  $this->load->view('why_choose_ila');
						 ?>
					</div>