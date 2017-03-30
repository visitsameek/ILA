					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="video-wrapper clearfix">
							<div class="container">
								<h5>Studying English At Young Age</h5>
			            <div class="video-play-wrap video-blcok">
			            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
			            </div>
			            <p>Young children naturally have a huge advantage over older children when learning new languages.</p>
							</div>
						</div>
							<!-- Course Categories-->
							<div class="course-categories bg-light-blue">
								<div class="container courses-list">
									<div class="course-block course-category clearfix">
										<div class="course-header">
											<a href="<?php echo base_url('jumpstart/'.$courses[0]->id); ?>" class="clearfix">
												<div class="course-logo-wrap"><img src="<?php echo base_url(); ?>front/images/img-jumpstart.png" alt="Jumpstart"/></div>
												<div class="arrow-wrapper"><i class="fa fa-angle-right arrow-right fa-6" aria-hidden="true"> </i></div>
											</a>
											<a href="<?php echo base_url('jumpstart/'.$courses[0]->id); ?>" class="course-info course-title">
												English for children from <span><?php echo $courses[0]->age_from;?> to <?php echo $courses[0]->age_to;?> years old</span>
											</a>
										</div>
										<div class="course-img">
											<img src="<?php echo base_url(); ?>front/images/img-jumpstart-photo.jpg" alt="English for Young Learners"/>
										</div>
										<div class="course-option">
											<ul class="option-list clearfix">
												<li><a href="jump-start.html"><span class="option-text">Jumpstart</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
												<li><a href="super-junior.html"><span class="option-text">Super Juniors</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
												<li><a href="#"><span class="option-text">Smart Teens</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
												<li><a href="<?php echo base_url('schedules/'.$courses[0]->id); ?>"><span class="option-text">Schedule</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
											</ul>
											<div class="btn-wrapper">
												<a href="<?php echo base_url('register'); ?>" class="btn-blue btn-common">Register</a>
											</div>
										</div>
									</div>

									<div class="course-block course-category clearfix">
											<div class="course-header">
												<a href="<?php echo base_url('super-juniors/'.$courses[1]->id); ?>" class="clearfix">
													<div class="course-logo-wrap"><img src="<?php echo base_url(); ?>front/images/img-super-juniors.png" alt="Jumpstart"/></div>
													<div class="arrow-wrapper"><i class="fa fa-angle-right arrow-right fa-6" aria-hidden="true"> </i></div>
												</a>
												<a href="<?php echo base_url('super-juniors/'.$courses[1]->id); ?>" class="course-info course-title">
													English for children from <span><?php echo $courses[1]->age_from;?> to <?php echo $courses[1]->age_to;?> years old</span>
												</a>
											</div>
											<div class="course-img">
												<img src="<?php echo base_url(); ?>front/images/img-superjuniors-photo.jpg" alt="English for Young Learners"/>
											</div>
											<div class="course-option">
												<ul class="option-list clearfix">
													<li><a href="jump-start.html"><span class="option-text">Jumpstart</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
													<li><a href="super-junior.html"><span class="option-text">Super Juniors</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
													<li><a href="#"><span class="option-text">Smart Teens</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
													<li><a href="<?php echo base_url('schedules/'.$courses[1]->id); ?>"><span class="option-text">Schedule</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
												</ul>
												<div class="btn-wrapper">
													<a href="<?php echo base_url('register'); ?>" class="btn-blue btn-common">Register</a>
												</div>
											</div>
									</div>
									<div class="course-block course-category clearfix">
										<div class="course-header">
												<a href="<?php echo base_url('smart-teens/'.$courses[2]->id); ?>" class="clearfix">
													<div class="course-logo-wrap"><img src="<?php echo base_url(); ?>front/images/img-smart-teens.png" alt="Jumpstart"/></div>
													<div class="arrow-wrapper"><i class="fa fa-angle-right arrow-right fa-6" aria-hidden="true"> </i></div>
												</a>
												<a href="<?php echo base_url('smart-teens/'.$courses[2]->id); ?>" class="course-info course-title">
													English for Teenagers from <span><?php echo $courses[2]->age_from;?> to <?php echo $courses[2]->age_to;?> years old</span>
												</a>
										</div>
										<div class="course-img">
											<img src="<?php echo base_url(); ?>front/images/img-smartteens-photo.jpg" alt="English for Young Learners"/>
										</div>
										<div class="course-option">
											<ul class="option-list clearfix">
												<li><a href="jump-start.html"><span class="option-text">Jumpstart</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
												<li><a href="super-junior.html"><span class="option-text">Super Juniors</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
												<li><a href="#"><span class="option-text">Smart Teens</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
												<li><a href="<?php echo base_url('schedules/'.$courses[2]->id); ?>"><span class="option-text">Schedule</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>					
											</ul>
											<div class="btn-wrapper">
												<a href="<?php echo base_url('register'); ?>" class="btn-blue btn-common">Register</a>
											</div>
										</div>
									</div>
							</div>
						</div>
						<!-- Trainning center-->
						<div class="training-and-facility clearfix">
							<div class="container">
								<h2 class="align-center">Training Centre <span>&amp; Facilities</span></h2>
								<div class="slideshow">
									<div class="slide">
										<img src="<?php echo base_url(); ?>front/images/img-training-slide.jpg" alt="Carol Austin"/>
									</div>
									<div class="slide">
										<img src="<?php echo base_url(); ?>front/images/img-training-slide.jpg" alt="Carol Austin"/>
									</div>
									<div class="slide">
										<img src="<?php echo base_url(); ?>front/images/img-training-slide.jpg" alt="Carol Austin"/>
									</div>
									<div class="slide">
										<img src="<?php echo base_url(); ?>front/images/img-training-slide.jpg" alt="Carol Austin"/>
									</div>
								</div>
								<p class="slideshow-content">ILA training centres are purpose built to the highest specifications. The facilities provide engaging, comfortable &amp; safe learning environments.</p>
							</div>
						</div>
						<!-- Why Choose ILA Section-->
						<?php
						  $this->load->view('why_choose_ila');
						 ?>
					</div>