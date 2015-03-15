<?php

/**
 * @file html.tpl.php
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 * @see nucleus_preprocess_html()
 */
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<!--<![endif]-->
<head>
	 <?php print $head; ?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
	<!-- Title -->
    <title><?php print $head_title; ?></title>
	<!-- Meta -->

    <?php print $styles; ?>
	
    <?php print $scripts; ?>
	<?php
	//Tracking code
	$tracking_code = theme_get_setting('general_setting_tracking_code', 'creatiz');
	print $tracking_code;
	
	//Custom css
	$custom_css = theme_get_setting('custom_css', 'creatiz');
	if(!empty($custom_css)):
	?>
		<style type="text/css" media="all">
			<?php print $custom_css;?>
		</style>
	<?php
	endif;
	
	$layout = theme_get_setting('creatiz_layout', 'creatiz');
	if($layout=='boxed'){
	?>
	<style type="text/css">
		body {
			background-image: url("<?php print base_path() . drupal_get_path('theme', 'creatiz')?>/images/bg/background.jpg");
			background-color: #222;
			background-repeat: repeat;
			background-position: center center;
			background-attachment: fixed;
			background-size: auto;
		}
	</style>
	<?php
	}
	
	include_once('switcher.tpl.php');
	?>

</head>
<body class="webkit-browser mac-platform desktop enabled-responsiveness large-display-responsiveness flat-ui menu-style-one-line <?php print $classes; ?>" <?php print $attributes;?>>
<div id="skip-link"><a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a></div>
	<a class="back-to-top md-circle" id="primary-back-to-top" href="#top" title="Back to top"><i class=" micon-arrow-up"></i></a>
	<?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
	
	<style>
	iframe[class*='PIN_'],iframe[class^='PIN_']{display:none!important;}
	</style>

</body>
</html>