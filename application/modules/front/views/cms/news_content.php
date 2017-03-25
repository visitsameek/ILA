					<div class="inner-sections" id="inner-sections">
						<!-- upcoming Events Section-->
						<div class="event-wrapper">
							<div class="event-header">
								<div class="container">
									<h5>ILA in the News</h5>
									<p>Join Our English Community Learn &amp; Teach English with ILA</p>
								</div>
							</div>							
							<div class="event-list">
								<div class="container">
								<?php
								  if(!empty($news_list)) {
									  foreach($news_list AS $rec) {
								 ?>
									<div class="event-update ila-new">
										<div class="event-img">
											<img src="<?php echo base_url(); ?>front/images/img-news.jpg" alt="<?php echo $rec->title;?>"/>
										</div>
										<div class="event-content">
											<h5><?php echo $rec->title;?></h5>
											<ul class="date-time clearfix">
												<li class="date icon"><i class="fa fa-calendar" aria-hidden="true"></i>
												<?php
												  $news_date = explode('-', $rec->news_date);
												  echo $news_date[2].'/'.$news_date[1].'/'.$news_date[0];
												 ?>
												</li>
												<li class="release icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Press Release</li>
											</ul>
											<p><?php echo $rec->short_desc;?></p>
											<a href="<?php echo base_url('news/'.$rec->id); ?>" class="see-more">See More</a>
										</div>
									</div>
								<?php } } ?>
								</div>
							</div>
						</div>
					</div>