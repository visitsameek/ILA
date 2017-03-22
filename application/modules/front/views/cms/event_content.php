					<div class="inner-sections" id="inner-sections">
						<!-- upcoming Events Section-->
						<div class="event-wrapper">
							<div class="event-header">
								<div class="container">
									<h5>Upcoming Events</h5>
									<p>Join Our English Community Learn &amp; Teach English with ILA</p>
								</div>
							</div>							
							<div class="event-list">
								<div class="container">
								<?php
								  if(!empty($event_list)) {
									  foreach($event_list AS $rec) {
								 ?>
									<div class="event-update ila-new">
										<div class="event-img">
											<img src="<?php echo base_url(); ?>front/images/img-news2.jpg" alt="Experience Halloween"/>
										</div>
										<div class="event-content">
											<h5><?php echo $rec->title;?></h5>
											<ul class="date-time clearfix">
												<li class="date icon"><i class="fa fa-calendar" aria-hidden="true"></i> 
												<?php
												  $event_date = explode('-', $rec->event_date);
												  echo $event_date[2].'/'.$event_date[1].'/'.$event_date[0];
												 ?>
												</li>
												<li class="time icon sprite-icon-before"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $rec->event_time;?></li>
											</ul>
											<div class="map icon sprite-icon-before"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $rec->event_place;?></div>
											<p><?php echo $rec->short_desc;?></p>
											<a href="event-details.html" class="see-more">See More</a>
										</div>
									</div>
								<?php } } ?>
								</div>
							</div>
						</div>
					</div>