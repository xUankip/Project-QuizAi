<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{--    <h1>Quiz cho chủ đề: {{ $quiz }}</h1>--}}
    <ul>
        @foreach($decoded->quiz as $quiz)
            <li>{{$quiz->question}}
                <ul>
                    @foreach($quiz->choices as $choice)
                        @if($choice == $quiz->correct_answer)
                            <li style="color: red; font-weight: bolder">{{$choice}}</li>
                        @else
                            <li>{{$choice}}</li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>
