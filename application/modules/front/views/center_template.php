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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/css/slick.css">
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
		<script type="text/javascript" src="<?php echo base_url(); ?>front/js/slick.min.js"></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_API2;?>&callback=initMap" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>front/js/script.js"></script>		
		<script type="text/javascript">
		<!--
			function initMap() {
			  var city = '<?php echo $city_id;?>';
			  var lati = '<?php echo $lat;?>';
			  var longi = '<?php echo $long;?>';
			  var map = new google.maps.Map(document.getElementById('map1'), {
					  center: new google.maps.LatLng(lati, longi),
					  zoom: 11,
					  mapTypeId: 'roadmap'
					});
					var infoWindow = new google.maps.InfoWindow;

					  // Change this depending on the name of your PHP or XML file
					  downloadUrl('<?php echo base_url();?>front/home/get_map_data/'+city, function(data) {
						var xml = data.responseXML;
						var markers = xml.documentElement.getElementsByTagName('marker');
						Array.prototype.forEach.call(markers, function(markerElem) {
						  var name = markerElem.getAttribute('name');
						  var address = markerElem.getAttribute('address');
						  var phone = markerElem.getAttribute('phone');
						  //var type = markerElem.getAttribute('type');
						  var point = new google.maps.LatLng(
							  parseFloat(markerElem.getAttribute('lat')),
							  parseFloat(markerElem.getAttribute('lng')));

						  var infowincontent = document.createElement('div');

						  var infowincontent1 = document.createElement('div');
						  infowincontent1.style.float = 'left';
						  infowincontent1.style.marginRight = '10px';
						  infowincontent.appendChild(infowincontent1);

						  var img = document.createElement('img');
						  img.src = '<?php echo base_url();?>front/images/ILA Phan Xich Long.jpg';
						  img.width = '50';
						  infowincontent1.appendChild(img);

						  var infowincontent2 = document.createElement('div');
						  infowincontent.appendChild(infowincontent2);

						  var strong = document.createElement('strong');
						  strong.textContent = name
						  infowincontent2.appendChild(strong);
						  infowincontent2.appendChild(document.createElement('br'));

						  var text = document.createElement('text');
						  text.textContent = address
						  infowincontent2.appendChild(text);
						  infowincontent2.appendChild(document.createElement('br'));

						  var text = document.createElement('text');
						  text.textContent = 'Call: ' + phone
						  infowincontent2.appendChild(text);

						  var iconBase = '<?php echo base_url();?>front/images/';
						  var icon = iconBase + 'map_logo.png';
						  var marker = new google.maps.Marker({
							map: map,
							position: point
							/*icon: icon*/
						  });
						  marker.addListener('click', function() {
							infoWindow.setContent(infowincontent);
							infoWindow.open(map, marker);
						  });
						});
					  });

			}

			function downloadUrl(url, callback) {
				var request = window.ActiveXObject ?
					new ActiveXObject('Microsoft.XMLHTTP') :
					new XMLHttpRequest;

				request.onreadystatechange = function() {
				  if (request.readyState == 4) {
					request.onreadystatechange = doNothing;
					callback(request, request.status);
				  }
				};

				request.open('GET', url, true);
				request.send(null);
			}

			function doNothing() {}

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
		//-->
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_API;?>&callback=initMap1" type="text/javascript"></script>
		<script type="text/javascript">
		<!--
			function initMap1() {
			  var map = new google.maps.Map(document.getElementById('map'), {
					  center: new google.maps.LatLng(14.0583, 108.2772),
					  zoom: 5
					});
					var infoWindow = new google.maps.InfoWindow;

					  // Change this depending on the name of your PHP or XML file
					  downloadUrl('<?php echo base_url();?>front/home/get_map_data', function(data) {
						var xml = data.responseXML;
						var markers = xml.documentElement.getElementsByTagName('marker');
						Array.prototype.forEach.call(markers, function(markerElem) {
						  var name = markerElem.getAttribute('name');
						  var address = markerElem.getAttribute('address');
						  var type = markerElem.getAttribute('type');
						  var point = new google.maps.LatLng(
							  parseFloat(markerElem.getAttribute('lat')),
							  parseFloat(markerElem.getAttribute('lng')));

						  var infowincontent = document.createElement('div');

						  var infowincontent1 = document.createElement('div');
						  infowincontent1.style.float = 'left';
						  infowincontent1.style.marginRight = '10px';
						  infowincontent.appendChild(infowincontent1);

						  var img = document.createElement('img');
						  img.src = '<?php echo base_url();?>front/images/ILA Phan Xich Long.jpg';
						  img.width = '50';
						  infowincontent1.appendChild(img);

						  var infowincontent2 = document.createElement('div');
						  infowincontent.appendChild(infowincontent2);

						  var strong = document.createElement('strong');
						  strong.textContent = name
						  infowincontent2.appendChild(strong);
						  infowincontent2.appendChild(document.createElement('br'));

						  var text = document.createElement('text');
						  text.textContent = address
						  infowincontent2.appendChild(text);

						  var iconBase = '<?php echo base_url();?>front/images/';
						  var icon = iconBase + 'ic-map-pin.svg';
						  var marker = new google.maps.Marker({
							map: map,
							position: point
							/*icon: icon*/
						  });
						  marker.addListener('click', function() {
							infoWindow.setContent(infowincontent);
							infoWindow.open(map, marker);
						  });
						});
					  });

			}
		//-->
		</script>
	</body>
</html>