<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Players</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Thêm CSS nếu cần -->
</head>
<body>
<div class="container">
    <h1>Top 3 Players</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Total Score</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($topUsers as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->total_score }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
