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
<form action="{{route('generateQuiz')}}" method="POST">
    @csrf
    <div>
        <label for="topic">Nhập tên chủ đề : </label>
        <input type="text" id="nd" name="topic" required>
        <label for="nd">Nhập nội dung muốn tạo caau hỏi </label>
        <input type="text" id="nd" name="nd" required>
    </div>
    <button type="submit">Tạo Quiz</button>
</form>
</body>
</html>
