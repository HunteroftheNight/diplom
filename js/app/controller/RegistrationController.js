var app = app || {};
	app.Controller = app.Controller || {};
	
app.Controller.RegisterController = (function($) {
	
	var app = this;
	
	function init() {
		
		setUpListeners();
		
	}
	
	function validateFormRegistration(form) {
		$.ajax({
			url: $(form).attr('action'),
			type: $(form).attr('method'),
			data: $(form).serialize(),
			dataType: 'json',
			success: function(response) {
				for (var key in response.errors) {
					alert(response.errors[key]['error']);
				}

				if (!response.errors.length) location.href = '/auth.php';
			}
		});

		// Вывод ошибок
	}
	
	function setUpListeners() {
		
		$('#modal_registration form').on('submit', function(e) {
			e.preventDefault();
			
			validateFormRegistration(this);
		});
		
	}
	
	return {
		init: init
	}
	
}).call(this, jQuery);

$(function() {
	 app.Controller.RegisterController.init();
});