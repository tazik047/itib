(function( $ ) {
    "use strict";
     
 
    $(function() {



        /* GENERAL SETING 
        ============================================================*/
            $('p:empty').remove();
            $('ol.comment_list li:last, .blog-post-wrapper:last').addClass('last');

            if($.prettyPhoto) {
                $("a[rel^='prettyPhoto']").prettyPhoto();
            }
            
            $(".tagcloud a").removeAttr('style');
            $('#page-nav a.current').click(function(){
                return false;
            })



   
            jQuery(window).load(function() {
					jQuery('#testimonials_1').flexslider({
				    	animation: "fade",
				    	controlNav: false,
				    	prevText: "", 
						nextText: "", 
						directionNav: false,
						smoothHeight: true,
						pauseOnHover: true, 
						slideshowSpeed: 12000, 
				    	start: function(slider){
				    		jQuery('.flexslider').removeClass('loader');
				    	}
				  	});
				});
				
					
				jQuery(window).load(function() {
					jQuery('#testimonials_2').flexslider({
				    	animation: "fade",
				    	controlNav: false,
				    	prevText: "", 
						nextText: "", 
						directionNav: false,
						smoothHeight: true,
						pauseOnHover: true, 
						slideshowSpeed: 8000, 
				    	start: function(slider){
				    		jQuery('.flexslider').removeClass('loader');
				    	}
				  	});
				});
			


        /* IMAGE HOVER 
        ============================================================*/

            /*$(".portfolio-context").css({ opacity: 0.5 });*/
			
			
			 jQuery(document).ready(function($){
			    $('#flickr-widget-2-bmd').jflickrfeed({
					limit       : 9,
					qstrings    : { id: '99771506@N00' },
					itemTemplate: '<li>'+
								  	'<a rel="prettyPhoto[flickr]" href="{{image}}" title="{{title}}">' +
										'<img src="{{image_m}}" alt="{{title}}" />' + '<i class="icon-plus-sign"></i>' +
									'</a>' +
								  '</li>'
				}, function(data){
					$("a[rel^='prettyPhoto']").prettyPhoto();
				});
			});



    });
	
	
	
	
	  jQuery(document).ready(function($){
			    $('#flickr-widget-3-bmd').jflickrfeed({
					limit       : 6,
					qstrings    : { id: '99771506@N00' },
					itemTemplate: '<li>'+
								  	'<a rel="prettyPhoto[flickr]" href="{{image}}" title="{{title}}">' +
										'<img src="{{image_m}}" alt="{{title}}" />' + '<i class="icon-plus-sign"></i>' +
									'</a>' +
								  '</li>'
				}, function(data){
					$("a[rel^='prettyPhoto']").prettyPhoto();
				});
			});
			
			
				jQuery(window).load(function() {
					jQuery('#slider-b1').flexslider({
				    	animation: "fade",
				    	controlNav: false,
				    	prevText: "", 
						nextText: "",
						smoothHeight: true,
				    	start: function(slider){
				    		jQuery('.flexslider').removeClass('loader');
				    	}
				  	});
				});
				
				
				jQuery(window).load(function() {
					jQuery('#slider-12').flexslider({
				    	animation: "fade",
				    	slideshowSpeed: 7000,
						animationSpeed: 600, 
				    	controlNav: false,
				    	prevText: "", 
						nextText: "", 
				    	start: function(slider){
				    		jQuery('.flexslider').removeClass('loader');
				    	}
				  	});
				});
			
			
	
     
 
}(jQuery));



// Portfolio isotope
(function($) {

  $(window).load(function() {
    
    var $container = $('#portfolio')
    
    $container.isotope({
      // options
      itemSelector : 'article',
      layoutMode : 'fitRows',
      resizable: true
    });
    
    $('#filtrable a').click(function(){
      var selector = $(this).attr('data-filter');
      $container.isotope({ filter: selector });      
      return false;
    });
    
    $('#filtrable li a').click(function() {
      $('#filtrable li.active').removeClass('active');
      $(this).parent('li').addClass('active')
    });

  });

})(jQuery);


