/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/DeleteFav.js ***!
  \***********************************/
$(document).ready(function () {
  $('.delete_fav_button').on('click', function (e) {
    e.preventDefault();
    var productId = $(this).closest('.delete_fav_form').find('#delete_product_id').val();
    var delete_token = $('#delete_token').val();
    var button = $(this);

    // alert(productId)

    $.ajax({
      method: 'POST',
      url: 'http://mycar/delete-fav-car-' + productId,
      headers: {
        'X-CSRF-TOKEN': delete_token
      },
      error: function error() {
        alert('ошибка');
      }
    }).done(function () {
      button.closest('.car_card').remove();
      updatedFavCount();
    }.bind(this)); //bind - для привязки this к элементу, на который ссылаюсь (используется для фиксации this в методе объекта, чтобы передать его в качестве коллбека)
  });
});

function updatedFavCount() {
  $.ajax({
    method: 'GET',
    url: 'http://mycar/fav-cars-count',
    success: function success(result) {
      var parse_res = JSON.parse(result);
      $('#fav-count').text(parse_res);
    }
  });
}
/******/ })()
;