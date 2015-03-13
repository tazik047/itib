<?php 
	if (!$page) { 
	if($node->field_image){
		$imageone = $node->field_image['und'][0]['uri']; 
		$style = '720x220';
	}
?>
<article class="post-entry">
	<!--post header : title, meta, featured image-->
	<header class="entry-header">
		<!--entry title-->
		
		<h2 class="entry-title cufon"><a href="<?php print $node_url; ?>" title="<?php print $title; ?>"><?php print $title; ?></a></h2>
		<!--/entry title-->
		
		</header>
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
			<?php hide($content['comments']); hide($content['links']); 
			print render($content['body']);?>
			<div class="sp pattern back-top"><span class="back-to-top">Top</span></div>
			<?php print render($content['comments']); ?>
			
			
			<!--/entry-summary -->
		</article>
		<?php } ?>
