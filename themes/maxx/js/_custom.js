jQuery(document).ready(function(){

jQuery("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false,show_title:false});

/*Navigation mode (check if is IE, do nothing)
/*---------------------------------------------------------------------------------------------*/
if ( jQuery.browser.webkit || jQuery.browser.mozilla || jQuery.browser.opera || (jQuery.browser.msie && jQuery.browser.version  > 8 ) ) {
	jQuery('#menu-primary-menu').Touchdown();
};

/*Wrap the first word
/*---------------------------------------------------------------------------------------------*/
	jQuery(".first-word").each(function(){
		var me = jQuery(this);
	 me.html(me.html().replace(/^(\w+)/, "<strong>$1</strong>"));
	});
	jQuery(".first-word a").each(function(){
		var me = jQuery(this);
	 me.html(me.html().replace(/^(\w+)/, "<strong>$1</strong>"));
	});
});

/*Cufon Replacement
/*---------------------------------------------------------------------------------------------*/


/*Cufon('h1.cufon,h2.cufon,h3.cufon,h4.cufon,h5.cufon,h6.cufon,.entry-content h1,.entry-content h2,.entry-content h3,.entry-content h4,.entry-content h5,.entry-content h6,.cufon', {
fontFamily: 'TitilliumText25L',
textShadow: '0px 1px 0px #FFF'
});

Cufon('#content h1,#content h2,#content h3,#content h4,#content h5,#content h6', {
fontFamily: 'TitilliumText25L',
textShadow: '0px 1px 0px #FFF'
});
Cufon('#footer-widget-content h3,#footer-widget-content h4,#footer-widget-content h5,#footer-widget-content h6', {
fontFamily: 'TitilliumText25L',
textShadow: '0px 1px 0px rgba(0,0,0,0.5)'
});
Cufon('.pt-heading *',{
fontFamily: 'TitilliumText25L',
textShadow: '0px -2px 0px rgba(0,0,0,0.2)'
});
Cufon('.pt-features-list .pt-heading .cufon', {
fontFamily: 'TitilliumText25L',
textShadow: '0px 1px 0px #fff'
});*/