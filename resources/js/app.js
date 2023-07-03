import './bootstrap';



document.addEventListener("DOMContentLoaded", function() {
    let loginLink = document.getElementById("loginLink");
    let registerLink = document.getElementById("registerLink");
    let loginModal = document.getElementById("login-modal");
    let registerModal = document.getElementById("registration-modal");
    let modalWrapper = document.getElementById("modalWrapper");
    let overlay = document.getElementById("overlay");
  
    loginLink.addEventListener("click", function(event) {
      event.preventDefault();
      showModal(loginModal);
    });
  
    registerLink.addEventListener("click", function(event) {
      event.preventDefault();
      hideModal(loginModal);
      showModal(registerModal);
    });
  
    overlay.addEventListener("click", function() {
      hideModal(loginModal);
      hideModal(registerModal);
    });
  
    function showModal(modal) {
      modal.style.display = "block";
      modalWrapper.style.display = "flex";
      overlay.style.display = "block";
    }
  
    function hideModal(modal) {
      modal.style.display = "none";
      modalWrapper.style.display = "none";
      overlay.style.display = "none";
    }
});



const slider = document.querySelector('.slider');
const sliderWrapper = document.querySelector('.slider__wrapper');
const slides = document.querySelectorAll('.slide');
const slideWidth = slides[0].offsetWidth;
  
let currentSlide = 0;
  
function goToSlide(slide) {
    sliderWrapper.style.transform = `translateX(-${slide * slideWidth}px)`;
    currentSlide = slide;
}
  
function nextSlide() {
    if (currentSlide === slides.length - 1) {
      // если текущий слайд последний, то переходим на первый слайд
      goToSlide(0);
    } else {
      // иначе переходим на следующий слайд
      goToSlide(currentSlide + 1);
    }
}
  
  // автоматически переключаем слайды каждые 3 секунды
setInterval(nextSlide, 3000);
  
  // запускаем слайдер
goToSlide(0);