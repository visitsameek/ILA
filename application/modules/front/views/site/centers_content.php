					<div class="inner-sections" id="inner-sections">
					<!-- Course Shedule Form -->
						<div class="select-center">
							<div class="container">
								<h5>Select your Centre</h5>
								<div class="select-center-fields">
									<div class="dropdown-wrapper inp-field">
										<input class="select-input" type="text" readonly="true" name="city" value="<?php echo $city->city_name; ?>" />
										<label>Select your City</label>
										<ul class="dropdown">
										<?php 
											if(!empty($city_list)){
												foreach ($city_list as $city){ ?>
													<li><a href="<?php echo base_url('centers/'.$city->id); ?>"><?php echo $city->city; ?></a></li>
										<?php } } ?>
										</ul>
										<span class="bar"></span>
									</div>
								</div>
							</div>
						</div>
						<?php
						  if(!empty($centers)) {
						 ?>
						<div class="bg-light-blue address-wrapper">						
							<div class="container">
							<?php
							  foreach($centers AS $rec) {
							 ?>
								<div class="address-block">
									<h5><?php echo $rec->title;?></h5>
									<address>
										<p><i class="fa fa-map-marker"></i> <span><?php echo $rec->address;?></span></p>
										<p><i class="fa fa-phone"></i> <span><a href="tel: <?php echo $rec->phone;?>;"><?php echo $rec->phone;?></a></span></p>
										<p><i class="fa fa-envelope"></i> <span><a href="mailto: <?php echo $rec->email_id;?>;"><?php echo $rec->email_id;?></a></span></p>
									</address>
								</div>
							<?php } ?>
							</div>							
						</div>
						<?php } ?>

						<div class="Contact-us clearfix">
							<div class="select-location">
								<h4>Select Location</h4>
							</div>
							<div id="map1" style="height: 505px;width: 100%;"></div>
						</div>
					</div>
				</div>