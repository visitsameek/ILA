<link href="<?php echo base_url(); ?>assets/css/jquery.timepicker.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/daterangepicker.css" rel="stylesheet">
<div class="">
    <div class="page-title">
        <div class="title_left">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Course Schedule</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if ($this->session->flashdata('error_message')) { ?>
                        <div class="alert alert-warning">
                            <?php echo $this->session->flashdata('error_message'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('success_message')) { ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ?>

                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">  
						<input type="hidden" id="hid_course_id" name="hid_course_id" value="<?php echo $course_id;?>">
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_category_id">Course Level <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="level_id" name="level_id" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php 
                                    if(!empty($course_level_list)){
                                        foreach ($course_level_list as $course_level){ ?>
                                            <option value="<?php echo $course_level->id; ?>"><?php echo $course_level->course_level; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_category_id">Training Center <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="center_id" name="center_id" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php 
                                    if(!empty($center_list)){
                                        foreach ($center_list as $center){ ?>
                                            <option value="<?php echo $center->id; ?>"><?php echo $center->center; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Class Code <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="class_code" name="class_code"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Weeks <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="weeks" name="weeks"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Hours <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="hours" name="hours"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Days <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="days" name="days"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Class Time <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="class_time_from" name="class_time_from" class="timepicker1 timepicker-with-dropdown text-center"> - <input type="text" id="class_time_to" name="class_time_to" class="timepicker2 timepicker-with-dropdown text-center">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Start Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="start_date" name="start_date"  class="form-control">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Fee <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="fee" name="fee"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="status" name="status" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <option value="Brand New">Brand New</option>
									<option value="Next Class">Next Class</option>
                                </select>                               
                            </div>
                        </div>
                                                
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" onclick="window.history.back()">Cancel</button>
                                <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
<script>
    $(document).ready(function(){
		$('input.timepicker1').timepicker({});
		$('input.timepicker2').timepicker({});

		$('#start_date').daterangepicker({
			  singleDatePicker: true,
			  calender_style: "picker_4"
			}, function(start, end, label) {
			  console.log(start.toISOString(), end.toISOString(), label);
        });
        
        $('.form-control').focus(function(){
            $('.validation').remove('.validation');
        });              
        $('#submit').click(function(e){        
           if($('#level_id').val()==""){         
               $("#level_id").parent().append("<div class='validation'>Please select course level</div>");
                return false;
           }else if($('#center_id').val()==""){         
               $("#center_id").parent().append("<div class='validation'>Please select training center </div>");
                return false;
           }else if($('#class_code').val()==""){         
               $("#class_code").parent().append("<div class='validation'>Please enter class code </div>");
                return false;
           }else if($('#weeks').val()==""){         
               $("#weeks").parent().append("<div class='validation'>Please enter weeks </div>");
                return false;
           }else if($('#hours').val()==""){         
               $("#hours").parent().append("<div class='validation'>Please enter hours </div>");
                return false;
           }else if($('#days').val()==""){         
               $("#days").parent().append("<div class='validation'>Please enter days </div>");
                return false;
           }else if($('#class_time_from').val()==""){         
               $("#class_time_from").parent().append("<div class='validation'>Please enter class time from </div>");
                return false;
           }else if($('#class_time_to').val()==""){         
               $("#class_time_to").parent().append("<div class='validation'>Please enter class time to </div>");
                return false;
           }else if($('#start_date').val()==""){         
               $("#start_date").parent().append("<div class='validation'>Please enter start date </div>");
                return false;
           }else if($('#fee').val()==""){         
               $("#fee").parent().append("<div class='validation'>Please enter fee </div>");
                return false;
           }else if($('#status').val()==""){         
               $("#status").parent().append("<div class='validation'>Please select status </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>


</body>
