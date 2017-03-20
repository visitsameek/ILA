					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="content-wrapper clearfix">
							<div class="container">
								<p>ILA has received numerous international and domestic awards and recognition for 
								its quality programmes and services as well as its contributions to local communities.</p>
							</div>
						</div>

						<!-- ILA's Honors-->
						<div class="ila-honors  align-center">
							<div class="container">
								<h4>ILA's Honors</h4>
								<?php
								  if(!empty($awards)) {
									  foreach($awards AS $list) {
								 ?>
								<div class="honors-block">
								<?php
									$media['url'] = $list->url;
									$media['media_name'] = $list->media_name;
									$media['raw_name'] = $list->raw_name;
									$media['extension'] = $list->extension;
								 ?>
									<img src="<?php echo generate_image_media_url($media, 'award_thumb'); ?>"  alt="<?php echo $list->title;?>"/>
									<div class="honors-content">
										<h5><?php echo $list->title;?></h5>
										<p><?php echo $list->content;?></p>
									</div>
								</div>
								<?php } } ?>
								<a href="#" class="see-more">See More</a>
							</div>
						</div>
					</div>