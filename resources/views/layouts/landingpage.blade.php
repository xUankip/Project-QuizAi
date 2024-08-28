<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('/layout-css/landingpage.css')}}" />
</head>
<body>
<div class="container">
    <nav>
        <ul class="nav__links nav__left">
            <li><a href="{{route('user.404landingpage')}}" class="logo">Quiz AI</a></li>
        </ul>
        <ul class="nav__links nav__right">
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
        </ul>
    </nav>
    <span class="letter-s">AI</span>
    <img src="/images/img7.png" alt="header" />
    <h4 class="text__left">QU</h4>
    <h4 class="text__right">IZ</h4>
    <a href="{{route('login')}}"><button class="btn explore" >START EXPLORE</button></a>
{{--    <button class="btn print">CREATE</button>--}}
{{--    <button class="btn catalog">GAMES</button>--}}
    <h5 class="feature-1">Simplify</h5>
    <h5 class="feature-2">Innovate</h5>
    <h5 class="feature-3">Intelligence</h5>
    <h5 class="feature-4">Automate</h5>
    <footer class="footer">
        <p>Desgin and Develop by Aptech's students</p>
        <div class="footer__links">
            <li><a href="{{route('user.404landingpage')}}">Facebook</a></li>
            <li><a href="{{route('user.404landingpage')}}">Instagram</a></li>
            <li><a href="{{route('user.404landingpage')}}">Twitter</a></li>
        </div>
    </footer>
</div>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="{{ asset('/js/landingpage.js') }}"></script>
</body>
</html>
