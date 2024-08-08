<!DOCTYPE html>
<html>
<head>
    <title>Quiz Generator</title>
</head>
<body>
@if (session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif
<form action="/quiz" method="POST">
    @csrf
    <div>
        <label for="nd">Nhập nội dung</label>
        <input type="text" id="nd" name="nd" required>
    </div>
    <div>
        <label for="question_count">Số lượng câu hỏi</label>
        <input type="number" id="question_count" name="question_count" min="1">
    </div>
    <button type="submit">Tạo Quiz</button>
</form>
</body>
</html>
