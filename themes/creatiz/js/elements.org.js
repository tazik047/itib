/*---------------------------------------------------------------------------------------------*
 * ELEMENT v1.0
 * 
 * Elements/shortcodes javascript for the site goes here
 *  
 * Copyright 2012 Yeahthemes.com
 * Designed and built by Yeahthemes
 *---------------------------------------------------------------------------------------------*/

// JavaScript Document
(function($)
{
    $.fn.mSimpleToggleAccordion = function(options){
		var defaults = 
        {
           showFirst:true, /*show first toggle content if value : true*/
		   type:"", /*"accordion" ,"toggles"*/
		   speed:500, /*speed of animation, default is 500 milisecond*/
		   easing:"",
		   mEvent:"click"
        };
		var options = $.extend(defaults, options);
		
		return this.each(function(){
			
			var opts = options,
			obj = $(this),		
			toggler = $("> dt",obj),
			toggleContent = $("> dd",obj);
			toggleContent.hide();
			
			$(this).parent().css('position','relative');				
			
			/*Set default open/close settings*/
			if(opts.showFirst==true){$('dt:first',obj).addClass("active").next().addClass("active").show();};
			
			toggler.bind(opts.mEvent, function() {
				
				/*for accordion*/
				if(opts.type == "accordion")
				{
					if( $(this).next().is(":hidden") ) { /*If immediate next container is closed...*/
						toggler.removeClass("active").next().slideUp(opts.speed,opts.easing); /*Remove all "active" state and slide up the immediate next container*/
						$(this).addClass("active").next().slideDown(opts.speed,opts.easing).addClass("active"); /*Add "active" state to clicked trigger and slide down the immediate next container*/
					}
				}
				/*for toggles*/
				else if(opts.type == "toggles"){
					$(this).toggleClass("active").next().slideToggle(opts.speed,opts.easing).addClass("active");
					
				}
				return false;
			});			
        	
		});
	}
})(jQuery);


/*Maxx Simple Tabs;
//Author Manh
//Email:manh.dinh@me.com
//Date Created: 09/11/2011
*/
(function($)
{
    $.fn.mTabs = function(options){
		var defaults = 
        {
		   effect:"fade", /* effect of tab "slide" or fade*/
		   speed:500, /* speed of animation, default is 500 milisecond*/
		   easing:"",
		   mEvent:"click"
        };
		var options = $.extend(defaults, options);
		
		return this.each(function(){
			var opts = options,
			obj = $(this),
			tab = $("> dt",obj),
			tabFirst = $("> dt:first-child",obj),
			tabContent = $("> dd",obj);
			tabContent.hide();
			
			$('dt:first',obj).addClass("active").next().show().addClass("active");
			obj.css({height:$('dt:first',obj).next().outerHeight() + tab.outerHeight()});
			tabContent.css({top:tab.outerHeight()-1,left:0});
			
			tab.bind(opts.mEvent, function() {
				if( $(this).next().is(":hidden") ) {
				$(this).parent().animate({height:$(this).next().outerHeight() + tab.outerHeight()});
				tab.removeClass("active");}
				
				if(opts.effect == "slide")
				{
					tabContent.removeClass("active").slideUp(opts.speed / 2 ,opts.easing); 
					$(this).addClass("active").next().slideDown(opts.speed,opts.easing).addClass("active"); 
					
				}
				else if(opts.effect == "fade"){
					tabContent.removeClass("active").fadeOut(opts.speed / 2,opts.easing); 
					$(this).addClass("active").next().fadeIn(opts.speed,opts.easing).addClass("active");
				}
				return false;
			});	
			
			$(window).bind('resize',function(){
				$('.mds-tabs-wrapper').each(function(index, element) {
                    $(this).css({height:$('> dt.active',this).outerHeight() + $('> dd.active',this).outerHeight()});
                });
			});
        	
		});
	}
})(jQuery);

