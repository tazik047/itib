(function($) {
    $.fn.lavaLamp = function(o) {
        o = $.extend({ fx: "easeOutBack", speed: 300, click: function(){} }, o || {});

        return this.each(function(index) {
            
            var me = $(this), noop = function(){},
                $back = $('<li class="play-me"><div class="left"></div></li>').appendTo(me),
                $li = $(">li", this), curr = $("li.active-trail, li.current-menu-item", this)[0] || $($li[0]).addClass("active-trail current-menu-item")[0];

            $li.not(".play-me").hover(function() {
                move(this);
            }, noop);

            $(this).hover(noop, function() {
                move(curr);
            });

            $li.click(function(e) {
                setCurr(this);
                return o.click.apply(this, [e, this]);
            });

            setCurr(curr);

            function setCurr(el) {
               
			    $back.css({ "left": el.offsetLeft + el.offsetWidth/ 2 +"px" });
                curr = el;
            };
            
            function move(el) {
                $back.each(function() {
                    $.dequeue(this, "fx"); }
                ).animate({
                   
                    left: el.offsetLeft + (el.offsetWidth/2)
                }, o.speed, o.fx);
            };

            if (index == 0){
                $(window).resize(function(){
                    $back.css({
                        
                        left: curr.offsetLeft + (el.offsetWidth/2)
                    });
                });
            }
            
        });
    };
})(jQuery);