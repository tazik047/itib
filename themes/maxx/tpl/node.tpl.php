<?php 
	if (!$page) { 
	if(!empty($node->field_image)){
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
		<!--entry meta-->
		<div class="entry-meta">
			<ul>
				<li class="post-date">
					<time ><?php print $date; ?></time>
				</li>
				<li class="post-author">by <a href="#" title="" rel="author"><?php echo $name?></a></li>
				<li class="post-categories">In: <?php print render($content['field_categories']); ?></li>
				<li class="post-comments"><a href="<?php print $node_url.'#comment-1'; ?>" title=""><?php print $node->comment_count; ?> Comments</a></li>
			</ul>
		</div>
		<!--/entry meta-->
		<?php
			if(isset($imageone) && $imageone):
		?>
		<!--featured image-->
		<div class="featured-image"><a href="<?php print image_style_url($style, $imageone) ?>" class="img-border image-preview" rel="prettyPhoto"><img src="<?php print image_style_url($style, $imageone) ?>"></a></div>
		<!--featured image-->
		<?php
			endif;
		?>
		</header>
		<!--/post header : title, meta, featured image-->
		<!--entry summary-->
		<div class="entry-summary">
			<?php hide($content['comments']); hide($content['links']); print render($content); 
					
					?>
		</div>
		<!--/entry-summary -->
		<div class="read-more permalink"><a href="<?php print $node_url; ?>" class="read-more">Read more</a></div>
		<div class="sp pattern back-top"><span class="back-to-top">Top</span></div>
		</article>
		<?php } else { 
?>
		<article class="post-entry">
			<!--post header : title, meta, featured image-->
			<header class="entry-header">
				<!--entry title-->
				<h2 class="entry-title cufon"><?php print $title; ?></h2>
				<!--/entry title-->
				<!--entry meta-->
				<div class="entry-meta">
					<ul>
						<li class="post-date">
							<time ><?php print $date; ?></time>
						</li>
						<li class="post-author">by <a href="#" title="" rel="author"><?php echo $name?></a></li>
						<li class="post-categories">In: <?php print render($content['field_categories']); ?></li>
						
						<li class="post-comments"><a href="#" title=""><?php print $node->comment_count; ?> Comments</a></li>
					</ul>
				</div>
				
				<!--/entry meta-->
				<!--featured image-->
				<!--featured image-->
			</header>
			<!--/post header : title, meta, featured image-->
			<!--entry summary-->
			<?php hide($content['comments']); hide($content['links']); 
			print render($content['body']);?>
			<div class="sp pattern back-top"><span class="back-to-top">Top</span></div>
			<?php print render($content['comments']); ?>
			
			
			<!--/entry-summary -->
		</article>
		<?php } ?>
