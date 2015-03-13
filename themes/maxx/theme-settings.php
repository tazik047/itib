<?php
function maxx_form_system_theme_settings_alter(&$form, $form_state) {

  $theme_path = drupal_get_path('theme', 'maxx');
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
      '#default_value' => theme_get_setting('general_setting_tracking_code', 'maxx'),
  );
  
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
          '3' => 'Portfolio - 3cols',
          '4' => 'portfolio - 4cols',
		  '5' => 'portfolio - 5cols',
      ),
      '#default_value' => theme_get_setting('default_portfolio', 'maxx'),
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
      '#default_value' => theme_get_setting('footer_copyright_message', 'maxx'),
  );

  $form['settings']['skin'] = array(
      '#type' => 'fieldset',
      '#title' => t('Skin settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );
  $form['settings']['skin']['built_in_skins'] = array(
      '#title' => t('Built-in Skins'),
      '#type' => 'select',
      '#options' => array('skin-default.css' => t('Default'), 'skin-black.css' => t('Blank'), 'skin-blue.css' => t('Blue'), 'skin-brown.css' => t('Brown'), 'skin-green.css' => t('Green'), 'skin-orange.css' => t('Orange'), 'skin-violet.css' => t('Violet')),
      '#default_value' => theme_get_setting('built_in_skins', 'maxx'),
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
		  '#default_value' => theme_get_setting('custom_css', 'maxx'),
		  '#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
		  //'#options' => array()
	  );
}
