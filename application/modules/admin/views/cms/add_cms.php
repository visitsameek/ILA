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
                    <h2>Add Page</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name">Page name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="page_name" name="page_name" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Parent">Parent
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="page_parent" id="page_parent" class="form-control col-md-7 col-xs-12">
                                    <option value="0" selected>No Parent</option>
                                    <?php if(!empty($page_name)){
                                        foreach($page_name as $key=>$page){
                                            echo '<option value="'.$page->id.'">'.$page->page_name.'</option>';
                                        }
                                    }?>
                               </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Oreder">Order<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="sort_order" min="0" oninput="validity.valid||(value='');" name="sort_order" class="form-control col-md-7 col-xs-12" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Short Description in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="short_desc" id="short_desc" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Content in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="10" name="content" id="content" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Picture">Image(s)
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="pv" id="preview">
									<?php load_medias("", $input_media_id = '#input-media-library'); ?>
								</div>
								<input id="input-media-library" type="hidden" value="" name="media_id" />
								<button type="button" class="btn btn-primary media-button" data-is-multi="true" data-input-field="#input-media-library"  data-preview="#preview" >Select Image(s)</button>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="button" id="add" value="Add Video" class="btn btn-dark" />
								<input type="button" id="del" value="Remove Video" class="btn btn-danger" />
							</div>
						 </div>
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

<script type="text/javascript">
    $(document).ready(function () {
		$('.form-control').focus(function () {
            $('.validation').remove('.validation');
        });
        $('#submit').click(function (e) {
            $('.validation').remove('.validation');
            if ($('#page_name').val() == "") {
                $("#page_name").parent().append("<div class='validation'>Page name should not be an empty.</div>");
                return false;
            } else if ($('#title').val() == "") {
                $("#title").parent().append("<div class='validation'>Title should not be an empty</div>");
                return false;
            } else {
                return true;
            }
        });

		bkLib.onDomLoaded(function() {
			new nicEditor({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'}).panelInstance('content');
			//nicEditors.allTextAreas({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'});
		});

		$('#add').click(function () {
            var cnt = $('.dynamic_text').find('.form-group').length + 1;
            $('.dynamic_text').append('<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Add embeded YouTube video </label><div class="col-md-5 col-sm-5 col-xs-12"><textarea name="videos[]" id="library_videos_' + cnt + '" class="form-control col-md-5 col-xs-12" placeholder="Video ' + cnt + '"></textarea></div></div>');
        });
        $('#del').click(function () {
            $('.dynamic_text').find('.form-group').last().remove();
        });
    });
</script>
