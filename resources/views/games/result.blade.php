
<div class="result">
    <h1>Kết quả của bạn</h1>
    <p>Số câu hỏi: {{ $totalQuestions }}</p>
    <p>Số câu trả lời đúng: {{ $correctAnswers }}</p>
</div>
<form action="{{route('topUsers')}}" method="get">
    @csrf
    <button type="submit">Xem top người chơi</button>
</form>
<form action="{{route('userScore')}}" method="get">
    @csrf
    <button type="submit">Xem điểm cá nhân </button>
</form>
