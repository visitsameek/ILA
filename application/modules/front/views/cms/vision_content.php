					<div class="inner-sections" id="inner-sections">
						<!-- ILA's Honors-->
						<div class="ila-speciality">
								<div class="ila-speciality-block">
									<div class="speciality-img-wrapper clearfix">
										<div class="ila-speciality-img">
										<?php
											$media['url'] = $values[0]->url;
											$media['media_name'] = $values[0]->media_name;
											$media['raw_name'] = $values[0]->raw_name;
											$media['extension'] = $values[0]->extension;
										 ?>
											<img src="<?php echo generate_image_media_url($media, 'vision_thumb'); ?>" alt="<?php echo $values[0]->title;?>"/>
										</div>
										<h2 class="title-vision">ILA's <span><?php echo $values[0]->title;?></span></h2>
									</div>
									<div class="container">
										<div class="speciality-content clearfix">
											<p><?php echo $values[0]->content;?></p>
										</div>
									</div>
								</div>
								<div class="ila-speciality-block">
								<div class="speciality-img-wrapper clearfix">
									<div class="ila-speciality-img">
									<?php
										$media['url'] = $values[1]->url;
										$media['media_name'] = $values[1]->media_name;
										$media['raw_name'] = $values[1]->raw_name;
										$media['extension'] = $values[1]->extension;
									 ?>
										<img src="<?php echo generate_image_media_url($media, 'vision_thumb'); ?>" alt="<?php echo $values[1]->title;?>"/>
									</div>
									<h2 class="title-mission">ILA's <span><?php echo $values[1]->title;?></span></h2>
								</div>
									<div class="speciality-content clearfix">
										<p><?php echo $values[1]->content;?></p>
									</div>
								</div>
								<div class="ila-speciality-block">
								<div class="speciality-img-wrapper clearfix">
									<div class="ila-speciality-img">
									<?php
										$media['url'] = $values[2]->url;
										$media['media_name'] = $values[2]->media_name;
										$media['raw_name'] = $values[2]->raw_name;
										$media['extension'] = $values[2]->extension;
									 ?>
										<img src="<?php echo generate_image_media_url($media, 'vision_thumb'); ?>" alt="<?php echo $values[2]->title;?>"/>
									</div>
									<h2 class="title-values">ILA's <span><?php echo $values[2]->title;?></span></h2>
								</div>
									<div class="speciality-content clearfix">
										<ul class="ila-values-list list-with-bullets">
											<?php echo $values[2]->content;?>
										</ul>
									</div>
								</div>
							</div>
					</div>