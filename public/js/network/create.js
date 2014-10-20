$(document).ready(function(){
	event.preventDefault();
	
	$('form').ajaxForm({
		beforeSubmit: function(){

		},
		success: function(data, status, xhr, form){
			form.find('.form-group').removeClass('has-error');
    		form.find('.help-block').empty();
    		// Sono commentati per via della localizzazione via javascript
    		//form.find('.alert').removeClass('hide alert-danger').addClass('alert-success').html('Operation success!');

    		setTimeout(function(){
            	window.location.href = '../../';
        	}, 2000);
        	return true;
		},
		error: function(data, status, error, form){
			form.find('.form-group').removeClass('has-error');
			form.find('.help-block').empty();
			// Sono commentati per via della localizzazione via javascript
			//form.find('.alert').removeClass('hide alert-success').addClass('alert-danger').html('Ooops! Error on validation!');

			$.each(data.responseJSON, function(el, error){
				el = el.sanitize();
            	form.find('[name="'+ el +'"]').parents('.form-group').addClass('has-error');
            	form.find('[name="'+ el +'"]').parents('.form-group').find('.help-block').html(error.first());
        	});
        	return false;
		}
	});

	$('button[data-toggle="upload"]').each(function(i, e){
		if($(e).data('target')){
			var target = $('input:file[name="'+ $(e).data('target') +'"]');
			$(e).click(function(){
				target.change(function(){
					if($(e).data('container'))
						$('input:text[name="'+$(e).data('container')+'"]').val($(this).val());
				}).click();
			});
		}
	});

	// Bind data-toggle="password"
	$('button[data-toggle="password"]').each(function(i, e){
		if($(e).data('target')){
			var target = $('input[name="'+ $(e).data('target') +'"]');
			$(e).click(function(){
				if(target.attr('type') == 'text'){
					$(target).attr('type', 'password');
				}else{
					$(target).attr('type', 'text');
				}
				$(e).find('.glyphicon').toggleClass('glyphicon-eye-close')
				$(e).find('.glyphicon').toggleClass('glyphicon-eye-open')
			});
		}
	});

	/* Network tab */
	$('select#lap').change(function(){
		if($(this).val() == 0){
			$('.lap').find('input, password, select, button').removeAttr('disabled');
		}else{
			$('.lap').find('input, select, button').attr('disabled', 'disabled');
		}
	}).change();
	
	/*$('select#hotspot').change(function(){
		if($(this).val() == 1){
			$('.hotspot').find('input, password, select, button').removeAttr('disabled');
		}else{
			$('.hotspot').find('input, select, button').attr('disabled', 'disabled');
		}
	}).change();*/
});