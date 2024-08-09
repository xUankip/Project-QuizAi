<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quiz Generation</h3>
        </div>

        <form action="{{route('generateQuiz')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Game Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Game Title" name="game">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Topic Title</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Topic Title" name="topic">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Number of Question</label>
                    <input type="number" class="form-control" placeholder="Min 5 Max 20" min="5" step="5" max="20" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="number">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </form>
    </div>

</div>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Quiz AI</b> 1.0
    </div>
    <strong>Copyright © 2077 <a href="#">QUIZAI</a>.</strong> All rights reserved.
</footer>
</html>
