				<header class="ila-header clearfix">
					<div class="container clearfix">
						<a href="index.html" class="logo"><img src="<?php echo base_url(); ?>front/images/logo.png" alt="ILA"/></a>
						<ul class="menu-list">
							<li><a href="#" data-href="getintouch" class="icon-contact"><i class="fa fa-phone phone-icon"></i></a></li>
							<li><a href="#" data-href="header-menu" class="icon-menu"><i class="fa fa-bars menu-icon"></i></a></li>
						</ul>
					</div>
				</header>
				<!-- Header overlays-->
				<!--overlay get in touch -->
				<div class="get-in-touch overlay" id="getintouch">
					<ul class="getintouch-menu">
						<li><a href="#" class="chat-with-team"><?php echo $this->lang->line('menu_chat');?></a></li>
						<li><a href="#" class="request-callback"><?php echo $this->lang->line('menu_callback');?></a></li>
						<li><a href="#" class="skype"><?php echo $this->lang->line('menu_skype');?></a></li>
						<li><a href="#" class="cancel"><?php echo $this->lang->line('menu_cancel');?></a></li>
					</ul>
				</div>
				<!--overlay menu -->
				<div class="menu overlay" id="header-menu">
					<div class="clearfix navigation-header">
						<div class="navigation-inner">
							<a href="#" class="logo"><img src="<?php echo base_url(); ?>front/images/logo-overlay.png" alt="ILA"/></a>
							<ul class="popup-menu-list">
								<li class="language-list">
									<a href="javascript:void(0);" onclick="javascript:set_lang('vietnamese');"><img src="<?php echo base_url(); ?>front/images/flag-vietnam.png" alt="Vietnam"/></a>
									<a href="javascript:void(0);" onclick="javascript:set_lang('english');"><img src="<?php echo base_url(); ?>front/images/flag-england.jpg" alt="England"/></a>
								</li>
								<li><a href="#" class="icon-cancel cancel">cancel</a></li>
							</ul>
						</div>
					</div>
					<ul class="header-menu navigation">
						<li><a href="#"><?php echo $this->lang->line('menu_home');?></a></li>
						<li class="sub-menu-wrapper">
							<a href="#"><?php echo $this->lang->line('menu_beyond_english');?></a>
							<ul class="sub-menu">
								<li><a href="#"><?php echo $this->lang->line('menu_21c_skills');?></a></li>
								<li><a href="#"><?php echo $this->lang->line('menu_21c_learning_environment');?></a></li>
								<li><a href="#"><?php echo $this->lang->line('menu_21c_inspiration');?></a></li>
							</ul>
						</li>
						<li class="sub-menu-wrapper">
							<a href="#"><?php echo $this->lang->line('menu_courses');?></a>
							<ul class="sub-menu">
							<?php
							  for($i=0;$i<sizeof($this->all_courses);$i++) {
							 ?>
								<li <?php echo sizeof($this->all_courses[$i]->courses) > 0 ? 'class="sub-menu-wrapper"' : '';?>>
									<a href="javascript:void(0);"><?php echo $this->all_courses[$i]->category_name;?></a>
									<ul class="sub-menu">
									<?php
									  for($j=0;$j<sizeof($this->all_courses[$i]->courses);$j++) {
									 ?>
										<li><a href="jump-start.html"><?php echo $this->all_courses[$i]->courses[$j]->course_title;?></a></li>
									<?php } ?>
									</ul>
								</li>
							<?php } ?>
							</ul>
						</li>
						<li class="sub-menu-wrapper">
							<a href="#"><?php echo $this->lang->line('menu_centers');?></a>
						<?php
						  //print_r($this->cities); exit;
						  //if(!empty($this->cities)) {
					     ?>
							<ul class="sub-menu">
							<?php
							  for($i=0;$i<sizeof($this->cities);$i++) {
							 ?>
								<li><a href="#"><?php echo $this->cities[$i]->city_name;?></a></li>
							<?php } ?>
							</ul>
						<?php //} ?>
						</li>
						<li><a href="course-schedule.html"><?php echo $this->lang->line('menu_schedule');?></a></li>
						<li><a href="ila-teachers.html"><?php echo $this->lang->line('menu_ila_teachers');?></a></li>
						<li><a href="ila-stories.html"><?php echo $this->lang->line('menu_ila_stories');?></a></li>
						<li><a href="contact-us.html"><?php echo $this->lang->line('menu_contact_us');?></a></li>
					</ul>
					<div class="login-btn-wrap"><a href="#" class="btn-blue"><?php echo $this->lang->line('menu_register');?></a></div>
				</div>