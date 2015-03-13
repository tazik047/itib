<div id="social-network" class="social-network float-right">
	<ul>
		<?php
			$theme_path = base_path().drupal_get_path('theme', variable_get('theme_default', NULL));

			if(!empty($social['twitter']))
				echo '<li><a href="'.$social['twitter'].'" title="twitter" target="_blank"><img src="'.$theme_path.'/images/social/twitter.png" alt="twitter"></a></li>';
			if(!empty($social['facebook']))
				echo '<li><a href="'.$social['facebook'].'" title="facebook" target="_blank"><img src="'.$theme_path.'/images/social/facebook.png" alt="facebook"></a></li>';
			if(!empty($social['delicious']))
				echo '<li><a href="'.$social['delicious'].'" title="delicious" target="_blank"><img src="'.$theme_path.'/images/social/delicious.png" alt="delicious"></a></li>';
			if(!empty($social['google_plus']))
				echo '<li><a href="'.$social['google_plus'].'" title="Google plus" target="_blank"><img src="'.$theme_path.'/images/social/googleplus.png" alt="Google plus"></a></li>';
			
		?>
	</ul>
</div>