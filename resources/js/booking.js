document.getElementById('myBookingsToggle').addEventListener('click', function() {
    var bookingsContent = document.getElementById('myBookingsContent');
    if (bookingsContent.innerHTML.trim() === '') {
        fetchBookings();
    } else {
        bookingsContent.innerHTML = '';
    }
});

function fetchBookings() {
    fetch('/bookings')
        .then(response => response.text())
        .then(data => {
            var bookingsContent = document.getElementById('myBookingsContent');
            bookingsContent.innerHTML = data;
        })
        .catch(error => console.error(error));
}


