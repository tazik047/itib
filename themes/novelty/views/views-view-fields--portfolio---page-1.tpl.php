 <article class="thumb-zoom <?php print $fields['field_portfolio_tags']->content; ?>">
    <div class="portfolio-item-wrapper">
           <?php print $fields['field_portfolio_image']->content; ?>
							<div class="portfolio-context">
                               <h2><?php print $fields['title']->content; ?></h2>
                               <p><?php print $fields['field_portfolio_tags_1']->content; ?></p>								
                               <span class="p-link"><?php print $fields['field_icon']->content; ?></i></span>
								
	                        </div>
	</div>
        <a href="<?php print $fields['path']->content; ?>" class="p-full-link"></a>
</article>