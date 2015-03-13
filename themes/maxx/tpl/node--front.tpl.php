<?php 
	if (!$page) { 
?>
<article class="post-entry">
	<!--post header : title, meta, featured image-->
	<header class="entry-header"></header>
		<!--/post header : title, meta, featured image-->
		<!--entry summary-->
		<div class="entry-summary">
			<?php hide($content['comments']); hide($content['links']); print render($content); ?>
		</div>
		<!--/entry-summary -->
		<div class="read-more permalink"><a href="<?php print $node_url; ?>" class="read-more">Read more</a></div>
		<div class="sp pattern back-top"><span class="back-to-top">Top</span></div>
		</article>
		<?php } else { 
?>
		<article class="post-entry">
			
			<!--entry summary-->
			<?php 
			hide($content['comments']); hide($content['links']); 
			print render($content['body']);
			?>
			
			<?php print render($content['comments']); ?>
			
			
			<!--/entry-summary -->
		</article>
		<?php } ?>
