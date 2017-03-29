			<footer class="ila-footer clearfix">
				<div class="footer-navigation">
					<ul class="footer-menu navigation">
							<li class="sub-menu-wrapper">
								<a href="javascript:void(0);"><?php echo $this->lang->line('home_about_us');?></a>
								<ul class="sub-menu">
									<li><a href="<?php echo base_url('about-us'); ?>"><?php echo $this->lang->line('home_introduction');?></a></li>
									<li><a href="<?php echo base_url('values'); ?>"><?php echo $this->lang->line('home_vision');?></a></li>
									<li><a href="<?php echo base_url('awards'); ?>"><?php echo $this->lang->line('home_awards');?></a></li>
									<li><a href="<?php echo base_url('centers/1'); ?>"><?php echo $this->lang->line('home_centres');?></a></li>
								</ul>
							</li>
							<li>
								<a href="<?php echo base_url('why-choose-us'); ?>"><?php echo $this->lang->line('home_why_choose_ila');?></a>
								<ul class="sub-menu">
									<li><a href="why-choose-ila.html"><?php echo $this->lang->line('home_introduction');?></a></li>
									<li><a href="#"><?php echo $this->lang->line('home_learning');?></a></li>
									<li><a href="learning-guarantee.html"><?php echo $this->lang->line('home_learning_guarantees');?></a></li>
									<li><a href="#"><?php echo $this->lang->line('home_accreditation');?></a></li>
									<li><a href="#"><?php echo $this->lang->line('home_prof_teachers');?></a></li>
									<li><a href="#"><?php echo $this->lang->line('home_academic_management');?></a></li>
									<li><a href="#"><?php echo $this->lang->line('home_welfare');?></a></li>
									<li><a href="#"><?php echo $this->lang->line('home_customer_care');?></a></li>
								</ul>
							</li>
							<li class="sub-menu-wrapper">
								<a href="javascript:void(0);"><?php echo $this->lang->line('home_explore_more');?></a>
								<ul class="sub-menu">
									<li><a href="<?php echo base_url('gallery/1'); ?>"><?php echo $this->lang->line('home_gallery');?></a></li>
									<li><a href="http://teachenglishilavietnam.com/" target="_blank"><?php echo $this->lang->line('home_teacher_training');?></a></li>
									<li><a href="<?php echo base_url('community-network'); ?>"><?php echo $this->lang->line('home_community_network');?></a></li>
									<li><a href="http://ilage-hoctienganh.edu.vn/ila-cafe/dang-ky.html" target="_blank"><?php echo $this->lang->line('home_cafe');?></a></li>
								</ul>
							</li>
							<li>
								<a href="<?php echo base_url('career'); ?>"><?php echo $this->lang->line('home_career');?></a>
							</li>
					</ul>
					<div class="career-section">						
						<div class="news-letter"><span><?php echo $this->lang->line('home_newsletter');?></span>
							<form class="form-news-letter clearfix">
								<input type="email" name="" placeholder="contact@mail.com" />
								<input type="submit" value="Submit" class="btn-blue email-submit sprite-icon"/>
							</form>
						</div>
					</div>
				</div>
				<div class="Contact-us clearfix">
						<!-- <h5><?php //echo $this->lang->line('home_contact');?></h5> -->
						<div id="map" style="height: 505px;width: 100%;"></div>
				</div>
				<div class="footer-copyright clearfix">
					<div class="container">
						<a href="<?php echo base_url('home'); ?>" class="footer-logo"><img src="<?php echo base_url(); ?>front/images/logo-footer.png" alt="<?php echo SITE_TITLE;?>"/></a>
						<ul class="social-links clearfix">
							<li><a href="https://www.facebook.com/ilavn/" class="icon-fb" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="https://twitter.com/ilavietnam" class="icon-twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="https://www.youtube.com/user/ILAVietnam1" class="icon-youtube" target="_blank"><i class="fa fa-inverse fa-youtube" aria-hidden="true"></i></a></li>
							<li><a href="https://www.instagram.com/ilavietnam/" class="icon-instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
						<a href="#" class="terms-and-policy"><?php echo $this->lang->line('home_terms');?></a>
						<p class="copyright-txt"><?php echo $this->lang->line('home_copyright');?> &copy; <?php echo date('Y');?> <?php echo SITE_TITLE;?> Vietnam - <?php echo $this->lang->line('home_rights');?></p>
					</div>
				</div>
			</footer>