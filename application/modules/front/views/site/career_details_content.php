					<div class="inner-sections" id="inner-sections">
						<div class="careers-wrapper career-details bg-light-blue">
							<div class="white-box-list">
								<h5>Job Information:</h5>
								<div class="list-wrap">
									<ul class="white-box-blocks  list-with-bullets">
										<?php echo $job_details->job_info;?>
									</ul>
								</div>
							</div>
							<div class="white-box-list">
								<h5>Job Requirement:</h5>
								<div class="list-wrap">
									<ul class="white-box-blocks list-with-bullets">
										<?php echo $job_details->job_requirement;?>
									</ul>
								</div>
							</div>
								<div class="job-details">
									<div class="job-detail-block">
										<label>Location</label>
										<span><?php echo $job_details->city_name;?></span>
									</div>
									<div class="job-detail-block">
										<label>Level</label>
										<span><?php echo $job_details->job_level;?></span>
									</div>
									<div class="job-detail-block">
										<label>Department</label>
										<span><?php echo $job_details->job_department;?></span>
									</div>
									<div class="job-detail-block">
										<label>Contact Information</label>
										<span>Head Office - Human Resources </span>
										<span class="tel-number"><?php echo $job_details->contact_phone;?></span>
									</div>
									<div class="job-detail-block">
										<label>Email</label>
										<span><a href="mailto:<?php echo $job_details->contact_email;?>"><?php echo $job_details->contact_email;?></a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>