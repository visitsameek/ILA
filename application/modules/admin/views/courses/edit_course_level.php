<div class="">
    <div class="page-title">
        <div class="title_left"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Course Level</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

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
						<input type="hidden" id="hid_course_level_id" name="hid_course_level_id" value="<?php echo $course_level_id;?>">
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Course Level <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="course_level" name="course_level" class="form-control col-md-7 col-xs-12" value="<?php echo isset($course_level_details->course_level) ? $course_level_details->course_level : ""; ?>"  >
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Course Level in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title" value="<?php echo isset($course_level_details->title) ? $course_level_details->title : ""; ?>" class="form-control col-md-7 col-xs-12">
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
                                            <option value="<?php echo $con->id; ?>" <?php echo ($course_level_details->program_id==$con->id) ? "selected" : ""; ?>><?php echo $con->program; ?></option>
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
                                <input type="text" id="duration_hours" name="duration_hours" value="<?php echo isset($course_level_details->duration_hours) ? $course_level_details->duration_hours : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Duration (Months)<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="duration_months" name="duration_months" value="<?php echo isset($course_level_details->duration_months) ? $course_level_details->duration_months : ""; ?>" class="form-control col-md-7 col-xs-12">
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
										<option value="<?php echo $i; ?>" <?php echo $course_level_details->age_from == $i ? 'selected' : '';?>><?php echo $i;?></option>
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
										<option value="<?php echo $i; ?>" <?php echo $course_level_details->age_to == $i ? 'selected' : '';?>><?php echo $i;?></option>
                                    <?php } ?>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Video Link  
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="video_link" name="video_link"  class="form-control col-md-7 col-xs-12"><?php echo isset($course_level_details->video_link) ? $course_level_details->video_link : ""; ?></textarea>                                
                            </div>
							<div class="">
								<?php $img_src = '';
								if($course_level_details->video_link != ''){
									$img_src = youtube_video_thumb($course_level_details->video_link);//embeded url
								}
								if($img_src != ''){
									$video_id = get_youtube_video_id($course_level_details->video_link);?>
									<a href="#myModal" data-toggle="modal">
										<img id="show_library_medias" title="click to play video" src="<?php echo $img_src;?>" alt="video_thumb" width="70">
									</a>
									<script type="text/javascript">
										$('#show_library_medias').click(function (e) {
											$("#myModal").on('show.bs.modal', function(){
												$("#yvideo").html($('#video_link').val());
											});
										});
									</script>
								<?php }?>
							</div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">CEFR
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cefr" name="cefr" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <option value="-A1" <?php echo $course_level_details->cefr == '-A1' ? 'selected' : '';?>>-A1</option>
									<option value="A1" <?php echo $course_level_details->cefr == 'A1' ? 'selected' : '';?>>A1</option>
									<option value="A2" <?php echo $course_level_details->cefr == 'A2' ? 'selected' : '';?>>A2</option>
									<option value="B1" <?php echo $course_level_details->cefr == 'B1' ? 'selected' : '';?>>B1</option>
									<option value="B2" <?php echo $course_level_details->cefr == 'B2' ? 'selected' : '';?>>B2</option>
									<option value="C1" <?php echo $course_level_details->cefr == 'C1' ? 'selected' : '';?>>C1</option>
									<option value="C2" <?php echo $course_level_details->cefr == 'C2' ? 'selected' : '';?>>C2</option>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cambridge Exams
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cambridge_exam" name="cambridge_exam" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <option value="Starters" <?php echo $course_level_details->cambridge_exam == 'Starters' ? 'selected' : '';?>>Starters</option>
									<option value="Movers" <?php echo $course_level_details->cambridge_exam == 'Movers' ? 'selected' : '';?>>Movers</option>
									<option value="Flyers" <?php echo $course_level_details->cambridge_exam == 'Flyers' ? 'selected' : '';?>>Flyers</option>
									<option value="KET" <?php echo $course_level_details->cambridge_exam == 'KET' ? 'selected' : '';?>>KET</option>
									<option value="PET" <?php echo $course_level_details->cambridge_exam == 'PET' ? 'selected' : '';?>>PET</option>
									<option value="FCE" <?php echo $course_level_details->cambridge_exam == 'FCE' ? 'selected' : '';?>>FCE</option>
									<option value="CAE" <?php echo $course_level_details->cambridge_exam == 'CAE' ? 'selected' : '';?>>CAE</option>
									<option value="CPE" <?php echo $course_level_details->cambridge_exam == 'CPE' ? 'selected' : '';?>>CPE</option>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">IELTS
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="ielts" name="ielts" value="<?php echo isset($course_level_details->ielts) ? $course_level_details->ielts : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">TOEFL iBT
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="toefl_ibt" name="toefl_ibt" value="<?php echo isset($course_level_details->toefl_ibt) ? $course_level_details->toefl_ibt : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">TOEIC (Reading/Listening)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="toeic_reading" name="toeic_reading" value="<?php echo isset($course_level_details->toeic_reading) ? $course_level_details->toeic_reading : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">TOEIC (Speaking/Writing)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="toeic_writing" name="toeic_writing" value="<?php echo isset($course_level_details->toeic_writing) ? $course_level_details->toeic_writing : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="button" id="add" value="Add Sub Level" class="btn btn-dark" />
								<input type="button" id="del" value="Remove Sub Level" class="btn btn-danger" />
							</div>
						 </div>

						<?php
                          if (!empty($course_sub_levels)) {
							foreach ($course_sub_levels as $sub_levels) {
                         ?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Sub Level Title </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="sub_level_title[]" value="<?php echo $sub_levels->sub_level_title; ?>" class="form-control col-md-7 col-xs-12" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Cambridge Exams </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="sub_cambridge_exam[]" value="<?php echo $sub_levels->cambridge_exam; ?>" class="form-control col-md-7 col-xs-12" />
							</div>
						</div>
						<?php } } ?>
						
						<div class="dynamic_text"></div>

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
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h4 class="modal-title">YouTube Video</h4>
			</div>
			<div class="modal-body">
				<div id="yvideo"></div>
			</div>
		</div>
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

		$('#add').click(function () {

            var days = $('.dynamic_text').find('.form-group').length + 1;

            $('.dynamic_text').append('<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Sub Level Title </label><div class="col-md-6 col-sm-6 col-xs-12"><input type="text" name="sub_level_title[]" class="form-control col-md-7 col-xs-12" /></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Cambridge Exams </label><div class="col-md-6 col-sm-6 col-xs-12"><input type="text" name="sub_cambridge_exam[]" class="form-control col-md-7 col-xs-12" /></div></div>');


        });
        $('#del').click(function () {

            $('.dynamic_text').find('.form-group').last().remove();
        });
    });
</script>
</body>
