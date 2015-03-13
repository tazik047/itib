<?php
$search = array(' ', '-');
$replace = array(' / ', ' ');
$cat = str_replace($search, $replace, strip_tags(render($content['field_portfolio_category'])));
$replacement = " ";
?>
<article class="thumb-zoom" data-categories="<?php print strip_tags(render($content['field_portfolio_category'])); ?>">
				    	<div class="portfolio-item-wrapper">
	                       	<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="<?php print $title ;?>" >
							<div class="portfolio-context">

							 <h2><?php print $title ;?></h2><p><?php print (render($content['field_portfolio_category'])); ?></p>								
																	<span class="p-link"><i class="icon-film"></i></span>
								
							</div>
						</div>

													<a href="<?php echo $node_url; ?>" class="p-full-link"></a>
						
		            </article>
                    
                   