					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="video-wrapper clearfix">
							<div class="container">
								<h5>21st Century Teaching Methodology</h5>
		            <div class="video-play-wrap video-blcok">
		            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
		            </div>
		            <p>21st century with globalization and the ongoing development of modern technology requires young adaptability to integrate and successfully</p>
							</div>
						</div>
						<!-- We Prepare Section-->
						<div class="we-prepare-sec clearfix">
							<div class="we-prepare-img ila-facility">
								<div class="ila-facility-img creativity-img">
										<div class="facilitty-title">
											<h3>Creativity</h3>
										</div>
								</div>
								<div class="ila-facility-img critical-img">
										<div class="facilitty-title">
											<h3>Critical <span>thinking</span></h3>
										</div>
								</div>
								<div class="ila-facility-img communication-img">
										<div class="facilitty-title">
											<h3>Communication</h3>
										</div>
								</div>
								<div class="ila-facility-img collaboration-img">
										<div class="facilitty-title">
											<h3>Collaboration</h3>
										</div>
								</div>
								<div class="ila-facility-img self-img">
										<div class="facilitty-title">
											<h3>Self-<span>reflection</span></h3>
										</div>
								</div>
								<div class="ila-facility-img digital-img">
										<div class="facilitty-title">
											<h3>Digital <span>literacy</span></h3>
										</div>
								</div>
							</div>
							<div class="knowmore-btn-wrapper">
								<a href="teaching-method.html" class="btn-blue btn-common">Know More</a>
  						</div>
						</div>
						<div class="align-center">
						<?php
						  if(!empty($beyond_english)) {
							  foreach($beyond_english AS $rec) {
						 ?>
							<div class="lang-specific-block">
								<div class="container">
									<h5><?php echo $rec->title;?></h5>
									<div class="clearfix">
									<?php
										$media['url'] = $rec->url;
										$media['media_name'] = $rec->media_name;
										$media['raw_name'] = $rec->raw_name;
										$media['extension'] = $rec->extension;
									 ?>
										<img src="<?php echo generate_image_media_url($media, 'why_choose'); ?>" alt="<?php echo $rec->title;?>"/>
									</div>
									<div class="age-categories-container">
										<p><?php echo $rec->short_desc;?></p>
									</div>
									<a href="learning-environment.html" class="see-more">know More</a> 
								</div>
							</div>
						<?php } } ?>
						</div>
						<!-- Why Choose ILA Section-->
						<?php
						  $this->load->view('why_choose_ila');
						 ?>
					</div>