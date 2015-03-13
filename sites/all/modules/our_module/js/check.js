jQuery(document).ready(function(){
	
	jQuery("#edit-field-isrelax-und-true:checkbox").change(function(){
		if(jQuery(this).is(':checked')) {
			jQuery('#field-task-add-more-wrapper').hide(500);
			jQuery('#edit-field-addition-und-ajax-wrapper').hide(500);
			if(jQuery('textarea#edit-field-task-und-0-value').text()==''){
				setTimeout(function() {
					jQuery('textarea#edit-field-task-und-0-value').text('nothing');
				}, 500);

				
			}
		}
		else{
			jQuery('#field-task-add-more-wrapper').show(500);
			jQuery('#edit-field-addition-und-ajax-wrapper').show(500);
			if(jQuery('textarea#edit-field-task-und-0-value').text()=='nothing'){
				jQuery('textarea#edit-field-task-und-0-value').text('');
			}
		}
	});
	
	if(jQuery('#edit-field-isrelax-und-true:checkbox').is(':checked')){
		jQuery('#field-task-add-more-wrapper').hide();
		jQuery('#edit-field-addition-und-ajax-wrapper').hide();
	}
});