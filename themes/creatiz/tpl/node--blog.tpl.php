<?php 
	global $base_root;
?>
		<div class="single-post">
			<article class="post type-post status-publish format-gallery hentry post-entry">
				<header class="entry-header">
					<div class="clear"></div>
					<div class="mds-divider style-default length-long contenttype-default alignment-center"  style="margin-bottom:15px;">
						<div class="divider"></div>
					</div>
					<div class="entry-meta margin-bottom overflow-hidden">
						<div class="entry-format">
							<?php
								if($node->field_image){
									$imageone = $node->field_image['und'][0]['uri']; 
									$style = 'blog'; //image style
								}
								if(!empty($node->field_image) && count($node->field_image) > 1) {
									$icon = 'micon-gallery';
									$format = 'format-gallery';
								}else{
									$icon = 'micon-standard';
									$format = 'format-standard';
								}
							?>
							<a class="<?php print $icon;?>" href="" title=""><span>&nbsp;</span></a></div>
						<ul class="primary-2-secondary">
							<li class="post-date">
								<time datetime="<?php print format_date($node->created, 'custom', 'M d, Y');?>"><?php print format_date($node->created, 'custom', 'M d, Y');?></time>
							</li>
							<li class="post-author"><?php print t('by')?> <?php print $node->name;?></li>
							<li class="post-categories">In <?php print render($content['field_categories']);?></li>
							<li class="post-comments"><a href="<?php print $node_url?>" title=""><?php print $node->comment_count;?> <?php print t('Comments')?></a></li>
						</ul>
					</div>
					<div class="gallery-post">
						<div class="flexslider mds-flexslider-slider" id="gallery-post-<?php print $node->nid?>">
							<?php if (!empty($field_image) && count($field_image) > 1){ ?>
							<ul class="slides">
								<?php 
									foreach ($field_image as $img): 
										$img_view = file_create_url($img['uri']);
									?>
								<li><?php print theme('image_style', array('style_name' => 'blog', 'path' => $img['uri'], 'attributes' => array('class' => 'attachment-single-thumb-large'))); ?></li>
								<?php endforeach; ?>
							</ul>
							<script type="text/javascript">(function($){$(window).on("load",function(){$("#gallery-post-<?php print $node->nid;?>.flexslider").flexslider({animation:"fade",direction:"horizontal",slideshow:true,controlNav:true,directionNav:false,slideshowSpeed:5000,pauseOnAction:false,selector:".slides:first > li",namespace:"mflex-",pauseOnHover:true,controlsContainer:"#gallery-post-<?php print $node->nid;?>.flexslider > .flex-control-nav",smoothHeight:true,slideshow:true,});});})(jQuery);</script>
							<?php }else{?>
							<div class="featured-image"><a href="<?php print $node_url; ?>"><img src="<?php print image_style_url($style, $imageone) ?>" class="attachment-single-thumb-large" /></a></div>
							<?php
							}
							?>
						</div>
					</div>
				</header>
				<div class="entry-content margin-bottom primary-2-secondary">
					<?php
						hide($content['comments']); 
						hide($content['links']); 
						hide($content['field_tags']); 
						hide($content['field_image']); 
						hide($content['field_categories']); 
						
						print render($content);
					?>
				</div>
				<footer class="post-tag margin-bottom tertiary-2-primary post-tag-single-post"><strong><?php print t('Tags')?>: </strong>
					<?php
						print render($content['field_tags']);
					?>
				</footer>
			</article>
			<div class="clear"></div>
			<div class="mds-divider style-default length-long contenttype-default alignment-center"  style="margin-bottom:15px;">
				<div class="divider"></div>
			</div>
			<div class="social-like-box-wrapper margin-bottom-15">
				<ul class="social-like-box list-inline-block display-inline-block">
					<li class="google">
						<g:plusone size="medium" href="<?php print $base_root.$node_url?>"></g:plusone>
					</li>
					<li class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php print $base_root.$node_url?>" data-text="<?php print $title; ?>"><?php print t('Tweet')?></a></li>
					<li class="facebook">
						<div class="fb-like" data-href="<?php print $base_root.$node_url;?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
					</li>
					<li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php print $base_root.$node_url?>&description=<?php print $title;?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="<?php print t('Pin It')?>" /><?php print t('Pin It')?></a></li>
				</ul>
				
			</div>
			<div class="clear"></div>
			<div class="mds-divider style-default length-long contenttype-default alignment-center"  style="margin-bottom:15px;">
				<div class="divider"></div>
			</div>
		</div>
		
		<script type="text/javascript">jQuery(window).on('load',function(){importScript("//apis.google.com/js/plusone.js");(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}
js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/en_US/all.js#xfbml=1";fjs.parentNode.insertBefore(js,fjs);}(document,'script','facebook-jssdk'));importScript("//platform.twitter.com/widgets.js");importScript("//assets.pinterest.com/js/pinit.js");});</script>
		<style>
iframe[class*='PIN_'],iframe[class^='PIN_']{display:none !important}
</style>
		<?php print render($content['comments']); ?>