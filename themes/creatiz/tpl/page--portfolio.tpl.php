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
			if($breadcrumb):
		?>
		<section class="full-width-wrapper animated fadeIn page-title-with-breadcrumb page-title-shadow-style" id="page-title">
			<div class="container">
				<hgroup class="columns twelve no-margin-bottom">
					<h1 class="no-margin-bottom"><?php print drupal_get_title(); ?></h1>
					<?php print $breadcrumb; ?>
				</hgroup>
			</div>
		</section>
		<div class="clear"></div>
		<?php
			endif;
		?>
		
		
		<?php 
			if($page['content'] or isset($messages)){
				echo '<section class="full-width-wrapper main-content-wrapper">';
					echo '<div id="main-content" class="container">';
						
						//CONTENT
							print $messages;
							if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
								print render($tabs);
							endif;
							print render($page['content']); 
							
						//END CONTENT
						
					echo '</div>';
				echo '</section>';
				
				echo '<div class="clear"></div>';
			}
		?>
	</div>
	<!--/Main content-->
	<div class="clear"></div>
	
	<!--Footer-->
	<?php include_once('footer.tpl.php');?>
	<!--/Footer-->	
</div>