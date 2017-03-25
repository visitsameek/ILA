					<div class="inner-sections" id="inner-sections">
						<!-- team slideshow -->
						<div class="teacher-deatils">						
							<div class="teacher-slides  align-center">
								<div class="teacher-detail">
									<div class="teacher-img">
										<img src="<?php echo !empty($teacher_details->img_url) ? $teacher_details->img_url : base_url().'front/images/no_person.jpg';?>" alt="<?php echo $teacher_details->first_name.' '.$teacher_details->last_name;?>"/>
									</div>
									<div class="teacher-info">
										<h5><?php echo $teacher_details->first_name.' '.$teacher_details->last_name;?></h5>
										<div class="teacher-country">
											<span class="flag-img"><img src="<?php echo base_url(); ?>front/images/flag-country-vietnam.jpg" alt="Vietnam"/></span>
											<span><?php echo $teacher_details->country;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="bg-light-blue about-teacher">
								<div class="container">
									<h5 class="align-left">Certificate Details</h5>
									<p><?php echo $teacher_details->certificate_details;?></p>	
								</div>
							</div>
							<div class="white-box-list teacher-detail-box">
								<div class="container">
									<p><?php echo $teacher_details->content;?></p>
								</div>
							</div>
						</div>
					</div>