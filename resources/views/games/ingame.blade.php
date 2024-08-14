
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
{{--            <div class="imgame-topic">--}}
{{--                <p>TOPIC GAME:</p>--}}
{{--            </div>--}}
            <div class="ingame-time">
                <div class="time-text">Time left:</div>
                <div class="time-sec">15</div>
            </div>
        </div>
        <div class="ingame-content">
            <div class="ingame-ques">
                <span>{{ $currentQuestion->content }}</span>
            </div>
            <div class="ingame-list">
                @foreach($currentQuestion->answers as $key => $answer)
                        <label>
                            <button class="answer-options" type="submit" name="answer_content" value="{{ $answer->answer_content }}" style="height: 50px;width: 100px">
                                {{ $answer->answer_content }}</button>
                        </label>
                @endforeach
            </div>
        </div>
{{--        <div class="ingame-footer">--}}
{{--            <div class="ingame-total">Question: 1 / 3</div>--}}
{{--            <div class="ingame-button">--}}
{{--                <button type="next" class="button">Next</button>--}}
{{--                <button type="finish" class="button">Finish</button>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</form>
</body>
<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/dist/js/adminlte.min.js?v=3.2.0"></script>

</html>
