<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Azure Horizon</title>
    <link rel="stylesheet" href="{{ mix('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/booking-modal.css') }}">
</head>
<body>
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="bookingModalLabel">Add Booking</h5>
              <button type="button" class="close-button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="bookingForm" action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <label for="startDate">Start Date</label>
                      <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="form-group">
                      <label for="endDate">End Date</label>
                      <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>
                    <div class="form-group">
                      <label for="roomNumber">Room Number</label>
                        <select class="form-control" id="roomNumber" name="roomNumber">
                            @include('rooms-select')
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="saveBookingBtn">Book Now</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>      
    <div class="modal-wrapper" id="modalWrapper">
        <div class="modal" id="login-modal">
            <h2 class="modal__title">LogIn to <span class="modal__title-span">Azure Horizon</span></h2>
            <form action="{{ route('login') }}" method="post" class="modal__form">
                @csrf
                <label for="email" class="modal__label">Email</label>
                <input type="email" name="email" id="email" class="modal__input">
                <label for="password" class="modal__label">Password</label>
                <input type="password" name="password" id="password" class="modal__input">
                <button class="modal__hide-btn"><img src="{{ ('/img/hide-password.svg') }}" alt=""></button>
                <button type="submit" class="modal__login-btn">Log In</button>
            </form>
            <div class="modal__reg-btn-wrapper">
                <button class="modal__reg-btn" id="registerLink">Don’t have an account? <span class="modal__reg-span">SignIn</span></button>
            </div>
        </div>        
        <div class="modal" id="registration-modal">
            <h2 class="modal__title">Join to Azure Horizon</h2>
            <form action="{{ route('register') }}" method="post" class="modal__form">
                @csrf
                <label for="" class="modal__label">Name</label>
                <input type="text" name="guest_name" id="" class="modal__input" required>
                <label for="" class="modal__label">Email</label>
                <input type="email" name="guest_email" id="" class="modal__input" required>
                <label for="" class="modal__label">Password</label>
                <input type="password" placeholder="at least 8 symbols" type="hidden" name="guest_password" required class="modal__input">
                <button class="modal__hide-btn"><img src="{{ ('/img/hide-password.svg') }}" alt=""></button>
                <button type="submit" class="modal__login-btn">Sign In</button>
            </form>
        </div>
    </div>
    <div class="overlay" id="overlay"></div>
    <header>
        <nav class="nav">
            <a href="{{ route('index') }}">
                <img src="{{ asset('/img/Logo.svg') }}" alt="" class="nav__logo">
            </a>
            <ul class="nav__list">
                <li class="nav__list-item"><a href="{{ route('gallery') }}" class="nav__list-link">Gallery</a></li>
                <li class="nav__list-item"><a href="{{ route('room') }}" class="nav__list-link">Rooms</a></li>
                <li class="nav__list-item"><a href="{{ route('addService') }}" class="nav__list-link">Servies</a></li>
                <li class="nav__list-item"><a href="{{ route('aboutUs') }}" class="nav__list-link">About Us</a></li>
                @if (auth()->check())
                    <!-- Ссылка на личный кабинет -->
                    <li class="nav__list-item">
                        <a href="{{ route('user') }}" class="nav__list-link">Account</a>
                    </li>
                @else
                    <!-- Ссылка на вход в аккаунт -->
                    <li class="nav__list-item">
                        <a href="{{ route('login') }}" class="nav__list-link" id="loginLink">LogIn</a>
                    </li>
                @endif
                @auth
                <li class="nav__list-item">
                    <a href="{{ route('logout') }}" class="nav__list-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth          
            </ul>
        </nav>
    </header>
    <main>
        <script>
            // Проверяем наличие сообщения об ошибке в сессии
            var errorMessage = "{{ session('error') }}";
            if (errorMessage) {
                // Отображаем сообщение об ошибке с помощью метода alert
                alert(errorMessage);
            }
        </script>
        <section class="hero">
            <div class="container">
                <div class="hero__wrapper">
                    <div>
                        <h1 class="hero__title">
                            Welcome to Azure Horizon: Discover Endless Tranquility
                        </h1>
                        <p class="hero__text">
                            Every moment feels like the first time in Azure Horizon
                        </p>
                    </div>
                    <button class="button" data-toggle="modal" data-target="#bookingModal">Book Now</button>
                </div>
            </div>
            <div class="slider">
                <div class="slider__wrapper">
                    <img src="{{ ('/img/slide-hero.png') }}" alt="" class="slide">
                    <img src="{{ ('/img/slide-hero2.png') }}" alt="" class="slide">
                    <img src="{{ ('/img/slide-hero3.png') }}" alt="" class="slide">
                </div>
            </div>                  
        </section>
        <section class="facilities">
            <div class="container">
                <h2 class="facilities__title">Our Facilities</h2>
                <p class="facilities__text">We offer modern (5 star) hotel facilities for your comfort.</p>
                <div class="facilities__wrapper">
                    <div class="facilities__card">
                        <img src="{{ ('/img/swim.svg') }}" alt="" class="facilities__pic">
                        <span class="facilities__name">Swimming Pool</span>
                    </div>
                    <div class="facilities__card">
                        <img src="{{ ('/img/chiken.svg') }}" alt="" class="facilities__pic">
                        <span class="facilities__name">Breakfast</span>
                    </div>
                    <div class="facilities__card">
                        <img src="{{ ('/img/dumbbell.svg') }}" alt="" class="facilities__pic">
                        <span class="facilities__name">Gym</span>
                    </div>
                    <div class="facilities__card">
                        <img src="{{ ('/img/light.svg') }}" alt="" class="facilities__pic">
                        <span class="facilities__name">24/7 Light</span>
                    </div>
                    <div class="facilities__card">
                        <img src="{{ ('/img/resort.svg') }}" alt="" class="facilities__pic">
                        <span class="facilities__name">Resort & Spa</span>
                    </div>
                    <div class="facilities__card">
                        <img src="{{ ('/img/wi-fi.svg') }}" alt="" class="facilities__pic">
                        <span class="facilities__name">Free WIFI</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="apartments">
            <div class="container">
                <h2 class="apartments__title">Apartments</h2>
                <p class="apartments__text">All room are design for your comfort</p>
                <div class="apartments__wrapper">
                    <div class="apartments__card-wrapper">
                        <div class="apartments__card">
                            <img src="{{ ('/img/bed1.png') }}" alt="" class="apartments__pic">
                            <span class="apartments__atribute">3 GUESTS</span>
                            <h4 class="apartments__card-subtitle">Room with View</h4>
                        </div>
                        <div class="apartments__card">
                            <img src="{{ ('/img/bed2.png') }}" alt="" class="apartments__pic">
                            <span class="apartments__atribute">3 GUESTS</span>
                            <h4 class="apartments__card-subtitle">Room with View</h4>
                        </div>
                    </div>
                    <div class="apartments__card">
                        <img src="{{ ('/img/bed3.png') }}" alt="" class="apartments__pic">
                        <span class="apartments__atribute">3 GUESTS</span>
                        <h4 class="apartments__card-subtitle">Room with View</h4>
                    </div>
                    <div class="apartments__card-wrapper">
                        <div class="apartments__card">
                            <img src="{{ ('/img/bed2.png') }}" alt="" class="apartments__pic">
                            <span class="apartments__atribute">3 GUESTS</span>
                            <h4 class="apartments__card-subtitle">Room with View</h4>
                        </div>
                        <div class="apartments__card">
                            <img src="{{ ('/img/bed1.png') }}" alt="" class="apartments__pic">
                            <span class="apartments__atribute">3 GUESTS</span>
                            <h4 class="apartments__card-subtitle">Room with View</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="review">
            <div class="container">
                <h2 class="review__title">Reviews</h2>
                <div class="review__wrapper">
                    
                </div>
                <form action="" method="post" class="review__form">
                    <textarea id="review" name="textarea" rows="10" class="review__input" placeholder="Comment text"></textarea><br>
                    <button type="submit" class="button-submit">Submit</button>
                </form>
            </div>
        </section>
        <section class="map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0d6e56b13a5dbd3f583c564ea345e15f005c0f814dda0a636ebc2d9c6ad4584d&amp;width=100%25&amp;height=580&amp;lang=ru_RU&amp;scroll=true"></script>
        </section>
    </main>
    <footer>
        <div class="container">
            <div class="footer">
                <div class="footer__item">
                    <ul class="footer__list">
                        <li class="footer__list-item"><h3 class="footer__list-title">Quick link</h3></li>
                        <li class="footer__list-item"><a href="" class="footer__list-link">Gallery</a></li>
                        <li class="footer__list-item"><a href="" class="footer__list-link">Services</a></li>
                        <li class="footer__list-item"><a href="" class="footer__list-link">About us</a></li>
                        <li class="footer__list-item"><a href="" class="footer__list-link">Login</a></li>
                    </ul>
                </div>
                <div class="footer__item">
                    <h2 class="footer__title">Get in Touch</h2>
                    <p class="footer__text">Amet minim mollit non deserunt ullamco est
                        sit aliqua dolor do amet sint.
                    </p>
                    <form action="" class="footer__form">
                        <input type="text" placeholder="Enter email" class="footer__input">
                        <button type="submit" class="button-submit">Book Now</button>
                    </form>
                </div>
                <div class="footer__item">
                    <ul class="footer__list">
                        <li class="footer__list-item"><h3 class="footer__list-title">Useful</h3></li>
                        <li class="footer__list-item"><a href="" class="footer__list-link">Privacy policy</a></li>
                        <li class="footer__list-item"><a href="" class="footer__list-link">Legal</a></li>
                        <li class="footer__list-item"><a href="" class="footer__list-link">FAQ</a></li>
                        <li class="footer__list-item"><a href="" class="footer__list-link">Blogs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ ('/js/app.js') }}"></script>
    <script src="{{ ('/js/booking-modal.js') }}"></script>
</body>
</html>