<div class="">
    <div class="page-title">
        <div class="title_left"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Training Center</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Center <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="center" name="center" class="form-control col-md-7 col-xs-12" value="<?php echo isset($center_details->center) ? $center_details->center : ""; ?>"  >
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Center Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($center_details->title) ? $center_details->title : ""; ?>">
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="city_id" name="city_id" class="form-control col-md-7 col-xs-12" onchange="javascript: get_districts(this.value);">
                                    <option value="">Select</option>
                                    <?php 
                                    if(!empty($city_list)){
                                        foreach ($city_list as $city){ ?>
                                            <option value="<?php echo $city->id; ?>" <?php echo ($center_details->city_id==$city->id) ? "selected" : ""; ?>><?php echo $city->city; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>
                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="district_id">District <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="district_id" name="district_id" class="form-control col-md-7 col-xs-12" >
                                </select>								
                            </div>
							<span id="loaddiv" style="display:none;"><img src="<?php echo base_url(); ?>assets/img/loader.gif" width="32" height="32"></span>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span> 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="address" name="address"  class="form-control col-md-7 col-xs-12"><?php echo isset($center_details->address) ? $center_details->address : ""; ?></textarea>                                
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="phone" name="phone"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($center_details->phone) ? $center_details->phone : ""; ?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_id">Email Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="email_id" name="email_id"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($center_details->email_id) ? $center_details->email_id : ""; ?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Center Image </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview">
                                <?php load_medias($center_details->media_id, $input_media_id = '#input-media', true); ?>
                            </div>
                                <input id="input-media" type="hidden" value="<?php echo $center_details->media_id; ?>" name="media_id" class="form-control" />
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
		
		var city = '<?php echo $center_details->city_id;?>';
		var district = '<?php echo $center_details->district_id;?>';
		get_districts(city, district);
        
        $('.form-control').focus(function(){
            $('.validation').remove('.validation');
        });              
        $('#submit').click(function(e){        
           if($('#center').val()==""){         
               $("#center").parent().append("<div class='validation'>Please enter center</div>");
                return false;
           }else if($('#title').val()==""){         
               $("#title").parent().append("<div class='validation'>Please enter center title </div>");
                return false;
           }else if($('#city_id').val()==""){         
               $("#city_id").parent().append("<div class='validation'>Please select city </div>");
                return false;
           }else if($('#district_id').val()==""){         
               $("#district_id").parent().append("<div class='validation'>Please select district </div>");
                return false;
           }else if($('#address').val()==""){         
               $("#address").parent().append("<div class='validation'>Please enter address </div>");
                return false;
           }else if($('#phone').val()==""){         
               $("#phone").parent().append("<div class='validation'>Please enter phone </div>");
                return false;
           }else if($('#email_id').val()==""){         
               $("#email_id").parent().append("<div class='validation'>Please enter email address </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });

	function get_districts(city, district)
	{
		$("#loaddiv").show();
		$.ajax({
			  type: "POST",
			  url: "<?php echo base_url(); ?>admin/center/get_district_select_list/"+city+"/"+district,
			  success: function(msg){
					//alert(msg);
					$("#loaddiv").hide();
					$("#district_id").html(msg);
			  }
		});
	}
</script>

</body>
