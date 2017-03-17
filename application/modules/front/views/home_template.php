<!DOCTYPE html>
<html>
	<head>
		<title><?php echo FRONT_TITLE;?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width = device-width, initial-scale= 1">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>front/images/favicon.png">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/css/jquery.fancybox.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/css/style.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>front/js/jquery-1.11.1.min.js"></script>
	</head>
	<body class="ila-body">
		<section class="ila-wrapper clearfix">
			<!-- Header Section-->
			<?php echo isset($menu) ? $menu : ""; ?>

			<section class="ila-container clearfix">
				<!-- Banner Section-->
				<?php echo isset($banner) ? $banner : ""; ?>

				<!-- Body Content Section-->
				<?php echo isset($content) ? $content : ""; ?>
			</section>
			<!-- Footer Section-->
			<?php echo isset($footer) ? $footer : ""; ?>
		</section>
		<script type="text/javascript" src="<?php echo base_url(); ?>front/js/jquery.fancybox.min.js"></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCviqnCE8MC-FpoETJ50TyCSY3wZUwMhgw&callback=initMap" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>front/js/script.js"></script>
		<script>
		function set_lang(lang) {
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url(); ?>front/home/set_language",
				data: {language: lang },
				success: function (data, textStatus, jqXHR) {
					if(data==1){
					   window.location.reload() ;
					}
				}
			});
		}
		</script>
	</body>
</html>