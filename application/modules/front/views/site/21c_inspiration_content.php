					<div class="inner-sections" id="inner-sections">
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
						<?php
						  if(!empty($century_skills->videos)) {
							  $all_vids = explode('~', $century_skills->videos);
							  for($i=0;$i<sizeof($all_vids);$i++) {
						 ?>
						<div class="inspiration-videos">
							<div class="align-center">
								<div class="container">
									<div class="inspiration-video-block clearfix">
									<?php echo $all_vids[$i];?>
									</div>
								</div>
							</div>
						</div>
						<?php } } ?>
					</div>
				</div>