<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('/layout-css/404page.css')}}">
</head>
<body>
<header class="header">
    <nav class="nav container">
        <a href="#" class="nav__logo">
            Quiz AI
        </a>

        <div class="nav__menu" id="nav-menu">
            <div class="nav__close" id="nav-close">
                <i class='bx bx-x'></i>
            </div>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-grid-alt'></i>
        </div>
    </nav>
</header>

<main class="main">
    <section class="home">
        <div class="home__container container">
            <div class="home__data">
                <h1 class="home__subtitle">Error 404</h1>
                <h1 class="home__title">Hey Buddy</h1>
                <p class="home__description">
                    The feature is currently under development. <br> Please wait for the next update.
                </p>
                <a href="{{route('home')}}" class="home__button">
                    Go Home
                </a>
            </div>

            <div class="home__img">
                <img src="/images/img8.png" alt="">
                <div class="home__shadow"></div>
            </div>
        </div>

        <footer class="home__footer">
            <span>Quiz AI create by Aptech's students</span>
        </footer>
    </section>
</main>

<script src="{{asset('/js/404page.js')}}"></script>
</body>
</html>

