					<div class="inner-sections" id="inner-sections">
						<div class="student-stories">
							<!-- BE THE PART OF VIETNAM EG Section-->
							<div class="video-wrapper video-story clearfix">
								<div class="container">
									<h5>What Students Say</h5>
				            <div class="video-play-wrap video-blcok">
				            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
				            </div>
				            <p>&quot;ILA Super Teen Program - A 'Trail' For Long Exposure &amp; Practise&quot;</p>				            
								</div>
							</div>
							<!-- Student quote list-->
							<div class="stories-list bg-light-blue align-center">
							<?php
							  if(!empty($student_story_list)) {
								  foreach($student_story_list AS $rec) {
							 ?>
								<div class="member-info-block">
									<div class="member-info-img">
										<img src="<?php echo base_url(); ?>front/images/img-pham.png" alt="Ph?m Th?o Uyên"/>
									</div>
									<div class="member-info">
										<h5><?php echo $rec->title;?></h5>
										<p>&quot;<?php echo $rec->short_desc;?>&quot;</p>
									</div>
									<div class="align-center">
										<a href="<?php echo base_url('stories/'.$rec->id); ?>" class="see-more">See More</a>
									</div>
								</div>
							<?php } } ?>								
							</div>
						</div>
						<!-- parent quote list-->
						<div class="parent-stories">
							<div class="video-wrapper video-story clearfix">
								<div class="container">
									<h5>What Parent Say</h5>
				            <div class="video-play-wrap video-blcok">
				            		<iframe src="https://www.youtube.com/embed/ICF3-a0ER3Y" frameborder="0" allowfullscreen></iframe>
				            </div>
				            <p>&quot;The biggest desire of every parent is witnessing their kids become successful in life.&quot;</p>
								</div>
							</div>

							<!-- Parent quote list-->
							<div class="stories-list bg-light-blue align-center">
							<?php
							  if(!empty($parent_story_list)) {
								  foreach($parent_story_list AS $rec) {
							 ?>
								<div class="member-info-block">
									<div class="member-info-img">
										<img src="<?php echo base_url(); ?>front/images/img-parent.png" alt="Ph?m Th?o Uyên"/>
									</div>
									<div class="member-info">
										<h5><?php echo $rec->title;?></h5>
										<p>&quot;<?php echo $rec->short_desc;?>&quot;</p>
									</div>
									<div class="align-center">
										<a href="<?php echo base_url('stories/'.$rec->id); ?>" class="see-more">See More</a>
									</div>
								</div>
							<?php } } ?>
							</div>
						</div>
					</div>