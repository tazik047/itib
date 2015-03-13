<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="">
	<div class="comment-block">
		<?php
			if($picture):
		?>
			<div class="comment-gravatar"><a class="img-border"><?php print $picture ?></a></div>
		<?php
			endif;
		?>
		<div class="comment-body">
			<div class="comment-meta comment-meta-data"><cite class="fn cufon"><?php print theme('username', array('account' => $content['comment_body']['#object'])) ?></cite><a class="comment-time"><small><?php print t('!time ago',array('!time' => format_interval(time() - $content['comment_body']['#object']->created))); ?></small></a></div>
			<!-- .comment-meta .commentmetadata -->
			<div class="comment-content">
				<?php hide($content['links']); print render($content) ?>
			</div>
			<div class="comment-link-function"><?php print render($content['links']) ?></div>
			<!-- .reply -->
		</div>
		<!--comment Body-->
	</div>
	<!-- #comment-##  -->
</li>
