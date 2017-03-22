					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="video-wrapper clearfix">
							<div class="container">
							<?php
							  if(!empty($levels)) {
								$no_levels = sizeof($levels);
							 ?>
								<h5><?php echo $levels[0]->title.' to '.$levels[($no_levels - 1)]->title;?></h5>
							<?php } ?>
			            <div class="video-play-wrap video-blcok">
			            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
			            </div>
			            <p>In early Jumpstart classes, students learn through fun and inspiring activities and through exposure to natural language.</p>
							</div>
						</div>
						<!-- Study plan section-->
						<div class="study-plan bg-light-blue">
							<div class="container">
									<div class="study-plan-header align-center">
										<h5>Study Plan</h5>
										<p>The levels available in this programme The estimated hours duration of each level The outcomes of each level in terms</p>
									</div>
									<?php 
									  if(!empty($levels)) {
									 ?>
									<div class="study-plans-list">
										<?php 									  
										  foreach($levels AS $rec) {
									     ?>
										<div class="study-plan-item">
											<div class="study-plan-img">
												<img src="<?php echo base_url(); ?>front/images/img-study-plan.jpg" alt="level 06"/>
												<span class="level-tag"><?php echo $rec->title;?></span>
											</div>
											<div class="study-plan-content">
												<p>Lessons introduce simple greetings, verbs, emotions and some vocabulary through natural language and fun activities.</p>
												<ul class="study-plan-datetime clearfix">
													<li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo number_format($rec->duration_months, 1, '.', '');?> Months</li>
													<li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo number_format($rec->duration_hours);?> Hours</li>
												</ul>
												<div class="btn-wrapper">
													<a href="course-schedule.html" class="btn-blue btn-common btn-black">View Schedule</a>
												</div>
											</div>
										</div>
										<?php } ?>									
									</div>
									<?php } ?>
							</div>
						</div>
						
						<!-- Why Choose ILA Section-->
						<?php
						  $this->load->view('why_choose_ila');
						 ?>
					</div>