					<div class="inner-sections" id="inner-sections">
					<!-- Course Shedule Form -->
						<div class="select-center">
							<div class="container">
								<h5>Select your Centre</h5>
								<div class="select-center-fields">
									<div class="dropdown-wrapper inp-field">
										<input class="select-input" type="text" readonly="true" name="city" value="<?php echo $city_name; ?>" />
										<label>Select your City</label>
										<ul class="dropdown">
										<?php 
											if(!empty($city_list)){
												foreach ($city_list as $city){ ?>
													<li><a href="javascript: void(0);" onclick="javascript: get_centers(<?php echo $city->id; ?>);"><?php echo $city->city_name; ?></a></li>
										<?php } } ?>
										</ul>
										<span class="bar"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="Contact-us clearfix">
							<div class="select-location">
								<h4>Select Location</h4>
							</div>
							<div id="map" style="height: 505px;width: 100%;"></div>
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
									<h5 style="margin: 0vw 0vw 2.74074vw 0vw !important;"><?php echo $rec->title;?></h5>
									<address>
										<p><i class="fa fa-map-marker"></i> <span><?php echo $rec->address;?></span></p>
										<p><i class="fa fa-phone"></i> <span><a href="tel: <?php echo '+'.str_replace(' ', '', str_replace('-','',$rec->phone));?>;"><?php echo $rec->phone;?></a></span></p>
										<p><i class="fa fa-envelope"></i> <span><a href="mailto: <?php echo $rec->email_id;?>;"><?php echo $rec->email_id;?></a></span></p>
									</address>
								</div>
							<?php } ?>
							</div>							
						</div>
						<?php } ?>						
					</div>
				</div>
				<script type="text/javascript">
				<!--
					function get_centers(city_id)
					{
						window.location.href = '<?php echo base_url("centers/");?>'+city_id;
					}
				//-->
				</script>