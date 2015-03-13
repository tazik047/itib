<?php
	if (empty($title)) {
		print '<h3 class="widget-title first-word">';
			$title = t('Flickr Photos');
			print $title;
		print '</h3>';
	}
?>
<?php
$flickr_id = $settings['widget_flickr_id'];
$flickr_photos_count = $settings['widget_flickr_photo_count'];
?>
<div class="flickr-widget flickr_photos">
    <div class="widgets flickr md-widget-flickr">
        <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php print $flickr_photos_count; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php print $flickr_id; ?>"></script>
    </div>
</div>