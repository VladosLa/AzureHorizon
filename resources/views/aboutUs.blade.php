<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <link rel="stylesheet" href="{{ mix('/css/styles.css') }}">
</head>
<body>
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
        <article class="aboutus">
            <div class="container">
                <div class="aboutus__wrapper">
                    <h1 class="aboutus__title">About Us</h1>
                    <p class="aboutus__text">Amet minim mollit non deserunt ullamco est
                        sit aliqua dolor do amet sint. Velit officia
                        consequatduis enim.
                    </p>
                </div>
                <div class="aboutus__content-wrapper">
                    <div class="aboutus__info">
                        <img src="{{ ('/img/manager.png') }}" alt="" class="aboutus__pic">
                        <span class="aboutus__name">Dmitry Kurtsev (Manager)</span>
                    </div>
                    <p class="aboutus__info-text">
                        Our guests can expect an amazing journey to Bali! Azure Horizon hotel is located in the heart of the island, close to beautiful beaches and local attractions. We offer comfortable rooms equipped with everything you need for a pleasant stay, as well as various services to make your time in Bali unforgettable.
                        Our hotel provides a wide range of services including a pool and spa center where you can relax after a busy day exploring Bali's culture and nature. Our clients can also order airport transfers, island tours, and other services to make their stay more convenient and carefree.
                        Our staff is friendly and professional, always ready to help you with any questions regarding your stay. We strive to create a homely atmosphere in our hotel so that you feel at home.
                        We would be happy to welcome you to the Azure Horizon hotel in Bali!
                    </p>
                </div>
            </div>
        </article>
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
</body>
</html>