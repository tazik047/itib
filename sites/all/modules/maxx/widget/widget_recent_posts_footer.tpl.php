<?php
	if (empty($title)) {
		print '<h3 class="widget-title first-word">';
			$title = t('Recent Posts');
			print $title;
		print '</h3>';
	}
?>
<ul class="list-news-with-calendar list-news">
	
	<?php foreach ($nodes as $node): ?>
		<li>
			<time datetime="2012-Jun-03" class="cal-post-date">
				<span class="date"><?php print date("d",$node->created); ?></span>
				<span class="month"><?php print date('M',$node->created); ?></span>
			</time>
			<p>
				<strong><a href="<?php print url('node/' . $node->nid); ?>"><?php print l($node->title, 'node/' . $node->nid); ?></a></strong>
			</p>
			<p>
			<?php
				if(!empty($node->body))
					print text_summary($node->body['und'][0]['value'], NULL, 100);
				//print_r($node);
			?>
			</p>
		</li>
	<?php endforeach; ?>
</ul>