(function($) {
	
	
	//Text Randomizer
	var textRandomizerFunc = function(selector){
		var isNumericNoFunc = function (n) {
		  return !isNaN(parseFloat(n)) && isFinite(n);
		}
		
		//Shuffle array
		//Credit to http://stackoverflow.com/questions/2450954/how-to-randomize-a-javascript-array
		var shuffleArrayFunc = function(array) {
			for (var i = array.length - 1; i > 0; i--) {
				var j = Math.floor(Math.random() * (i + 1));
				var temp = array[i];
				array[i] = array[j];
				array[j] = temp;
			}
			return array;
		}
		
		//do each function
		$(selector).each(function(index, element) {
			
			var $el = $(this),
				dataArray = $el.data('randomy').split('|'),
				dataSpeed = $el.data('speed'),
				dataFadeTime = $el.data('fadetime');
				
			dataSpeed = dataSpeed && isNumericNoFunc(dataSpeed) ? dataSpeed : 3000;
			dataFadeTime = dataFadeTime && isNumericNoFunc(dataFadeTime) ? dataFadeTime : 800;
			
			
			//console.log(dataArray);
			var count = 0,
				shuffleArray, 
				interactiveSpan = $el.find('span.mds-randomy');
			
			shuffleArray = shuffleArrayFunc(dataArray);
			
			//do the loop
			setInterval(function(){
				
				//check if counter greater than array length , reset it.
				
				if(count > dataArray.length){
					count = 0;
				}
				 
				var text = shuffleArray[count];	
				
				//animate the random text
				interactiveSpan.fadeOut(dataFadeTime,function(){
					interactiveSpan.html(text).fadeIn(dataFadeTime);
				});
				
				//increase counter
				count++;
			},dataSpeed);
			
		});
	}
	jQuery(document).ready(function($){
		
		
		mozillaBrowser = $('body').hasClass('mozilla-browser');
		webkitBrowser = $('body').hasClass('webkit-browser');
		operaBrowser = $('body').hasClass('opera-browser');
		msieBrowser = $('body').hasClass('msie-browser');
		
		
		/*var randText = '<span class="randTextWrapper" data-randomy="January|February|March|April|May|June|July|August|Sep|Oct|Nov|Dec">&nbsp;</span>'; 
		$('#logo').html(randText);*/
		
		
		//cal the textRandomizer
		textRandomizerFunc('.mds-text-radomizer');
		
		//Text Slider
		$(".flexslider.mds-text-slider").each(function(index, element) {
			var $el = $(this),
				_delay = $el.data('delay'),
				_speed = $el.data('speed');
				 
			$el.flexslider({
				animation: "fade", 
				slideshow: true, 
				touch:false, 
				controlNav: false,
				initDelay: _delay,
				directionNav: false,
				slideshowSpeed: _speed,
				pauseOnAction:false,
				smoothHeightSpeed:500,
				pauseOnHover: false,
				smoothHeight: true,
				start:function(slider){
					
					var thisSlide = slider.slides.eq(slider.currentSlide);
					thisSlide.find(".animated").each(function () {
						var transition = $(this).attr("data-transition-entrance");
						$(this).addClass(transition);
					});	
				},before:function(slider){
					var thisSlide = slider.slides.eq(slider.animatingTo);
					thisSlide.find(".animated").each(function () {
						var transition = $(this).attr("data-transition-entrance");
						$(this).addClass(transition);
					});	
				},after:function(slider){					
					var thisSlide = slider.slides.eq(slider.currentSlide);
					setTimeout(function(){
						
						thisSlide.find(".animated").each(function () {
							var transition = $(this).attr("data-transition-entrance");
							$(this).removeClass(transition);
						});	
						
					},_speed/2);
				}
			})
		});
		
		/* SIDEBAR TABS
		/*---------------------------------------------------------------------------------------------*/
		
		
		var sidebar_tab_fullwidth_action = function(){
			$(".mds-features-tabs.no-sidebar-fullwidth").each(function(){
				var active_tab = $(this).find('.mds-features-tabs-header li.active');
				var moving_arrow = $(this).find(".mds-features-tabs-arrow");
				var xPosition = active_tab.position().left + ( active_tab.width()/2) + (moving_arrow.width()/2);
				moving_arrow.css({left:xPosition});
			});	
		}
		
		$(window).bind('resize focus load ready',function(){
			
			$(".mds-features-tabs:not(.no-sidebar-fullwidth) .mds-features-tabs-content").each(function(index, element) {
				$(this).css("min-height",$(this).siblings(".mds-features-tabs-header-wrapper").outerHeight() + 10);
			})
			$(".mds-features-tabs:not(.no-sidebar-fullwidth) .mds-features-tabs-shadow").each(function(index, element) {
				$(this).css("height",$(this).closest(".mds-features-tabs").outerHeight());
			});
			sidebar_tab_fullwidth_action();
				
		});
		//Main trigger
		$(".mds-features-tabs-header li").click(function(){
			
			if($(this).hasClass("active")){
				return false;
			}else{
				//$("> a",this).click(function(){return false;});
				tabContainer = $(this).closest(".mds-features-tabs");
				tabHeader = $(this).closest(".mds-features-tabs-header");
				tabShadow = tabHeader.siblings(".mds-features-tabs-shadow");
				tabHeader.children("li").removeClass("active");
				tabContent = tabHeader.closest(".mds-features-tabs-header-wrapper").siblings(".mds-features-tabs-content");
				tabContent.children("div").removeClass("active").removeAttr('style');		
				rel = $(this).attr("rel");
				$(this).addClass("active");
				if ( msieBrowser) {
					tabContent.find("> .mds-features-tabs-panel[rel=" + rel + "]").addClass("active");			
				}else{
					tabContent.find("> .mds-features-tabs-panel[rel=" + rel + "]").fadeIn(500).delay(500).addClass("active");
				}
				tabShadow.css("height",tabContainer.outerHeight());
				tabContent.find("> .mds-features-tabs-trigger[rel=" + rel + "]").addClass("active");
				
				sidebar_tab_fullwidth_action();
			}
			return false;
		});
		//Secondary trigger
		$(".mds-features-tabs-trigger").click(function(){
			if($(this).hasClass("active")){
				return false;
			}else{
				tabContainer = $(this).closest(".mds-features-tabs");
				tabHeader = tabContainer.find(".mds-features-tabs-header");
				tabHeader.children("li").removeClass("active");
				tabContent = $(this).closest(".mds-features-tabs-content");
				tabContent.children("div").removeClass("active").removeAttr('style');			
				rel = $(this).attr("rel");
				$(this).addClass("active");
				if (msieBrowser) {
					tabContent.find("> .mds-features-tabs-panel[rel=" + rel + "]").addClass("active");
				}else{
					tabContent.find("> .mds-features-tabs-panel[rel=" + rel + "]").fadeIn(500).delay(500).addClass("active");
				}
				tabHeader.find("li[rel=" + rel + "]").addClass("active");
			}
			return false;
		});
		
		
		/* ELEMENTS INITIALIZATION
		/*---------------------------------------------------------------------------------------------*/
		// scroll body to 0px on click
		$(".back-to-top,.contenttype-back-to-top span").click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800,'easeOutExpo');
			return false;
		});
		
		//Accordion
		$("dl.mds-accordion-wrapper").mSimpleToggleAccordion({
			showFirst:true,
			type:"accordion",
			speed:300,
			mEvent:"click"
		});
		
		//Toggle
		$("dl.mds-toggles-wrapper").mSimpleToggleAccordion({
			type:"toggles",
			showFirst:false,
			speed:300,
			easing:"",
			mEvent:"click"
		});
		
		//Tabs
		$("dl.mds-tabs-wrapper").mTabs({
			speed:400,
			easing:"",
			effect:"fade",
			mEvent:"click"
		});
		
		$('.mds-notification .close').click(function(){
			$(this).parent().slideUp();
			return false;	
		});
		
	});


})(jQuery);