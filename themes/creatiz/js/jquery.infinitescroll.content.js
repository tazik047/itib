(function($) {
// Infinite Scroll Setup
	$(document).ready(function() {
		if(_md_infiniteScroll !== 'undefined'){
			
			/*if ($.browser.msie && $.browser.version  < 9 ) {
				$('.blog-page .post .featured-image a img').removeAttr('height width');
			};*/
			
			// cache container
			var $container = $('.blog-page.blog-masonry #blog-masonry-wrapper');
			
			
			$container.imagesLoaded( function(){
				// initialize isotope
				$container.isotope({
					itemSelector : '.post',
					// options...
					resizable: false, // disable normal resizing
					// set columnWidth to a percentage of container width
					masonry: { columnWidth: $container.width() / 4 }
				});
				
				//console.log('loaded');
			});
			
			
			
			// filter items when filter link is clicked
			$('.filter-wrapper ul li a').click(function(){
				$('.filter-wrapper ul li a').removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector });
				return false;
			});
			
			$(window).smartresize(function($){
			  $container.isotope({
				// update columnWidth to a percentage of container width
				masonry: { columnWidth: $container.width() / 4 }
			  });
			});
	
			$container.infinitescroll({
				loading: {
					img: _md_infiniteScrollConfigs.img,
					msgText: _md_infiniteScrollConfigs.msgText,
					finishedMsg: _md_infiniteScrollConfigs.finishedMsg
				},
				navSelector  : '.page-navigation',    // selector for the paged navigation
				nextSelector : '.nav-prev a',  // selector for the NEXT link (to page 2)
				itemSelector : '.post',
				contentSelector:'#blog-masonry-wrapper'
			},
			// call Isotope as a callback
			function( newElements ) {
				$container.isotope( 'appended', $( newElements ) );
				$(".fluid-video").fitVids();
				$container.imagesLoaded( function(){
					$container.isotope({ masonry: { columnWidth: $container.width() / 4 }});
				});
				
				//Callback for Flexslider
				$('.flexslider').flexslider({
					animation: "fade",              //String: Select your animation type, "fade" or "slide"
					direction: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
					slideshow: true, 
					controlNav: true,
					directionNav: false, 
					slideshowSpeed: 5000,
					pauseOnAction:false,
					pauseOnHover: true,
					smoothHeight:true,
					start:function(){
						$container.isotope({
							// update columnWidth to a percentage of container width
							masonry: { columnWidth: $container.width() / 4 }
						});
					},
					before:function(){
						$container.isotope({
							// update columnWidth to a percentage of container width
							masonry: { columnWidth: $container.width() / 4 }
						});
					}
				});
				
				//Callback for jPlayer
				$('.jp-jplayer-audio').each(function() {
					var audio_id = $(this).attr('data-id');
					var data_mp3 = $(this).attr('data-mp3');
					var data_ogg = $(this).attr('data-ogg');
					var data_poster = $(this).attr('data-poster');
					var data_poster_size = $(this).attr('data-thumbsize');
					
					$("#audio-post-" + audio_id).jPlayer({
						ready: function () {
							$(this).jPlayer("setMedia", {
								poster: data_poster,
								mp3: data_mp3,
								oga: data_ogg,
								end: ""
							});
						},
						size: {
							width: data_poster_size + "px",
							height:""
						},
						swfPath: _md_infiniteScrollConfigs.swfPath,
						cssSelectorAncestor: "#jp_interface_" + audio_id,
						supplied: "mp3, ogg,  all"
					});
				});
				if(_md_infiniteScrollTrigger === 'manual'){
					$('.page-navigation').show().css({'visibility':'visible'});
				}
			});
			
			//Manual Trigger
			if(_md_infiniteScrollTrigger === 'manual'){
				$container.infinitescroll('unbind');
				$('.nav-prev a').click(function(){
					$container.infinitescroll('retrieve');
					return false;
				});
			}
			
			// remove the paginator when we're done.
			$(document).ajaxError(function(e,xhr,opt){
			  if (xhr.status == 404) $('.page-navigation').remove();
			});
	
		}
	});

})(jQuery);