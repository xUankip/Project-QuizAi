@extends('layouts.index-user')
@section('content')
    <div class="main-content">
        <div class="container-content-wel">
            <div class="content-title-wel">
                <h1>Welcome QuizAI</h1>
            </div>
            <div class="content-wel">
                <p>Trang web tích hợp công nghệ Chat Gpt giúp tự động hoá quy trình tạo câu hỏi, tối ưu thời gian.</p>
            </div>
            <div class="content-button-wel">
                <button onclick="window.location.href='{{ route('topic') }}'" class="button"> Bắt đầu nào</button>
            </div>
        </div>
    </div>

@endsection

