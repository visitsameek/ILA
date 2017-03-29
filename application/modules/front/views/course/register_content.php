					<div class="inner-sections" id="inner-sections">
					<!-- Course Shedule Form -->
						<div class="shedule-form">
							<div class="select-center">
								<div class="container">
								<?php if ($this->session->flashdata('error_message')) { ?>
									<div class="alert alert-warning" style="color:red; text-align:center;">
										<?php echo $this->session->flashdata('error_message'); ?>
									</div>
								<?php } ?>
								<?php if ($this->session->flashdata('success_message')) { ?>
									<div class="alert alert-success" style="color:green; text-align:center;">
										<?php echo $this->session->flashdata('success_message'); ?>
									</div>
								<?php } ?>
									<h5>Register</h5>
									<form name="frmregister" id="frmregister" action="" method="POST" class="select-center-fields">
									<input type="hidden" name="hidcourseid" id="hidcourseid" value="<?php echo !empty($course_id) ? $course_id : '';?>">
									<input type="hidden" name="hidlevelid" id="hidlevelid" value="<?php echo !empty($level_id) ? $level_id : '';?>">
									<input type="hidden" name="hidscheduleid" id="hidscheduleid" value="<?php echo !empty($schedule_id) ? $schedule_id : '';?>">

									<input type="hidden" name="id_course" id="id_course"/>
									<input type="hidden" name="id_city" id="id_city"/>
									<input type="hidden" name="id_center" id="id_center"/>

										<div class="inp-field">
											<input class="select-input" type="text" name="parent_name" id="parent_name"/>
											<label>Parent Name</label>
											<span class="bar"></span>
										</div>
										<div class="inp-field">
											<input class="select-input" type="text" name="first_name" id="first_name"/>
											<label>Student First Name*</label>
											<span class="bar"></span>
										</div>
										<div class="inp-field">
											<input class="select-input" type="text" name="last_name" id="last_name"/>
											<label>Student Last Name*</label>
											<span class="bar"></span>
										</div>
										<div class="inp-field datetime-field">
											<input type="text" value="" readonly class="date datetime" name="birthdate" id="birthdate"/>
											<label>Date of Birth</label>
											<span class="bar"></span>
										</div>
										<div class="dropdown-wrapper inp-field">
											<input class="select-input" type="text" readonly="true" name="gender" id="gender"/>
											<label>Gender</label>
											<ul class="dropdown">
												<li><a href="#">Male</a></li>
												<li><a href="#">Female</a></li>
											</ul>
											<span class="bar"></span>
										</div>
										<div class="inp-field">
											<input class="select-input" type="text" name="phone" id="phone" />
											<label>Phone*</label>
											<span class="bar"></span>
										</div>
										<div class="inp-field">
											<input class="select-input" type="email" name="email_id" id="email_id"/>
											<label>Email Address*</label>
											<span class="bar"></span>
										</div>
										<div class="dropdown-wrapper inp-field">
											<input class="select-input" type="text" name="course" id="course"/>											
											<label>Course</label>
											<ul class="dropdown">
											<?php 
												if(!empty($course_list)){
													foreach ($course_list as $course){ ?>
														<li><a href="javascript: void(0);" onclick="$('#id_course').val(<?php echo $course->id; ?>);"><?php echo $course->course_title; ?></a></li>
											<?php } } ?>
											</ul>
											<span class="bar"></span>
										</div>
										<div class="dropdown-wrapper inp-field">
											<input class="select-input" type="text" readonly="true" name="city" id="city"/>
											<label>City</label>
											<ul class="dropdown">
											<?php 
												if(!empty($city_list)){
													foreach ($city_list as $city){ ?>
														<li><a href="javascript: void(0);"><?php echo $city->city_name; ?></a></li>
											<?php } } ?>
											</ul>
											<span class="bar"></span>
										</div>
										<!-- <div class="dropdown-wrapper inp-field">
											<input class="select-input" type="text" readonly="true" name="center" id="center"/>
											<label>Center</label>
											<ul class="dropdown" id="center_list">
											</ul>
											<span class="bar"></span>
										</div> -->
										<div class="dropdown-wrapper inp-field">
											<input class="select-input" type="text" readonly="true" name="current_student" id="current_student"/>
											<label>Are you an ILA Student?</label>
											<ul class="dropdown">
												<li><a href="#">Yes</a></li>
												<li><a href="#">No</a></li>
											</ul>
											<span class="bar"></span>
										</div>
										<!-- <div class="inp-field">
									      <div class="g-recaptcha" data-sitekey="6Lf4GRoUAAAAADSPiAwE4-RAVGIWq5L8biEwFOrw"></div>
										</div> -->
										<div class="btn-common-wrapper corporate-ragister-btn">
											<input type="submit" class="btn-common btn-blue" name="btnSubmit" id="btnSubmit" value="Submit" />
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
<script type="text/javascript" src="<?php echo base_url(); ?>front/js/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>front/js/jqueryui/jquer-ui-timepicker.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.date').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'MM dd, yy'
	});
	jQuery('.time').timepicker({
		timeFormat: 'h:mm p',
		change: function(time) {
			this.siblings('label').addClass('active-label');
		}
	});
	jQuery(document).click(function(e) { 
			if(!jQuery(e.target).closest('.ui-timepicker-container, .datetime-field').length) {
				  e.stopPropagation();
				  if(jQuery('.ui-timepicker-container').is(":visible")) {
					jQuery('.ui-timepicker-container').hide();
				  }
				} 
	});
});

function get_centers(city_id) {
	$.ajax({type: "POST",
			url: "<?php echo base_url(); ?>front/course/get_center_list/"+city_id,
			success: function(msg){
				//alert(msg);
				$("#center_list").html(msg);
			}
		});
}
</script>
<script src="<?php echo base_url(); ?>front/js/jquery.validate.js"></script>
<script type="text/javascript">
<!--
$.validator.addMethod("validEmail", function(value, element) 
{
	if(value == '') 
		return true;
	var temp1;
	temp1 = true;
	var ind = value.indexOf('@');
	var str2=value.substr(ind+1);
	var str3=str2.substr(0,str2.indexOf('.'));
	if(str3.lastIndexOf('-')==(str3.length-1)||(str3.indexOf('-')!=str3.lastIndexOf('-')))
		return false;
	var str1=value.substr(0,ind);
	if((str1.lastIndexOf('_')==(str1.length-1))||(str1.lastIndexOf('.')==(str1.length-1))||(str1.lastIndexOf('-')==(str1.length-1)))
		return false;
	str = /(^[a-zA-Z0-9]+[\._-]{0,1})+([a-zA-Z0-9]+[_]{0,1})*@([a-zA-Z0-9]+[-]{0,1})+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,3})$/;
	temp1 = str.test(value);
	return temp1;
});

$('#frmregister').validate({
		rules:{
			first_name:{
				required: true
			},
			last_name:{
				required: true
			},
			email_id:{
				required: true,
				validEmail: true
			},
			phone:{
				required: true,
				digits: true,
				minlength: 9
			}
		},
		messages:{
			first_name:{
				required: 'Please enter first name'
			},
			last_name:{
				required: 'Please enter last name'
			},
			email_id:{
				required: 'Please enter email address',
				validEmail: 'Please enter a valid email address'
			},
			phone:{
				required: 'Please enter phone',
				digits: 'Only numbers allowed',
				minlength: 'Minimum 9 digits required'
			}
		}
	});
</script>