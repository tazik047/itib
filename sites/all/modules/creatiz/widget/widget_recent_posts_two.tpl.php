<div class="content-builder container primary-2-secondary">
<div class=" columns three mds-custom-content-wrapper" data-animation="fadeIn" >
	<h3 class="mds-column-heading-title">
	<?php
		if (!empty($title)) {
			print $title;
		}else{
			print 'Featured Posts';
		}
	?>
	</h3>
	<div class="mds-custom-content">
		<p>
			<?php
				print $settings['desc'];
			?>
		</p>
		<a href="blog" title="Permalink to Blog">Show all Posts →</a></div>

</div>

<?php foreach ($nodes as $node): ?>

<?php $field_image = field_get_items('node', $node, 'field_image');?>

<div class=" columns three mds-single-post-wrapper" data-animation="fadeIn" >

	<article class="mds-single-post format-standard">

		<div class="featured-image">

		<a href="<?php print url('node/' . $node->nid); ?>" title="<?php print $node->title; ?>">

			<?php if(!empty($field_image)) print theme('image_style', array('style_name' => 'large', 'path' => $field_image[0]['uri'], 'attribues'=>array('class'=>'attachment-thumb-large-450'))); ?>

		</a>

		</div>

		<header class="entry-header">

			<div class="entry-title">

				<h3><a href="<?php print url('node/' . $node->nid); ?>" title="<?php print $node->title; ?>"><?php print $node->title;?></a></h3>

			</div>

			<div class="entry-format"><a class="micon-standard" href="<?php print url('node/' . $node->nid); ?>" title="<?php print $node->title; ?>"><span><?php print t('Standard Post')?></span></a></div>

		</header>

		<section class="entry-meta">

			<time datetime="<?php print date("M d, Y",$node->created); ?>"><?php print date("M d, Y",$node->created); ?></time>

			- <a href="<?php print url('node/' . $node->nid); ?>" title="Comment on <?php print $node->title;?>"><?php print $node->comment_count?> Comments</a></section>

		<div class="entry-summary">

			<div>

				<p>

				<?php 

					print $node->body[$node->language][0]['summary'];

				?>

				</p>

			</div>

		</div>

	</article>

</div>

<?php
	endforeach;
?>
<div class="columns twelve mds-divider-wrapper" data-animation="off" >
	<div class="clear"  style=""></div>
</div>
</div>