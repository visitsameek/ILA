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
                    <h2>Add Course Level</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Course Level<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="course_level" name="course_level"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Course Level in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_category_id">Course Program 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="program_id" name="program_id" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php 
                                    if(!empty($program_list)){
                                        foreach ($program_list as $con){ ?>
                                            <option value="<?php echo $con->id; ?>"><?php echo $con->program; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Duration (Hours)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="duration_hours" name="duration_hours"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Duration (Months)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="duration_months" name="duration_months"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Age From
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="age_from" name="age_from" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php
                                      for ($i=1;$i<=20;$i++){ ?>
										<option value="<?php echo $i; ?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Age To
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="age_to" name="age_to" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php
                                      for ($i=1;$i<=20;$i++){ ?>
										<option value="<?php echo $i; ?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Video Link  
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="video_link" name="video_link"  class="form-control col-md-7 col-xs-12"></textarea>                                
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">CEFR
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cefr" name="cefr" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <option value="-A1">-A1</option>
									<option value="A1">A1</option>
									<option value="A2">A2</option>
									<option value="B1">B1</option>
									<option value="B2">B2</option>
									<option value="C1">C1</option>
									<option value="C2">C2</option>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cambridge Exams
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cambridge_exam" name="cambridge_exam" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <option value="Starters">Starters</option>
									<option value="Movers">Movers</option>
									<option value="Flyers">Flyers</option>
									<option value="KET">KET</option>
									<option value="PET">PET</option>
									<option value="FCE">FCE</option>
									<option value="CAE">CAE</option>
									<option value="CPE">CPE</option>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">IELTS
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="ielts" name="ielts"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">TOEFL iBT
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="toefl_ibt" name="toefl_ibt"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">TOEIC (Reading/Listening)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="toeic_reading" name="toeic_reading"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">TOEIC (Speaking/Writing)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="toeic_writing" name="toeic_writing"  class="form-control col-md-7 col-xs-12">
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

<script>
    $(document).ready(function(){   
        
        $('.form-control').focus(function(){
            $('.validation').remove('.validation');
        });              
        $('#submit').click(function(e){        
           if($('#course_level').val()==""){         
               $("#course_level").parent().append("<div class='validation'>Please enter course level</div>");
                return false;
           }else if($('#title').val()==""){         
               $("#title").parent().append("<div class='validation'>Please enter course level </div>");
                return false;
           }else if($('#duration_hours').val()==""){         
               $("#duration_hours").parent().append("<div class='validation'>Please enter duration in hours </div>");
                return false;
           }else if($('#duration_months').val()==""){         
               $("#duration_months").parent().append("<div class='validation'>Please enter duration in months </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>


</body>
