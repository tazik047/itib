<?php

function novelty_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['novelty_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('novelty Theme Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );


 $form['novelty_settings']['general_settings']['novelty_boxed'] = array(
    '#type' => 'checkbox',
    '#title' => t('Boxed Layout?'),
    '#default_value' => theme_get_setting('novelty_boxed', 'novelty'),
    '#description' => t("Check for yes!"),
  );
  



}
