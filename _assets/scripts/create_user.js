(function() {
  $(document).ready(function() {

    if (window.location.href.match("/auth/create_user$")) {

      $("#form-create-user").validate({
        rules: {
          email: {
            required: true,
            maxlength: 50,
            email: true
          },
          password: {
            required: true,
            minlength: 8,
          },
          password_confirm: {
            equalTo: "#password"
          }
        },
        messages: {
          email: {
            required: 'Field required',
            maxlength: 'Max {0} characters',
            email: 'Must be a valid e-mail!'
          }
        },
        highlight: function(element) {
          $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
          $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
          if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
          } else {
            error.insertAfter(element);
          }
        },
      });
    }
  });
})();
