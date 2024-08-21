@extends('layouts.index-user')
@section('content')
<main ng-view="" class="ng-scope">
    <section class="ng-scope">
        <div id="slider">
            <div class="text-content">
                <h1 class="text-heading"><span class="text-heading">Chào mừng đến với</span> <br id="wrap-heading">
                    <span id="heading-logo">QuizAI</span>
                </h1>
                <div class="text-description">
                    Môi trường sáng tạo thú vị cho riêng bạn!
                </div>
                <button onclick="window.location.href='{{ route('topic') }}'" class="cssbuttons-io-button"> Bắt đầu nào
                    <div class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                  fill="currentColor"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </section>
</main>
@endsection
{{--<footer class="site-footer">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-12 col-md-6">--}}
{{--                <h6>Giới thiệu</h6>--}}
{{--                <p class="text-justify">QuizAI<i> HỆ THỐNG TRẮC NGHIỆM MIỄN PHÍ 2024</i>--}}
{{--            </div>--}}

{{--            <div class="col-xs-6 col-md-3">--}}
{{--                <h6>QuizAI team</h6>--}}
{{--                <ul class="footer-links">--}}
{{--                    <li><a href="#">Quiz Guide</a></li>--}}
{{--                    <li><a href="#">Email</a></li>--}}
{{--                    <li><a href="#">TikTok</a></li>--}}
{{--                    <li><a href="#">YouTube</a></li>--}}
{{--                    <li><a href="#">Fanpage</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8 col-sm-6 col-xs-12">--}}
{{--                <p class="copyright-text">Copyright © 2024 All Rights Reserved by--}}
{{--                    <a href="#">QuizAI</a>.--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
