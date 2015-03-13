<?php 
	if ($page) {
		?>
<article class="post-entry">
                    <div class="two-third first" id="portfolio-media-content-wrapper">
                        <div id="portfolio-media-content" class="border-frame">
                            <div class="flexslider" id="single-portfolio-slider">
                                <ul class="slides">
                                   
                                
								<?php
								$node = node_load($nid);
								$image = field_get_items('node', $node, 'field_picture_portfolio');
								foreach ($image as $key=>$value) {
								$output = field_view_value('node', $node, 'field_picture_portfolio', $image[$key], array(
								  'type' => 'image',
								  'settings' => array(
									'image_style' => 'portfolio_thumb_611_420', //place your image style here
									//'image_link' => 'content',
								  ),
								));
								print '<li>'.render($output).'</li>';
								} 
								?>
								</ul>
                            </div>
                            <script type="text/javascript">
                                jQuery(window).load(function() {
                                jQuery('#single-portfolio-slider.flexslider').flexslider({
                                animation: "fade",              //String: Select your animation type, "fade" or "slide"
                                direction: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
                                slideshow: true, 
                                controlNav: false,
                                slideshowSpeed: 5000,
                                pauseOnAction:false,
                                pauseOnHover: true
                                
                                });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="one-third" id="portfolio-meta-content">
                        <ul>
                            <li>
                                <h2 class="cufon"><?php print $title; ?></h2>
                            </li>
                            <li>
                                <h5>Custom</h5>
                                <p><?php echo $name?></p>
                            </li>
                            <li>
								<h5>Description</h5>
								<p></p>
							<?php
								$body = field_get_items('node', $node, 'body');
								$teaser= $body[0]['safe_summary'];
								print $teaser;
							?>
                                
                              
                            </li>
                            
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <br />
                    <!--entry content-->
                    <div class="entry-content">
                        <?php hide($content['comments']); hide($content['links']); 
			print render($content['body']);?>
			<?php print render($content['comments']); ?>
                    </div>
                    <!--/entry content-->
                </article>
<?php
	};
?>


