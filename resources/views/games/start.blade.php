<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizAi</title>
    <link rel="stylesheet" href="dist/css/game-start.css">

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
                <script src=
                            "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
                </script>
                    <div id="qrcode">
                    </div>
                <script>

                    var qrcode = new QRCode("qrcode", "127.0.0.1/games/{id}");
                </script>
            <div class="content">
                <h2 class="description">{{$games->name}}</h2>

                <div class="game-details">
                    <h2 class="game-name">Mô Tả:</h2>
                    <p class="game-description">{{$games->description}}</p>
                </div>
                <div class="buttons">
                    <button type="submit" class="button start">Start</button>
                    <button class="button back">Back</button>
                </div>
            </div>
        </div>
    </form>
</section>
</body>
</html>
