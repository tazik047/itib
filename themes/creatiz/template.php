<?php 
global $base_url;

function creatiz_preprocess_html(&$variables) {
	
	drupal_add_css(base_path().path_to_theme().'/css/animate.css', array('type' => 'external'));
	drupal_add_css(base_path().path_to_theme().'/css/jquery-ui-1.9.2.custom.css', array('type' => 'external'));
	drupal_add_css(base_path().path_to_theme().'/css/flexslider.css', array('type' => 'external'));
	drupal_add_css(base_path().path_to_theme().'/css/prettyphoto.css', array('type' => 'external'));
	drupal_add_css(base_path().path_to_theme().'/css/custom-responsive.css', array('type' => 'external'));
	drupal_add_css(base_path().path_to_theme().'/iconfont/creatiz.css', array('type' => 'external'));
	
	//Include google font
	drupal_add_css('http://fonts.googleapis.com/css?family=Varela+Round|Open+Sans', array('type' => 'external'));
	
	drupal_add_js('http://code.jquery.com/jquery-1.10.1.min.js', 'file');
	drupal_add_js('http://code.jquery.com/jquery-migrate-1.2.1.min.js', 'file');
	drupal_add_js('http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', 'file');
	
	drupal_add_js(base_path().path_to_theme().'/js/elements.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 1,
	));
	drupal_add_js(base_path().path_to_theme().'/js/scripts.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 2,
	));
	
	drupal_add_js(base_path().path_to_theme().'/js/jquery.jplayer.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 2,
	));
	drupal_add_js(base_path().path_to_theme().'/js/jquery.flexslider.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 2,
	));
	drupal_add_js(base_path().path_to_theme().'/js/custom-js.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 3,
	));
	drupal_add_js(base_path().path_to_theme().'/js/jquery.isotope.min.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 4,
	));
	drupal_add_js(base_path().path_to_theme().'/js/scripts.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 2,
	));
	drupal_add_js(base_path().path_to_theme().'/js/jflickrfeed.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 3,
	));
	
	drupal_add_js(base_path().path_to_theme().'/js/update.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 1,
	));
	drupal_add_js(base_path().path_to_theme().'/js/jquery.gmap.js', array(
	  'type' => 'external',
	  'scope' => 'header',
	  'group' => JS_THEME,
	  'weight' => 4,
	));
	
}

$css_reset = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => $base_url.'/'.path_to_theme().'/css/reset.css', 
    'rel' => 'stylesheet',
    'type' => 'text/css',
  ),
  '#weight' => 1,
);
drupal_add_html_head($css_reset, 'css_reset');

$css_layout = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => $base_url.'/'.path_to_theme().'/css/layout.css', 
    'rel' => 'stylesheet',
    'type' => 'text/css',
  ),
  '#weight' => 2,
);
drupal_add_html_head($css_layout, 'css_layout');

$css_mdficons= array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => $base_url.'/'.path_to_theme().'/css/MDFicons/style.css', 
    'rel' => 'stylesheet',
    'type' => 'text/css',
  ),
  '#weight' => 3,
);
drupal_add_html_head($css_mdficons, 'css_mdficons');

$css_base = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => $base_url.'/'.path_to_theme().'/css/base.css', 
    'rel' => 'stylesheet',
    'type' => 'text/css',
  ),
  '#weight' => 4,
);
drupal_add_html_head($css_base, 'css_base');

$css_elements = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => $base_url.'/'.path_to_theme().'/css/elements.css', 
    'rel' => 'stylesheet',
    'type' => 'text/css',
  ),
  '#weight' => 5,
);
drupal_add_html_head($css_elements, 'css_elements');

$css_responsive = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => $base_url.'/'.path_to_theme().'/css/responsive.css', 
    'rel' => 'stylesheet',
    'type' => 'text/css',
  ),
  '#weight' => 6,
);
drupal_add_html_head($css_responsive, 'css_responsive');

$css_custom_styles = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => $base_url.'/'.path_to_theme().'/css/custom-styles.css', 
    'rel' => 'stylesheet',
    'type' => 'text/css',
  ),
  '#weight' => 7,
);
drupal_add_html_head($css_custom_styles, 'css_custom_styles');

