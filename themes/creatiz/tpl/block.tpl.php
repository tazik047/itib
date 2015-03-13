<?php 
$out = '';
//print_r($block);
//if($block->module=='widget') //remove title
	//$block->subject='';
	
if ($block->region == 'sidebar_first' or $block->region == 'sidebar_second') { 
	$out .= '<aside class="widget mdw-widget block block-widget '.$classes.'">';
		$out .= render($title_suffix);
		if ($block->subject && !empty($block->subject)):
			$out .= '<h3 class="widget-title">'.$block->subject.'</h3>';
		endif;
		$out .= $content;
	$out .= '</aside>';
	
}elseif($block->region == 'main_menu' || $block->region == 'menu_top_menu'){
	$out .= $content;
}elseif($block->region == 'content' || $block->region == 'section'){
//	$out .= '<section>';
		$out .= '<section class="'.$classes.' full-width-wrapper main-content-wrapper mds-page-section animatiton-enabled" id="page-section-'.$block->bid.'" data-randomization="false">';
			$out .= render($title_suffix);
				if ($block->subject){
					$out .= '<div class="dividerLatest">';
						$out .= '<h4 '.$title_attributes.'>'.$block->subject.'</h4>';
						$out .= '<div class="gDot"></div>';
					$out .= '</div>';
				}
				$out .= $content;
		$out .= '</section>';
	
}elseif($block->region == 'footer_col_one' || $block->region == 'footer_col_two' || $block->region == 'footer_col_three' || $block->region == 'footer_col_four'){
	$out .= '<aside id="'.$block->module.'" class="widget mdw-widget '.$classes.'">';

		if(!empty($block->subject))

			$out .= '<h3 class="widget-title">'.$block->subject.'</h3>';

		$out .= render($title_suffix);

		$out .= $content;

	$out .= '</aside>';
	
}else{
	$out .= render($title_prefix);
	//if ($block->subject):
		//$out .= '<h3 '.$title_attributes.'>'.$block->subject.'</h3>';
	//endif;
	
	$out .= $content;
}
print $out;
?>