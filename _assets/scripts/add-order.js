(function() {
  $(document).ready(function() {

    if (window.location.href.match("/orders/add$")) {

      $.validator.addMethod("email_with_dot", function(value, element) {
        return this.optional(element) || (/^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}$/.test(value) && /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/.test(value));
      }, 'Please enter valid email address.');

      $("#form-add-order").validate({
        rules: {
          client: {
            required: true,
            maxlength: 45
          },
          client_address: {
            required: true,
            maxlength: 45
          },
          client_email: {
            required: true,
            maxlength: 45,
            email_with_dot: true
          },
          client_phone: {
            required: true,
            maxlength: 25,
            phoneUS: true
          },
          work: {
            required: true
          },
          work_description: {
            required: true,
            maxlength: 400
          },
          logo: {
            required: true
          },
          logo_delivery_date: {
            date: true
          },
          pay_method: {
            required: true
          },
          pay_total: {
            required: true,
            number: true
          },
          deposit: {
            required: true,
            number: true
          },
          balance: {
            required: true,
            number: true
          },
        },

        messages: {
          client: {
            required: 'Field required',
            maxlength: 'Max {0} characters'
          },
          client_address: {
            required: 'Field required',
            maxlength: 'Max {0} characters'
          },
          client_email: {
            required: 'Field required',
            maxlength: 'Max {0} characters',
            email: 'Please enter a valid email address'
          },
          client_phone: {
            required: 'Field required',
            maxlength: 'Max {0} characters'
          },
          work_description: {
            required: 'Field required',
            maxlength: 'Max {0} characters'
          },
          logo_delivery_date: {
            date: 'Please enter a valid date'
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

      $('#datetimepicker1').datetimepicker({
        format: 'MM/DD/YYYY'
      });

      $('#logo_delivery_date').click(function() {
        $('#datetimepicker1').data("DateTimePicker").show();
      });
    }
  });
})();
