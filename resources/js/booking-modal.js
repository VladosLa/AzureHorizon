document.addEventListener('DOMContentLoaded', function() {
    // Открытие модального окна при нажатии на кнопку "Book Now"
    var button = document.querySelector('.button');
    button.addEventListener('click', function() {
    var modal = document.querySelector('#bookingModal');
    modal.style.display = 'block';
    });

    // Закрытие модального окна при нажатии на кнопку "Close"
    var closeButton = document.querySelector('.close-button');
    closeButton.addEventListener('click', function() {
    var modal = document.querySelector('#bookingModal');
    modal.style.display = 'none';
    });
});

