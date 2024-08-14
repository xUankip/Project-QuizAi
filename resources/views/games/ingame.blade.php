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
<form action="">
    <div class="ingame">
        <div class="ingame-header">
            <div class="imgame-topic">
                <p>TOPIC GAME:</p>
            </div>
            <div class="ingame-time">
                <div class="time-text">Time left:</div>
                <div class="time-sec">15</div>
            </div>
        </div>
        <div class="ingame-content">
            <div class="ingame-ques">
                <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam mollitia labore ratione aliquam provident ab ipsa quasi voluptate eum a?</span>
            </div>
            <div class="ingame-list">
                <div class="answer-options">
                    <span>Đáp án</span>
                </div>
                <div class="answer-options">
                    <span>Đáp án</span>
                </div>
                <div class="answer-options">
                    <span>Đáp án</span>
                </div>
                <div class="answer-options">
                    <span>Đáp án</span>
                </div>
            </div>
        </div>
        <div class="ingame-footer">
            <div class="ingame-total">Question: 1 / 3</div>
            <div class="ingame-button">
                <button type="next" class="button">Next</button>
                <button type="finish" class="button">Finish</button>
            </div>
        </div>
    </div>
</form>
{{--<form action="" method="POST">--}}
{{--    <div class="card-body">--}}
{{--        Nội dung câu hỏi--}}
{{--        <input name="questions[]" type="text" class="form-control" value="{{ $question->content }}" >--}}
{{--        @foreach($question->answers as $key => $answer)--}}
{{--            <div class="form-check">--}}
{{--                <input class="form-check-input" type="radio" name="answers[{{ $index }}]" value="{{ $key }}">--}}
{{--                <label class="form-check-label">--}}
{{--                    <input type="text" style="{{($question->correct_answer == $answer->answer_content) ? 'color: green' : ''}}" class="form-control" value="{{ $answer->answer_content }}">--}}
{{--                </label>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--    <div class="card-button">--}}
{{--        <button type="submit" class="btn btn-primary">Next</button>--}}
{{--    </div>--}}
{{--</form>--}}

</body>
</html>
