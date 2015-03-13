<?php
	if($page["info_bar"]):
		echo '<section id="top-info-bar" class="full-width-wrapper primary-2-white screen-large-display screen-default screen-tablet-portrait info-image">';
			echo '<div class="container">';
				print render($page["info_bar"]);
			echo '</div>';
		echo '</section>';
	endif;
?>