<!DOCTYPE html>
<html>
	<head>
		<title><?php echo FRONT_TITLE;?> - 404</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width = device-width, initial-scale= 1">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>front/images/favicon.png">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/css/style.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>front/js/jquery-1.11.1.min.js"></script>
	</head>
	<body class="ila-body ila-404-body">
		<section class="ila-wrapper clearfix">
			<!-- Header Section-->
			<?php
			  $this->load->view('menu');
			 ?>
			<section class="ila-container container-404 clearfix">
			<div class="table">
				<div class="table-cell">
					<div class="img-404">	
							<img src="<?php echo base_url(); ?>front/images/img-404.png">
					</div>
					<span class="txt-404"><?php echo $this->lang->line('site_broken');?></span>
					<div class="home-link-wrapper"><a href="<?php echo base_url('home'); ?>" class="page-link home-link">Home</a></div>
				</div>
			</div>
			</section>
		</section>
		<script type="text/javascript" src="<?php echo base_url(); ?>front/js/script.js"></script>
	</body>
</html>
