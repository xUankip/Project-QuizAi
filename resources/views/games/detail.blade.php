<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        .card-header h4 {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            max-width: 100%;
            cursor: pointer;
            transition: max-height 0.5s ease;
        }
        .card-header h4.expanded {
            white-space: normal;
            text-overflow: clip;
        }
        .correct-answer {
            color: green; /* Màu xanh cho câu trả lời đúng */
            font-weight: bold;
        }
    </style>
</head>
<form action="{{ route('saveAll') }}" method="post">
    @csrf
    <div class="container-fluid">
        <div class="row">
            <input name="topic" value="{{ $game->topic->name }}">
            <input name="game" value="{{ $game }}" type="hidden">
            @foreach($game->questions as $index => $question)
                <div class="col-12">
                    <div class="card collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $question->content }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            Nội dung câu hỏi
                            <input name="questions[]" type="text" class="form-control" value="{{ $question->content }}" >
                            @foreach($question->answers as $key => $answer)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[{{ $index }}]" value="{{ $key }}">
                                    <label class="form-check-label">
                                        <input type="text" style="{{($question->correct_answer == $answer->answer_content) ? 'color: green' : ''}}" class="form-control" value="{{ $answer->answer_content }}">
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-block btn-outline-primary col-3">Save</button>
        <button type="button" class="btn btn-block btn-outline-danger col-3">Cancel</button>
    </div>
</form>
<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/dist/js/adminlte.min.js?v=3.2.0"></script>
</html>
