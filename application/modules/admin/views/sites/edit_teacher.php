<script src="<?php echo base_url(); ?>assets/js/nicEdit.js" type="text/javascript"></script>
<div class="">
    <div class="page-title">
        <div class="title_left"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Teacher</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name">Teacher Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="teacher_name" name="teacher_name" value="<?php echo isset($teacher_details->teacher_name) ? $teacher_details->teacher_name : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">First Name in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first_name" name="first_name" value="<?php echo isset($teacher_details->first_name) ? $teacher_details->first_name : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Last Name in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last_name" name="last_name" value="<?php echo isset($teacher_details->last_name) ? $teacher_details->last_name : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_id">Country <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="country_id" name="country_id" class="form-control col-md-7 col-xs-12">
                                    <option value="">Select Country</option>
                                    <?php 
                                    if(!empty($country_list)){
                                        foreach ($country_list as $country){ ?>
                                            <option value="<?php echo $country->id; ?>" <?php echo $teacher_details->country_id == $country->id ? 'selected' : '';?>><?php echo $country->nicename; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>                               
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Certificate Details in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="certificate_details" id="certificate_details" class="form-control col-md-7 col-xs-12"><?php echo isset($teacher_details->certificate_details) ? $teacher_details->certificate_details : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Description in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="10" name="content" id="content" class="form-control col-md-7 col-xs-12"><?php echo isset($teacher_details->content) ? $teacher_details->content : ""; ?></textarea>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview">
                                <?php load_medias($teacher_details->media_id, $input_media_id = '#input-media', true); ?>
                            </div>
                                <input id="input-media" type="hidden" value="<?php echo $teacher_details->media_id; ?>" name="media_id" class="form-control" />
								<!-- Large modal -->
								<button type="button" class="btn btn-primary media-button" data-input-field="#input-media"  data-preview="#preview" >Media</button>
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
			new nicEditor({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'}).panelInstance('content');
			//nicEditors.allTextAreas({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'});
		});
        
        $('.form-control').focus(function(){
            $('.validation').remove('.validation');
        });              
        $('#submit').click(function(e){        
           if($('#teacher_name').val()==""){         
               $("#teacher_name").parent().append("<div class='validation'>Please enter teacher name</div>");
                return false;
           }else if($('#first_name').val()==""){         
               $("#first_name").parent().append("<div class='validation'>Please enter first name </div>");
                return false;
           }else if($('#last_name').val()==""){         
               $("#last_name").parent().append("<div class='validation'>Please enter last name </div>");
                return false;
           }else if($('#country_id').val()==""){         
               $("#country_id").parent().append("<div class='validation'>Please select country </div>");
                return false;
           }else if($('#certificate_details').val()==""){         
               $("#certificate_details").parent().append("<div class='validation'>Please enter certificate details </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>

</body>
