<?php 
print '<div id="slider-bg-wrapper" class="full-width-wrapper">';
	print '<div id="slider-bg-overlay">';
		print '<div id="slider-bg-overlay1"></div>';
		print '<div id="slider-bg-overlay2"></div>';
	print '</div>';
	print '<div id="slider-shadow">';
		print '<div class="fixed-width-wrapper">';
			print '<div class="box_skitter box_skitter_home maxx-theme" id="slider-wrapper">';
				print '<ul>';
					foreach ($nodes as $node):
					$field_image = field_get_items('node', $node, 'field_image');
						print '<li>';
							print '<a href="#" class="img-border alignleft">'.theme('image_style', array('style_name' => 'slideshow', 'path' => $field_image[0]['uri'], 'attributes' => array('class' => 'random'))).'</a>';
							print '<div class="label_text">';
								print '<h1>'.$node->title.'</h1>';
								if(!empty($node->body))
									print '<p>'.$node->body['und'][0]['value'].'</p>';
							print '</div>';
						print '</li>';
					endforeach;
					
				print '</ul>';
			print '</div>';
		print '</div>';
	print '</div>';
	print '<div id="sp-slider"></div>';
print '</div>';
?>
<script>
	jQuery(document).ready(function (e) {
		jQuery('.box_skitter_home.maxx-theme').skitter({
			label: false,
			numbers: true,
			auto_play: true,
			numbers_align: 'center',
			dots: true,
			preview: true,
			animateNumberOut: {
				backgroundColor: '#d1d1d1',
				color: '#FFF'
			},
			structure: '<a href="#" class="prev_button"><span>prev</span></a>' + '<a href="#" class="next_button"><span>next</span></a>' + '<span class="info_slide"></span>' + '<div class="container_skitter">' + '<div class="image">' + '<a href=""><img class="image_main" /></a>' + '<div class="label_skitter"></div>' + '</div>' + '</div>',
			animateNumberOver: {
				backgroundColor: '#777',
				color: '#FFF'
			},
			width_label: '70%',
			animateNumberActive: {
				backgroundColor: '',
				color: '#fff'
			},
			opacity_elements: 1,
		});
		jQuery('.box_skitter_home.maxx-theme').find('.info_slide_dots .image_number').removeAttr('style');
	});
	
</script>