				<header class="ila-header clearfix">
					<div class="container clearfix">
						<a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url(); ?>front/images/logo.png" alt="<?php echo SITE_TITLE;?>"/></a>
						<ul class="menu-list">
							<li><a href="javascript: void(0);" data-href="getintouch" class="icon-contact"><i class="fa fa-phone phone-icon"></i></a></li>
							<li><a href="javascript: void(0);" data-href="header-menu" class="icon-menu"><i class="fa fa-bars menu-icon"></i></a></li>
						</ul>
					</div>
				</header>
				<!-- Header overlays-->
				<!--overlay get in touch -->
				<div class="get-in-touch overlay" id="getintouch">
					<ul class="getintouch-menu">
						<li><a href="javascript: void(0);" class="chat-with-team"><?php echo $this->lang->line('menu_chat');?></a></li>
						<li><a href="<?php echo base_url('request-callback'); ?>" class="request-callback"><?php echo $this->lang->line('menu_callback');?></a></li>
						<li><a href="tel:+0835218788" class="skype"><?php echo $this->lang->line('menu_skype');?></a></li>
						<li><a href="javascript: void(0);" class="cancel"><?php echo $this->lang->line('menu_cancel');?></a></li>
					</ul>
				</div>
				<!--overlay menu -->
				<div class="menu overlay" id="header-menu">
					<div class="clearfix navigation-header">
						<div class="navigation-inner">
							<a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url(); ?>front/images/logo-overlay.png" alt="<?php echo SITE_TITLE;?>"/></a>
							<ul class="popup-menu-list">
								<li class="language-list">
								<?php
								  $selected_language = "";
								  if($this->session->userdata('site_language')){
									 $selected_language =  $this->session->userdata('site_language');								   
								  }
								 ?>
									<a href="javascript:void(0);" onclick="javascript:set_lang('vietnamese');"><img src="<?php echo base_url(); ?>front/images/<?php echo $selected_language == 'vietnamese' ? "flag-vietnam.png" : "vietnam_b&w.jpg"; ?>" alt="Vietnam"/></a>
									<a href="javascript:void(0);" onclick="javascript:set_lang('english');"><img src="<?php echo base_url(); ?>front/images/<?php echo ($selected_language == '') || ($selected_language == 'english') ? "flag-england.jpg" : "english_b&w.jpg"; ?>" alt="England"/></a>
								</li>
								<li><a href="javascript: void(0);" class="icon-cancel cancel">cancel</a></li>
							</ul>
						</div>
					</div>
					<ul class="header-menu navigation">
						<li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('menu_home');?></a></li>
						<li class="sub-menu-wrapper">
							<a href="javascript:void(0);"><?php echo $this->lang->line('menu_beyond_english');?></a>
							<ul class="sub-menu">
								<li><a href="<?php echo base_url('21c-skills/14'); ?>"><?php echo $this->lang->line('menu_21c_skills');?></a></li>
								<li><a href="<?php echo base_url('21c-learning-environment/15'); ?>"><?php echo $this->lang->line('menu_21c_learning_environment');?></a></li>
								<li><a href="<?php echo base_url('21c-inspiration/16'); ?>"><?php echo $this->lang->line('menu_21c_inspiration');?></a></li>
							</ul>
						</li>
						<li class="sub-menu-wrapper">
							<a href="javascript:void(0);"><?php echo $this->lang->line('menu_courses');?></a>
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
										<li>
										<?php
										  if($this->all_courses[$i]->courses[$j]->id == 1)
											$course_url = 'jumpstart';
										  else if($this->all_courses[$i]->courses[$j]->id == 2)
											$course_url = 'super-juniors';
										  else if($this->all_courses[$i]->courses[$j]->id == 3)
											$course_url = 'smart-teens';
										  else if($this->all_courses[$i]->courses[$j]->id == 4)
											$course_url = 'global-english';
										  else if($this->all_courses[$i]->courses[$j]->id == 5)
											$course_url = 'exam-english';
										 ?>
											<a href="<?php echo base_url($course_url.'/'.$this->all_courses[$i]->courses[$j]->id); ?>">
											<?php echo $this->all_courses[$i]->courses[$j]->course_title;?>
											</a>
										</li>
									<?php } ?>
									</ul>
								</li>
							<?php } ?>
							</ul>
						</li>
						<li class="sub-menu-wrapper">
							<a href="javascript: void(0);"><?php echo $this->lang->line('menu_centers');?></a>
						<?php
						  //print_r($this->cities); exit;
						  //if(!empty($this->cities)) {
					     ?>
							<ul class="sub-menu">
							<?php
							  for($i=0;$i<sizeof($this->cities);$i++) {
							 ?>
								<li><a href="<?php echo base_url('centers/'.$this->cities[$i]->id); ?>"><?php echo $this->cities[$i]->city_name;?></a></li>
							<?php } ?>
							</ul>
						<?php //} ?>
						</li>
						<li><a href="<?php echo base_url('schedules'); ?>"><?php echo $this->lang->line('menu_schedule');?></a></li>
						<li><a href="<?php echo base_url('teachers'); ?>"><?php echo $this->lang->line('menu_ila_teachers');?></a></li>
						<li><a href="<?php echo base_url('stories'); ?>"><?php echo $this->lang->line('menu_ila_stories');?></a></li>
						<li><a href="<?php echo base_url('contact-us'); ?>"><?php echo $this->lang->line('menu_contact_us');?></a></li>
					</ul>
					<div class="login-btn-wrap"><a href="<?php echo base_url('register'); ?>" class="btn-blue"><?php echo $this->lang->line('menu_register');?></a></div>
				</div>