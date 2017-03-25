					<div class="inner-sections" id="inner-sections">
						<!-- upcoming Events Section-->
						<div class="event-wrapper">
							<div class="container">
								<div class="event-update-details">
									<h5><?php echo $event_details->title;?></h5>
									<div class="event-block">
										<div class="event-img">
											<img src="<?php echo base_url(); ?>front/images/img-why-choose.jpg" alt="<?php echo $event_details->title;?>"/>
										</div>
										<div class="event-news-content">
											<ul class="date-time clearfix">
												<li class="date icon"><i class="fa fa-calendar" aria-hidden="true"></i> 
												<?php
												  $event_date = explode('-', $event_details->event_date);
												  echo $event_date[2].'/'.$event_date[1].'/'.$event_date[0];
												 ?>
												</li>
												<li class="time icon sprite-icon-before"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $event_details->event_time;?></li>
											</ul>
											<div class="map icon sprite-icon-before"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $event_details->event_place;?></div>
										</div>
										<div class="event-news-data">
											<p><?php echo $event_details->content;?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>