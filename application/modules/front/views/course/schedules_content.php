					<div class="inner-sections" id="inner-sections">
					<!-- Course Shedule Form -->
						<div class="shedule-form">
							<div class="select-center">
								<div class="container">
									<h5>Select your Centre</h5>
									<input type="hidden" name="hidcourseid" id="hidcourseid" value="<?php echo !empty($course_id) ? $course_id : '';?>">
									<input type="hidden" name="hidcityid" id="hidcityid" value="<?php echo !empty($city_id) ? $city_id : '';?>">
									<input type="hidden" name="hidcenterid" id="hidcenterid" value="<?php echo !empty($center_id) ? $center_id : '';?>">
									<input type="hidden" name="hidlevelid" id="hidlevelid" value="<?php echo !empty($level_id) ? $level_id : '';?>">
									<input type="hidden" name="hidtimeid" id="hidtimeid" value="<?php echo !empty($time_id) ? $time_id : '';?>">
									<input type="hidden" name="hidstatusid" id="hidstatusid" value="<?php echo !empty($status_id) ? $status_id : '';?>">
									<div class="select-center-fields">
										<div class="dropdown-wrapper inp-field">
											<input class="select-input" type="text" readonly="true" name="course" value="<?php echo !empty($course_name) ? $course_name : ''; ?>" />
											<label>Select Course*</label>
											<ul class="dropdown">
											<?php 
												if(!empty($course_list)){
													foreach ($course_list as $course){ ?>
														<li><a href="javascript: void(0);" onclick="javascript: get_schedules(1, <?php echo $course->id; ?>);"><?php echo $course->course_title; ?></a></li>
											<?php } } ?>
											</ul>
											<span class="bar"></span>
										</div>
										<div class="dropdown-wrapper inp-field">
											<input class="select-input" type="text" readonly="true" name="city" value="<?php echo !empty($city_name) ? $city_name : ''; ?>" />
											<label>Select City*</label>
											<ul class="dropdown">
											<?php 
												if(!empty($city_list)){
													foreach ($city_list as $city){ ?>
														<li><a href="javascript: void(0);" onclick="javascript: get_schedules(2, <?php echo $city->id; ?>);"><?php echo $city->city_name; ?></a></li>
											<?php } } ?>
											</ul>
											<span class="bar"></span>
										</div>
										<div class="dropdown-wrapper inp-field">
											<input class="select-input" type="text" readonly="true" name="center" value="<?php echo !empty($center_name) ? $center_name : ''; ?>" />
											<label>Select Training Center*</label>
											<ul class="dropdown">
											<?php 
												if(!empty($center_list)){
													foreach ($center_list as $center){ ?>
														<li><a href="javascript: void(0);" onclick="javascript: get_schedules(3, <?php echo $center->id; ?>);"><?php echo $center->title; ?></a></li>
											<?php } } ?>
											</ul>
											<span class="bar"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="schedule-info-field">
								<div class="dropdown-wrapper inp-field">
										<input class="select-input" type="text" readonly="true" name="level" value="<?php echo !empty($level_name) ? $level_name : ''; ?>" />
										<label>Select Level</label>
										<ul class="dropdown">
										<?php 
											if(!empty($level_list)){
												foreach ($level_list as $level){ ?>
													<li><a href="javascript: void(0);" onclick="javascript: get_schedules(4, <?php echo $level->id; ?>);"><?php echo $level->title; ?></a></li>
										<?php } } ?>
										</ul>
										<span class="bar"></span>
								</div>
								<div class="dropdown-wrapper inp-field">
									<input class="select-input" type="text" readonly="true" name="level" value="<?php echo !empty($time_name) ? $time_name : ''; ?>" />
									<label>Select your Time</label>
									<ul class="dropdown">
										<?php 
											if(!empty($time_list)){
												foreach ($time_list as $time){ ?>
													<li><a href="javascript: void(0);" onclick="javascript: get_schedules(5, '<?php echo $time->time_period; ?>');"><?php echo $time->time_period; ?></a></li>
										<?php } } ?>
									</ul>
									<span class="bar"></span>
								</div>
								<div class="dropdown-wrapper inp-field">
									<input class="select-input" type="text" readonly="true" name="status" value="<?php echo !empty($status_name) ? $status_name : ''; ?>" />
									<label>Select Status</label>
									<ul class="dropdown">
										<li><a href="javascript: void(0);" onclick="javascript: get_schedules(6, 'Brand New');">Brand New</a></li>
										<li><a href="javascript: void(0);" onclick="javascript: get_schedules(6, 'Next Class');">Next Class</a></li>
									</ul>
									<span class="bar"></span>
								</div>
							</div>
						</div>
						<!-- Course shedule blocks -->
						<div class="shedule-blocks bg-light-blue">
							<div class="container">
							<?php
							  if(!empty($schedule_list)) {
								  foreach($schedule_list AS $rec) {
							 ?>
								<div class='shedule-block'>
									<table class="schedule-table" cellpadding="0" cellspacing="0">
										<tr>
											<td>Class Code</td>
											<td><?php echo $rec->class_code;?></td>
										</tr>
										<tr>
											<td>Weeks</td>
											<td><?php echo $rec->weeks;?></td>
										</tr>
										<tr>
											<td>Hours</td>
											<td><?php echo $rec->hours;?></td>
										</tr>
										<tr>
											<td>Days</td>
											<td><?php echo $rec->days;?></td>
										</tr>
										<tr>
											<td>Time</td>
											<td><?php echo $rec->class_time_from.' - '.$rec->class_time_to;?></td>
										</tr>
										<tr>
											<td>Start Date</td>
											<td>
											<?php
								                $start_date = explode('-', $rec->start_date);
												echo $start_date[2].'/'.$start_date[1].'/'.$start_date[0];?>
											</td>
										</tr>
										<tr>
											<td>Fee (VND)</td>
											<td><?php echo $rec->fee;?></td>
										</tr>
										<tr>
											<td>Status</td>
											<td><?php echo $rec->status;?></td>
										</tr>
									</table>
									<div class="btn-wrapper">
										<a href="#" class="btn-blue btn-common">Register</a>
									</div>
								</div>
							<?php } } else { echo "<div style='text-align:center; color:#ff0000;'>No Schedules Found!</div>"; } ?>
							</div>
						</div>
					</div>
				</div>
				<!-- Loader Div -->
				<div id="loaderdiv" style="display:none; background: transparent url(<?php echo base_url(); ?>front/images/loader-bg-img.jpg) 0 0 no-repeat; background-attachment: fixed; background-size: 100% 100%;  height: 100%; color: #fff;">
				<div class="overlay-bg"></div>
				<section class="ila-wrapper ila-loader clearfix">
					<div class="loader-wrapper table">
						<div class="loader-section table-cell">
							<div class="loader">	
								<div class="rotcircle"></div>
								<div class="loader-logo">
									<img src="<?php echo base_url(); ?>front/images/loader-logo.png">
								</div>
							</div>
						</div>
					</div>
				</section>
				</div>
				<!-- Loader Div -->
				<script type="text/javascript">
				<!--
					function show_loader(){
						$('#inner-sections').hide();
						$('#loaderdiv').show();
					}

					function get_schedules(flag, rec)
					{
						setTimeout(show_loader, 100);

						if(flag == 1)
							window.location.href = '<?php echo base_url("schedules/");?>'+rec;
						else if(flag == 2)
							window.location.href = '<?php echo base_url("schedules/");?>'+$("#hidcourseid").val()+'/'+rec;
						else if(flag == 3)
							window.location.href = '<?php echo base_url("schedules/");?>'+$("#hidcourseid").val()+'/'+$("#hidcityid").val()+'/'+rec;
						else if(flag == 4)
							window.location.href = '<?php echo base_url("schedules/");?>'+$("#hidcourseid").val()+'/'+$("#hidcityid").val()+'/'+$("#hidcenterid").val()+'/'+rec;
						else if(flag == 5)
							window.location.href = '<?php echo base_url("schedules/");?>'+$("#hidcourseid").val()+'/'+$("#hidcityid").val()+'/'+$("#hidcenterid").val()+'/'+$("#hidlevelid").val()+'/'+rec;
						else if(flag == 6)
							window.location.href = '<?php echo base_url("schedules/");?>'+$("#hidcourseid").val()+'/'+$("#hidcityid").val()+'/'+$("#hidcenterid").val()+'/'+$("#hidlevelid").val()+'/'+$("#hidtimeid").val()+'/'+rec;
					}
				//-->
				</script>