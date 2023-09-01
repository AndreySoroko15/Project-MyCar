$(document).ready(function() {
    $('.like-icon-guest').on('click', function(e) {
        e.preventDefault();
        $('.guest-like-block').fadeIn();
        $('.wrapper').animate({ opacity: 0.4}, 500);
    })

    $('.close-xmark').on('click', function() {
        $('.guest-like-block').fadeOut();
        $('.wrapper').animate({ opacity: 1}, 500);
    })
})