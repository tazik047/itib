<div class="widget widget_tag_cloud">
	<?php
		if (empty($title)) {
			print '<h3 class="widget-title cufon first-word">';
				$title = t('Tag Cloud');
				print $title;
			print '</h3>';
		}
	?>
	<div class="tagcloud">
		<?php 
			foreach ( $terms as $term ) {
				print '<a href="'.url('taxonomy/term/' . $term->tid).'">'.$term->name.'</a>';
			}
		?>
	</div>
</div>
