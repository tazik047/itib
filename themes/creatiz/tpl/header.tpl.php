<header id="header" role="banner" class="full-width-wrapper header-menustyle-one-line tall-header">
	<div class="arrow-down" id="open-this-info-text">Open</div>
	
	<!--Banner-->
	<section id="banner" class="full-width-wrapper">
		<div class="container">
			<div class="columns twelve no-margin-bottom">
				
				<?php
					if($logo):
				?>
				<div id="logo" class="image-logo animated fadeIn">
					<a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>" rel="home" ><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a> 
					<h1 style="display: inline;vertical-align: middle;margin-left: 14px;"><?php print $site_name;?></h1>
				</div>
				<?php
					endif;
				?>
				
				<div id="mobile-menu-nav-wrapper" class="screen-tablet-portrait screen-mobile-landscape screen-mobile-portrait animated fadeIn">
					<i class="micon-menu" style="opacity: 1 !important;font-size: 16px;line-height: 29px;position: absolute;top: 0;text-align: center; width: 100%; left: 0;"></i>
					<select id="mobile-menu-nav">
						<option value="">Select a page...</option>
					</select>
				</div>
				<div id="one-line-menu-right-banner-content" class="screen-large-display screen-default screen-tablet-portrait">
					<div class="mds-social-networks display-inline-block">
						
							<?php
								if($page["social_network_header"]):
									print render($page["social_network_header"]);
								endif;
							?>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/Banner-->
	
	<!--Nav Wrapper-->
	<section id="one-line-nav" class="full-width-wrapper position-relative">
		<div class="container">
			<div class="columns twelve no-margin-bottom">
				<!--Primary Nav-->
				<nav id="top-nav" class="m-menu float-left secondary-2-primary" role="navigation">
					<div class="menu-primary-menu-container">
						<?php if ($page['main_menu']): ?>
							<?php print render($page['main_menu']); ?>
						<?php endif; ?>
					</div>
				</nav>
				<!--/Primary Nav-->
				
				<!--Right Caption-->
				<div class="float-right one-line-menu-right-content primary-2-secondary">
					<?php if ($page['right_caption']): ?>
						<?php print render($page['right_caption']); ?>
					<?php endif; ?>
				</div>
				<!--/Right Caption-->
			</div>
		</div>
	</section>
	<!--Nav Wrapper-->
</header>