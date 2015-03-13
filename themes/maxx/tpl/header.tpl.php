<header id="header" class="full-width-wrapper">
	<div id="top-bar-wrapper">
		<div class="fixed-width-wrapper">
			<?php 
				if ($page['menu_bar']): 
			?>
			<div class="one-half first">
				<div id="top-extra-menu-wrapper">
					<div class="menu-top-menu-container"><?php print render($page['menu_bar']); ?></div>
				</div>
			</div>
			<?php endif; ?>
			<div class="one-half float-right">
				<div id="top-caption">
				<?php
					if ($page['top_caption']): 
						print render($page['top_caption']);
					endif;
				?>
				</div>
			</div>
		</div>
	</div>
	<div id="top-wrapper">
		<div class="fixed-width-wrapper">
			<div id="banner">
				<!--logo-->
				<div id="logo" class="image-logo">
				<?php
					if($logo):
				?>
				<span>
					<a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a>
				</span>
				<?php
					endif;
					if ($site_slogan)
						print $site_slogan;
				?>
				</div>

				
				<!--/logo-->
				<?php if ($page['social']): ?>
					<?php print render($page['social']); ?>
				<?php endif; ?>
			</div>
			<div class="clear"></div>
			<!--top nav-->
			<div id="navigation-bar">
				<?php if ($page['main_menu']): ?>
				<div id="primary-nav" class="m-menu">
					<div class="menu-primary-menu-container">
						<?php print render($page['main_menu']); ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if ($page['search_form']): ?>
				<div id="g-search">
					<?php print render($page['search_form']); ?>
				</div>
				<?php endif; ?>
			</div>
			<!--/top nav-->
		</div>
	</div>
</header>
<!--/header-->
<div class="clear"></div>
