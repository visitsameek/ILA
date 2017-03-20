					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="video-wrapper clearfix">
							<div class="container">
								<h5><?php echo $pages[0]->title;?></h5>
			            <div class="video-play-wrap video-blcok">
			            		<?php echo $pages[0]->videos;?>
			            </div>
			            <p><?php echo $pages[0]->short_desc;?></p>
							</div>
						</div>
						<!-- why choose ila content Section-->
						<div class="why-choose-content ila-areas-content">
							<div class="why-choose-block learning-guarantee">
								<div class="container">
									<h5><?php echo $pages[1]->title;?></h5>
									<?php
										$media['url'] = $pages[1]->url;
										$media['media_name'] = $pages[1]->media_name;
										$media['raw_name'] = $pages[1]->raw_name;
										$media['extension'] = $pages[1]->extension;
									 ?>
									<img src="<?php echo generate_image_media_url($media, 'why_choose'); ?>" alt="<?php echo $pages[1]->title;?>"/>
									<div class="why-choose-text">
										<p><?php echo $pages[1]->short_desc;?></p>
									</div>
									<div class="align-center">
										<a href="<?php echo base_url('learning-guarantees');?>" class="see-more">See More</a>
									</div>
								</div>
							</div>
							<div class="why-choose-block neas-accreditation bg-light-blue">
								<div class="container">
									<h5><?php echo $pages[2]->title;?></h5>
									<?php
										$media['url'] = $pages[2]->url;
										$media['media_name'] = $pages[2]->media_name;
										$media['raw_name'] = $pages[2]->raw_name;
										$media['extension'] = $pages[2]->extension;
									 ?>
									<img src="<?php echo generate_image_media_url($media, 'why_choose'); ?>" alt="<?php echo $pages[2]->title;?>"/>
									<p><?php echo $pages[2]->short_desc;?></p>
								</div>
							</div>
							<div class="video-wrapper why-choose-block clearfix">
								<div class="container">
									<h5><?php echo $pages[3]->title;?></span></h5>
				            <div class="video-play-wrap video-blcok">
				            		<?php echo $pages[3]->videos;?>
				            </div>
				            <p><?php echo $pages[3]->short_desc;?></p>
								</div>
							</div>
							<div class="why-choose-block academic-management bg-light-blue">
								<div class="container">
									<h5><?php echo $pages[4]->title;?></h5>
									<?php
										$media['url'] = $pages[4]->url;
										$media['media_name'] = $pages[4]->media_name;
										$media['raw_name'] = $pages[4]->raw_name;
										$media['extension'] = $pages[4]->extension;
									 ?>
									<img src="<?php echo generate_image_media_url($media, 'why_choose'); ?>" alt="<?php echo $pages[4]->title;?>"/>
									<p><?php echo $pages[4]->short_desc;?></p>
								</div>
							</div>
							<div class="ila-areas-video welfare-video video-bg-green clearfix">
								<div class="container">
									<h5><?php echo $pages[5]->title;?></h5>
				            <div class="video-play-wrap video-blcok">
				            		<?php echo $pages[5]->videos;?>
				            </div>
				            <p><?php echo $pages[5]->short_desc;?></p>
								</div>
							</div>
							<div class="ila-areas-video customer-services-video video-bg-yellow clearfix">
								<div class="container">
									<h5><?php echo $pages[6]->title;?></h5>
				            <div class="video-play-wrap video-blcok">
				            		<?php echo $pages[6]->videos;?>
				            </div>
				            <p><?php echo $pages[6]->short_desc;?></p>
								</div>
							</div>
						</div>
					</div>