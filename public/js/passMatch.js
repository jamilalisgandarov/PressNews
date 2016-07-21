jQuery(document).ready(function($) {
	$('#password2').focusout(function(event) {
		if($(this).val()!='' && $('#password').val()!=''){
			if($(this).val()!=$('#password').val()){
				$('#submit').attr('disabled','');
				$('#notification').text('Passwords do not match');
			}
			else(
				$('#submit').removeAttr('disabled')
			)
		}
		else(
				$('#submit').attr('disabled','')
		)
	});
});