<?php
	Global $base_url;
?>
<div class="full-width-wrapper margin-bottom" id="contact-map">

	<div id="mds_google_map" class="mds-google-map" style="width:100%;height:<?php if(!empty($settings['widget_gmap_height'])) echo $settings['widget_gmap_height']; else echo '400px';?>"></div>
	<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true&#038;v=3.6&#038;ver=3.6'></script>

	<script type="text/javascript">

		jQuery(document).ready(function(){

			jQuery('#mds_google_map').gMap({

				latitude: <?php if(!empty($settings['widget_gmap_latitude'])) echo $settings['widget_gmap_latitude'];?>,

				maptype:'<?php if(!empty($settings['widget_gmap_maptype'])) echo $settings['widget_gmap_maptype'];?>',

				longitude:<?php if(!empty($settings['widget_gmap_longitude'])) echo $settings['widget_gmap_longitude'];?>,
				address:'',

				zoom:<?php if(!empty($settings['widget_gmap_zoom'])) echo $settings['widget_gmap_zoom'];?>,

				controls:{panControl:<?php if(!empty($settings['widget_gmap_pancontrol'])) echo $settings['widget_gmap_pancontrol']; else echo 'true'?>,zoomControl:<?php if(!empty($settings['widget_gmap_zoom_control'])) echo $settings['widget_gmap_zoom_control']; else echo 'true'?>,mapTypeControl:<?php if(!empty($settings['widget_gmap_map_type_control'])) echo $settings['widget_gmap_map_type_control']; else echo 'true'?>,scaleControl:<?php if(!empty($settings['widget_gmap_map_scale_control'])) echo $settings['widget_gmap_map_scale_control']; else echo 'true'?>,streetViewControl:<?php if(!empty($settings['widget_gmap_map_street_view_control'])) echo $settings['widget_gmap_map_street_view_control']; else echo 'true'?>,overviewMapControl:<?php if(!empty($settings['widget_gmap_map_overview_map_control'])) echo $settings['widget_gmap_map_overview_map_control']; else echo 'true'?>},

				

				markers:[{icon:{image:'<?php if(!empty($settings['widget_gmap_map_pointer'])) echo $settings['widget_gmap_map_pointer']; else print $base_url.'/'.drupal_get_path('theme', variable_get('theme_default', NULL)).'/images/map-pointer.png';?>',iconsize:[<?php if(!empty($settings['widget_gmap_iconsize'])) echo $settings['widget_gmap_iconsize']; else echo '85,85'?>],iconanchor:[42.5,42.5]},latitude:<?php if(!empty($settings['widget_gmap_latitude'])) echo $settings['widget_gmap_latitude'];?>,longitude:<?php if(!empty($settings['widget_gmap_longitude'])) echo $settings['widget_gmap_longitude'];?>,address:'',

html:'<?php if(!empty($settings['widget_gmap_html'])) echo $settings['widget_gmap_html']; else echo '<img src="'.$base_url.'/'.drupal_get_path('theme', variable_get('theme_default', NULL)).'/images/logo@2x.png" height="100" width="220">'?>',popup:false}],

				styles:[{stylers:[{hue:'#33B3D3'},{saturation:-80}]},{featureType:'road',elementType:'geometry',stylers:[{lightness:100},{visibility:'simplified'}]},{featureType:'road',elementType:'labels',stylers:[{visibility:'on'}]}]

			});

		});

		

	</script>



</div>

