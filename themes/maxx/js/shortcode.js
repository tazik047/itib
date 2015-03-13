/*Maxx Simple Accordion;
//Author Manh
//Email:manh.dinh@me.com
//Date Created: 09/11/2011
*/
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
		   effect:"slide", /* effect of tab "slide" or fade*/
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
			});		
        	
		});
	}
})(jQuery);


jQuery(document).ready(function(){
	jQuery("dl.m-simple-accordion").mSimpleToggleAccordion({
		showFirst:true,
		type:"accordion",
		speed:300,
		mEvent:"click"
	});
		
	jQuery("dl.m-simple-toggle").mSimpleToggleAccordion({
		type:"toggles",
		showFirst:false,
		speed:300,
		easing:"",
		mEvent:"click"
	});
	
	jQuery(".m-simple-tabs").mTabs({
		speed:400,
		easing:"",
		 effect:"slide",
		 mEvent:"click"
	});
	
});


jQuery(document).ready(function(){
	jQuery(".md-notification .close").click(function () {
		jQuery(this).parent().fadeTo(400, 0, function(){ // Links with the class "close" will close parent
			jQuery(this).slideUp(400);
		});
	
		return false;
	});
});

jQuery(document).ready(function(){
	/*Table*/
	jQuery("table.m-table thead tr th:first-child").addClass("first-child");
	jQuery("table.m-table thead tr th:last-child").addClass("last-child");
	jQuery("table.m-table tbody tr:first-child th:first-child").addClass("first-child");
	jQuery("table.m-table tbody tr:last-child th:first-child").addClass("last-child");
	jQuery("table.m-table tbody tr:odd").addClass("alternate");
	jQuery("table.m-table tbody tr > td:first-child").addClass("first-child");
	
	
	
	jQuery(".m-menu ul li ul").wrap("<div></div>");
	jQuery(".m-menu ul li div,.m-menu ul li div ul").hide();
	jQuery(".m-menu ul li").each(function () {
		var currentDiv = jQuery("div:first", this);
		var currentUl = jQuery("div:first > ul", this);
		jQuery(this).hoverIntent({
			
			timeout: 300,
			over: function () {
				currentDiv.fadeIn(200,function(){if (jQuery.browser.msie){this.style.removeAttribute('filter');}});				
				currentUl.slideDown(300);
			},
			out: function () {
				currentDiv.fadeOut(200,function(){if (jQuery.browser.msie){this.style.removeAttribute('filter');}});				
				currentUl.slideUp(300);
			}
		});
	});
	jQuery(".m-menu ul li:has(ul) a").addClass("parent");
	jQuery(".m-menu ul li:has(ul)").find("a:first").append("<span class='sub-nav'>+</span>");
	jQuery(".m-menu ul li ul li:last-child").addClass("last-child");
	

	// scroll body to 0px on click
	jQuery(".back-to-top").click(function () {
		jQuery('body,html').animate({
			scrollTop: 0
		}, 1000,'easeOutExpo');
		return false;
	});
	
	jQuery(".m-menu ul.menu li:first a.active").parent().addClass("current_page_item");
	
});