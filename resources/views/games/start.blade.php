<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizAi</title>
    <link rel="stylesheet" href="dist/css/game-start.css">

</head>
<body>
<section class="wrapper">
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
            <h2 class="description">lịch sử phát triển của vũ trụ</h2>

            <div class="game-details">
                <h2 class="game-name">Mô Tả:</h2>
                <p class="game-description">Thời gian biểu của sự hình thành và phát triển của vũ trụ mô tả lịch sử vũ trụ và tương lai của vũ trụ theo thuyết Vụ Nổ Lớn (Big Bang theory). Người ta ước tính quá trình mở rộng metric của không gian đã khơi mào từ 13,8 tỷ năm trước.[1] Thời gian xuất hiện từ thời khắc Big Bang xảy ra được gọi là thời gian vũ trụ.</p>
            </div>
            <div class="buttons">
                <button class="button start">Start</button>
                <button class="button back">Back</button>
            </div>
        </div>
    </div>
</section>
</body>
</html>
