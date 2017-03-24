					<div class="inner-sections" id="inner-sections">
						<div class="gallery-wrapper container bg-light-blue">
							<div class="select-box-area">
								<div class="dropdown-wrapper inp-field">
										<input class="select-input" type="text" readonly="true" name="city" value="<?php echo $city_name; ?>" />
										<label>Select your City</label>
										<ul class="dropdown">
										<?php 
											if(!empty($city_list)){
												foreach ($city_list as $city){ ?>
													<li><a href="<?php echo base_url('gallery/'.$city->id); ?>"><?php echo $city->city_name; ?></a></li>
										<?php } } ?>
										</ul>
										<span class="bar"></span>
									</div>
							</div>

							<div class="gallery-blocks-list">
								<div class="gallery-block">
									<div class="gallery-img">
										<img src="<?php echo base_url(); ?>front/images/gallery-img.jpg" alt="Halloween 2016"/>
									</div>
									<div class="gallery-content">
										<h5>Halloween 2016</h5>
										<span class="gallery-date">January 12</span>
									</div>
								</div>
								<div class="gallery-block">
									<div class="gallery-img">
										<img src="<?php echo base_url(); ?>front/images/gallery-img.jpg" alt="Halloween 2016"/>
									</div>
									<div class="gallery-content">
										<h5>Christmas 2016</h5>
										<span class="gallery-date">December 25</span>
									</div>
								</div>
								<div class="gallery-block">
									<div class="gallery-img">
										<img src="<?php echo base_url(); ?>front/images/gallery-img.jpg" alt="Halloween 2016"/>
									</div>
									<div class="gallery-content">
										<h5>Halloween 2016</h5>
										<span class="gallery-date">January 12</span>
									</div>
								</div>
								<div class="gallery-block">
									<div class="gallery-img">
										<img src="<?php echo base_url(); ?>front/images/gallery-img.jpg" alt="Halloween 2016"/>
									</div>
									<div class="gallery-content">
										<h5>Christmas 2016</h5>
										<span class="gallery-date">December 25</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>