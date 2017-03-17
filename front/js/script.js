jQuery(document).ready(function(){
  
	//banner full height
	bannerHeight();
  containerPadding();
	jQuery(window).resize(function(){
		bannerHeight();
    containerPadding();
	});

  jQuery('.menu-list a').on('click touchstart', function(e){
    e.preventDefault();
    var thisHref = jQuery(this).data('href');
    jQuery('#'+thisHref).slideDown();
    jQuery('body').css('overflow', 'hidden');
    jQuery('.ila-header .container').hide();
  });
  jQuery('.cancel').on('click touchstart', hideMenu);
  jQuery('.overlay').on('click touchstart', function(e){
    if(e.target.nodeName !== 'A' || !jQuery(e.target).parents('li')) { hideMenu(); }
  });

  function hideMenu() {
    jQuery('.ila-header .container').show();
    jQuery('.overlay').slideUp();
    jQuery('body').css('overflow', 'auto');
  }

	//Next section link
	var bannerSectionHeight = jQuery('.banner-section').height();
	jQuery('#next-section-arrow').on('click touchstart', function(){
		var thisHref = jQuery(this).attr('href');
		var sectionOffset = jQuery(thisHref).offset().top;
		jQuery('html, body').animate({
			scrollTop:sectionOffset - 64}, 1500);
	});

	// Fancybox
	$("[data-fancybox]").fancybox({
		iframe : {
			tpl : '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>'
		}
	});

	//Footer accordian
		jQuery('.navigation .sub-menu-wrapper > a').on('click', function(e){
      e.stopPropagation();
    	if(jQuery(this).hasClass('active-submenu')){
        jQuery(this).removeClass('active-submenu')
        jQuery(this).siblings('.sub-menu').slideUp();
      }else{
        jQuery(this).addClass('active-submenu');
        jQuery(this).siblings('.sub-menu').slideDown();
      }
	  });

//Dropdowns
  jQuery('.inp-field li a').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    var selectedText= jQuery(this).text();
    jQuery('.inp-field li a').removeClass('active');
    jQuery(this).addClass('active');
    jQuery(this).parents('.inp-field').find('.select-input').attr('value' , selectedText);
    jQuery(this).parents('.dropdown').hide();
  });
  jQuery('.inp-field').click(function(){
    jQuery('.inp-field').removeClass("active");
    if(jQuery(this).hasClass("active")) {
      jQuery(this).removeClass("active");
      jQuery(this).children('.dropdown').hide();
    } else {
        jQuery('.dropdown').hide();
        jQuery(this).children('.dropdown').show();
        jQuery(this).addClass("active");
    }
  });
  jQuery('input[type="text"], input[type="email"], input[type="password"]').on('blur click focus touchstart', function(){
      var input = this;
      setTimeout (function(){
        var inpValue = jQuery(input).val();
        if(inpValue != ''){
          jQuery(input).siblings('label').addClass('active-label');
        }else{
          jQuery(input).siblings('label').removeClass('active-label');
        }
      }, 150);
  });
  var inputField = jQuery('input[type="text"], input[type="email"], input[type="password"]');
  setTimeout(function() {
    for(i=0; i < inputField.length; i++){
      if(jQuery(inputField[i]).val() != ''){
        jQuery(inputField[i]).siblings('label').addClass('active-label');
      }else{
        jQuery(inputField[i]).siblings('label').removeClass('active-label');
      }
    }
  }, 100);
  jQuery(document).click(function(e) { 
    if(!jQuery(e.target).closest('.inp-field').length) {
      e.stopPropagation();
      if(jQuery('.inp-field').is(":visible")) {
        jQuery('.inp-field').removeClass('active');
        jQuery('.dropdown').hide();
      }
    }        
  });
   
  initMap();
});

function containerPadding(){
  var headerHeight = jQuery('header').outerHeight();
jQuery('.ila-container').css('padding-top', headerHeight)
}

function bannerHeight(){
  var headerHeight = jQuery('header').outerHeight();
	var winHeight = jQuery(window).height();
	jQuery('.banner-section').height(winHeight - headerHeight);
}


function initMap() {
  var map;
  var bounds = new google.maps.LatLngBounds();
  var grayStyles = [
      {
        featureType: "water",
        stylers: [
          { color: '#c5c5c5' }
          
        ]
      },
    ];
  var mapOptions = {
      mapTypeId: 'roadmap',
      styles: grayStyles 
  }

  map = new google.maps.Map(document.getElementById("map"), mapOptions);

  var infomarkers = [
      ['66 Vo Van Tan, Vietnam', 16.0669926,108.2007008],
  ];
                  
  // Info Window Content
  var infoWindowContent = [
      ['<div class="info_content">' +
        '<div class="address">'+
        	'<h3>66 Vo Van Tan</h3>' +
	        '<div class="address-content">'+
		        '<p>66 Vo Van Tan, Thanh Khe Dist., Da Nang, Chính Gián, Thanh Khê,</p>' +
		        '<a href="tel:+84 236 3647 444" class="phone-num">+84 236 3647 444</a>'+
	        '</div>'+
        '</div>'+
      '</div>']
  ];
  
  var infoWindow = new google.maps.InfoWindow(), marker, i;
  
  for( i = 0; i < infomarkers.length; i++ ) {
      var position = new google.maps.LatLng(infomarkers[i][1], infomarkers[i][2]);
      bounds.extend(position);
      marker = new google.maps.Marker({
          position: position,
          map: map,
          title: infomarkers[i][0],
          icon: 'images/img-marker.png'
      });
         
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
              infoWindow.setContent(infoWindowContent[i][0]);
              infoWindow.open(map, marker);
              var closeBtn = jQuery('.gm-style-iw').next();
             jQuery(closeBtn).children('img').hide();
  					jQuery(closeBtn).css({textIndent: '-9999px', opacity: '1', right:'-13px', top: '-12px', display:'block',width:'25px', height:'25px', background:'url("images/map-info-close.png") 0 0 no-repeat'});
          }

      })(marker, i));

      map.fitBounds(bounds);
  }

  var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
      this.setZoom(14);
      google.maps.event.removeListener(boundsListener);
  });

  var legendHTML = '<div id="map-legend-wrap"><span class="map-legend"><span id="map-all"></span>All ila schools</span><span class="map-legend"><span id="map-near"></span>Near by your location</span></div>';
  jQuery("#map").append(legendHTML);



}