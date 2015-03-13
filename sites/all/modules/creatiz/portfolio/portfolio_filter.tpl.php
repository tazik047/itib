<?php
	$terms = array();
	$vid = NULL;
	$vid_machine_name = 'categories_portfolio';
	$vocabulary = taxonomy_vocabulary_machine_name_load($vid_machine_name);
	if (!empty($vocabulary->vid)) {
	  $vid = $vocabulary->vid;
	}
	if (!empty($vid)) {
	  $terms = taxonomy_get_tree($vid);
	}

?>

<div class="inline-filter columns twelve">

	<ul class="portfolio-filter display-inline-block list-inline-block">

		<li><a class="active" href="#" data-filter="*"><?php print t('Show All'); ?></a></li>

		<?php if (!empty($terms)): ?>

		<?php foreach ($terms as $term): ?>

		<li><a href="#" data-filter=".tid-<?php print $term->tid; ?>"><?php print $term->name; ?></a></li>

		<?php endforeach; ?>

		<?php endif; ?>

	</ul>
</div>

<div>

	<div class="portfolio filter-wrapper"><span class="transparent-border current-filter"><span class="current-filter-text">Show All</span><span class="arrow-down"></span></span>

		<ul class="transparent-border nice-width default-2-primary">
			<?php 
				foreach ($terms as $term): 
					echo '<li><a href="#" data-filter=".tid-'.$term->tid.'">'.$term->name.'<span>&nbsp;</span></a></li>';
				endforeach;
			?>

			<li><a href="#" data-filter="*" class="active">Show All</a></li>

		</ul>

	</div>

</div>