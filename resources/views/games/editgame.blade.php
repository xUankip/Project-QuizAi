<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('layout-css/editgame.css') }}">
    <title>Demo Admin Page-QuizAI</title>
</head>

<body>
<div class="container">
    <!-- Sidebar Section -->
    <aside>
        <div class="toggle">
            <div class="logo">
                <img src="{{asset('images/img3.png')}}">
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
            <a href="#">
                    <span class="material-icons-sharp">
                        sports_esports
                    </span>
                <h3>My Games</h3>
            </a>
            <a href="#" class="active">
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
        <form action="{{ route('saveAll') }}" method="post">
            @csrf
            <div class="container-content">
                <div class="card-content">
                    <div class="card-header">
                        <h1>Edit your question:</h1>
                        <h2><strong>Topic</strong>:{{ $game->topic->name }}</h2>
                        {{--            <input name="topic" value="{{ $game->topic->name }}">--}}
                        <input name="game" value="{{ $game }}" type="hidden">
                    </div>
                    @foreach($game->questions as $index => $question)
                        <div class="card">
                            <div class="card-main">
                                <details>
                                    <summary>{{ $question->content }}</summary>
                                    <div class="card-body">
                                        Nội dung câu hỏi
                                        <input name="questions[]" type="text" value="{{ $question->content }}">
                                        @foreach($question->answers as $key => $answer)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="answers[{{ $index }}]" value="{{ $key }}">
                                                <label class="form-check-label">
                                                    <input type="text" style="{{($question->correct_answer == $answer->answer_content) ? 'color: green' : ''}}" value="{{ $answer->answer_content }}">
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-button">
                                        <button type="submit" class="button">Save</button>
                                        <button type="delete" class="button">Delete</button>
                                    </div>
                                </details>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-button">
                    <button type="submit" class="button">Continue</button>
                    <button type="submit" class="button">New create</button>
                </div>
            </div>
        </form>
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
                    <small class="text-muted">User</small>
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
