					<div class="inner-sections" id="inner-sections">
						<div class="careers-wrapper container bg-light-blue">
								<div class="white-box-list careers-content">
									<p><?php echo $career->content;?></p>
									<h5>Current Openings</h5>
									<div class="list-wrap">
									<?php 
									  if(!empty($job_list)) {
									 ?>
										<ul class="careers-list">
										<?php
										  foreach($job_list AS $rec) {
										 ?>
											<li><a href="<?php echo base_url('career/'.$rec->id); ?>"><?php echo $rec->job_title;?></a></li>
										<?php } ?>
										</ul>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>