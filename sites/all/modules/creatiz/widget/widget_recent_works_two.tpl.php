<?php
	if (empty($title)) {
		$title = t('Recent Projects');
	}
	
	$terms = array();
	$vid = NULL;
	$vid_machine_name = 'categories_portfolio';
	$vocabulary = taxonomy_vocabulary_machine_name_load($vid_machine_name);
	if (!empty($vocabulary->vid)) {
	  $vid = $vocabulary->vid;
	}
	if (!empty($vid)) {
	  $terms = taxonomy_get_tree($vid);
	}
?>

<div class="content-builder container primary-2-secondary">
	<div class="columns twelve mds-divider-wrapper" data-animation="off" >
		<div class="clear"></div>
		<div class="mds-divider style-default length-short contenttype-default alignment-center"  style="margin-bottom:30px;">
			<div class="divider"></div>
		</div>
	</div>

	<div class=" columns three mds-custom-content-wrapper" data-animation="fadeIn" >
		<h3 class="mds-column-heading-title"><?php print $title; ?></h3>
		<div class="mds-custom-content">
			<p>
				<?php
					$desc= $settings['desc'];
					print $desc;
				?>
			</p>
			<a href="portfolio" title="Permalink to Portfolio">Show all Portfolio →</a></div>
	</div>

	<div class=" columns nine mds-portfolio-carousel-wrapper" data-animation="fadeIn" data-child="article">
		<div id="flexcarousel-2" class="mds-portfolio-carousel mds-flexslider-slider flexslider carousel-flexslider porfolio-carousel-flexslider nav-style-heavy nav-size-small columns-four">
			<ul class="slides">
				<?php foreach ($nodes as $node): ?>

				<?php $field_image = field_get_items('node', $node, 'field_image'); ?>
					<li>
						<article class=" columns four">
							<div>
								<div class="featured-image"><a href="<?php print url('node/' . $node->nid); ?>" title="<?php print $node->title; ?>" rel="bookmark" class="video-project micon-video">
								<?php print theme('image_style', array('style_name' => 'large', 'path' => $field_image[0]['uri'], 'attributes'=>array('class','margin-bottom-15'))); ?></a></div>
								<h3 class="entry-title no-margin-bottom"><a href="<?php print url('node/' . $node->nid); ?>" title="<?php print $node->title; ?>" rel="bookmark"><?php print $node->title; ?></a></h3>
								<div>
									<?php print widget_format_terms('field_portfolio_category', $node); ?>
								</div>
							</div>
						</article>
					</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">/*<![CDATA[*/(function($){var $window=$(window),flexslider;function getGridSize(){return(window.innerWidth<480)?1:0;}

	$(window).on("load",function(){$("#flexcarousel-2").flexslider({animation:"slide",animationLoop:true,useCss:true,controlNav:false,directionNav:true,itemMargin:30,minItems:getGridSize(),itemWidth:210,slideshowSpeed:5000,video:false,pauseOnHover:true,namespace:"mflex-",prevText:"<i class=\"micon-arrow-left\"></i>",nextText:"<i class=\"micon-arrow-right\"></i>",slideshow:false,start:function(slider){var thisSlides=slider.slides;thisSlides.find("article").removeAttr("class");}});});})(jQuery);/*]]>*/</script>