	<body class="ila-mobile-body body-yourname-page">
		<div class="overlay-bg"></div>
		<section class="ila-mobile-wrapper page-top-specing clearfix">
				<section class="ila-mobile-container padding98 clearfix">
						<div class="container option-container">
							<h5>What level are you in right now?</h5>
							<ul class="menu-options-list uppercase-options">
							<form name="frmconsumer3" id="frmconsumer3" action="" class="" method="POST">
							<input type="hidden" name="hidadultstart" id="hidadultstart" value="">
								<li><a href="javascript:set_value('Starters');">Starters</a></li>
								<li><a href="javascript:set_value('Movers');">Movers</a></li>
								<li><a href="javascript:set_value('Flyers');">Flyers</a></li>
								<li><a href="javascript:set_value('KET');">KET</a></li>
								<li><a href="javascript:set_value('PET');">PET</a></li>
								<li><a href="javascript:set_value('FCE');">FCE</a></li>
								<li><a href="javascript:set_value('CAE');">CAE</a></li>
							</form>
							</ul>
						</div>
				</section>
				<div class="bottom-bar clearfix">
					<div class="container clearfix">
						<a href="<?php echo base_url('adults-name');?>" class="page-link"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
					</div>
				</div>
		</section>
		<script type="text/javascript">
		<!--
			function set_value(start_level)
			{
				$('#hidadultstart').val(start_level);
				document.frmconsumer3.submit();
			}
		//-->
		</script>
	</body>