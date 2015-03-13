<?php Global $base_url?>
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
					echo '<div id="main-content" class="container blog-page blog-classic-1">';
						
						//sidebar first
						if ($page['sidebar_first']):
							echo '<div id="sidebar" class="four columns float-left secondary-2-primary animated fadeIn" role="complementary">';
								print render($page['sidebar_first']);
							echo '</div>';
						endif;
						
						
						if($page['sidebar_first'] or $page['sidebar_second']){
							$start_div = '<div id="content" role="main" class="eight columns">';
							$end_div = '</div>';
						}else{
							$start_div = '';
							$end_div = '';
						}
						echo $start_div;
						
						//CONTENT
							print $messages;
							if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
								print render($tabs);
							endif;
							print render($page['content']); 
							
						//END CONTENT
						echo $end_div;
						
						//sidebar second
						if ($page['sidebar_second']):
							echo '<div id="sidebar" class="four columns float-right secondary-2-primary animated fadeIn" role="complementary">';
								print render($page['sidebar_second']);
							echo '</div>';
						endif;
						
						
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
<style type="text/css">
	#main-content-background{
		background-image: url("<?php print $base_url.'/'.drupal_get_path('theme', variable_get('theme_default', NULL));?>/images/bg/blog.jpg");
		background-repeat: no-repeat;
		background-position: right top;
		background-attachment: scroll;
		background-size: auto;
	}
</style>