<?php 
$out = '';
if ($block->region == 'sidebar_first' or $block->region == 'sidebar_second') { 
	$out .= '<div class="clear"></div>';
	$out .= '<div class="widget">';
	if ($block->subject && !empty($block->subject)) $out .= '<h3 class="widget-title first-word">'.$block->subject.'</h3>';
	$out .= ''.$content.'';
	$out .= '</div>';
}elseif($block->region == 'footer_one_column' or $block->region == 'footer_two_column' or $block->region == 'footer_three_column'){
	$out .= '<aside class="widget">';
	$out .= ''.$content.'';
	$out .= '</aside>';
	
}elseif($block->region == 'subscription'){
	$out .= '<div id="via-phone-number"><h2 class="cufon">'.$block->subject.'</h2></div>';
	$out .= ''.$content.'';
}elseif($block->region == 'slideshow'){
	$out .= ''.$content.'';
}else{
	$out .= '<div id="'.$block_html_id.'" class="'.$classes.'" '.$attributes.' >';
	$out .= '<div class="block-inner clearfix">';
	$out .= render($title_prefix);
	if ($block->subject):
		$out .= '<h2 '.$title_attributes.'>'.$block->subject.'</h2>';
	endif;
	$out .= render($title_suffix);
	$out .= '<div '.$content_attributes.'>'.$content.'</div>';
	$out .= '</div>';
	$out .= '</div>';
}
print $out;
?>