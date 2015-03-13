<?php
	$col_setting = theme_get_setting('footer_columns', 'creatiz');
	if($col_setting==3){
		$col = 'one-third';
	}else{
		$col = 'one-fourth';
	}
?>
<footer class="full-width-wrapper overflow-hidden" id="footer-wrapper">
	<section id="footer-widget-wrapper" class="full-width-wrapper primary-2-white">
		<div class="container">
			<div class="twelve columns no-margin-bottom">
			
				<?php
					if($page["footer_col_one"]):
				?>
						<div class="<?php echo $col;?>  first">
							<?php
								print render($page["footer_col_one"]);
							?>
						</div>
				<?php
					endif;
					if($page["footer_col_two"]):
				?>
					<div class="<?php echo $col;?> ">
						<?php
							print render($page["footer_col_two"]);
						?>
					</div>
				<?php
					endif;
					if($page["footer_col_three"]):
				?>
					<div class="<?php echo $col;?> ">
						<?php
							print render($page["footer_col_three"]);
						?>
					</div>
				<?php
					endif;
					
					if($col_setting==4):
						if($page["footer_col_four"]):
					?>
					<div class="<?php echo $col;?>">
						<?php
							print render($page["footer_col_four"]);
						?>
					</div>
					<?php
						endif;
					endif;
				?>
			</div>
		</div>
	</section>
	<div class="clear"></div>
	<section id="footer-extra-wrapper" class="full-width-wrapper" role="contentinfo">
		<div class="container">
			<!--[if lt IE 9]><div class="columns twelve non-relative mds-divider-wrapper no-margin-bottom" style="margin-top:-20px;"><div class="clear"></div><div class="mds-divider contenttype-default style-shadow1" style=""><div class="divider"></div></div></div><![endif]-->
			<div class="twelve columns no-margin-bottom primary-2-white">
				<div class="copyright float-left"> 
				<?php print theme_get_setting('footer_copyright_message', 'creatiz'); ?>
				</div>
				<div class="credit float-right">
					<div class="mds-social-networks display-inline-block">
						
						<?php
							if($page["social_network_footer"]):
								print render($page["social_network_footer"]);
							endif;
						?>
						
					</div>
				</div>
			</div>
		</div>
	</section>
</footer>