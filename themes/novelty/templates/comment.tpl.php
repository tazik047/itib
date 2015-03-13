<?php 
global $theme_root;
?>

<ol class="commentlist">
  <li class="comment">
     <article class="comment-wrapper clearfix"> 
		  <div class="comment-avartar">
		    <?php 
		      if (!$picture) {
				 
		        echo '<img src="'.$theme_root.'/images/gravatar.jpg" alt="g" >'; 
		      }
		      else { 
		        print $picture;   
		      }
		    ?>
		  </div>
		 		    <div class="comment-content-wrapper clearfix"<?php print $content_attributes; ?>>
		      <div class="comment-head">
                            <span class="comment-author"><?php print $author; ?></span>
                            <span>::</span>
                            <span class="comment-date"><?php print format_date($comment->created, 'custom', 'M d, Y'); ?> at <?php print format_date($comment->created, 'custom', 'H:i'); ?></span>
                            <span>::</span>
                             <?php if ($new): ?>
		    <span class="comment-reply"><?php print $new ?></span>
		    <?php endif; ?>
             
             <span><?php if (!empty($content['links'])) { print render($content['links']); } ?></span>
                            <span class="comment-reply">

                        </div><!-- end div .comment-head -->

                        <div class="comment-message">
                             <?php hide($content['links']); print render($content); ?></div><!-- end div .comment-message -->
                        
                    </div><!-- end div.comment-authors -->

   </article><!-- end article .comment-wrapper --> 
  </li>
</ol>




