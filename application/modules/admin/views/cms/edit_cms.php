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
                    <h2>Edit Page</h2>
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
                                <input type="text" id="page_name" name="page_name" class="form-control col-md-7 col-xs-12" value="<?php echo isset($cms_details->page_name) ? $cms_details->page_name : " "; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Slug <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="width: auto;" ><?php echo base_url() . 'master/'; ?></label><input type="text" id="slug" name="slug" style="width: inherit;float: right;" class="form-control col-md-7 col-xs-12" value="<?php echo isset($cms_details->slug) ? str_replace(base_url(), '', $cms_details->slug) : " "; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Parent">Parent
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="page_parent" id="page_parent" class="form-control col-md-7 col-xs-12">
                                    <option value="0" <?php if (@$cms_details->page_parent == 0) echo 'selected' ?>>No Parent</option>
                                    <?php
                                    if (!empty($page_name)) {
                                        foreach ($page_name as $key => $page) {
                                            $select = '';
                                            if (@$cms_details->page_parent == $page->id)
                                                $select = 'selected';
                                            echo '<option value="' . $page->id . '" ' . $select . '>' . $page->page_name . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Oreder">Order
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="sort_order" name="sort_order" min="0" oninput="validity.valid||(value='');" class="form-control col-md-7 col-xs-12" value="<?php echo isset($cms_details->sort_order) ? $cms_details->sort_order : 0; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Title in <?php echo ($selected_lang == 1) ? "English" : "Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($cms_details->title) ? $cms_details->title : ""; ?>">
                            </div>
                        </div>

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Short Description in <?php echo ($selected_lang == 1) ? "English" : "Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="short_desc" id="short_desc" class="form-control col-md-7 col-xs-12"><?php echo isset($cms_details->short_desc) ? $cms_details->short_desc : "";?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Content in <?php echo ($selected_lang == 1) ? "English" : "Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<textarea rows="10" name="content" id="content" class="form-control col-md-7 col-xs-12"><?php echo isset($cms_details->content) ? $cms_details->content : "";?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Picture">Image(s)
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="pv" id="preview">
									<?php load_medias(isset($cms_details->media_id) ? [ $cms_details->media_id ] : "[]", $input_media_id = '#input-media-library'); ?>
                                </div>
                                <input id="input-media-library" type="hidden" value="<?php echo isset($cms_details->media_id)?$cms_details->media_id:""; ?>" name="media_id" />
                                <!-- Large modal -->
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
						 <div class="dynamic_text">
						 <?php if($cms_details->videos != ''){
							$videos = explode('~', $cms_details->videos);
							foreach($videos as $key=>$video){?>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Add embeded YouTube video </label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<textarea name="videos[]" id="library_videos_<?php echo $key;?>" class="form-control col-md-5 col-xs-12" style="resize: none;" placeholder="Video <?php echo $key;?>"> <?php echo $video; ?></textarea>
									</div>
									<div class="">
										<?php $img_src = '';
										if($video != ''){
											$img_src = youtube_video_thumb($video);//embeded url
										}
										if($img_src != ''){
											$video_id = get_youtube_video_id($video);?>
											<a href="#myModal" data-toggle="modal">
												<img id="show_library_medias_<?php echo $key;?>" title="click to play video" src="<?php echo $img_src;?>" alt="video_thumb" width="70">
											</a>
											<script type="text/javascript">
												$('#show_library_medias_<?php echo $key;?>').click(function (e) {
													$("#myModal").on('show.bs.modal', function(){
														$("#yvideo").html($('#library_videos_<?php echo $key;?>').val());
													});
												});
											</script>
										<?php }?>
									</div>
								</div>
							<?php }?>
						<?php }?>
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
