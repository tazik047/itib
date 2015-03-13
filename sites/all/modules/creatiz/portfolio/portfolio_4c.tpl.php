<?php require_once 'portfolio_filter.tpl.php';?>

<div class="clear"></div>

<div class="portfolio-items isotope" style="position:relative;">

	<?php if (!empty($nodes)): ?>

		<?php

			foreach ($nodes as $node) :

			$image_full = '';

			$image_field = field_get_items('node', $node, 'field_image');

			if (!empty($image_field)) {

				$image_full = file_create_url($image_field[0]['uri']);

			}

			$node_url = url('node/' . $node->nid);

		?>

		

				<article class="project columns three project-entry <?php print portfolio_format_terms('field_portfolio_category', $node); ?> isotope-item">

					<div class="animated fadeIn">

						<div class="featured-image"><a href="<?php print $node_url;?>" title="" rel="" class="image-project micon-image">

						<?php if (!empty($image_field)): ?>

						<?php

						  $image_uri = $image_field[0]['uri'];

						  //$image_url = file_create_url($image_uri);

						  $style_name = 'large';

						  

						  $node_title = $node->title;

						  ?>
						<?php print theme('image_style', array('style_name' => $style_name, 'path' => $image_uri, 'attributes' => array('class' => 'attachment-large'))); //'style_name' => $style_name,  ?>

						<?php endif; ?>

						</a></div>

						<header class="entry-title">

							<h3 class="no-margin-bottom"><a href="<?php print $node_url;?>" title="<?php print $node_title;?>" rel="bookmark"><?php print $node_title;?></a></h3>

						</header>

						<footer class="entry-meta"><?php print widget_format_terms('field_portfolio_category', $node); ?></footer>

					</div>

				</article>

	<?php

			endforeach;

		endif;

	?>

</div>

<script language="javascript">

	jQuery(document).ready(function($){

		var $container=jQuery('.portfolio-items:not(.not-isotope)');

		$container.imagesLoaded(function(){

			$container.isotope({

				animationEngine:'best-available',

				animationOptions:{

					duration:200,

					easing:'easeInOutQuad',

					queue:false

				},

				layoutMode:'fitRows',

			});

		});

		jQuery(window).smartresize(function($){$container.isotope();});

		jQuery('.filter-wrapper ul li a').click(function(){

			jQuery('.filter-wrapper ul li a').removeClass('active');

			jQuery(this).addClass('active');

			var selector=$(this).attr('data-filter');

			$container.isotope({filter:selector});

			return false;

		});

		jQuery('.portfolio-filter li a').click(function(){

			jQuery('.portfolio-filter li a').removeClass('active');

			jQuery(this).addClass('active');

			var selector=$(this).attr('data-filter');

			$container.isotope({filter:selector});

			return false;

		});

		

	});



</script>