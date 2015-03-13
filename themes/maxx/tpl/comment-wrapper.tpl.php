<!-- Comments -->
<?php if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>

<div id="comments">
  <h3 class="cufon first-word float-left"><?php print format_plural($content['#node']->comment_count, '1 comment', '@count comments'); ?></h3>
  <div class="clear"></div>
  <ul class="comment-list">
    <?php print render($content['comments']); ?>
    <?php //print '<pre>'. check_plain(print_r($content['#node'], 1)) .'</pre>' ?>
  </ul>
  <div id="respond">
                        <h3 id="reply-title">Leave a Reply</h3>
  <?php print str_replace('resizable', '', render($content['comment_form'])); ?>
  </div>
</div>
<?php } ?>