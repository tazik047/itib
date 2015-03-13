
<section id="comments" class="<?php print $classes; ?>" <?php print $attributes; ?>>
<div class="comm-wrapper">

  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
     <div class="page-title clearfix">
    	<h3><?php print format_plural($content['#node']->comment_count, '1 comment', '@count comments'); ?><?php print t(' on ').'"'.$content['#node']->title.'"' ?></h3>
     </div>
    <?php print render($title_suffix); ?>
  <?php endif; ?>
  
   <?php if ($content['comments'] && $node->type != 'forum'): ?>
  <div class="comments-content-wrap">
    <?php print render($content['comments']); ?>
  </div>  
  <?php endif; ?>

  <?php if ($content['comment_form']): ?>
  <div id="respond">
    <section id="reply-title">
    <div class="page-title clearfix">
      <h3 id="reply-title"><?php print t('Leave a Reply'); ?></h3>
      </div> 
      <?php print render($content['comment_form']); ?>
    </section> <!-- /#comment-form-wrapper -->
  </div>  
  <?php endif; ?>
</div> <!-- /.comm-wrapper --> 
</section> <!-- /#comments -->


