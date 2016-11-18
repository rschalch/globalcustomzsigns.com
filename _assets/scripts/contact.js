(function () {
	$(document).ready(function () {
		$("#form-mail").validate({
			rules   : {
				name: {
					required : true,
					maxlength: 20
				},
				phone: {
					required : true,
					maxlength: 18
				},
				email: {
					required : true,
					maxlength: 30,
					email: true
				},
				subject: {
					required : true,
					maxlength: 20
				},
				message: {
					required : true,
					maxlength: 400
				}
			},
			messages: {
				name: {
					required : 'Field required',
					maxlength: 'Max {0} characters'
				},
				phone: {
					required : 'Field required',
					maxlength: 'Max {0} characters'
				},
				email: {
					required : 'Field required',
					maxlength: 'Max {0} characters',
					email: 'Must be a valid e-mail!'
				},
				subject: {
					required : 'Field required',
					maxlength: 'Max {0} characters'
				},
				message: {
					required : 'Field required',
					maxlength: 'Max {0} characters'
				}
			}
		});
	});
})();