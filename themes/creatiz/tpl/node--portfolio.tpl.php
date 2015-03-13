<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<?php
	if ($page) { 
?>
<div id="node-<?php print $node->nid; ?>" class="container single-portfolio-page  <?php if ($page): ?><?php print 'post-page '; ?> <?php endif; ?><?php print $classes; ?> clearfix"<?php print $attributes; ?>>

	<div role="main" class="primary-2-secondary columns twelve">
		<article class="portfolio type-portfolio status-publish hentry post-entry">
			<div class="flexslider mds-flexslider-slider nav-style-thin nav-size-large always-show-direction-nav" id="single-portfolio-slider">
				
					<?php 
						if (!empty($content['field_image'])){
							hide($content['field_image']);
							$field_image = field_get_items('node', $node, 'field_image');
							if (!empty($field_image) && count($field_image) == 1){ // 1 image
								print '<ul class="slides ">';
									print '<li>';
										//display image style
										//print theme('image_style', array('style_name' => 'YOUR_IMAGE_STYLE', 'path' => $field_image[0]['uri'], 'attributes' => array('class' => 'attachment-large')));
										print theme('image', array('path' => $field_image[0]['uri'], 'attributes' => array('class' => 'attachment-large')));
									print '</li>';
								print '</ul>';
							}else{
								print '<ul class="slides slider-portfolio">';
									foreach ($field_image as $img):
										print '<li>';
											//display image style
											
											//print theme('image_style', array('style_name' => 'YOUR_IMAGE_STYLE', 'path' => $img['uri'], 'attributes' => array('class' => 'attachment-large')));
											print theme('image', array('path' => $img['uri'], 'attributes' => array('class' => 'attachment-large')));
										print '</li>';
									endforeach;
								print '</ul>';
							}
						}
					?>
					
				
			</div>
			<script type="text/javascript">/*<![CDATA[*/jQuery(window).on("load",function($){jQuery("#single-portfolio-slider.flexslider").flexslider({animation:"fade",direction:"horizontal",slideshow:true,controlNav:false,slideshowSpeed:5000,pauseOnAction:false,pauseOnHover:true,namespace:"mflex-",prevText:"<i class=\"micon-slider-arrow-left\"></i>",nextText:"<i class=\"micon-slider-arrow-right\"></i>",});});/*]]>*/</script>
		</article>
	</div>
	<div id="sidebar" class="three columns primary-2-secondary">
		<ul class="project-meta">
			<li class="margin-bottom">
				<h2 class="no-margin-bottom"><?php print $node->title?></h2>
				<time datetime="<?php print format_date($node->created, 'custom', 'M d, Y');?>">Date: <?php print format_date($node->created, 'custom', 'M d, Y');?></time>
			</li>
			<li>
				<p><?php print render($content['field_portfolio_category']);?></p>
			</li>
			<li>
				<!--<h5 class="no-margin-bottom">Description</h5>-->
				<p><?php print render($content['field_description']);?></p>
			</li>
			
		</ul>
		<div class="clear"></div>
	</div>
	<div class="nine columns primary-2-secondary">
		<div class="clear"></div>
		<?php
			$project_link = field_get_items('node', $node, 'field_portfolio_link');
			$body = field_get_items('node', $node, 'body');
			hide($content['comments']);
			hide($content['body']);
			hide($content['field_portfolio_link']);
			hide($content['field_portfolio_category']);
			print $body[0]['value'];
			print '<p></p>';
			print render($content);
		?>
	</div>
	<div class="clear"></div>
	<div class="twelve columns no-margin-bottom">
		<div class="clear"></div>
		<div class="mds-divider style-default length-long contenttype-default alignment-center"  style="margin-bottom:30px;">
			<div class="divider"></div>
		</div>
	</div>
	<?php
		$nids = db_query("SELECT n.nid FROM {node} n WHERE n.status = 1 AND n.type = :type AND n.nid <> :nid ORDER BY RAND() LIMIT 0,4", array(':type' => 'portfolio', ':nid' => $node->nid))->fetchCol();
		
		$nodes = node_load_multiple($nids);
		
		if (!empty($nodes)): 
		$default_portfolio = theme_get_setting('default_portfolio', 'creatiz');
		$col_portfolio = '';
		if($default_portfolio=='2c')
			$col_portfolio = 'six';
		else if($default_portfolio=='3c')
			$col_portfolio = 'four';
		else if($default_portfolio=='4c')
			$col_portfolio = 'three';
		else 
			$col_portfolio = 'two';
		
			print '<div class="container related-projects show-project-type secondary-2-primary">';
				print '<div class="twelve columns">';
					print '<h2 class="no-margin-bottom">Related Projects</h2>';
				print '</div>';
		?>
		
		<?php
			
			foreach ($nodes as $node) :
				$field_image = field_get_items('node', $node, 'field_image');
				$node_url = url('node/' . $node->nid);
		?>
				<article class="portfolio type-portfolio status-publish hentry columns <?php print $col_portfolio?> project-entry">
				<?php if (!empty($field_image)): ?>
					<div class="featured-image">
						<a href="<?php print $node_url;?>" title=""  class="image-project micon-image"><?php print theme('image_style', array('style_name' => 'large', 'path' => $field_image[0]['uri'], 'attributes' => array('class' => 'attachment-medium-cropped'))); ?></a>
					</div>
					<?php
					endif;
				?>
					
					<div class="entry-title">
						<h3 class="no-margin-bottom"><a href="<?php print $node_url;?>" title="<?php print $node->title;?>" rel="bookmark"><?php print $node->title;?></a></h3>
					</div>
				</article>
		<?php
			endforeach;
			print '</div>';
		endif;
	?>
</div>

<?php }else{?>
<div id="node-<?php print $node->nid; ?>" class="container single-portfolio-page  <?php if ($page): ?><?php print 'post-page '; ?> <?php endif; ?><?php print $classes; ?> clearfix"<?php print $attributes; ?>>

	<div role="main" class="primary-2-secondary columns twelve">
		<article class="portfolio type-portfolio status-publish hentry post-entry">
			<div class="flexslider mds-flexslider-slider nav-style-thin nav-size-large always-show-direction-nav" id="single-portfolio-slider">
				
					<?php 
						if (empty($content['field_image'])){
							hide($content['field_image']);
							$field_image = field_get_items('node', $node, 'field_image');
							if (!empty($field_image) && count($field_image) == 1){ // 1 image
								print '<ul class="slides ">';
									print '<li>';
										//display image style
										//print theme('image_style', array('style_name' => 'YOUR_IMAGE_STYLE', 'path' => $field_image[0]['uri'], 'attributes' => array('class' => 'attachment-large')));
										print theme('image', array('path' => $field_image[0]['uri'], 'attributes' => array('class' => 'attachment-large')));
									print '</li>';
								print '</ul>';
							}else{
								print '<ul class="slides slider-portfolio">';
									foreach ($field_image as $img):
										print '<li>';
											//display image style
											
											//print theme('image_style', array('style_name' => 'YOUR_IMAGE_STYLE', 'path' => $img['uri'], 'attributes' => array('class' => 'attachment-large')));
											print theme('image', array('path' => $img['uri'], 'attributes' => array('class' => 'attachment-large')));
										print '</li>';
									endforeach;
								print '</ul>';
							}
						}
					?>
					
				
			</div>
			<script type="text/javascript">/*<![CDATA[*/jQuery(window).on("load",function($){jQuery("#single-portfolio-slider.flexslider").flexslider({animation:"fade",direction:"horizontal",slideshow:true,controlNav:false,slideshowSpeed:5000,pauseOnAction:false,pauseOnHover:true,namespace:"mflex-",prevText:"<i class=\"micon-slider-arrow-left\"></i>",nextText:"<i class=\"micon-slider-arrow-right\"></i>",});});/*]]>*/</script>
		</article>
	</div>
	<div id="sidebar" class="three columns primary-2-secondary">
		<ul class="project-meta">
			<li class="margin-bottom">
				<h2 class="no-margin-bottom"><a href="<?php print $node_url?>" title=""><?php print $node->title?></a></h2>
				<time datetime="<?php print format_date($node->created, 'custom', 'M d, Y');?>">Date: <?php print format_date($node->created, 'custom', 'M d, Y');?></time>
			</li>
			<li>
				<p><?php print render($content['field_portfolio_category']);?></p>
			</li>
			
			
		</ul>
		<div class="clear"></div>
	</div>
	<div class="nine columns primary-2-secondary">
		<div class="clear"></div>
		<?php
			$project_link = field_get_items('node', $node, 'field_portfolio_link');
			$body = field_get_items('node', $node, 'body');
			hide($content['comments']);
			hide($content['body']);
			hide($content['field_portfolio_link']);
			hide($content['field_portfolio_category']);
			
			print '<p></p>';
			print render($content['field_description']);
		?>
	</div>
	<div class="clear"></div>
	<div class="twelve columns no-margin-bottom">
		<div class="clear"></div>
		<div class="mds-divider style-default length-long contenttype-default alignment-center"  style="margin-bottom:30px;">
			<div class="divider"></div>
		</div>
	</div>
	
</div>
<?php
}
?>