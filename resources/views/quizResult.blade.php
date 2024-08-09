<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
</head>
<body>
<h1>Quiz cho chủ đề: {{$quiz}}</h1>
<ul>
    @foreach ($questions as $question)
        <div class="question">
            <p>{{ $question['question'] }}</p>
            <ul>
                @foreach ($question['choices'] as $choice)
                    <li>{{ $choice }}</li>
                @endforeach
            </ul>
            <p><strong>Correct Answer:</strong> {{ $question['correct_answer'] }}</p>
        </div>
    @endforeach

</ul>
</body>
</html>
