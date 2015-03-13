<?php
	if (empty($title)) {
		$title = t('RECENT WORKS!');
	}
?>
<?php
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
<div class="container no-margin-bottom mds-portfolio-with-filter-wrapper" data-animation="fadeIn" data-child="">
<div class="columns twelve non-relative mds-divider-wrapper" data-animation="off" >
	<div class="clear"></div>
	<div class="mds-divider contenttype-default style-shadow2"  style="margin-top:30px;">
		<div class="divider"></div>
	</div>
</div>
	<div class="columns twelve" id="filter-wrapper-block">
		<ul class="portfolio-filter list-inline-block display-block text-center">
			<li><a href="#" data-filter="*" class="active"><?php print t('Show All'); ?></a></li>
			<?php foreach ($terms as $term): ?>
				<li><a href="#" data-filter=".tid-<?php print $term->tid; ?>"><?php print $term->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="clear"></div>

	<div class="mds-filterable-portfolio">
		<div id="mds-portfolio-items-block" class="portfolio-items">

			<?php foreach ($nodes as $node): ?>

			<?php $field_image = field_get_items('node', $node, 'field_image');
				$link_field = field_get_items('node', $node, 'field_portfolio_link');
				
			?>

			<article class="columns three <?php print portfolio_format_terms('field_portfolio_category', $node); ?> ">
				<div>
					<div class="featured-image">
						<a href="<?php print $link_field[0]['value']; ?>" target="_blank" title="<?php print $node->title; ?>" rel="bookmark" class="video-project micon-video">

							<?php print theme('image_style', array('style_name' => 'large', 'path' => $field_image[0]['uri'])); ?>

						</a>

					</div>

					<h3 class="entry-title no-margin-bottom">

						<a href="<?php print $link_field[0]['value']; ?>" target="_blank" title="<?php print $node->title; ?>" rel="bookmark"><?php print $node->title; ?></a>

					</h3>

					<div>

						<?php print widget_format_terms('field_portfolio_category', $node); ?>

					</div>

				</div>

			</article>

			<?php endforeach; ?>

		</div>

	</div>

	<script language="javascript">

		jQuery(document).ready(function($){

			var $container=$("#mds-portfolio-items-block");

			$container.imagesLoaded(function(){

				$container.isotope({animationEngine:"best-available",animationOptions:{duration:200,easing:"easeInOutQuad",queue:false},hiddenStyle:{opacity:0,scale:1},layoutMode:"fitRows",});

			});

			$(window).smartresize(function(){$container.isotope();});

			$("#filter-wrapper-block ul li a").click(function(){

				$(this).closest("#filter-wrapper-block").find("a").removeClass("active");

				$(this).addClass("active");

				selector=$(this).attr("data-filter");

				$container.isotope({filter:selector});

				return false;

			});

   });

	</script>

</div>