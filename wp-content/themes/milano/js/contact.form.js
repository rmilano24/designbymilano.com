jQuery(function() {

	"use strict";

	jQuery('.contact-form').on("submit", function(){
		var jQuerythis = jQuery(this);
						   
		jQuery('.invalid').removeClass('invalid');						   
		var msg = 'The following fields should be filled:',
			successTitle = jQuerythis.data('title'),
			successMessage = jQuerythis.data('message'),
			error = 0;


		if (jQuery.trim(jQuerythis.find('input[name="name"]').val()) === '') {
			error = 1;
			jQuerythis.find('input[name="name"]').parent().addClass('invalid');
			msg = msg + '\n - Name';
		}
		if (jQuery.trim(jQuerythis.find('input[name="email"]').val()) === '') {
			error = 1;
			jQuerythis.find('input[name="email"]').parent().addClass('invalid');
			msg = msg + '\n - Email';
		}
		if (jQuery.trim(jQuerythis.find('textarea[name="message"]').val()) === '') {
			error = 1;
			jQuerythis.find('textarea[name="message"]').parent().addClass('invalid');
			msg = msg + '\n - Your Message';
		}
	
        if (error){
        	updateTextPopup('ERROR', msg);
        }else{
            var name = jQuery.trim(jQuerythis.find('input[name="name"]').val()),
            	email = jQuery.trim(jQuerythis.find('input[name="email"]').val()),
            	subject = (jQuerythis.find('input[name="subject"]').length)?jQuery.trim(jQuerythis.find('input[name="subject"]').val()):'',
            	message = jQuery.trim(jQuerythis.find('textarea[name="message"]').val());

            jQuery.post(fwAjaxUrl, {'action': 'modesto_send_message', 'name': name, 'email': email, 'subject': subject, 'message': message},
                function(){
                    updateTextPopup(successTitle, successMessage);
                    jQuerythis.append('<input type="reset" class="reset-button"/>');
                    jQuery('.reset-button').click().remove();
                    jQuerythis.find('.focus').removeClass('focus');
                });
        }
	  	return false;
	});

	jQuery(document).on('keyup', '.input-wrapper .input', function(){
		jQuery(this).parent().removeClass('invalid');
	});

	function updateTextPopup(title, text){
		jQuery('.text-popup .text-popup-title').text(title);
		jQuery('.text-popup .text-popup-message').text(text);
		jQuery('.text-popup').addClass('active');
	}

});