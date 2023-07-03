/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/booking.js ***!
  \*********************************/
document.getElementById('myBookingsToggle').addEventListener('click', function () {
  var bookingsContent = document.getElementById('myBookingsContent');
  if (bookingsContent.innerHTML.trim() === '') {
    fetchBookings();
  } else {
    bookingsContent.innerHTML = '';
  }
});
function fetchBookings() {
  fetch('/bookings').then(function (response) {
    return response.text();
  }).then(function (data) {
    var bookingsContent = document.getElementById('myBookingsContent');
    bookingsContent.innerHTML = data;
  })["catch"](function (error) {
    return console.error(error);
  });
}
/******/ })()
;