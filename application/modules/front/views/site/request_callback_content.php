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
									<h5>Request a Callback</h5>
									<form name="frmcallback" id="frmcallback" action="" class="" method="POST">
									<div class="select-center-fields">
										<div class="inp-field">
											<input class="select-input" type="text" name="first_name" id="first_name"/>
											<label>First Name*</label>
											<span class="bar"></span>
										</div>
										<div class="inp-field">
											<input class="select-input" type="text" name="last_name" id="last_name"/>
											<label>Last Name*</label>
											<span class="bar"></span>
										</div>
										<div class="inp-field datetime-field">
											<input type="text" value="" readonly class="date datetime" name="preffered_call_date" id="preffered_call_date"/>
											<label>Preferred Date for Call</label>
											<span class="bar"></span>
										</div>
										<div class="inp-field datetime-field time-wrapper">
											<input type="text" value="" readonly class="time datetime" name="preffered_call_time" id="preffered_call_time"/>
											<label>Preferred Time for Call</label>
											<span class="bar"></span>
										</div>
										<div class="inp-field">
											<input class="select-input" type="text" name="phone" id="phone"/>
											<label>Phone*</label>
											<span class="bar"></span>
										</div>
										<div class="inp-field">
											<input class="select-input" type="email" name="email_id" id="email_id"/>
											<label>Email Address*</label>
											<span class="bar"></span>
										</div>
										<div class="btn-common-wrapper corporate-ragister-btn">
											<input type="submit" class="btn-common btn-blue" name="btnSubmit" id="btnSubmit" value="Request a Callback" />
										</div>
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

$('#frmcallback').validate({
		rules:{
			first_name:{
				required: true
			},
			last_name:{
				required: true
			},
			phone:{
				required: true,
				digits: true,
				minlength: 9
			},
			email_id:{
				required: true,
				validEmail: true
			}
		},
		messages:{
			first_name:{
				required: 'Please enter first name'
			},
			last_name:{
				required: 'Please enter last name'
			},
			phone:{
				required: 'Please enter phone',
				digits: 'Only numbers allowed',
				minlength: 'Minimum 9 digits required'
			},
			email_id:{
				required: 'Please enter email address',
				validEmail: 'Please enter a valid email address'
			}
		}
	});
</script>