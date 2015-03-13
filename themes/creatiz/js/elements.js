(function(a){a.fn.mSimpleToggleAccordion=function(b){var c={showFirst:true,type:"",speed:500,easing:"",mEvent:"click"};var b=a.extend(c,b);return this.each(function(){var e=b,g=a(this),f=a("> dt",g),d=a("> dd",g);d.hide();a(this).parent().css("position","relative");if(e.showFirst==true){a("dt:first",g).addClass("active").next().addClass("active").show()}f.bind(e.mEvent,function(){if(e.type=="accordion"){if(a(this).next().is(":hidden")){f.removeClass("active").next().slideUp(e.speed,e.easing);a(this).addClass("active").next().slideDown(e.speed,e.easing).addClass("active")}}else{if(e.type=="toggles"){a(this).toggleClass("active").next().slideToggle(e.speed,e.easing).addClass("active")}}return false})})}})(jQuery);(function(a){a.fn.mTabs=function(b){var c={effect:"fade",speed:500,easing:"",mEvent:"click"};var b=a.extend(c,b);return this.each(function(){var g=b,h=a(this),d=a("> dt",h),f=a("> dt:first-child",h),e=a("> dd",h);e.hide();a("dt:first",h).addClass("active").next().show().addClass("active");h.css({height:a("dt:first",h).next().outerHeight()+d.outerHeight()});e.css({top:d.outerHeight()-1,left:0});d.bind(g.mEvent,function(){if(a(this).next().is(":hidden")){a(this).parent().animate({height:a(this).next().outerHeight()+d.outerHeight()});d.removeClass("active")}if(g.effect=="slide"){e.removeClass("active").slideUp(g.speed/2,g.easing);a(this).addClass("active").next().slideDown(g.speed,g.easing).addClass("active")}else{if(g.effect=="fade"){e.removeClass("active").fadeOut(g.speed/2,g.easing);a(this).addClass("active").next().fadeIn(g.speed,g.easing).addClass("active")}}return false});a(window).bind("resize",function(){a(".mds-tabs-wrapper").each(function(i,j){a(this).css({height:a("> dt.active",this).outerHeight()+a("> dd.active",this).outerHeight()})})})})}})(jQuery);(function(b){var a=function(c){var e=function(f){return !isNaN(parseFloat(f))&&isFinite(f)};var d=function(k){for(var h=k.length-1;h>0;h--){var g=Math.floor(Math.random()*(h+1));var f=k[h];k[h]=k[g];k[g]=f}return k};b(c).each(function(l,h){var n=b(this),m=n.data("randomy").split("|"),i=n.data("speed"),g=n.data("fadetime");i=i&&e(i)?i:3000;g=g&&e(g)?g:800;var k=0,j,f=n.find("span.mds-randomy");j=d(m);setInterval(function(){if(k>m.length){k=0}var o=j[k];f.fadeOut(g,function(){f.html(o).fadeIn(g)});k++},i)})};jQuery(document).ready(function(d){mozillaBrowser=d("body").hasClass("mozilla-browser");webkitBrowser=d("body").hasClass("webkit-browser");operaBrowser=d("body").hasClass("opera-browser");msieBrowser=d("body").hasClass("msie-browser");a(".mds-text-radomizer");d(".flexslider.mds-text-slider").each(function(f,h){var g=d(this),i=g.data("delay"),e=g.data("speed");g.flexslider({animation:"fade",slideshow:true,touch:false,controlNav:false,initDelay:i,directionNav:false,slideshowSpeed:e,pauseOnAction:false,smoothHeightSpeed:500,pauseOnHover:false,smoothHeight:true,start:function(k){var j=k.slides.eq(k.currentSlide);j.find(".animated").each(function(){var l=d(this).attr("data-transition-entrance");d(this).addClass(l)})},before:function(k){var j=k.slides.eq(k.animatingTo);j.find(".animated").each(function(){var l=d(this).attr("data-transition-entrance");d(this).addClass(l)})},after:function(k){var j=k.slides.eq(k.currentSlide);setTimeout(function(){j.find(".animated").each(function(){var l=d(this).attr("data-transition-entrance");d(this).removeClass(l)})},e/2)}})});var c=function(){d(".mds-features-tabs.no-sidebar-fullwidth").each(function(){var e=d(this).find(".mds-features-tabs-header li.active");var f=d(this).find(".mds-features-tabs-arrow");var g=e.position().left+(e.width()/2)+(f.width()/2);f.css({left:g})})};d(window).bind("resize focus load ready",function(){d(".mds-features-tabs:not(.no-sidebar-fullwidth) .mds-features-tabs-content").each(function(e,f){d(this).css("min-height",d(this).siblings(".mds-features-tabs-header-wrapper").outerHeight()+10)});d(".mds-features-tabs:not(.no-sidebar-fullwidth) .mds-features-tabs-shadow").each(function(e,f){d(this).css("height",d(this).closest(".mds-features-tabs").outerHeight())});c()});d(".mds-features-tabs-header li").click(function(){if(d(this).hasClass("active")){return false}else{tabContainer=d(this).closest(".mds-features-tabs");tabHeader=d(this).closest(".mds-features-tabs-header");tabShadow=tabHeader.siblings(".mds-features-tabs-shadow");tabHeader.children("li").removeClass("active");tabContent=tabHeader.closest(".mds-features-tabs-header-wrapper").siblings(".mds-features-tabs-content");tabContent.children("div").removeClass("active").removeAttr("style");rel=d(this).attr("rel");d(this).addClass("active");if(msieBrowser){tabContent.find("> .mds-features-tabs-panel[rel="+rel+"]").addClass("active")}else{tabContent.find("> .mds-features-tabs-panel[rel="+rel+"]").fadeIn(500).delay(500).addClass("active")}tabShadow.css("height",tabContainer.outerHeight());tabContent.find("> .mds-features-tabs-trigger[rel="+rel+"]").addClass("active");c()}return false});d(".mds-features-tabs-trigger").click(function(){if(d(this).hasClass("active")){return false}else{tabContainer=d(this).closest(".mds-features-tabs");tabHeader=tabContainer.find(".mds-features-tabs-header");tabHeader.children("li").removeClass("active");tabContent=d(this).closest(".mds-features-tabs-content");tabContent.children("div").removeClass("active").removeAttr("style");rel=d(this).attr("rel");d(this).addClass("active");if(msieBrowser){tabContent.find("> .mds-features-tabs-panel[rel="+rel+"]").addClass("active")}else{tabContent.find("> .mds-features-tabs-panel[rel="+rel+"]").fadeIn(500).delay(500).addClass("active")}tabHeader.find("li[rel="+rel+"]").addClass("active")}return false});d(".back-to-top,.contenttype-back-to-top span").click(function(){d("body,html").animate({scrollTop:0},800,"easeOutExpo");return false});d("dl.mds-accordion-wrapper").mSimpleToggleAccordion({showFirst:true,type:"accordion",speed:300,mEvent:"click"});d("dl.mds-toggles-wrapper").mSimpleToggleAccordion({type:"toggles",showFirst:false,speed:300,easing:"",mEvent:"click"});d("dl.mds-tabs-wrapper").mTabs({speed:400,easing:"",effect:"fade",mEvent:"click"});d(".mds-notification .close").click(function(){d(this).parent().slideUp();return false})})})(jQuery);