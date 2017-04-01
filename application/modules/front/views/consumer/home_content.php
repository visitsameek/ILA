	<body class="ila-mobile-body body-landing-page">
		<div class="overlay-bg"></div>
		<section class="ila-mobile-container page-top-specing clearfix">
				<header class="landing-header clearfix">
					<div class="container">
						<a href="<?php echo base_url('home'); ?>" class="logo"><img src="<?php echo base_url(); ?>consumer/images/logo-landing.png" alt="ILA"/></a>
					</div>
				</header>
				<section class="ila-mobile-container common-spacing clearfix">
						<div class="container option-container">
						<form name="frmconsumer1" id="frmconsumer1" action="" class="" method="POST">
						<input type="hidden" name="hidcoursecat" id="hidcoursecat" value="">
							<h5>Are you looking for</h5>
							<ul class="menu-options-list">
							<?php
							  if(!empty($course_cat)) {
								  foreach($course_cat AS $rec) {
							 ?>
								<li><a href="javascript:set_value(<?php echo $rec->id;?>);"><?php echo $rec->category_name;?></a></li>
							<?php } } ?>
							</ul>
						</form>
						</div>
				</section>
				<div class="bottom-bar clearfix">
					<div class="container clearfix">
						<a href="<?php echo base_url('home'); ?>" title="Home" class="page-link home-link">Home</a>
						<div class="login-link-wrapper">
							<a href="<?php echo base_url('register'); ?>" title="Register" class="login">Register</a>
						</div>
					</div>
				</div>
		</section>
		<script type="text/javascript">
		<!--
			function set_value(course_cat_id)
			{
				$('#hidcoursecat').val(course_cat_id);
				document.frmconsumer1.submit();
			}
		//-->
		</script>
	</body>