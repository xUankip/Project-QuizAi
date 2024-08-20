<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('layout-css/mygame.css') }}">
    <title>Demo Admin Page-QuizAI</title>
</head>

<body>
<div class="container">
    <!-- Sidebar Section -->
    <aside>
        <div class="toggle">
            <div class="logo">
                <h2>Quiz<span class="danger">AI</span></h2>
            </div>
            <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
            </div>
        </div>

        <div class="sidebar">
            <a href="#">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                <h3>Home</h3>
            </a>
            <a href="#" class="active">
                    <span class="material-icons-sharp">
                        sports_esports
                    </span>
                <h3>My Games</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        add
                    </span>
                <h3>Create</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        search
                    </span>
                <h3>Search</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                <h3>Reports</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                <h3>Settings</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                <h3>Logout</h3>
            </a>
        </div>
    </aside>
    <!-- End of Sidebar Section -->

    {{--CONTENT--}}
    <div class="main-content">
        @foreach($topic as $topics)
            <form action="{{route('saveId')}}" method="post">
                @csrf
                <div class="parent">
                    <input value="topic" name="type" type="hidden">
                    <input name="type_id" value="{{$topics->id}}" type="hidden">
                    <div class="card">
                        <div class="content-box">
                            <h1 class="card-topic">{{$topics->description}}</h1>
                            <p class="card-description">
                                {{$topics->name}}
                            </p>
                                <button style="background-color: transparent; border : none" type="submit" class="play">Show Detail</button>
                        </div>
                        <div class="qr-box">
                            <img src="{{$topics->thumbnail_url}}" alt="">
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
        {!!$topic->links()!!}
    </div>
    {{--END CONTENT--}}

    <!-- Right Section -->
    <div class="right-section">
        <div class="nav">
            <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
            </button>

            <div class="profile">
                <div class="info">
                    <p>Hey, <b>Tuan Anh</b></p>
                </div>
                <div class="profile-photo">
                    <img src="/images/img6.png">
                </div>
            </div>

        </div>
        <!-- End of Nav -->
    </div>
    <!-- End Right Section -->
</div>
<script src="{{ asset('js/detail.js') }}"></script>
</body>
</html>
