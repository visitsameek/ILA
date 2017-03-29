	<body class="ila-mobile-body body-yourname-page">
		<div class="overlay-bg"></div>
		<section class="ila-mobile-wrapper page-top-specing clearfix">
				<section class="ila-mobile-container padding98 clearfix">
						<div class="container option-container">
							<h5>What Level Do you want to reach?</h5>
							<ul class="menu-options-list uppercase-options">
							<form name="frmconsumer4" id="frmconsumer4" action="" class="" method="POST">
							<input type="hidden" name="hidadultreach" id="hidadultreach" value="">
							<?php
							  if($consumer_adult_start_level == 'Starters') {
							 ?>
								<li><a href="javascript:set_value('Movers');">Movers</a></li>
								<li><a href="javascript:set_value('Flyers');">Flyers</a></li>
								<li><a href="javascript:set_value('KET');">KET</a></li>
								<li><a href="javascript:set_value('PET');">PET</a></li>
								<li><a href="javascript:set_value('FCE');">FCE</a></li>
								<li><a href="javascript:set_value('CAE');">CAE</a></li>
								<li><a href="javascript:set_value('CPE');">CPE</a></li>
							<?php
							  } else if($consumer_adult_start_level == 'Movers') {
							 ?>
								<li><a href="javascript:set_value('Flyers');">Flyers</a></li>
								<li><a href="javascript:set_value('KET');">KET</a></li>
								<li><a href="javascript:set_value('PET');">PET</a></li>
								<li><a href="javascript:set_value('FCE');">FCE</a></li>
								<li><a href="javascript:set_value('CAE');">CAE</a></li>
								<li><a href="javascript:set_value('CPE');">CPE</a></li>
							<?php
							  } else if($consumer_adult_start_level == 'Flyers') {
							 ?>
								<li><a href="javascript:set_value('KET');">KET</a></li>
								<li><a href="javascript:set_value('PET');">PET</a></li>
								<li><a href="javascript:set_value('FCE');">FCE</a></li>
								<li><a href="javascript:set_value('CAE');">CAE</a></li>
								<li><a href="javascript:set_value('CPE');">CPE</a></li>
							<?php
							  } else if($consumer_adult_start_level == 'KET') {
							 ?>
								<li><a href="javascript:set_value('PET');">PET</a></li>
								<li><a href="javascript:set_value('FCE');">FCE</a></li>
								<li><a href="javascript:set_value('CAE');">CAE</a></li>
								<li><a href="javascript:set_value('CPE');">CPE</a></li>
							<?php
							  } else if($consumer_adult_start_level == 'PET') {
							 ?>
								<li><a href="javascript:set_value('FCE');">FCE</a></li>
								<li><a href="javascript:set_value('CAE');">CAE</a></li>
								<li><a href="javascript:set_value('CPE');">CPE</a></li>
							<?php
							  } else if($consumer_adult_start_level == 'FCE') {
							 ?>
								<li><a href="javascript:set_value('CAE');">CAE</a></li>
								<li><a href="javascript:set_value('CPE');">CPE</a></li>
							<?php
							  } else if($consumer_adult_start_level == 'CAE') {
							 ?>
								<li><a href="javascript:set_value('CPE');">CPE</a></li>
							<?php } ?>
							</form>
							</ul>
						</div>
				</section>
				<div class="bottom-bar clearfix">
					<div class="container clearfix">
						<a href="<?php echo base_url('adults-start-level');?>" class="page-link"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
					</div>
				</div>
		</section>
		<script type="text/javascript">
		<!--
			function set_value(reach_level)
			{
				$('#hidadultreach').val(reach_level);
				document.frmconsumer4.submit();
			}
		//-->
		</script>
	</body>