<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" >
	<div class="comment-block">
		<div class="comment-gravatar">
			<?php print $picture ?>
		</div>
		
		<div class="comment-body">
			<div class="comment-meta comment-meta-data secondary-2-primary"><cite class="fn">
				<?php print theme('username', array('account' => $content['comment_body']['#object'], 'attributes' => array('class' => 'url'))) ?>
			</cite><small> <?php print t('!time ago',array('!time' => format_interval(time() - $content['comment_body']['#object']->created))); ?></small></div>
			<div class="comment-content primary-2-secondary">
				<p><?php hide($content['links']); print render($content) ?></p>
			</div>
			<div class="comment-link-function tertiary-2-primary">
			<?php print render($content['links']) ?>
			</div>
		</div>
	</div>
</li>