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
			//GMAP
			if($page["gmap"]):
				echo '<section class="full-width-wrapper main-content-wrapper">';
					print render($page["gmap"]);
				echo '</section>';
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
							
							//start contact page
			?>
		<div id="content" role="main" class="twelve columns no-margin-bottom primary-2-secondary">
			<?php
				if(theme_get_setting('contact_page_content', 'creatiz')){
				
			?>
			<div class="entry-content-entry-footer">
				<div class="entry-content">
					<?php print theme_get_setting('contact_page_content', 'creatiz');?>
				</div>
			</div>
			
			<div class="clear"></div>
			<div class="mds-divider style-default length-long contenttype-default alignment-center"  style="margin-bottom:30px;">
				<div class="divider"></div>
			</div>
			<?php
				}
			?>
		</div>
		<div class="clear"></div>
		<?php
			if(theme_get_setting('contact_page_address', 'creatiz')){
		?>
			<div class="four columns primary-2-secondary">
				<?php
					print theme_get_setting('contact_page_address', 'creatiz');
				?>
			</div>
		<?php
			}
		?>
		<div class="eight columns primary-2-secondary">
			<?php
					//end contact page
					print render($page['content']); 
				?>
		</div>
		<?php
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