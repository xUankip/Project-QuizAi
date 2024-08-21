<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizAi</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/game-start.css') }}">
</head>
<body>
@if(session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif
<section class="wrapper">
    <form action="{{route('start.post', ['id' => $games->id])}}" method="post">
        @csrf
        <div class="container">
            <div class="rule-box">
                <div class="rule-title">
                    <span>Some Rules of this Quiz</span>
                </div>
                <div class="rule-list">
                    <div class="rule">1.You will have only <span>30 seconds</span> per each question.</div>
                    <div class="rule">2.Once you select your answer, it can't be undone</div>
                    <div class="rule">3.You can't select any option once time goes off.</div>
                    <div class="rule">4.You can't exit from the Quiz while you're playing.</div>
                    <div class="rule">5.You'll get points on the basis of your correct answers.</div>
                </div>
            </div>

            <div class="content-qr">
                <script src=
                            "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
                </script>
                <div id="qrcode">
                </div>
                <script>
                    var qrcode = new QRCode("qrcode","{{$link}}");
                </script>
            </div>

            <div class="content">
                <h2 class="description">{{$games->name}}</h2>

                <div class="game-details">
                    <h2 class="game-name">Description:</h2>
                    <p class="game-description">{{$games->description}}</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="button">Start</button>
                    <button class="button">Back</button>
                </div>
            </div>
        </div>
    </form>
</section>
</body>
</html>
<script>

</script>

