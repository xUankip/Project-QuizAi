<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEM Results Summary</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('layout-css/score.css')}}">
</head>
<body>
<main>
{{--    <div class="result-summary">--}}
{{--        <div class="results grid-flow" data-spacing="large">--}}
{{--            <h1 class="result-title">Your Result</h1>--}}
{{--            <p class="result-score"><span>{{$correctAnswers}}</span>Of {{$totalQuestions}} Questions</p>--}}
{{--            <div class="grid-flow">--}}
{{--                <p class="result-name"></p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="summary grid-flow" data-spacing="large">--}}
{{--            <h2 class="result-title">Summary</h2>--}}
{{--            <form class="summary-form">--}}
{{--                <table>--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Rank</th>--}}
{{--                        <th>Name</th>--}}
{{--                        <th>Score</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($topUsers as $user)--}}
{{--                        <tr>--}}
{{--                            <td>1</td>--}}
{{--                            <td>{{$user -> name}}</td>--}}
{{--                            <td>{{$user -> total_score}}</td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}

{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </form>--}}
{{--            <form action="{{route('homeUser')}}">--}}
{{--            <button href="" class="button">Continue</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

<div class="container">
{{--    RIGHTSIDE--}}
    <div class="right-side">
        <div class="left-side">
                    <div class="left-side-title">
                        <p>Kết quả của bạn</p>
                    </div>
                    <div class="left-side-content">
                        <p>Số câu đúng : {{$correctAnswers}} / {{$totalQuestions}} câu
                         --- <span>Điểm của bạn : {{$score}}</span></p>
                    </div>
        </div>
        <div class="right-side-main">
            <h2 class="right-title">Bảng Xếp Hạng</h2>
            <form class="right-form">
                <table>
                    <thead>
                    <tr>
                        <th>Thứ hạng</th>
                        <th>Tên người chơi</th>
                        <th>Điểm số</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($topUsers as $key => $user)
                        <tr>
                            <td>{{$key+1}}</td>

                            <td>{{$user -> name}}</td>
                            <td>{{$user -> total_score}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
        <div class="content-footer">
            <form action="{{route('homeUser')}}">
                <button href="" class="button">Tiếp tục</button>

            </form>
        </div>
    </div>
{{--    END RIGHTSIDE--}}
</div>

</main>
</body>
</html>
