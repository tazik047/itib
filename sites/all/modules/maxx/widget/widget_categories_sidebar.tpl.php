<div class="widget widget_categories">
	<?php
		if (empty($title)) {
			print '<h3 class="widget-title cufon first-word">';
				$title = t('Categories');
				print $title;
			print '</h3>';
		}
	?>
	<ul>
		<?php 
			foreach ( $terms as $term ) {
				print '<li><a href="'.url('taxonomy/term/' . $term->tid).'">'.$term->name.'</a></li>';
			}
		?>
	</ul>
</div>
