<?php

function creatiz_form_system_theme_settings_alter(&$form, $form_state) {

  $theme_path = drupal_get_path('theme', 'creatiz');
  $form['settings'] = array(
      '#type' => 'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['general_setting'] = array(
      '#type' => 'fieldset',
      '#title' => t('General Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['general_setting']['general_setting_tracking_code'] = array(
      '#type' => 'textarea',
      '#title' => t('Tracking Code'),
      '#default_value' => theme_get_setting('general_setting_tracking_code', 'creatiz'),
  );
  
 
  
  //PORTFOLIO SETTING
  $form['settings']['portfolio'] = array(
      '#type' => 'fieldset',
      '#title' => t('Portfolio settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['portfolio']['default_portfolio'] = array(
      '#type' => 'select',
      '#title' => t('Default portfolio display'),
      '#options' => array(
          '2c' => 'Portfolio - 2cols',
		  '2c_masonry' => 'Portfolio - 2cols masonry',
		  '3c' => 'Portfolio - 3cols',
		  '3c_masonry' => 'Portfolio - 3cols masonry',
          '4c' => 'Portfolio - 4cols',
		  '4c_masonry' => 'Portfolio - 4cols masonry',
		  '6c' => 'portfolio - 6cols',
		  '6c_masonry' => 'Portfolio - 6cols masonry',
		  'full' => 'Portfolio - full',
      ),
      '#default_value' => theme_get_setting('default_portfolio', 'creatiz'),
  );
  $form['settings']['portfolio']['default_nodes_portfolio'] = array(
      '#type' => 'select',
      '#title' => t('Number nodes show on portfolio page'),
     '#options' => drupal_map_assoc(array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 25, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 100)),
      '#default_value' => theme_get_setting('default_nodes_portfolio', 'creatiz'),
  );

  $form['settings']['footer'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['footer']['footer_copyright_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Footer copyright message'),
      '#default_value' => theme_get_setting('footer_copyright_message', 'creatiz'),
  );
  $form['settings']['footer']['footer_columns'] = array(
      '#type' => 'select',
      '#title' => t('Footer columns'),
	  '#options' => array('3'=>t('3 col'),'4'=>t('4 col')),
      '#default_value' => theme_get_setting('footer_columns', 'creatiz'),
  );
  

  $form['settings']['skin'] = array(
      '#type' => 'fieldset',
      '#title' => t('Switcher Style'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );
  
  //Disable Switcher style;
  $form['settings']['skin']['creatiz_disable_switch'] = array(
      '#title' => t('Switcher style'),
      '#type' => 'select',
      '#options' => array('on' => t('ON'), 'off' => t('OFF')),
      '#default_value' => theme_get_setting('creatiz_disable_switch', 'creatiz'),
  );
  
  //Skin
  $form['settings']['skin']['built_in_skins'] = array(
      '#title' => t('Built-in Skins'),
      '#type' => 'select',
      '#options' => array(
						  'dodger-blue.css' => t('Blue (Default)'),
						  'dark-blue.css' => t('Dark Blue'),
						  'red.css' => t('Red'),
						  'lime-green.css' => t('Lime Green'),
						  'green.css' => t('Green'),
						  'light-green.css' => t('Light Green'),
						  'orange.css' => t('Orange'),
						  'pink.css' => t('Pink'),
						  'purple.css' => t('Purple'),
						  'spring-green.css' => t('Spring Green'),
						  'violet.css' => t('Violet'),
						  'laurel.css' => t('Laurel'),
						  'turquoise.css' => t('Turquoise'),
						  'emerald.css' => t('Emerald'),
						  'wet-asphalt.css' => t('Wet Asphalt'),
						  'green-smoke.css' => t('Green Smoke'),
						  'amethyst.css' => t('Amethyst'),
						  'concrete.css' => t('Concrete'),
						  'nephritis.css' => t('Nephritis'),
						  'alizarin.css' => t('Alizarin'),
						  'burnt-sienna.css' => t('Burnt Sienna'),
						  'belize-hole.css' => t('Belize Hole'),
						  'midnight-blue.css' => t('Midnight Blue'),
						  'green-sea.css' => t('Green Sea'),
						  
		),
      '#default_value' => theme_get_setting('built_in_skins', 'creatiz'),
  );
  
  //Grid
  $form['settings']['skin']['creatiz_grid'] = array(
      '#title' => t('Grid'),
      '#type' => 'select',
      '#options' => array('960px' => t('Default 960px'), '1200px' => t('1200 px')),
      '#default_value' => theme_get_setting('creatiz_grid', 'creatiz'),
  );
  //Nav Meu
 /* $form['settings']['skin']['creatiz_nav_menu'] = array(
      '#title' => t('Nav Menu'),
      '#type' => 'select',
      '#options' => array('default' => t('Default'), 'double' => t('Double'), 'oneline'=>t('One line')),
      '#default_value' => theme_get_setting('creatiz_nav_menu', 'creatiz'),
  );*/
  //Layout
  $form['settings']['skin']['creatiz_layout'] = array(
      '#title' => t('Layout'),
      '#type' => 'select',
      '#options' => array('fullwidth' => t('Fullwidth (defaul)'), 'boxed' => t('Boxed')),
      '#default_value' => theme_get_setting('creatiz_layout', 'creatiz'),
  );
  
	$form['settings']['custom_css'] = array(
		  '#type' => 'fieldset',
		  '#title' => t('Custom CSS'),
		  '#collapsible' => TRUE,
		  '#collapsed' => FALSE,
	  );  
	$form['settings']['custom_css']['custom_css'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Custom CSS'),
		  '#default_value' => theme_get_setting('custom_css', 'creatiz'),
		  '#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	  );
	
	 //Contact settingfs
	$form['settings']['contact_pages'] = array(
		  '#type' => 'fieldset',
		  '#title' => t('Contact page'),
		  '#collapsible' => TRUE,
		  '#collapsed' => FALSE,
	  );
	$form['settings']['contact_pages']['contact_page_content'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Content'),
		  '#default_value' => theme_get_setting('contact_page_content', 'creatiz'),
		  '#description'  => t('Contents of contact page.'),
		  '#rows' => 10
	  );
	$form['settings']['contact_pages']['contact_page_address'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Address'),
		  '#default_value' => theme_get_setting('contact_page_address', 'creatiz'),
		  '#rows' => 10
		  
	  );
	//$form['#submit'][] = 'creatiz_settings_submit';	
}