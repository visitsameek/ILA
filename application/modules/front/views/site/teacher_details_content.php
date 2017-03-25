					<div class="inner-sections" id="inner-sections">
						<!-- upcoming Events Section-->
						<div class="event-wrapper">
							<div class="container">
								<div class="event-update-details">
									<h5><?php echo $teacher_details->first_name.' '.$teacher_details->last_name;?></h5>
									<div class="teacher-country" style="text-align:center; padding: 0 0 10px;">
										<span class="flag-img"><img src="<?php echo base_url(); ?>front/images/flag-country-vietnam.jpg" alt="Vietnam"/></span>
										<span><?php echo $teacher_details->country;?></span>
									</div>
									<div class="event-block">
										<div class="event-img">
											<img src="<?php echo !empty($teacher_details->img_url) ? $teacher_details->img_url : base_url().'front/images/no_person.jpg';?>" alt="<?php echo $teacher_details->first_name.' '.$teacher_details->last_name;?>"/>
										</div>
										<div class="video-wrapper clearfix" style="padding-top:0.77778vw !important;">
											<div class="container">
												<p><?php echo $teacher_details->certificate_details;?></p>
											</div>
										</div>
										<div class="content-wrapper clearfix">
											<div class="container">
												<p><?php echo $teacher_details->content;?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>