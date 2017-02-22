<script src="<?php echo base_url(); ?>assets/js/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
 
</script>
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
                    <h2>General Settings</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact Info">Address in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="site_address" name="site_address" class="form-control col-md-7 col-xs-12" style="resize: none;"><?php echo isset($settings->site_address)?$settings->site_address:"";?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email">Email<span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="site_email" name="site_email" class="form-control col-md-7 col-xs-12" value="<?php echo isset($settings->site_email)?$settings->site_email:" "; ?>">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact No.">Contact No.<span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="site_contact_no" name="site_contact_no" class="form-control col-md-7 col-xs-12" value="<?php echo isset($settings->site_contact_no)?$settings->site_contact_no:""; ?>">
                           </div>
                        </div>

						<div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Site Title">Business Hours Monday to Friday<span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="business_hours_weekdays" name="business_hours_weekdays" class="form-control col-md-7 col-xs-12" value="<?php echo isset($settings->business_hours_weekdays)?$settings->business_hours_weekdays:" "; ?>">
                           </div>
                        </div>

						<div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Site Title">Business Hours Saturday<span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="business_hours_saturday" name="business_hours_saturday" class="form-control col-md-7 col-xs-12" value="<?php echo isset($settings->business_hours_saturday)?$settings->business_hours_saturday:" "; ?>">
                           </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for=">Details">Content in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="content" id="content" class="form-control col-md-7 col-xs-12"><?php echo isset($settings->content) ? $settings->content : "";?></textarea>
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
    <!-- /page content -->
    </div>
</div>

</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('.form-control').focus(function () {
            $('.validation').remove('.validation');
        });
        $('#submit').click(function (e) {
            $('.validation').remove('.validation');
            if ($('#site_address').val() == "") {
                $("#site_address").parent().append("<div class='validation'>Address should not be an empty.</div>");
                return false;
            }else if ($('#site_email').val() == "") {
                $("#site_email").parent().append("<div class='validation'>Email should not be an empty.</div>");
                return false;
            } else if ($('#site_contact_no').val() == "") {
                $("#site_contact_no").parent().append("<div class='validation'>Contact No. should not be an empty</div>");
                return false;
			}else if ($('#business_hours_weekdays').val() == "") {
                $("#business_hours_weekdays").parent().append("<div class='validation'>Business hours should not be an empty.</div>");
                return false;
            } else if ($('#business_hours_saturday').val() == "") {
                $("#business_hours_saturday").parent().append("<div class='validation'>Business hours should not be an empty</div>");
                return false;
            } else {
                return true;
            }
        });

		bkLib.onDomLoaded(function() {
			new nicEditor({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'}).panelInstance('content');
			//nicEditors.allTextAreas({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'});
		});
    });
</script>