					<div class="inner-sections" id="inner-sections">
						<div class="career-details community-data bg-light-blue">
						<?php
						  if(!empty($network_list)) {
							  foreach($network_list AS $rec) {
						 ?>
							<div class="white-box-list">
								<h5><?php echo $rec->title;?></h5>
								<div class="list-wrap">
									<p><?php echo $rec->content;?></p>
								</div>
							</div>
						<?php } } ?>
						</div>
					</div>