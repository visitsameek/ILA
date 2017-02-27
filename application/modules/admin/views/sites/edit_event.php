<link href="<?php echo base_url(); ?>assets/css/jquery.timepicker.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/daterangepicker.css" rel="stylesheet">
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
                    <h2>Edit Event</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name">Event <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="event" name="event" value="<?php echo isset($event_details->event) ? $event_details->event : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Event Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title" value="<?php echo isset($event_details->title) ? $event_details->title : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>              
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Event Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<?php 
								  $event_date = explode('-', $event_details->event_date);
								 ?>
                                <input type="text" id="event_date" name="event_date" value="<?php echo isset($event_details->event_date) ? $event_date[1].'/'.$event_date[2].'/'.$event_date[0] : ""; ?>" class="form-control">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Event Time <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="event_time" name="event_time" value="<?php echo isset($event_details->event_time) ? $event_details->event_time : ""; ?>" class="form-control timepicker timepicker-with-dropdown text-center">
                            </div>
                        </div>						
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Parent">City <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="city_id" id="city_id" class="form-control col-md-7 col-xs-12">
                                    <option value="">Select</option>
                                    <?php if(!empty($city_list)){
                                        foreach($city_list as $key=>$city){
											$selected = $event_details->city_id==$city->id ? "selected" : "";
                                            echo '<option value="'.$city->id.'" '.$selected.'>'.$city->city.'</option>';
                                        }
                                    }?>
                               </select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name">Event Place in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="event_place" name="event_place" value="<?php echo isset($event_details->event_place) ? $event_details->event_place : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Short Description in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="short_desc" id="short_desc" class="form-control col-md-7 col-xs-12"><?php echo isset($event_details->short_desc) ? $event_details->short_desc : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Content in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="10" name="content" id="content" class="form-control col-md-7 col-xs-12"><?php echo isset($event_details->content) ? $event_details->content : ""; ?></textarea>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Image </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview">
                                <?php load_medias($event_details->media_id, $input_media_id = '#input-media', true); ?>
                            </div>
                                <input id="input-media" type="hidden" value="<?php echo $event_details->media_id; ?>" name="media_id" class="form-control" />
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

<script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
<script>
    $(document).ready(function(){
		$('input.timepicker').timepicker({});

		$('#event_date').daterangepicker({
			  singleDatePicker: true,
			  calender_style: "picker_4"
			}, function(start, end, label) {
			  console.log(start.toISOString(), end.toISOString(), label);
        });

		bkLib.onDomLoaded(function() {
			new nicEditor({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'}).panelInstance('content');
			//nicEditors.allTextAreas({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'});
		});
        
        $('.form-control').focus(function(){
            $('.validation').remove('.validation');
        });              
        $('#submit').click(function(e){        
           if($('#event').val()==""){         
               $("#event").parent().append("<div class='validation'>Please enter event</div>");
                return false;
           }else if($('#title').val()==""){         
               $("#title").parent().append("<div class='validation'>Please enter event title </div>");
                return false;
           }else if($('#event_date').val()==""){         
               $("#event_date").parent().append("<div class='validation'>Please enter event date </div>");
                return false;
           }else if($('#event_time').val()==""){         
               $("#event_time").parent().append("<div class='validation'>Please enter event time </div>");
                return false;
           }else if($('#city_id').val()==""){         
               $("#city_id").parent().append("<div class='validation'>Please select city </div>");
                return false;
           }else if($('#event_place').val()==""){         
               $("#event_place").parent().append("<div class='validation'>Please enter event place </div>");
                return false;
           }else if($('#short_desc').val()==""){         
               $("#short_desc").parent().append("<div class='validation'>Please enter short description </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>

</body>
