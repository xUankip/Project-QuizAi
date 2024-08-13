<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <style>
        .correct-answer {
            color: green;
            font-weight: bold;
        }

        /* Custom CSS */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .card summary {
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
        }

        .card-body {
            padding-top: 10px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border: 1px solid #007bff;
            border-radius: 5px;
            background-color: transparent;
            color: #007bff;
            text-align: center;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-danger {
            border-color: #dc3545;
            color: #dc3545;
        }
    </style>
</head>
{{--@if (isset($correctAnswers))--}}
{{--    @if ($correctAnswers > 0)--}}
{{--        <div class="alert alert-success">--}}
{{--            Bạn đã trả lời đúng {{ $correctAnswers }} trên tổng số {{ $totalQuestions }} câu!--}}
{{--        </div>--}}
{{--    @else--}}
{{--        <div class="alert alert-danger">--}}
{{--            Bạn đã trả lời sai.Bạn đã trả lời đúng {{ $correctAnswers }} trên tổng số {{ $totalQuestions }} câu!--}}
{{--        </div>--}}
{{--    @endif--}}
{{--@endif--}}
<div class="card-body">
    <form action="{{ route('checkAnswer') }}" method="post">
        @csrf
        <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">
        <div class="col-12">
            <div class="card">
                <details>
                    <summary>{{ $currentQuestion->content }}</summary>
                    <div class="card-body">
                        Nội dung câu hỏi
                        <input name="questions[]" type="text" class="form-control" value="{{ $currentQuestion->content }}" readonly>
                        @foreach($currentQuestion->answers as $key => $answer)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="submit" class="form-control" name="answer_content" value="{{ $answer->answer_content }}" style="height: 50px;width: 100px">
                                </label>
                            </div>
                        @endforeach
                    </div>
                </details>
            </div>
        </div>
    </form>
</div>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/dist/js/adminlte.min.js?v=3.2.0"></script>
</html>
