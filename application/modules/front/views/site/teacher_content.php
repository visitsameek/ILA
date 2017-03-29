					<div class="inner-sections" id="inner-sections">
						<!-- BE THE PART OF VIETNAM EG Section-->
						<div class="video-wrapper clearfix">
							<div class="container">
								<h5>Professional, <span>Certified Teachers</span></h5>
			            <div class="video-play-wrap video-blcok">
			            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
			            </div>
			            <p>ILA teachers are fully certified and experienced native English-speaking teaching professionals.</p>
							</div>
						</div>
						<!-- team slideshow -->
						<div class="teacher-slideshow align-center bg-light-blue">
							<div class="action">
						    <a href="javascript:void(0);" data-slide="A">A</a>
						    <a href="javascript:void(0);" data-slide="B">B</a>
						    <a href="javascript:void(0);" data-slide="C">C</a>
						    <a href="javascript:void(0);" data-slide="D">D</a>
						    <a href="javascript:void(0);" data-slide="E">E</a>
						    <a href="javascript:void(0);" data-slide="F">F</a>
						    <a href="javascript:void(0);" data-slide="G">G</a>
							<a href="javascript:void(0);" data-slide="H">H</a>
							<a href="javascript:void(0);" data-slide="I">I</a>
							<a href="javascript:void(0);" data-slide="J">J</a>
							<a href="javascript:void(0);" data-slide="K">K</a>
							<a href="javascript:void(0);" data-slide="L">L</a>
							<a href="javascript:void(0);" data-slide="M">M</a>
							<a href="javascript:void(0);" data-slide="N">N</a>
							<a href="javascript:void(0);" data-slide="O">O</a>
						    <a href="javascript:void(0);" data-slide="P">P</a>
							<a href="javascript:void(0);" data-slide="Q">Q</a>
							<a href="javascript:void(0);" data-slide="R">R</a>
							<a href="javascript:void(0);" data-slide="S">S</a>
							<a href="javascript:void(0);" data-slide="T">T</a>
							<a href="javascript:void(0);" data-slide="U">U</a>
							<a href="javascript:void(0);" data-slide="V">V</a>
							<a href="javascript:void(0);" data-slide="W">W</a>
							<a href="javascript:void(0);" data-slide="X">X</a>
							<a href="javascript:void(0);" data-slide="Y">Y</a>
							<a href="javascript:void(0);" data-slide="Z">Z</a>
						  </div>
						  <?php 
						    if(!empty($all_teachers)) {
						   ?>
							<div class="teacher-slides">
							<?php
							  for($i=0;$i<sizeof($all_teachers);$i++) {
							 ?>
								<div class="slide-item teacher-block" data-index="<?php echo ($i+1);?>">
									<div class="teacher-img">
										<img src="<?php echo !empty($all_teachers[$i]->img_url) ? $all_teachers[$i]->img_url : base_url().'front/images/no_person.jpg';?>" alt="<?php echo $all_teachers[$i]->first_name.' '.$all_teachers[$i]->last_name;?>"/>
									</div>
									<div class="teacher-info">
										<h5><?php echo $all_teachers[$i]->first_name.' '.$all_teachers[$i]->last_name;?></h5>
										<!-- <span class="teacher-experience">2 years of Experience</span> -->
										<div class="teacher-country">
											<span class="flag-img"><img src="<?php echo base_url(); ?>front/images/flag-country-vietnam.jpg" alt="<?php echo $all_teachers[$i]->country;?>"/></span>
											<span><?php echo $all_teachers[$i]->country;?></span>
										</div>
										<p><?php echo $all_teachers[$i]->certificate_details;?></p>
									</div>
									<div class="align-center">
										<a href="<?php echo base_url('teachers/'.$all_teachers[$i]->id); ?>" class="see-more">See More</a>
									</div>
								</div>
							<?php } ?>
							</div>
						<?php } ?>
						</div>
						<!-- Course Categories-->
						<?php 
						  if(!empty($teachers)) {
						 ?>
						<div class="ila-teachers">
							<div class="container teachers-list">
							<?php
							  foreach($teachers AS $rec) {
							 ?>
								<a href="<?php echo base_url('teachers/'.$rec->id); ?>">
								<div class="teacher-block clearfix">
									<div class="teacher-img">
										<img src="<?php echo !empty($rec->img_url) ? $rec->img_url : base_url().'front/images/no_person.jpg';?>" alt="<?php echo $rec->first_name.' '.$rec->last_name;?>"/>
									</div>
									<div class="teacher-info">
										<h5><?php echo $rec->first_name.' '.$rec->last_name;?></h5>
										<div class="teacher-country">
											<span class="flag-img"><img src="<?php echo base_url(); ?>front/images/flag-country-england.jpg" alt="<?php echo $rec->country;?>"/></span>
											<span><?php echo $rec->country;?></span>
										</div>
									</div>
								</div></a>
							<?php } ?>	
								<div class="btn-common-wrapper align-center">
									<a href="#" class="see-more">See More</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>