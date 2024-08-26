<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizAi</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/game-start.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
@if(session('error'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: '{{session('error')}}',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<section class="wrapper">
    <form style="display: none" action="{{route('topic')}}" method="get" name="backForm">
        @csrf
    </form>
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
                    var qrcode = new QRCode("qrcode", "{{$link}}");
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
                    <button type="button" class="button" onclick="submitBackForm()">Back</button>
                </div>
            </div>
        </div>
    </form>
</section>
</body>
</html>
<script>
    function submitBackForm() {
        document.forms['backForm'].submit();
    }

</script>

