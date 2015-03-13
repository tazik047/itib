// JavaScript Document

(function($) {
	//Custom slider
	
	
	$(window).on('load',function(){
		
	if (typeof _md_flexContentSlider !== 'undefined' && _md_flexContentSlideCount == 1) {
		console.log('Static Slide');
	}
		
	//only init when variable equals true
	if (typeof _md_flexContentSlider !== 'undefined' && _md_flexContentSlideCount > 1) {
		var _sliderID = _md_flexContentSliderConfigs.sliderID;
		
		//Add Fluid class to parent of video from youtube, vimeo, blipTV before Content Slider Initialization
		$('.slides li .slider-content-overlay',$(_sliderID)).find("iframe[src*='www.youtube.com'],iframe[src*='player.vimeo.com'],iframe[src*='www.kickstarter.com'],iframe[src^='http://blip.tv'],object,embed").parent().addClass("fluid-video");
		
		//Init FlexContent Slider
		$(_sliderID).fitVids().flexslider({
			animation: _md_flexContentSliderConfigs.animation,
			easing: _md_flexContentSliderConfigs.easing,
			slideshowSpeed: _md_flexContentSliderConfigs.slideshowSpeed,
			animationSpeed: _md_flexContentSliderConfigs.animationSpeed, 				
			animationLoop: _md_flexContentSliderConfigs.animationLoop,
			smoothHeight: _md_flexContentSliderConfigs.smoothHeight,
			initDelay: _md_flexContentSliderConfigs.initDelay,
			randomize: _md_flexContentSliderConfigs.randomize,
			pauseOnAction: _md_flexContentSliderConfigs.pauseOnAction,
			pauseOnHover: _md_flexContentSliderConfigs.pauseOnHover,
			video: _md_flexContentSliderConfigs.video,
			useCss: _md_flexContentSliderConfigs.useCss,
			touch: _md_flexContentSliderConfigs.touch, 
			smoothHeightSpeed: _md_flexContentSliderConfigs.smoothHeightSpeed,
			delayBeforeSwitching:500,
			enableContentSlider:true,
			//manualControls: ".custom-control-paging li a",
			start: slideStart,
			before:slideBefore,
			after: slideComplete
		});
		
		//Re-update the height of each slide when loading or resizing the browser
		$(window).bind("resize focus",function(){
			update_slide_height();
		});	
		
		
			
		/*Function when Starting the slider*/
		function slideStart(slider) {
		
			var sliderPagingControl = $(_sliderID).find('.flex-control-nav.flex-control-paging');
			sliderPagingControl.css('margin-left',-(sliderPagingControl.outerWidth()/2));
			//Fix Clone slide's bug
			slider.find('.clone .slider-content-overlay').css({opacity:0});
			
			update_slide_height();
			
			slider.slides.find('iframe').each(function(){
				//get the generated id by fitVids
				videoID = $(this).attr('id');
				oldSrc = $(this).attr('src');
				
				//defaul video source
				newSrc = oldSrc;
				
				///$(this).attr('data-id',videoID);
				
				//Slpit the video url, add some option to make it pausable when switching to another slider, Nice! 
				oldSrcTemp = $(this).attr('src').split('.');
				
				//if is youtube , enable javascript api and add transparent wmode to make the video stay under the lightbox (if available) 
				if(oldSrcTemp[1] == 'youtube'){
					
					newSrc = oldSrc + '?enablejsapi=1&wmode=transparent&rel=0';
					$(this).addClass(oldSrcTemp[1] + '-video');
					
				}
				//if is vimeo
				else if(oldSrcTemp[1] == 'vimeo'){
					
					newSrc = oldSrc + '&title=0&byline=0&portrait=0&api=1&player_id=' + videoID
					$(this).addClass(oldSrcTemp[1] + '-video');
				}
				$(this).attr('src',newSrc);
			});
			
			//
			$('#main-flexslider.flexslider .slides > li').each(function(index, element) {
				//Get the current styling
				currentStyle = $(this).attr('style');
				//append the styling from custom metabox fields to current styling
				$(this).attr('style',currentStyle + $(this).attr('data-style'));
			});
			
			
			//Fix Clone Slide's bug
			//slider.find('.clone').css({opacity:0});
			
			var thisSlides = slider.slides;
			thisSlides.find('.slider-content-overlay').css({opacity:0});
			var thisSlide = slider.slides.eq(slider.currentSlide);
			
			thisSlide.find('.slider-content-overlay').animate({
				opacity:'1'
			}, 300);
			
			var thisCaption = thisSlide.find('.animated');
			thisCaption.each(function () {
				var transition = $(this).attr('data-transition-entrance');
				var transitionOut = $(this).attr('data-transition-exit');
				$(this).addClass('animated').removeClass(transitionOut).addClass(transition);
			});
			

			//alert('start');
		};
		
		//Function Before
		function slideBefore(slider) {
			//hide the clone slider
			//slider.find('.clone').css({opacity:0});
			var thisSlide = slider.slides.eq(slider.currentSlide);
			
			//Pause Video when switching to another slides
			thisSlide.find('iframe').each(function(){
				if($(this).hasClass('youtube-video')){				
					callPlayer($(this).attr('id'),"pauseVideo");
				}else if($(this).hasClass('vimeo-video')){
					player = $f(document.getElementById($(this).attr('id')));
					player.api('pause');
				}
			});
			
			thisSlide.find('.slider-content-overlay').animate({
				opacity:'0'
			}, 500);
			
			var thisCaption = thisSlide.find('.animated');
			thisCaption.each(function () {
				var transition = $(this).attr('data-transition-entrance');
				var transitionOut = $(this).attr('data-transition-exit');
				
				$(this).removeClass(transition).addClass(transitionOut);
			});
			//alert('before');
		};
		
		//Function Complete
		function slideComplete(slider) {
			var thisSlide = slider.slides.eq(slider.currentSlide);
			thisSlide.find('.slider-content-overlay').animate({
				opacity:'1'
			}, 300)
			
			var thisCaption = thisSlide.find('.animated');
			thisCaption.each(function () {
				var transition = $(this).attr('data-transition-entrance');
				var transitionOut = $(this).attr('data-transition-exit');
				$(this).addClass('animated').removeClass(transitionOut).addClass(transition);
			});
			
			//alert('after');
		};
		
		//Function to Update the individual Slide Height
		function update_slide_height()
		{
			$('#main-flexslider.flexslider .slides > li').each(function(index, element) {
			
				dataHeight = $(this).attr('data-height').split(',');
				
				finalHeight = dataHeight[1];
				
				var windowWidth = $(window).width();
					
				//Default
				if(windowWidth < 1200 && windowWidth > 960) {
					finalHeight = dataHeight[1];
				}
				//Large Displat
				else if (windowWidth > 1200 && _md_flexContentSliderConfigs.responsive ) {
					if(_md_flexContentSliderConfigs.responsiveLargeDisplay == true){
						finalHeight = dataHeight[0];
					}
				}
				//Tablet Portrait
				else if(windowWidth < 960 && windowWidth >= 768 && _md_flexContentSliderConfigs.responsive ) {
					finalHeight = dataHeight[2];
				}
				//Mobile Landscape
				else if(windowWidth < 768 && windowWidth >= 480 && _md_flexContentSliderConfigs.responsive ) {
					finalHeight = dataHeight[3];
					//console.log('Mobile Landscape');
				}
				//Mobile Portrait
				else if(windowWidth < 480 && _md_flexContentSliderConfigs.responsive ) {
					finalHeight = dataHeight[4];
					//console.log('Mobile Portrait');
				}
				
				$(this).not('.slide-description,.slide-image-video').css('height',finalHeight);
			});
		};
		
		/*
		 * @author       Rob W (http://stackoverflow.com/a/7513356/938089
		 * @description  Executes function on a framed YouTube video (see previous link)
		 *               For a full list of possible functions, see:
		 *               http://code.google.com/apis/youtube/js_api_reference.html
		 * @param String frame_id The id of (the div containing) the frame
		 * @param String func     Desired function to call, eg. "playVideo"
		 * @param Array  args     (optional) List of arguments to pass to function func*/
		
		
		function callPlayer(frame_id, func, args) {
			if (window.jQuery && frame_id instanceof jQuery) frame_id = frame_id.get(0).id;
			var iframe = document.getElementById(frame_id);
			if (iframe && iframe.tagName.toUpperCase() != 'IFRAME') {
				iframe = iframe.getElementsByTagName('iframe')[0];
			}
			if (iframe) {
				// Frame exists, 
				iframe.contentWindow.postMessage(JSON.stringify({
					"event": "command",
					"func": func,
					"args": args || [],
					"id": frame_id
				}), "*");
			}
		};
		//]]> 
	}
	});

})(jQuery);