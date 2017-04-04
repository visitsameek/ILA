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
							<div id="map1" style="height: 505px;width: 100%;"></div>
						</div>
						<?php
						  if(!empty($centers)) {
						 ?>
						<div class="bg-light-blue address-wrapper">						
							<div class="container">
							<?php
							  foreach($centers AS $rec) {
							 ?>
								<div class="address-block" data-marker-index="<?php echo $rec->id;?>">
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
				<!-- Loader Div -->
				<div id="loaderdiv" style="display:none; background: transparent url(<?php echo base_url(); ?>front/images/loader-bg-img.jpg) 0 0 no-repeat; background-attachment: fixed; background-size: 100% 100%;  height: 100%; color: #fff;">
				<div class="overlay-bg"></div>
				<section class="ila-wrapper ila-loader clearfix">
					<div class="loader-wrapper table">
						<div class="loader-section table-cell">
							<div class="loader">	
								<div class="rotcircle"></div>
								<div class="loader-logo">
									<img src="<?php echo base_url(); ?>front/images/loader-logo.png">
								</div>
							</div>
						</div>
					</div>
				</section>
				</div>
				<!-- Loader Div -->
				<script type="text/javascript">
				<!--
					function show_loader(){
						$('#inner-sections').hide();
						$('#loaderdiv').show();
					}
					function get_centers(city_id)
					{						
						setTimeout(show_loader, 200);
						window.location.href = '<?php echo base_url("centers/");?>'+city_id;
					}
				//-->
				</script>