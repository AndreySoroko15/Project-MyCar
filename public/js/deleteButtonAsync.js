/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/deleteButtonAsync.js ***!
  \*******************************************/
$(document).ready(function () {
  $('.delete_button').on('click', function (e) {
    e.preventDefault();
    var button = $(this);
    var id = $(this).closest('.form-delete').find('#call_request_id').val();
    var _token = $(this).closest('.form-delete').find('#_token').val();

    // let url = 'http://mycar/admin/call-request/' + id;

    // alert(url);

    $.ajax({
      url: 'http://mycar/admin/call-request/' + id,
      type: 'POST',
      data: {
        '_method': 'DELETE',
        '_token': _token
      },
      success: function success() {
        // alert('удалено')
        button.closest('.cortege').remove();
      },
      error: function error(xhr) {
        // console.log(_token);
        console.log(xhr.responseText);
      }
    });
  });
});
/******/ })()
;