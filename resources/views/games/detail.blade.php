<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('layout-css/detail.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                        search
                    </span>
                <h3>Search</h3>
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
    <div class="main-content">
            <div class="container-content">
                <div class="card-content">
                    <div class="card-header">
                        <form action="{{route('createOrPlayGame')}}" method="post" name="gameForm">
                            @csrf
                            <h1>Edit your question:</h1>
                            <h2><strong>Topic</strong>:{{ $game->topic->name }}</h2>
                            <input type="hidden" name="type" id="formType" value="">
                            <input type="hidden" name="gameId" value="{{$game->id}}">
                        </form>
                    </div>
                    @foreach($game->questions as $index => $question)
                        <div class="card">
                            <form action="{{route('updateQuestion')}}" method="post" name="question_{{$question->id}}">
                                @csrf
                                <input type="hidden" name="questionId" value="{{$question->id}}">
                                <input type="hidden" name="correct_answer" value="{{$question->correct_answer}}">
                                <div class="card-main">
                                        <summary>{{ $question->content }}</summary>
                                        <div class="card-body">
                                            Nội dung câu hỏi
                                            <input name="content" type="text" value="{{ $question->content }}">
                                            @foreach($question->answers as $key => $answer)
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="text" name="answers[{{$answer->id}}]" value="{{ $answer->answer_content }}" style="{{($question->correct_answer == $answer->answer_content) ? 'color: green' : ''}}">
                                                        <span>{{($question->correct_answer == $answer->answer_content) ? 'Right' : ''}}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="card-button">
                                            <button type="submit" class="button" name="type" value="update">Save</button>
                                            <button type="submit" class="button" name="type" value="delete">Delete</button>
                                        </div>

                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="card-button">
                    <button type="button" class="button"  onclick="submitGameForm('continue')">Continue</button>
                    <button type="button" class="button" onclick="submitGameForm('create')">Create More</button>
                </div>
            </div>
        </form>
    </div>
    {{--END CONTENT--}}


{{--    RIGHT SECTION--}}
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
                    <p>Hey, <b>{{old('name', $users->name ?? 'Guest')}}</b></p>
                    <small class="text-muted">Admin</small>
                </div>
                <div class="profile-photo">
                    <img src="/images/img6.png">
                </div>
            </div>

        </div>
        <!-- End of Nav -->
    </div>

</div>
{{--    END RIGHT SECTION--}}

<script src="{{ asset('js/detail.js') }}"></script>
<script>
    function submitGameForm(type){
        document.getElementById('formType').value = type;
        document.forms['gameForm'].submit();
    }
</script>
</body>
</html>
