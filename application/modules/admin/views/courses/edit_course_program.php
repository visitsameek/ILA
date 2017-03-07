<div class="">
    <div class="page-title">
        <div class="title_left"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Course Program</h2>
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
						<input type="hidden" id="hid_course_program_id" name="hid_course_program_id" value="<?php echo $course_program_id;?>">
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Course Program <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="program" name="program" class="form-control col-md-7 col-xs-12" value="<?php echo isset($course_program_details->program) ? $course_program_details->program : ""; ?>"  >
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Course Program in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="program_name" name="program_name" value="<?php echo isset($course_program_details->program_name) ? $course_program_details->program_name : ""; ?>" class="form-control col-md-7 col-xs-12">
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
           if($('#program').val()==""){         
               $("#program").parent().append("<div class='validation'>Please enter course program</div>");
                return false;
           }else if($('#program_name').val()==""){         
               $("#program_name").parent().append("<div class='validation'>Please enter course program </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>
</body>
