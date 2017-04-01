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
  jQuery('body').on("click", ".inp-field li a", function(e){
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
   
  //initMap();
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
