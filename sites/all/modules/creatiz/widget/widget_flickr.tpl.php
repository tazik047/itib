<?php

$flickr_id = $settings['widget_flickr_id'];

$flickr_photos_count = $settings['widget_flickr_photo_count'];

?>

<ul id="flickr">

</ul>

<div class="clearfix"></div>



<script language="javascript">

jQuery(document).ready(function(){

	/*----------------------------------------------------*/

	/*	Flickr Feed

	/*----------------------------------------------------*/

	jQuery('#flickr').jflickrfeed({

		limit: <?php print $flickr_photos_count; ?>,

		qstrings: {

			id: '<?php print $flickr_id; ?>'

		},

		itemTemplate: '<li><a href="{{image}}" rel="prettyPhoto"><img alt="{{title}}" src="{{image_s}}" /></a></li>'

	});

});

</script>