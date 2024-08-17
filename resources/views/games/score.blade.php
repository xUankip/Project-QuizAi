<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEM Results Summary</title>
    <link rel="stylesheet" href="{{asset('layout-css/score.css')}}">
</head>
<body>
<main>
    <div class="result-summary">
        <div class="results grid-flow" data-spacing="large">
            <h1 class="result-title">Your Result</h1>
            <p class="result-score"><span>{{$correctAnswers}}</span>Of {{$totalQuestions}} Questions</p>
            <div class="grid-flow">
                <p class="result-name"></p>
            </div>
        </div>

        <div class="summary grid-flow" data-spacing="large">
            <h2 class="result-title">Summary</h2>
            <form class="summary-form">
                <table>
                    <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($topUsers as $user) @endforeach
                    <tr>
                        <td>1</td>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> total_score}}</td>
                    </tr>

                    </tbody>
                </table>
            </form>
            <form action="{{route('homeUser')}}">
            <button href="" class="button">Continue</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>
