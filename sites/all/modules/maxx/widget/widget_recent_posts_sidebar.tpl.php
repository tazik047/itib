<?php
	if (empty($title)) {
		print '<h3 class="widget-title cufon first-word">';
			$title = t('Recent Posts');
			print $title;
		print '</h3>';
	}
?>
<ul class="list-news">
	<?php foreach ($nodes as $node): ?>
	<?php $field_image = field_get_items('node', $node, 'field_image'); ?>
	
	<li>
		<a href="#" class="img-border alignleft"><?php print theme('image_style', array('style_name' => 'thumb_60x60', 'path' => $field_image[0]['uri'])); ?></a>
		<div>
			<p><strong><a href="<?php print url('node/' . $node->nid); ?>"><?php print l($node->title, 'node/' . $node->nid); ?></a></strong></p>
			<em><?php print date("l, F j, Y - H:i",$node->created); ?></em>
		</div>
	</li>
	<?php endforeach; ?>
</ul>
