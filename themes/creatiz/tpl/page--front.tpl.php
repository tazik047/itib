<?php
	$layout = theme_get_setting('creatiz_layout', 'creatiz');
	if($layout=='boxed')
		$layout = ' class="box-layout float-default"';
	else
		$layout = '';
?>
<div id="wrap-all" <?php print $layout;?>>
	<?php include_once('info_bar.tpl.php');?>
	<!--Header-->
	<?php include_once('header.tpl.php');?>
	<!--/Header-->
	
	<!--Main content-->
	<div class="clear"></div>
	<div id="main-content-background">
		
		<!--Page title shadow-->
		<?php include_once('divider.tpl.php');?>
		<!--/Page title shadow-->
			
		<?php
			//Slider
			if (drupal_is_front_page() && !empty($slider)):
				echo '<section class="full-width-wrapper yeah-slider position-relative margin-bottom" id="main-flexslider-wrapper">';
					print $slider;
				echo '</section>';
			endif;
			if($page['content'] or isset($messages)){
				//echo '<section class="full-width-wrapper main-content-wrapper">';
					//echo '<div id="main-content" class="container">';
						if(drupal_is_front_page()) {
							unset($page['content']['system_main']['default_message']);
						}
						print render($page['content']); 
				//	echo '</div>';
				//echo '</section>';
			}
		?>
	</div>
	<!--/Main content-->
	<div class="clear"></div>
	
	<!--Footer-->
	<?php include_once('footer.tpl.php');?>
	<!--/Footer-->	
</div>