/*---------------------------------------------------------------------------------------------*
 * CUSTOM JS v1.0
 * 
 * All custom javascript for the site goes here
 *  
 * Copyright 2012 Yeahthemes.com
 * Designed and built by Yeahthemes
 *---------------------------------------------------------------------------------------------*/
 
 
(function($) {
//Scrollfix menu
/*---------------------------------------------------------------------------------------------*/
	//set when window is loaded
	var scrollFixMenuFunc = function(){
	
		var scrollTrigger = false,
			mainWrapper = $('#main-content-background'),
			pageTitleShadow = $('#main-content-background').find('.page-title-shadow-divider'),
			fixedClass = 'position-fixed',
			scrollFixMenu,
			tempSpace = 'padding-bottom';
		if($('body').hasClass('menu-style-one-line')){
			scrollFixMenu = $('#one-line-nav');
		}else{
			scrollFixMenu = $('#banner');
			tempSpace = 'height';
		}
		scrollFixMenuHeight = scrollFixMenu.outerHeight();
		
		
		//Release Menu Function
		var releaseNavMenuFunc = function(){
			if (scrollFixMenu.hasClass(fixedClass)){
				scrollFixMenu.removeClass(fixedClass);
				$('#header').removeAttr('style');
				
				//pageTitleShadow.removeClass(fixedClass).removeAttr('style');
			}
		};
		//Fix Menu Function
		var fixNavMenuFunc = function(){
			if (!scrollFixMenu.hasClass(fixedClass)){
				scrollFixMenu.addClass(fixedClass);
				$('#header').css(tempSpace,scrollFixMenuHeight);
				
				//pageTitleShadow.addClass(fixedClass).css('top',scrollFixMenuHeight);
			}
		};
		
		//Release Mobile Menu Function
		var releaseNavMenuMobileFunc = function(){
			if ($('#banner').hasClass(fixedClass)){
				var scrollFixMenu_ = $('#banner');
				scrollFixMenu_.removeClass(fixedClass);
				$('#header').removeAttr('style');
				//pageTitleShadow.removeClass(fixedClass).removeAttr('style');
			}
		};
		//Fix Mobile Menu Function
		var fixNavMenuMobileFunc = function(){
			if (!$('#banner').hasClass(fixedClass)){
				var scrollFixMenu_ = $('#banner');
				var scrollFixMenuHeight_ = scrollFixMenu_.outerHeight();
				
				scrollFixMenu_.addClass(fixedClass);
				$('#header').css('height',scrollFixMenuHeight_);
				//pageTitleShadow.addClass(fixedClass).css('top',scrollFixMenuHeight_);
			}
		};
		
		var scrollTopPosition, headerHeight;
		//Scroll trigger
		$(window).scroll(function(){
			scrollTrigger = true;
			scrollTopPosition = $(window).scrollTop();
			headerHeight = $('#header').outerHeight() + $('#header').offset().top;
			
			//if scroll top is taller than #header height
		});
		
		setInterval(function() {
			if ( scrollTrigger ) {
				scrollTrigger = false;
				//console.log(scrollTrigger);
				if($(window).width() < 960) {
					scrollFixMenuHeight_ =  $('#banner').outerHeight();
					if(scrollTopPosition < headerHeight-scrollFixMenuHeight_)
						releaseNavMenuMobileFunc();
					else
						fixNavMenuMobileFunc();	
				}else{
					if(scrollTopPosition < headerHeight-scrollFixMenuHeight)
						releaseNavMenuFunc();
					else
						fixNavMenuFunc();
				}
				
			}
		}, 100);
		
		//resize and focus trigger
		$(window).bind("resize focus",function(){
			//console.log($(window).width());
			scrollFixMenuHeight = scrollFixMenu.outerHeight();
			scrollTopPosition = $(window).scrollTop();
			headerHeight = $('#header').outerHeight() + $('#header').offset().top;
			if($(window).width() < 960) {
				releaseNavMenuFunc();
				scrollFixMenuHeight_ =  $('#banner').outerHeight();
				if(scrollTopPosition > headerHeight-scrollFixMenuHeight_)
					fixNavMenuMobileFunc();
			}else{
				releaseNavMenuMobileFunc();
				if(scrollTopPosition > headerHeight-scrollFixMenuHeight)
					fixNavMenuFunc();	
			}
		});
	}
	

//Scroll Animation
/*---------------------------------------------------------------------------------------------*/

	
	/*--------------------------------------------------------------------*/
	//CSS Animation function
	/*--------------------------------------------------------------------*/
	var performAnimFunc = function(mainContentAnim,hideFields,delayAnim,timeOut){
		var hiddenClass = 'visibility-hidden';
		$(hideFields,$(mainContentAnim)).addClass(hiddenClass);
		var contentAnim = function(){
			$(mainContentAnim).each(function(index, element) {
				var $el = $(this);
				var animRandomization = $el.data('randomization');
				var offsetTop = $el.offset().top;
				if(offsetTop-500 < $(window).scrollTop()){
					if($el.hasClass('fired')) return;
					
					
	
					var hideFieldsTotal = $(hideFields,this).length;
					$(hideFields,this).each(function(indexChild, elementChild) {
						var $elChild = $(this);
						var animClass = 'animated '+ $elChild.data('animation');
						//console.log(animClass);
						
						var dataChild = $(this).data('child');
						if (typeof dataChild !== 'undefined' && dataChild !== false)
						{
							var subChild = dataChild;
							
							$elChild.find(subChild).addClass(hiddenClass);
							$elChild.removeClass(hiddenClass);
							$(subChild, this).each(function(indexSubChild, elementSubChild) {
								var $elSubChild = $(this);
								
								var delayTime = animRandomization === true ? Math.floor(Math.random() * (timeOut*3)) : indexSubChild * timeOut/2;
								setTimeout( function() {
									$elSubChild.removeClass(hiddenClass).addClass(animClass);
									//Remove the class after done animation
									setTimeout( function() {$elSubChild.removeClass(animClass)},timeOut*10);
								}, (indexSubChild !== 0 ? delayTime : 0 ));
								//}, (indexSubChild !== 0 ? indexSubChild * timeOut/2 : 0 ));
							});
							$el.addClass('fired');
						}else{
							
							var delayTime = animRandomization === true ? Math.floor(Math.random() * (timeOut*3)) : indexChild * timeOut;
							setTimeout( function() {
								$elChild.removeClass(hiddenClass).addClass(animClass);
								
								if(indexChild == 0){
									$el.addClass('fired');	
								}
								//$el.addClass('fired');
								$el.addClass('index-'+ index);
								$elChild.addClass('temp-'+ indexChild * delayAnim);
								//Remove the class after done animation
								setTimeout( function() {$elChild.removeClass(animClass)},timeOut*10);
							//}, (indexChild !== 0 ? indexChild * timeOut : 0 ));	
							}, (indexChild !== 0 ? delayTime : 0 ));	
							
						}
					});
				}
			});	
		};
		$(window).on('load',function(){
			contentAnim();
		});
		
		var scrollTrigger = false;
		$(window).scroll(function(){
			scrollTrigger = true;
		});
		
		var interval, intervalClearer;	
		
		interval = setInterval(function() {
			if ( scrollTrigger ) {
				scrollTrigger = false;
				contentAnim();
			}
		},250);
		
		intervalClearer = setInterval(function() {
			var sectionLength = $('.mds-page-section.animatiton-enabled:not(.fired)').length;
			if(sectionLength){
				//console.log('Unfired: ' + sectionLength);
			}
			else{
				clearInterval(interval);
				clearInterval(intervalClearer);
				//console.log('Interval cleared');
			}
		},500);
		
		
	};
	
	/*--------------------------------------------------------------------*/
	//Parallax Performance function
	/*--------------------------------------------------------------------*/
	var parallaxAnimFunc = function(){
		var scrollTrigger = false, yPos, coords;
		
		$(window).scroll(function(){
			scrollTrigger = true;
		});
		
		setInterval(function() {
			if ( scrollTrigger ) {
				
				scrollTrigger = false;
				$('div.mds-page-section[data-parallax]').each(function(index, element){
					var $el = $(this); 
					
					//console.log($el.scrollTop());
					
					var elOffsetTop = $el.offset().top,
						windowHeight = $(window).height(),
						windowScrollTop = $(window).scrollTop();
					
					//only move the background when the section is in the viewport
					if(elOffsetTop - windowHeight < windowScrollTop && elOffsetTop + windowHeight > windowScrollTop ){
						// Put together our final background position
						
						/*if(index == 1 ){
							console.log(windowScrollTop - (elOffsetTop - windowHeight));	
						}*/
						
						var sectionOnViewport = windowScrollTop - (elOffsetTop - windowHeight);
						yPos = -(sectionOnViewport / parseInt($el.data('parallax')) );
						/*sectionOnViewport = windowScrollTop - elOffsetTop;
						yPos = ((sectionOnViewport / parseInt($el.data('parallax')) - $el.height()/2) );*/
						coords = '50% '+ yPos + 'px';
						
						// Move the background
						$el.css({ backgroundPosition: coords });
						
					}
				});
			}
		},50);
	}
	/*var parallaxMousemoveFunc = function(el){ 
		
		el.on('mousemove', function(e){
			
			var mouse_dx = - e.pageX - ($(window).width() / 2);
			var mouse_dy = - (e.pageY - el.offset().top) - (el.outerHeight() / 2);
			el.css({
				backgroundPosition : mouse_dx + 'px ' + mouse_dy + 'px'
			});
		});
	};*/
	

// BEGIN CUSTOM JAVASCRIPT DOCUMENT
/*---------------------------------------------------------------------------------------------*/	
	$(window).on('load',function(){
		//if enable scrollfix menu
		if (typeof _md_scrollFixMenu !== 'undefined') {
			scrollFixMenuFunc();
			
		}/*end if*/
		

	});
	$(document).ready(function(){
		//var obj = { count : '10', animation: 'fade'};
		//for(var k in obj){
			
			//console.log(k + obj[k]);
		//}
		
		//Detect browser
		/*--------------------------------------------------------------------*/
		var mozillaBrowser = $('body').hasClass('mozilla-browser');
		var webkitBrowser = $('body').hasClass('webkit-browser');
		var operaBrowser = $('body').hasClass('opera-browser');
		
		
		
		//Touch device Start here
		/*--------------------------------------------------------------------*/
		var is_touch_device = 'ontouchstart' in document.documentElement;
		if(is_touch_device){
			
			if($('body').hasClass('landing-page')){
				$('*').bind('touchstart touchend', function() {});
			}
			
			if($('body').hasClass('phone')){
				
				if(!$('body').hasClass('enabled-responsiveness')){
					$('.m-menu').mMenu({appendContent:''});	
				}
					
				$('*').bind('touchstart touchend', function() {});
				
			}else{
				$('.m-menu li:has(ul)').doubleTapToGo();
			}
			
		}else{
			//alert('handheld');	
			$('.m-menu').mMenu({appendContent:''});
		}
		
		//Specified handheld devices for the Animation Performance
		/*--------------------------------------------------------------------*/
		if( !$('body').hasClass('handheld') ) {
			//Parallax
			parallaxAnimFunc();
			
		}
		
		// if is not phone
		if( !$('body').hasClass('phone') ) {	
			//Animation on scroll
			var mainContentAnim = 'section.mds-page-section.animatiton-enabled',
				hideFields 		= '.content-builder > div:not([data-animation=off])';
			
			if(!$('html').hasClass('ie')){
				performAnimFunc(mainContentAnim, hideFields, 500, 300);
			}
		}
		
			
			
		//on scroll trigger
		/*--------------------------------------------------------------------*/
		
		
		// Scroll event
		var scrollTopPosition, scrollTrigger;
		
		$(window).scroll(function(){
			scrollTrigger = true;
			scrollTopPosition = $(window).scrollTop();
		});
			
		setInterval(function() {
			if ( scrollTrigger ) {
				
				scrollTrigger = false;
				//Yeah top
				if(scrollTopPosition > 500){
					$('#primary-back-to-top').addClass('active');	
				}else{
					$('#primary-back-to-top').removeClass('active');
				}
				
				
				//Scroll spy menu active state
				$('body.enabled-scrollspy-nav').find('section.mds-page-section').each(function(index, element) {
					var $el = $(this);
					var offsetTop = $el.offset().top;
					//console.log(index);
					
					if((offsetTop-extraOffset-1) < $(window).scrollTop() && ((offsetTop-extraOffset-1) + $el.outerHeight()) > $(window).scrollTop()){
						$('.primary-srollspy-nav-menu li').removeClass('current-menu-item');
						$('.primary-srollspy-nav-menu li a[href="#'+ $el.attr('id') +'"]').parent().addClass('current-menu-item');
						
						$el.siblings().removeClass('current');
						$el.addClass('current');
					
					}
					
				});
									
			}
		},150);
		
		//Scroll Spy Menu trigger
		/*--------------------------------------------------------------------*/
		
		//get extra height
		var extraOffset = 0;
		if (typeof _md_scrollFixMenu !== 'undefined') {
			if($('body').hasClass('menu-style-one-line')){
				extraOffset = $('#one-line-nav').outerHeight();
			}else{
				extraOffset = $('#banner').outerHeight();
			}
		}
		
		//click event
		$(".primary-srollspy-nav-menu li a").each(function(index, element) {
			//console.log(extraOffset);
			$(this).click(function(){
				$el = $(this);	
				$('html,body').animate({scrollTop:$(this.hash).offset().top-extraOffset}, 800);
				
				return false;
			});
		});
		
		//Global search
		$('#g-search:not(.active) a').on('click',function(){
			var modal = '<div id="modal-box" style="position: fixed;background: rgb(0, 0, 0);width: 100%;height: 100%;z-index: 100000;top: 0;left: 0;opacity: .1;"></div>';
			
			$(modal).hide().appendTo('body').fadeIn();
			$('body').find('#page-float-nav').css('z-index',100001);
			$('#wrap-all').css('-webkit-filter','blur(2px)');
			$(this).siblings('form').stop(true, true).fadeIn();
			$(this).siblings('form').find('input').focus();
			$('#g-search').addClass('active');
			return false;	
		});
		
		$('#g-search form input').on('blur',function(){
			$(this).parent('form').stop(true, true).fadeOut();
			$('#g-search').removeClass('active');
			$('body').find('#modal-box').remove();
			$('body').find('#page-float-nav').removeAttr('style');
			$('#wrap-all').css('-webkit-filter','blur(0)');
		});
		
		//Tooltip
		/*--------------------------------------------------------------------*/
		$("body.desktop #wrap-all .mds-social-networks ul:not(.with-description) a" ).tooltip({
			position: {
				my: "center bottom-15",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
					.addClass( "ui-arrow arrow-down" )
					.addClass( feedback.vertical )
					.addClass( feedback.horizontal )
					.appendTo( this );
				}
			},show: {duration: 100 }
		});
		
		$(  "body.desktop #page-float-nav .mds-social-networks ul:not(.with-description) a, .enabled-scrollspy-nav .srollspy-nav-controls li a" ).tooltip({
			position: {
				my: "left+15 center",
				at: "right center",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
					.addClass( "ui-arrow arrow-right" )
					.addClass( feedback.vertical )
					.addClass( feedback.horizontal )
					.appendTo( this );
				}
			},show: {duration: 100 }
		});
		
	
	/* MENU INITIALIZATION
	/*---------------------------------------------------------------------------------------------*/

		//LAVALAMP EFFECT
		$('html:not(".ie") .header-menustyle-default .m-menu > div > ul,#one-line-nav .m-menu > div > ul ').lavaLamp({ speed: 600 });

		$('#mobile-menu-nav-wrapper select:not(.scrollspy)').change(function () {
			window.location = $(this).val();
		});
		
		$('#mobile-menu-nav-wrapper select.scrollspy').change(function () {
			var divID = $(this).val();
			$('html,body').animate({scrollTop:$(divID).offset().top-extraOffset}, 800);
		});
		
		
	/* MISC
	/*---------------------------------------------------------------------------------------------*/
		$("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false,show_title:false,theme: 'yeahthemes',horizontal_padding:10});
		$("iframe[src*='www.youtube.com'],iframe[src*='player.vimeo.com']").parent().addClass("fluid-video");
		$(".fluid-video").fitVids();
		
		
		//Check if top bar closed
		if($.cookie('cookie_infobar') == null){
			$(window).bind('load',function(){
				$('#top-info-bar').slideDown();
			});
			//console.log('Cookie for Infobar not found ');
		}	
		
		//Close and Open Info text bar
		$('#top-info-bar a#close-this-info-text').click(function(){
			$('#top-info-bar').slideUp();
			$.cookie('cookie_infobar', 'closed', { expires: 1, path: '/' });
			//console.log('Cookie for Infobar, value: closed have been written')
			return false;	
		
		});
		$('#open-this-info-text').click(function(){
			$('#top-info-bar').slideDown();
			$.removeCookie('cookie_infobar',{ expires: 1, path: '/' });
			//console.log('Deleted cookie for Infobar')
			return false;	
			
		});
		
		
		$("#banner, #one-line-nav").click(function(e){
			if(e.target.id!="banner" && e.target.id!="one-line-nav"){return}
			e.preventDefault();
			$("html, body").animate({scrollTop:0},"fast")
		});
	
		
	/*ISOTOPE FILTER FOR FILTERABLE PORFOLIO AND BLOG MASONRY
	/*---------------------------------------------------------------------------------------------*/
		filterWrapper = $('.filter-wrapper');
		ulList = filterWrapper.find('ul');
		currentFilter = filterWrapper.children('.current-filter');
		
		
		//if Touch device use click function
		if(is_touch_device){
			filterWrapper.clickToggle(function(){
				$('ul',this).css({opacity:0}).slideDown().animate({ opacity: 1 },{ queue: false, duration: 'medium' });
				$('.current-filter',this).find('span:last').attr('class','arrow-up');
			},function(){
				$('ul',this).slideUp().animate({ opacity: 0 },{ queue: false, duration: 'fast' });
				$('.current-filter',this).find('span:last').attr('class','arrow-down');
			});
		}
		//Else use hover function
		else{
			filterWrapper.hoverIntent({
				timeout: 300,
				over: function () {
					$('ul',this).css({opacity:0}).slideDown().animate({ opacity: 1 },{ queue: false, duration: 'medium' });
					$('.current-filter',this).find('span:last').attr('class','arrow-up');
				},
				out: function () {
					$('ul',this).slideUp().animate({ opacity: 0 },{ queue: false, duration: 'fast' });
					$('.current-filter',this).find('span:last').attr('class','arrow-down');
				}
			});
			
		}
		
		//Change the text of filter
		$('li a',ulList).click(function(){
			var newText = $(this).text();
			
			$(this).closest('.filter-wrapper').find('.current-filter span:first').text(newText);
			return false;
		
		});
		
	/*
	/*---------------------------------------------------------------------------------------------*/
	
	});

})(jQuery);