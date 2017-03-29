<script src="<?php echo base_url(); ?>assets/js/nicEdit.js" type="text/javascript"></script>
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
                    <h2>Add Job</h2>
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

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name">Job Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="job" name="job" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Job Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="job_title" name="job_title" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> 						
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="city_id" name="city_id" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php 
                                    if(!empty($city_list)){
                                        foreach ($city_list as $city){ ?>
                                            <option value="<?php echo $city->id; ?>"><?php echo $city->city; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>
                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name">Contact Number
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="contact_phone" name="contact_phone" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name">Email
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="contact_email" name="contact_email" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Level in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="job_level" name="job_level" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Department in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="job_department" name="job_department" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Job Information in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="10" name="job_info" id="job_info" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Job Requirement in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="10" name="job_requirement" id="job_requirement" class="form-control col-md-7 col-xs-12"></textarea>
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

		bkLib.onDomLoaded(function() {
			//new nicEditor({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'}).panelInstance('content');
			nicEditors.allTextAreas({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'});
		});
        
        $('.form-control').focus(function(){
            $('.validation').remove('.validation');
        });              
        $('#submit').click(function(e){        
           if($('#job').val()==""){         
               $("#job").parent().append("<div class='validation'>Please enter job title </div>");
                return false;
           }else if($('#job_title').val()==""){         
               $("#job_title").parent().append("<div class='validation'>Please enter job title </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>
