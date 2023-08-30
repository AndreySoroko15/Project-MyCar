/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/SendCallRequest.js ***!
  \*****************************************/
$(document).ready(function () {
  $('.form-call-request').submit(function (e) {
    // e.preventDefault();

    var _token = $("#_token").val();
    var formData = {
      name: $('input[name=name]').val(),
      email: $('input[name=email]').val(),
      phone: $('input[name=phone]').val(),
      car_id: $('input[name=car_id]').val()
    };
    $.ajax({
      method: 'POST',
      url: 'http://mycar/call-request-form',
      headers: {
        'X-CSRF-TOKEN': _token
      },
      data: formData,
      success: function success() {
        $('.pop-up-block').fadeOut();
        $('.product-section').animate({
          opacity: 1
        }, 500);
      }
    });
  });
});
/******/ })()
;