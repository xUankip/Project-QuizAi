{{--@extends('layouts.index-user')--}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('layout-css/generate.css') }}">
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
            <a href="{{route('homeUser')}}">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                <h3>Home</h3>
            </a>
            <a href="{{route('topic')}}" >
                    <span class="material-icons-sharp">
                        sports_esports
                    </span>
                <h3>My Games</h3>
            </a>
            <a href="{{route('showForm')}}">
                    <span class="material-icons-sharp">
                        add
                    </span>
                <h3>Create</h3>
            </a>
            <a href="{{route('user.404')}}">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                <h3>Reports</h3>
            </a>
            <a href="{{route('user.404')}}">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                <h3>Settings</h3>
            </a>
            <a href="{{route('home')}}">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                <h3>Logout</h3>
            </a>
        </div>
    </aside>
    <!-- End of Sidebar Section -->

    {{--CONTENT--}}
{{--@section('content')--}}
    <div class="main-content">
        <div class="card-header">
            <h3 class="card-title">CREATE QUIZ</h3>
        </div>

        <form action="{{route('generateQuiz')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Game Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Game Title" name="game">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Topic Title</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Topic Title" name="topic">
                </div>
                <div class="form-group">
                    <label> Number of Questions</label>
                    <select class="form-control" name="number">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </form>
    </div>
{{--@endsection--}}

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
                    <p>Hey, <b>{{old('name',$users->name)}}</b></p>

                    <small class="text-muted">User</small>

                </div>
                <div class="profile-photo">
                    <img src="/images/avt.jpg">
                </div>
            </div>

        </div>
        <!-- End of Nav -->
    </div>
    <!-- End Right Section -->

        LOADING
    <div class="loading">
        <div class="circle" style="--a:#00e371"></div>
        <div class="circle" style="--a:#ff2756"></div>
        <div class="circle" style="--a:#f7ff09"></div>
        <span class="loading-text">Loading</span>
    </div>
        END LOADING
</div>
<script src="{{ asset('js/generate.js') }}"></script>
</body>
</html>
