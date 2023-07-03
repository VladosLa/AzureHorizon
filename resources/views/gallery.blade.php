<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
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
        <article class="gallery">
            <div class="container">
                <div class="gallery__wrapper">
                    <h1 class="gallery__title">Take a tour of Azure Horizon</h1>
                    <p class="gallery__text">
                        Amet minim mollit non deserunt ullamco est
                        sit aliqua dolor do amet sint. Velit officia
                        consequatduis enim.
                    </p>
                </div>
                <img src="{{ ('/img/gallery.png') }}" alt="" class="gallery__pic">
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
    <script src="{{ ('/js/app.js') }}"></script>
</body>
</html>