(function () {
    $(document).ready(function () {
        if (window.location.href.match("/commissions$")) {

            $('#date1,#date2').datetimepicker({
                format: 'MM/DD/YYYY',
                widgetPositioning: {
                    vertical: 'top',
                    horizontal: 'left'
                }
            });


            $("#form_commission").validate({
                rules   : {
                    seller: {
                        required : true,
                    },
                    option: {
                        required : true,
                    },
                    date1: {
                        required: '#optionsRadios5:checked'
                    },
                    date2: {
                        required: '#optionsRadios5:checked'
                    },
                },
                messages: {
                    seller: {
                        required : 'Select a seller',
                    },
                    option: {
                        required : 'Select a calculation option',
                    },
                    date1: {
                        required : 'Select a start date',
                    },
                    date2: {
                        required : 'Select an end date',
                    },
                },
                submitHandler: function() {

                    var formData;

                    if($('input[name=option]:checked', '#form_commission').val() == "Custom") {
                        formData = {
                            seller: $('#seller').val(),
                            option: $('input[name=option]:checked', '#form_commission').val(),
                            date1: $('#date1').val(),
                            date2: $('#date2').val(),
                            csrf_test_name: $.cookie('csrf_cookie_name')
                        };

                    } else {
                        formData = {
                            seller: $('#seller').val(),
                            option: $('input[name=option]:checked', '#form_commission').val(),
                            csrf_test_name: $.cookie('csrf_cookie_name')
                        };
                    }


                    var rq = $.ajax({
                        url: window.location.origin + "/commissions/calculate",
                        method: "POST",
                        data: formData,
                        dataType: 'json',
                        // encode: true                    
                    });

                    rq.success(function(data) {
                        $('#result').removeClass('hideme');

                        $('#result-seller').html(data.seller);
                        $('#result-option').html(data.option);
                        $('#result-total').html("$" + Number(data.total).toFixed(2));
                        $('#result-commission').html("$" + Number(data.commission).toFixed(2));
                    });      

                    rq.fail(function(jqXHR, textStatus) {
                        console.log("Request failed: " + textStatus);
                    });
                },
                errorElement : 'div',
                errorLabelContainer: '.errors',
                errorClass: 'help-block',
            }); 

            $('#seller').autocomplete({
                serviceUrl: '/commissions/sellers',
                onSelect: function (suggestion) {
                    // alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
                }
            });

            // if click the last radio button, 'custom'
            $("input:radio:last").click(function(){
                $("#custom_dates").removeClass('hideme');
            });

            //Any other hides the custom dates
            $("input:radio:not(:last)").click(function(){
                $("#custom_dates").addClass('hideme');
            });
        }
    });
})();
