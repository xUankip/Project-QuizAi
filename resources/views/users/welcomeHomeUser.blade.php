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