$css_update = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => $base_url.'/'.path_to_theme().'/css/update.css', 
    'rel' => 'stylesheet',
    'type' => 'text/css',
  ),
  '#weight' => 8,
);
drupal_add_html_head($css_update, 'css_update');


// Add css skin
$setting_skin = theme_get_setting('built_in_skins', 'creatiz');
if(empty($setting_skin))
	$setting_skin = 'dodger-blue.css';

$css_skin = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
	'href' => $base_url.'/'.path_to_theme().'/css/skins/'.$setting_skin, 
	'rel' => 'stylesheet',
	'type' => 'text/css',	
	'id' => 'css_skin',
	),
  '#weight' => 9,
);
drupal_add_html_head($css_skin, 'skin');

// Add css grid
$setting_grid = theme_get_setting('creatiz_grid', 'creatiz');
if($setting_grid=='1200px'){
	$css_grid = array(
	  '#tag' => 'link', // The #tag is the html tag - <link />
	  '#attributes' => array( // Set up an array of attributes inside the tag
		'href' => $base_url.'/'.path_to_theme().'/css/1200px.css', 
		'rel' => 'stylesheet',
		'type' => 'text/css',	
		'id' => 'css_grid',
		),
	  '#weight' => 10,
	);
	drupal_add_html_head($css_grid, 'css_grid');
}else{
	$css_grid = array(
	  '#tag' => 'link', // The #tag is the html tag - <link />
	  '#attributes' => array( // Set up an array of attributes inside the tag
		'href' => $base_url.'/'.path_to_theme().'/css/960px.css', 
		'rel' => 'stylesheet',
		'type' => 'text/css',	
		'id' => 'css_grid',
		),
	  '#weight' => 10,
	);
	drupal_add_html_head($css_grid, 'css_grid');
}


function creatiz_form_comment_form_alter(&$form, &$form_state) {
  $form['comment_body']['#after_build'][] = 'creatiz_customize_comment_form';
}

function creatiz_customize_comment_form(&$form) {
  $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
  return $form;
}


function creatiz_preprocess_page(&$vars) {
	// Node template suggestions like page--node--blog.tpl.php
	if (isset($vars['node'])) {  
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
		
		//$vars['theme_hook_suggestions'][] = 'page__node__'. $vars['node']->type; page--node--blog.tpl.php
	}
	
	//404 page
	$status = drupal_get_http_header("status");  
	if($status == "404 Not Found") {      
		$vars['theme_hook_suggestions'][] = 'page__404';
	}
	
}


//custom main menu
function creatiz_menu_tree__main_menu($variables) {
	$str = '';
	$str .= '<ul id="menu-primary-menu-1" class="menu">';
		$str .= $variables['tree'];
	$str .= '</ul>';
	
	return $str;
}
//custom footer menu
function creatiz_menu_tree__menu_footer_menu($variables) {
	$str = '';
	$str .= '<ul class="footer-menu clearfix">';
		$str .= $variables['tree'];
	$str .= '</ul>';
	return $str;
}

// Remove superfish css files.
function creatiz_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
	
//	unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}

function creatiz_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
		$form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['class'] = array("txt-search");
		//disabled submit button
		//unset($form['actions']['submit']);
		unset($form['search_block_form']['#title']);
		$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
		$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
	}
	if($form_id == 'contact_site_form'){
		$form['mail']['#attributes']['class'] = array("input-contact-form");
		$form['name']['#attributes']['class'] = array("input-contact-form");
		$form['subject']['#attributes']['class'] = array("input-contact-form");
		$form['message']['#attributes']['class'] = array("message-contact-form");
		$form['actions']['submit']['#attributes']['class'] = array('btn btn-success contact-form-button'); 
	}
	if ($form_id == 'comment_form') {
		$form['comment_filter']['format'] = array(); // nuke wysiwyg from comments
	}
}

function creatiz_breadcrumb($variables) {
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs = '<div class="primary-2-secondary">';
			$crumbs .= '<strong>You&acute;re here: </strong>';
			foreach($breadcrumb as $value) {
				$crumbs .= $value.' » ';
			}
			$crumbs .= drupal_get_title();
		$crumbs .= '</div>';
		return $crumbs;
	}else{
		return NULL;
	}
}