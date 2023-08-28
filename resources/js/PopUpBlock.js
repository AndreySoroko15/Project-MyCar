$(document).ready(function () {
    $('#pop-up-form-button').on('click', function() {
        $('.pop-up-block').fadeIn();
        $('.product-section').animate({ opacity: 0.4 }, 500);
    })

    $('.close-xmark').on('click', function() {
        $('.pop-up-block').fadeOut();
        $('.product-section').animate({ opacity: 1 }, 500);
    });
})