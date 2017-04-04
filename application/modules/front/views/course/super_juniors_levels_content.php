					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="video-wrapper clearfix">
							<div class="container">
							<?php
							  if(!empty($levels)) {
								$no_levels = sizeof($levels);
							 ?>
								<h5><?php echo $levels[0]->title;?> to <?php echo $levels[($no_levels - 1)]->title;?></h5>
							<?php } ?>
			            <div class="video-play-wrap video-blcok">
			            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
			            </div>
			            <p>The core curriculum covers the four language skills: speaking, listening, reading and writing, with a strong emphasis on Grammar and Vocabulary</p>
							</div>
						</div>
						<div class="smart-teen-features bg-light-blue">
							<div class="container">
								<div class="white-box-list">
									<h5 class="align-left">ILA incorporates the latest language learning technologies, equipment and resources into this programme including:</h5>
									<ul class="list-with-bullets">
										<li>Interactive whiteboards</li>
										<li>Handheld devices [iPads, tablets, etc]</li>
										<li>Interactive language learning gaming</li>
										<li>Internet, music and video</li>
									</ul>
								</div>
								<div class="white-box-list">
									<h5 class="align-left">The teacher takes a communicative teaching approach in the classroom including and involving:</h5>
									<ul class="list-with-bullets">
										<li>Songs &amp; rhyme</li>
										<li>Group work</li>
										<li>Story telling</li>
										<li>Team oriented activities</li>
										<li>Problem solving</li>
										<li>Imaginative projects</li>
										<li>Creative thinking exercises</li>
									</ul>
								</div>
						</div>
							<!-- Study plan section-->
							<div class="study-plan">
								<div class="container">
									<div class="study-plan-header align-center">
										<h5>Study Plan</h5>
										<p>The levels available in this programme The estimated hours duration of each level The outcomes of each level in terms</p>
									</div>
								</div>
								<?php 
								  if(!empty($levels)) {
								 ?>
								<div class="study-plans-list">
									<div class="container smart-teen-packages">
									<?php 									  
									  foreach($levels AS $rec) {
									 ?>
									<div class="study-plan-item">
										<div class="study-plan-img">
											<img src="<?php echo base_url(); ?>front/images/img-study-plan.jpg" alt="level 06"/>
											<span class="level-tag"><?php echo $rec->title;?></span>
										</div>
										<div class="study-plan-content">
											<p>The three beginner courses set the foundation for speaking English with confidence. After the final course in this set recommend students take the Starters test.</p>
											<div class="course-details">
												<div class="course-detail-block">
													<label>Sections</label>
													<ul class="study-plan-datetime clearfix">
														<li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo number_format($rec->duration_months, 1, '.', '');?> Months</li>
														<li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo number_format($rec->duration_hours);?> Hours</li>
													</ul>
												</div>
												<div class="course-detail-block">
													<label>CEFR (International Level Standard)</label>
													<span><?php echo !empty($rec->cefr) ? $rec->cefr : '---';?></span>
												</div>
												<div class="course-detail-block">
													<label>Cambridge Exams</label>
													<span><?php echo !empty($rec->cambridge_exam) ? $rec->cambridge_exam : '---';?></span>
												</div>
											</div>
											<div class="btn-wrapper">
												<a href="course-schedule.html" class="btn-blue btn-common btn-black">View Schedule</a>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<!-- Why Choose ILA Section-->
					<?php
					  $this->load->view('why_choose_ila');
					 ?>					
				</div>