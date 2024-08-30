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
@if(session('displayThePlayerIsScore') || session('displayThePlayerIsResult'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: ' Bạn đã chơi game này , đây là bảng điểm của bạn ',
            html: `<strong>Score:</strong> {{ session('displayThePlayerIsScore') }}<br>
                   <strong>Results:</strong> {{ session('displayThePlayerIsResult') }}`,
            confirmButtonText: 'OK',
            cancelButtonText: 'Chi tiết',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.cancel) {
                window.location.href = '{{ route('result') }}'; // Điều hướng đến trang chi tiết
            }
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
                    <span>Luật chơi</span>
                </div>
                <div class="rule-list">
                    <div class="rule">1.Bạn chỉ có <span>30 giây</span> cho mỗi câu hỏi.</div>
                    <div class="rule">2.Một khi bạn đã trả lời, bạn sẽ không thể hoàn tác</div>
                    <div class="rule">3.Bạn không thể chọn câu trả lời khi thời gian kết thúc.</div>
                    <div class="rule">4.Bạn không thể thoát khi đang trong trò chơi.</div>
                    <div class="rule">5.Bạn sẽ nhận được điểm dựa trên câu trả lời đúng của bạn.</div>
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
                    <button type="submit" class="button">Bắt Đầu</button>
                    <button type="button" class="button" onclick="submitBackForm()">Quay Lại</button>
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

