jQuery(document).ready(function(){

jQuery("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false,show_title:false});

/*Navigation mode (check if is IE, do nothing)
/*---------------------------------------------------------------------------------------------*/
if ( jQuery.browser.webkit || jQuery.browser.mozilla || jQuery.browser.opera || (jQuery.browser.msie && jQuery.browser.version  > 8 ) ) {
	//jQuery('#menu-primary-menu').Touchdown();
	jQuery('#block-system-main-menu div div ul:first-child').Touchdown();
	
};

/*Wrap the first word
/*---------------------------------------------------------------------------------------------*/
	jQuery('.first-word,.first-word a').each(function(index) {
		//get the first word
		var firstWord = jQuery(this).text().split(' ')[0];
	
		//wrap it with strong
		var replaceWord = "<strong>" + firstWord + "</strong>";
	
		//create new string with span included
		var newString = jQuery(this).html().replace(firstWord, replaceWord);
	
		//apply to the divs
		jQuery(this).html(newString);
	});
	
	jQuery(".flickr-photoset a").addClass("img-border");
});
jQuery(window).load(function(){
	jQuery(".flexslider.flexslider-shortcode").each(function(index, element) {
		var $el = jQuery(this),
			_animation = typeof $el.data('animation') !== 'undefined' && jQuery.inArray($el.data('animation'), ['slide', 'fade']) === 1 ? $el.data('animation') : 'slide' ,
			_speed = typeof $el.data('speed') !== 'undefined' && $el.data('speed') !== null && !isNaN( parseInt( $el.data('speed') ) ) ? $el.data('speed') : 5000,
			_direction = typeof $el.data('direction') !== 'undefined' && $el.data('direction') !== null && jQuery.inArray($el.data('direction'), ['horizontal', 'vertical']) === 1 ? $el.data('direction') : 'horizontal',
			_autoplay = typeof $el.data('autoplay') !== 'undefined' ? $el.data('autoplay') : true;
	
        console.log(_direction);
		$el.flexslider({
			animation: _animation,
			direction: _direction,
			slideshow: _autoplay,
			controlNav: false,
			slideshowSpeed: parseInt(_speed),
			pauseOnAction:false,
			pauseOnHover: true
		});
	
	});
	
	
	
});
jQuery(window).load(function() {
	jQuery(".testimonial-slider-slide.flexslider").flexslider({
		animation: "slide",
		slideshow: true,
		controlNav: true,
		directionNav: false,
		slideshowSpeed: 5000,
		pauseOnAction:false,
		pauseOnHover: true,
		smoothHeight: true
	})
	jQuery(".testimonial-slider-fade.flexslider").flexslider({
		animation: "fade",
		slideshow: true,
		controlNav: true,
		directionNav: false,
		slideshowSpeed: 5000,
		pauseOnAction:false,
		pauseOnHover: true,
		smoothHeight: true
	})
	
	jQuery(".md-pricing-table ul").each(function(){jQuery("li:even",this).addClass("odd");});
	
});