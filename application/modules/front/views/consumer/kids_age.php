	<body class="ila-mobile-body body-yourname-page">
		<div class="overlay-bg"></div>
		<section class="ila-mobile-wrapper page-top-specing clearfix">
				<section class="ila-mobile-container padding98 clearfix">
						<div class="container option-container">
							<h5>What is <?php echo !empty($consumer_kid_name) ? $consumer_kid_name : 'your child';?>'s age?</h5>
							<ul class="menu-options-list">
							<form name="frmconsumerage" id="frmconsumerage" action="" class="" method="POST">
							<input type="hidden" name="hidkidage" id="hidkidage" value="">
								<li><a href="javascript:set_value('3-6');">3 - 6 Years Old</a></li>
								<li><a href="javascript:set_value('6-11');">6 - 11 Years Old</a></li>
								<li><a href="javascript:set_value('11-16');">11 - 16 Years Old</a></li>
							</form>
							</ul>
						</div>
				</section>
				<div class="bottom-bar clearfix">
					<div class="container clearfix">
						<a href="<?php echo base_url('kids-name');?>" class="page-link"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
					</div>
				</div>
		</section>
		<script type="text/javascript">
		<!--
			function set_value(age_val)
			{
				$('#hidkidage').val(age_val);
				document.frmconsumerage.submit();
			}
		//-->
		</script>
	</body>