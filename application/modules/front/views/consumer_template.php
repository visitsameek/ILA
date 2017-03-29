<!DOCTYPE html>
<html>
	<head>
		<title><?php echo FRONT_TITLE;?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width = device-width, initial-scale= 1">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>front/images/favicon.png">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>consumer/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>consumer/css/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>consumer/css/mobile.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>consumer/js/jquery-1.11.1.min.js"></script>
	</head>
	<!-- Body Content Section-->
	<?php echo isset($content) ? $content : ""; ?>
</html>