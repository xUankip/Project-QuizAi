<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
</head>
<body>
<h1>Quiz cho chủ đề: {{ $quiz }}</h1>
<ul>
    <ul>
        @foreach($decoded->quiz as $quiz)
            <li>{{$quiz->question}}
                <ul>
                    @foreach($quiz->answers as $answers)
                        @if($answers == $quiz->correct_answer)
                            <li style="color: red; font-weight: bolder">{{$answers}}</li>
                        @else
                            <li>{{$answers}}</li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>
