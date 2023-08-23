/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/AddLike.js ***!
  \*********************************/
$(document).ready(function () {
  $('.like_button').on('click', function (e) {
    e.preventDefault();
    var productId = $(this).closest('.like_form').find('#like_product_id').val();
    var like_token = $("#like_token").val();
    var like_button = $(this);
    var like_icon = like_button.find('.like-icon');

    // alert(like_token);
    // alert(productId)

    $.post('/' + productId + '/likes', {
      product_id: productId,
      _token: like_token
    }, function (response) {
      if (response.success) {
        if (like_icon.css('color') === 'rgb(255, 165, 0)') {
          like_icon.css('color', '#b4b4b4');
        } else {
          like_icon.css('color', 'rgb(255, 165, 0)');
        }
      }
    });
  });
});
/******/ })()
;