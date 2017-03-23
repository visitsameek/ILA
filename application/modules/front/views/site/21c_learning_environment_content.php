					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="video-wrapper clearfix">
							<div class="container">
								<h5><?php echo $century_skills->title;?></h5>
			            <div class="video-play-wrap video-blcok">
						<?php
							$media['url'] = $century_skills->url;
							$media['media_name'] = $century_skills->media_name;
							$media['raw_name'] = $century_skills->raw_name;
							$media['extension'] = $century_skills->extension;
						 ?>
			            	<img src="<?php echo generate_image_media_url($media, 'why_choose'); ?>" alt="<?php echo $century_skills->title;?>"/>
			            </div>
			            <p><?php echo $century_skills->short_desc;?></p>
							</div>
						</div>
						<!-- Class room are equipped with-->
						<div class="clearfix">
							<div class="lang-specific-block learning-env-block">
								<div class="container">
									<?php echo $century_skills->content;?>
								</div>
							</div>
						</div>
					</div>
				</div>