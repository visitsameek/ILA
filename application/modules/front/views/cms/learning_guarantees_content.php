					<div class="inner-sections" id="inner-sections">
						<!-- why choose ila content Section-->
						<div class="learning-guarantee-content">
							<div class="why-choose-block learning-guarantee bg-light-blue">
								<div class="container align-center">
									<h5><?php echo SITE_TITLE.' '.$pages->title;?></h5>
									<?php
										$media['url'] = $pages->url;
										$media['media_name'] = $pages->media_name;
										$media['raw_name'] = $pages->raw_name;
										$media['extension'] = $pages->extension;
									 ?>
									<img src="<?php echo generate_image_media_url($media, 'why_choose'); ?>" alt="<?php echo $pages->title;?>"/>
									<div class="why-choose-text">
										<p>&quot;Students participating in this programme learn speaking English fluently &amp; confidently AND WE GUARANTEE THIS!&quot;</p>
									</div>
								</div>
							</div>
							<div class="why-choose-block learning-guarantee-txt">
								<div class="container">
									<p><?php echo $pages->short_desc;?></h5>
								</div>
							</div>
							<div class="learning-conditions bg-light-blue">
								<div class="container">
									<?php echo $pages->content;?>
								</div>
							</div>
						</div>
					</div>