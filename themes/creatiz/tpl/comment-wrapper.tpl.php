<!-- Comments -->
<?php if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
	<div id="comments" class="clearfix">
		<h3 class="cufon first-word float-left"><?php print $content['#node']->comment_count; ?> <?php print t('Comment');?></h3>
		<p class="write-comment-link float-right primary-2-secondary"><a onclick="return false;"><?php print t('Leave a reply &rarr;')?></a></p>
		<div class="clear"></div>
		<ul class="comment-list">
			<?php print render($content['comments']); ?>
		</ul>
		<br />
		<div id="respond" class="comment-respond">
			<?php print str_replace('resizable', '', render($content['comment_form'])); ?>
		</div>
	</div>
<?php } ?>
