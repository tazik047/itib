<?php
	if (empty($title)) {
		print '<h3 class="widget-title cufon first-word">';
			$title = t('Recent Work');
			print $title;
		print '</h3>';
	}
?>
<div class="md-latest-portfolios-widget">
<p>Place some short description about your work here.</p>
<?php foreach ($nodes as $node): ?>
<?php $field_image = field_get_items('node', $node, 'field_image'); ?>
<article class="project-entry ">
	<a href="<?php print url('node/' . $node->nid); ?>" title=""  class="img-border preloading-light float-left align-none project-thumbnail video-preview">
	<?php print theme('image_style', array('style_name' => 'portfolio_thumb_282x150', 'path' => $field_image[0]['uri'])); ?>
	</a>
	<div class="clear"></div>
	<h4 class="cufon first-word"><a href="<?php print url('node/' . $node->nid); ?>"><?php print l($node->title, 'node/' . $node->nid); ?></a></h4>
	<p>&nbsp;</p>
</article>
<?php endforeach; ?>
</div>