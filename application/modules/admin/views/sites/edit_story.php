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
                    <h2>Edit Story</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_name">Story <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="story" name="story" value="<?php echo isset($story_details->story) ? $story_details->story : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Story Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title" value="<?php echo isset($story_details->title) ? $story_details->title : ""; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Short Description in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="short_desc" id="short_desc" class="form-control col-md-7 col-xs-12"><?php echo isset($story_details->short_desc) ? $story_details->short_desc : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Long Description in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea rows="10" name="long_desc" id="long_desc" class="form-control col-md-7 col-xs-12"><?php echo isset($story_details->long_desc) ? $story_details->long_desc : ""; ?></textarea>
                            </div>
                        </div>						
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Video Link
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="video_link" id="video_link" class="form-control col-md-7 col-xs-12"><?php echo isset($story_details->video_link) ? $story_details->video_link : ""; ?></textarea>
                            </div>
							<div class="">
								<?php $img_src = '';
								if($story_details->video_link != ''){
									$img_src = youtube_video_thumb($story_details->video_link);//embeded url
								}
								if($img_src != ''){
									$video_id = get_youtube_video_id($story_details->video_link);?>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="pv" id="preview">
                                <?php load_medias($story_details->media_id, $input_media_id = '#input-media', true); ?>
                            </div>
                                <input id="input-media" type="hidden" value="<?php echo $story_details->media_id; ?>" name="media_id" class="form-control" />
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

		bkLib.onDomLoaded(function() {
			new nicEditor({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'}).panelInstance('long_desc');
			//nicEditors.allTextAreas({uploadURI : '<?php echo base_url(); ?>nicupload/do_upload', fullPanel : true, iconsPath:'<?php echo base_url(); ?>assets/js/nicEditorIcons.gif'});
		});
        
        $('.form-control').focus(function(){
            $('.validation').remove('.validation');
        });              
        $('#submit').click(function(e){        
           if($('#story').val()==""){         
               $("#story").parent().append("<div class='validation'>Please enter story</div>");
                return false;
           }else if($('#title').val()==""){         
               $("#title").parent().append("<div class='validation'>Please enter story title </div>");
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
