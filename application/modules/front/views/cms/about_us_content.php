					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="content-wrapper clearfix">
							<div class="container">
								<!-- <p>ILA Vietnam is a foreign-owned educational and training company, founded in 1998.</p> -->
								<p><?php echo $cms->content;?></p>
							</div>
						</div>
						<!-- Why Choose ILA Section-->
						<?php
						  $this->load->view('why_choose_ila');
						 ?>
						<!-- about ila Section-->
						<div class="about-ila">
							<div class="container">
								<div class="about-block">
									<div class="about-img">
										<img src="<?php echo base_url(); ?>front/images/about-vision.jpg" alt="Vision, Mission & Core Values"/>
									</div>
									<div class="about-block-title">
										<h3>Vision, Mission &amp; <span>Core Values</span></h3>
									</div>
									<div class="btn-wrapper">
										<a href="<?php echo base_url('values'); ?>" class="btn-blue btn-common">View</a>
									</div>
								</div>
								<div class="about-block">
									<div class="about-img">
										<img src="<?php echo base_url(); ?>front/images/about-awards.jpg" alt="Awards & Recognition"/>
									</div>
									<div class="about-block-title">
										<h3>Awards &amp; <span>Recognition</span></h3>
									</div>
									<div class="btn-wrapper">
										<a href="<?php echo base_url('awards'); ?>" class="btn-blue btn-common">View</a>
									</div>
								</div>
								<div class="about-block">
									<div class="about-img">
										<img src="<?php echo base_url(); ?>front/images/about-centres.jpg" alt="Centres"/>
									</div>
									<div class="about-block-title">
										<h3>Centres</h3>
									</div>
									<div class="btn-wrapper">
										<a href="<?php echo base_url('centers/1'); ?>" class="btn-blue btn-common">View</a>
									</div>
								</div>
							</div>
						</div>
					</div>