
$(document).ready(function () {
    $('.form-call-request').submit(function(e) {
        e.preventDefault();

        let _token =$("#_token").val();
        let formData = {
            name: $('input[name=name]').val(),
            email: $('input[name=email]').val(),
            phone: $('input[name=phone]').val(),
            car_id: $('input[name=car_id]').val(),
        }

        $.ajax({
            method: 'POST', 
            url: 'http://mycar/call-request', 
            headers: {
                'X-CSRF-TOKEN': _token
            },
            data: formData,
            success: function() {
                $('.pop-up-block').fadeOut();
                $('.product-section').animate({ opacity: 1 }, 500);
            },
            error: {
                
            }

        })
    })
  })