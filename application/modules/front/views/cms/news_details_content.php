					<div class="inner-sections" id="inner-sections">
						<!-- upcoming Events Section-->
						<div class="event-wrapper">
							<div class="container">
								<div class="event-update-details">
									<h5><?php echo $news_details->title;?></h5>
									<div class="event-block">
										<div class="event-img">
											<img src="<?php echo base_url(); ?>front/images/img-why-choose.jpg" alt="<?php echo $news_details->title;?>"/>
										</div>
										<div class="event-news-content">
											<ul class="date-time clearfix">
												<li class="date icon"><i class="fa fa-calendar" aria-hidden="true"></i>
												<?php
												  $news_date = explode('-', $news_details->news_date);
												  echo $news_date[2].'/'.$news_date[1].'/'.$news_date[0];
												 ?>
												</li>
											</ul>
										</div>
										<div class="event-news-data">
											<p><?php echo $news_details->content;?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>