<?php
function maxx_breadcrumb($variables) {
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs = '<ul class="breadcrumbs">';
		foreach($breadcrumb as $value) {
			$crumbs .= '<li>'.$value.'</li>';
		}
		$crumbs .= '<li>'.drupal_get_title().'</li>';
		$crumbs .= '</ul>';
		return $crumbs;
	}else{
		return NULL;
	}
  
}

function maxx_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#title'] = NULL; // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#default_value'] = t('Text to search'); // Set a default value for the textfield
    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Text to search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Text to search') {this.value = '';}";
    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Text to search'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t('');
  }
  if($form_id=='message'){
      $form['message']['#resizable'] = FALSE;
  }
} 

function maxx_preprocess_image(&$variables) {
  if(isset($variables['style_name'])) {
    if($variables['style_name'] == 'slider') {
      $variables['attributes']['class'][] = "random";
    }
  }
  //var_dump($variables);
}
function maxx_preprocess_page(&$vars, $hook) {
    if (isset($vars['node'])) {
        $suggest = "page__node__{$vars['node']->type}";
        $vars['theme_hook_suggestions'][] = $suggest;
    }
}
function maxx_textarea($variables) {
  $element = $variables['element'];
  $element['#attributes']['name'] = $element['#name'];
  $element['#attributes']['id'] = $element['#id'];
  $element['#attributes']['cols'] = $element['#cols'];
  $element['#attributes']['rows'] = $element['#rows'];
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}