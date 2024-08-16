<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('layout-css/ingame.css')}}">
    <title>Document</title>
</head>
<body>
<form action="{{ route('checkAnswer')}}" method="post">
    @csrf
    <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">
    <div class="ingame">
        <div class="ingame-header">
            <div class="ingame-time">
                <div class="time-text">Time left:</div>
                <div class="time-sec" id="countdown">30</div>
            </div>
        </div>
        <div class="ingame-content">
            <div class="ingame-ques">
                <span>{{ $currentQuestion->content }}</span>
            </div>
            <div class="ingame-list">
                @foreach($currentQuestion->answers as $key => $answer)
                    <div class="answer-options">
                        <button type="submit" name="answer_content" value="{{ $answer->answer_content }}">
                            {{ $answer->answer_content }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</form>
<script></script>
</body>
</html>
