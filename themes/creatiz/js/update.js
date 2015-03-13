// JavaScript Document
$(document).ready(function(){
	$("#menu-primary-menu-1 li.expanded ul").removeAttr("id");
	$("#menu-primary-menu-1 li.expanded ul").removeAttr("class");
	
	$("#menu-primary-menu-1 li.expanded > a").append('<span class="parent-nav-arrow float-right"> &nbsp;+</span>');

	////UPDATE 21/11/2013
	get_l1("#menu-primary-menu-1",0);
	
	
	//add class "primary-background-color" to div
	if($(".primary-bg-color").length){
		$(".primary-bg-color").parent().addClass("primary-background-color");
	}
});



//UPDATE 21/11/2013
function get_l1($ul, $level){
	if($level==1)
		$s = '- - ';
	else if($level==2)
		$s = '- - - - ';
	else if($level==3)
		$s = '- - - - - - ';
	else if($level==4)
		$s = '- - - - - - - - ';
	else if($level==5)
		$s = '- - - - - - - - - ';
	else if($level==6)
		$s = '- - - - - - - - - - ';
	else
		$s = '';
		
	jQuery($ul).children('li').each(function(){
		var href = $(this).children('a').attr('href');
		var text = $(this).children('a').text();
		//alert($(this).children('a').text());
		$str = '<option value="'+href+'">'+$s+text+'</option>';
		$("#mobile-menu-nav").append($str);
		
		if ($(this).children('ul').length > 0) {
			get_l1($(this).children('ul'), ++$level);
			$level = $level-1;
		}else if($(this).is(':last-child')){
			$level = $level-1;
			get_l1($(this).children('ul'), $level);
			
			//alert('aaa');
			//$level=0;
		}
		
	});
}

(function($){
	var $window=$(window),flexslider;
	function getGridSize(){
		return(window.innerWidth<480)?1:0;
	}
	$(window).on("load",function(){
		//3 columns
		$(".porfolio-carousel-flexslider-three").flexslider({
			animation:"slide",
			animationLoop:true,
			useCss:true,
			controlNav:true,
			directionNav:true,
			itemMargin:30,
			minItems:getGridSize(),
			itemWidth:290, //width <li>
			slideshowSpeed:5000,
			video:false,
			pauseOnHover:true,
			namespace:"mflex-",
			prevText:"<i class=\"micon-arrow-left\"></i>",
			nextText:"<i class=\"micon-arrow-right\"></i>",
			slideshow:false,
			start:function(slider){
				var thisSlides=slider.slides;
				thisSlides.find("article").removeAttr("class");
			}
		});
		//4 columns
		$(".porfolio-carousel-flexslider-four").flexslider({
			animation:"slide",
			animationLoop:true,
			useCss:true,
			controlNav:true,
			directionNav:true,
			itemMargin:30,
			minItems:getGridSize(),
			itemWidth:210, //width <li>
			slideshowSpeed:5000,
			video:false,
			pauseOnHover:true,
			namespace:"mflex-",
			prevText:"<i class=\"micon-arrow-left\"></i>",
			nextText:"<i class=\"micon-arrow-right\"></i>",
			slideshow:false,
			start:function(slider){
				var thisSlides=slider.slides;
				thisSlides.find("article").removeAttr("class");
			}
		});
		
		
		///Testimonial 
		//flexslider style 1
		jQuery(".flexslider-style1").flexslider({
			animation:"slide",
			slideshow:true,
			controlNav:false,
			directionNav:true,
			slideshowSpeed:7000,
			pauseOnAction:false,
			smoothHeightSpeed:0,
			namespace:"mflex-",
			prevText:"<i class=\"micon-arrow-left\"></i>",
			nextText:"<i class=\"micon-arrow-right\"></i>",
			pauseOnHover:true,
			smoothHeight:true
		})
		
		//Flexslider style 2
		jQuery(".flexslider_style2").flexslider({
			animation:"slide",
			slideshow:true,
			controlNav:true,
			directionNav:false,
			slideshowSpeed:7000,
			pauseOnAction:false,
			smoothHeightSpeed:0,
			namespace:"mflex-",
			manualControls:".testimonial-avatar-paging li a",
			eventType:"mouseenter mouseleave",
			prevText:"<i class=\"micon-arrow-left\"></i>",
			nextText:"<i class=\"micon-arrow-right\"></i>",
			pauseOnHover:true,
			smoothHeight:true
		})
		
		$(".flexanything_style1").flexslider({
			animation:"slide",
			slideshow:true,
			controlNav:true,
			directionNav:false,
			slideshowSpeed:6000,
			pauseOnAction:false,
			smoothHeight:true,
			pauseOnHover:true,
			namespace:"mflex-",
			prevText:"<i class=\"micon-arrow-left\"></i>",
			nextText:"<i class=\"micon-arrow-right\"></i>",
		});
	});
})(jQuery);