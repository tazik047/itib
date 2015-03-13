	var $flexslider = $("#flexslider"),
        $flexslides = $flexslider.find('ul.slides').children('li');

    if ( $flexslider.length ) {
        $(window).load(function(){

            var timeline = {
                    width: 0,
                    interval: CONFIG_SLIDESHOW.slideshowSpeed
                },
                slideshowPause = false;

            vericalCenterSlideContent = function($slide) {
                var $content = $('div.content', $slide);
                var $contentH = $content.actual('height')
                    + parseInt( $content.css('marginTop') )
                    + parseInt( $content.css('marginBottom') );
                if ( $slide.height() > $contentH ) {
                    $content.css('marginTop', Math.floor( ($slide.height() - $contentH)/2 + 30 ) + 'px');
                }
            }

            setSlideHeight = function() {
                //update slides to include cloned li
                $flexslides = $("#flexslider").find('ul.slides').children('li');
                if (_resizeLimit['slideshow'] <= 1 && Shopper.responsive ) {
                    //iphone resolution ( <= 767 ). hide content and show small image
                    $('div.content', $flexslides).hide();
                    $('img.small_image', $flexslides).show();
                    var maxSlideHeight = null;
                    $flexslides.each(function(i,v){
                        if ( $('img.small_image', this).length ) {
                            $(this).css('background-image', 'none');
                            $(this).height($('img.small_image', this).height());
                            maxSlideHeight = Math.max(maxSlideHeight, $(this).height());
                        }
                    });
                    //auto height - by tallest slide
                    $flexslides.height(maxSlideHeight);
                } else {
                    $('img.small_image', $flexslides).hide();
                    $('div.content', $flexslides).show();
                    //restore original content margin top
                    $('div.content', $flexslides).css('marginTop', '30px');
                    //restore bg image
                    $flexslides.each(function(i,v){
                        $(this).css('background-image', $(this).attr('data-bg'));
                    });

                    if ( CONFIG_SLIDESHOW.height != 'auto' ) {
                        $flexslides.height(CONFIG_SLIDESHOW.height);
                    } else {
                        var maxSlideHeight = null;
                        //set slide height according to height of content and image
                        $flexslides.each(function(i,v){
                            var $imgH = $(this).attr('data-img-height');
                            //count content height
                            var $contentH = $('div.content', this).actual('height') + parseInt($('div.content', this).css('marginTop')) + parseInt($('div.content', this).css('marginBottom'));
                            $(this).height(Math.max($imgH, $contentH)+'px');
                            maxSlideHeight = Math.max(maxSlideHeight, $(this).height());
                        });

                        if ( CONFIG_SLIDESHOW.smoothHeight ) {
                            //smooth height
                        } else {
                            //auto height - by tallest slide
                            $flexslides.height(maxSlideHeight);
                        }
                    }
                    //adjust content vertical center
                    $flexslides.each(function(i,v){
                        vericalCenterSlideContent( $(this) );
                    });
                }
            }

            //backup original images for slides
            $flexslides.each(function(i,v){
                $(this).attr('data-bg', $(this).css('background-image'));
            });

            slideshowResize = function() {
                timeline.width = $flexslider.width();
                var resize = isResize('slideshow');
                if (resize || _resizeLimit['slideshow'] <= 1) {
                    setSlideHeight();
                }
            }
            slideshowResize();


            $(window).resize(function(){
                var interval = (timeline.width - $('#slide-timeline').width() ) / ( timeline.width / timeline.interval );
                runTimeline(interval);
                slideshowResize();
            });

            runTimeline = function( interval ) {
                if ( slideshowPause
                    || interval == 0
                    || CONFIG_SLIDESHOW.slideshow == false
                    || CONFIG_SLIDESHOW.timeline == false
                    || $flexslides.length < 2) {return;}
                $('#slide-timeline')
                    .show()
                    .animate(
                        {width: timeline.width + 'px'},
                        interval,
                        'linear',
                        function(){
                            $(this).hide().width(0);
                            $('#flexslider').flexslider("next");
                        }
                    );
            }

            $flexslider.on({
                mouseenter: function () {
                    slideshowPause = true;
                    $('#slide-timeline').stop(true);
                },
                mouseleave: function () {
                    slideshowPause = false;
                    var interval = (timeline.width - $('#slide-timeline').width() ) / ( timeline.width / timeline.interval );
                    runTimeline(interval);
                },
                touchstart: function () {
                    slideshowPause = true;
                    $('#slide-timeline').stop(true);
                },
                touchend: function () {
                    slideshowPause = false;
                    var interval = (timeline.width - $('#slide-timeline').width() ) / ( timeline.width / timeline.interval );
                    runTimeline(interval);
                }
            });

            var defaults = {
                slideshow: ( CONFIG_SLIDESHOW.slideshow && CONFIG_SLIDESHOW.timeline == false ? true : false),
                initDelay:200,
                start: function(slider){
                    //line up direction nav
                    if (CONFIG_SLIDESHOW.smoothHeight) {
                        $('.flex-direction-nav a', slider).css('marginTop', (-$('li.flex-active-slide', slider).height()/2 -40) );
                    } else {
                        $('.flex-direction-nav a', slider).css('marginTop', (-$('.flexslider').height()/2 -40) );
                    }
                    runTimeline(timeline.interval);
                },
                before: function(slider){
                    $('#slide-timeline').hide().width(0);
                    $('.flex-direction-nav a', slider).hide();
                },
                after: function(slider){
                    if (CONFIG_SLIDESHOW.smoothHeight) {
                        $('.flex-direction-nav a', slider).css('marginTop', (-$('li.flex-active-slide', slider).height()/2 -40));
                    }
                    $('.flex-direction-nav a', slider).show();
                    $('#slide-timeline').stop(true);
                    $('#slide-timeline').hide().width(0);
                    runTimeline(timeline.interval);
                }
            }
            vars = $.extend({}, CONFIG_SLIDESHOW, defaults);

            if ( $('.col-main .homepage-banners').length ) {
                $('.slider').animate({paddingBottom: '52px'}, 200);
            }
            if ( $('.col-main .home-right').length ) {
                $('.slider').animate({paddingBottom: '20px'}, 200);
            }

            $flexslider.flexslider(vars);
        });
    }
