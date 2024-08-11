<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Score</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Thêm CSS nếu cần -->
</head>
<body>
<div class="container">
    <h1>Score for User: {{ $userScore->name }}</h1>
    <p>User ID: {{ $userScore->id }}</p>
    <p>Total Score: {{ $userScore->total_score }}</p>
</div>
</body>
</html>

